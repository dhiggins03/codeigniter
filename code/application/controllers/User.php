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
}