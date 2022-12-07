<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    // Halaman Utama
    public function index()
    {
        $data = array(
            'title' => 'Edsco-Store',
            'isi'   => 'home/list',
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

/* End of file Home.php and path \application\controllers\Home.php */