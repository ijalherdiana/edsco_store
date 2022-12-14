<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hero extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('hero_model');
    }

    public function index()
    {
        $data = array('isi' => 'home/slider',);

        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

/* End of file Hero.php and path \application\controllers\Hero.php */