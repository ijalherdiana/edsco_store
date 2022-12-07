<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        //Proteksi Halaman
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $data = array(
            'title' => 'Administrator - Edsco Store',
            'isi' => 'admin/list'
        );
        $this->load->view('admin/templates/wrapper', $data, FALSE);
    }
}

/* End of file Dashboard.php and path \application\controllers\admin\Dashboard.php */