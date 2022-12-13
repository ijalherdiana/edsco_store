<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
        $this->load->model('rekening_model');
        $this->load->model('header_transaksi_model');
        $this->load->model('konfigurasi_model');
    }

    public function index()
    {
        $header_transaksi  = $this->header_transaksi_model->listing();
        $data = array(
            'title'     => 'Data Transaksi',
            'header_transaksi' => $header_transaksi,
            'isi'       => 'admin/transaksi/list'
        );
        $this->load->view('admin/templates/wrapper', $data, FALSE);
    }
    // Detail
    public function detail($kode_transaksi)
    {
        $header_transaksi    = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi           = $this->transaksi_model->kode_transaksi($kode_transaksi);
        $data = array(
            'title'             => 'Riwayat Belanja',
            'header_transaksi'  => $header_transaksi,
            'transaksi'         => $transaksi,
            'isi'               => 'admin/transaksi/detail'
        );
        $this->load->view('admin/templates/wrapper', $data, FALSE);
    }
    // Cetak
    public function cetak($kode_transaksi)
    {
        $header_transaksi    = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi           = $this->transaksi_model->kode_transaksi($kode_transaksi);
        $site                = $this->konfigurasi_model->listing();
        $data = array(
            'title'             => 'Riwayat Belanja',
            'header_transaksi'  => $header_transaksi,
            'transaksi'         => $transaksi,
            'site'              => $site,
        );
        $this->load->view('admin/transaksi/cetak', $data, FALSE);
    }

    // Unduh PDF
    public function pdf($kode_transaksi)
    {
        $header_transaksi    = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi           = $this->transaksi_model->kode_transaksi($kode_transaksi);
        $site                = $this->konfigurasi_model->listing();
        $data = array(
            'title'             => 'Riwayat Belanja',
            'header_transaksi'  => $header_transaksi,
            'transaksi'         => $transaksi,
            'site'              => $site,
        );
        $this->load->view('admin/transaksi/cetak', $data, FALSE);
    }
}

/* End of file Transaksi.php and path \application\controllers\admin\Transaksi.php */