<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{

    function __construct()
	{
		parent::__construct();
        $this->load->model('users_model'); 
	}

    public function index()
    {

        $data = array();
  
        if($data['users'] = $this->users_model->get_users()){
          $this->load->view('users', $data);
        }
    }

    public function test($userforename, $usersurname, $useremail)
    {
        $this->users->add_user($userforename, $usersurname, $useremail);
    }

    public function newuser()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $post = $this->input->post();
        if ($post)
        {
            if ($this->users_model->get_by_email($post['email'])->row()) 
            {
                $this->session->set_flashdata('feedback', 'User email already taken, failed validation');
                $this->session->set_flashdata('feedback_colour', 'red');
            }
            else 
            {
                $expected['fname']= array('Label'=>'Forename', 'Validation'=>'trim|htmlspecialchars|required|min_length[2]|max_length[20]');
                $expected['lname'] = array('Label'=>'Surname',  'Validation'=>'trim|htmlspecialchars|required|min_length[2]|max_length[20]');
                $expected['email']   = array('Label'=>'Email',    'Validation'=>'valid_email|trim|htmlspecialchars|required|min_length[2]|max_length[20]');
                foreach($expected as $field=>$details)
                {
                    $this->form_validation->set_rules( $field, $details['Label'], $details['Validation'] );
                }
                if($this->form_validation->run() !== FALSE )
                {
                    if($this->users_model->add_user($post['fname'], $post['lname'], $post['email']))                                
                    {
                        $this->session->set_flashdata('feedback', 'User successfully added.');
                        $this->session->set_flashdata('feedback_colour', 'green');
                    }
                }
                else
                {
                    $this->session->set_flashdata('feedback', 'User failed to be added, failed validation');
                    $this->session->set_flashdata('feedback_colour', 'red');
                }
                redirect(base_url('user/newuser')); 
            }
         
        }
        $this->load->view('newuser');

        
    }
   public function edit($userid)
   {
   
    $this->load->library('form_validation');
    
    $user=$this->users_model->get_user($userid);
   
    $data['user'] = $user;
    $post = $this->input->post();
    // echo '<pre>';
    // print_r($post);
    // echo '</pre>';
    // die();
    if ($post)
    {     
        
        $email = $post['email'];
        $fname = $post['fname'];
        $lname = $post['lname'];
        //check if changes made
        if ($email == $user->userEmail && $fname == $user->userForename && $lname == $user->userSurname)
        {   
          //no changes
            $this->session->set_flashdata('feedback', 'No changes made.');
            $this->session->set_flashdata('feedback_colour', 'red');
            redirect(base_url('user/edit/'.$userid));   
        } 
        else
        { //check if email exists
            // echo 'changes';
            //  die();
            if ( ! $this->users_model->get_by_email($post['email'])->row() || $email == $user->userEmail)
            {
                $expected['fname'] = array('Label' => 'First Name', 'Validation' => 'trim|htmlspecialchars|required|min_length[2]|max_length[15]');
                $expected['lname'] = array('Label' => 'Last Name', 'Validation' => 'trim|htmlspecialchars|required|min_length[2]|max_length[15]');
                $expected['email'] = array('Label' => 'Email', 'Validation' => 'valid_email|trim|htmlspecialchars|required|min_length[2]|max_length[20]');
                // setup validation
			foreach($expected as $field=>$details)
			{
				$this->form_validation->set_rules($field, $details['Label'], $details['Validation']);
			}
               //is email of current user, check rest of validation
               if ($this->form_validation->run() == FALSE)
               {   
                   $this->session->set_flashdata('feedback', 'User failed to be updated, failed validation');
                   $this->session->set_flashdata('feedback_colour', 'red'); 
                   redirect(base_url('user/edit/'.$userid)); 
                   
               }
               else
               {   
                    $update = array();
                    $update['userForename']=$fname;
                    $update['userSurname']=$lname;
                    $update['userEmail']=$email;
                   //passed all validation
                   if ($this->users_model->edit($userid, $update))
                   {  
                       //update successful
                       $this->session->set_flashdata('feedback', 'User successfully updated.');
                       $this->session->set_flashdata('feedback_colour', 'green');
                   }
                    else
                   {
                    //update failed
                        $this->session->set_flashdata('feedback', 'User failed to be updated. Update unsuccessful');
                        $this->session->set_flashdata('feedback_colour', 'red');
                   }
                   redirect(base_url('user/edit/'.$userid)); 
               }
            }
            else
            {
                //email already belongs to another user
                $this->session->set_flashdata('feedback', 'This email address is already taken.');
                $this->session->set_flashdata('feedback_colour', 'red');
                redirect(base_url('user/edit/'.$userid));   
            }
        }
    }
    $this->load->view('edit',$data);
   }

   public function delete($userid) 
   {
        $return=array();
        $return['success']=FALSE;
        $return['msg']='Failed to delete user';

        if ($userid)
        {
           if ($this->users_model->delete($userid))
           {
            $return['success']=TRUE;
            $return['msg']='User has been deleted';
           }
        } 
        $this->output->set_content_type('application/json')->set_output(json_encode($return));
        return;
   }
}