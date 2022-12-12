<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model('pelanggan_model');
        // Halaman ini diproteksi dengan simpele_pelanggan => check_login
        $this->simple_pelanggan->cek_login();
    }

    // Halaman dashboard
    public function index()
    {
        $data = array(
            'title' => 'Halaman Dashboard Pelanggan',
            'isi'   => 'dashboard/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

/* End of file Dashboard.php and path \application\controllers\Dashboard.php */