<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //Validasi
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required',
            array('required' => '%s Harus diisi ')
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => '%s Harus diisi ')
        );
        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            //proses ke simple login
            $this->simple_login->login($username, $password);
        }
        //end validasi

        $data = array(
            'title' => 'Login Page',
        );
        $this->load->view('login/list', $data, false);
    }

    public function logout()
    {
        $this->simple_login->logout();
    }
}

/* End of file Login.php and path \application\controllers\Login.php */