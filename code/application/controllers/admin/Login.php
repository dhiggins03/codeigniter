<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('admin/login');
    }

    public function verify()
    {
        //username:admin password:123456
        $this->load->model('admin');
        $check = $this->admin->validate();
        if ($check) {
            $this->session->set_userdata('admin', '1');
            redirect('admin/dashboard');
        } else {
            echo "Incorrect Credentials";

            //  redirect('admin');
        }
    }
}
