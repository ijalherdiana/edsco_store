<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model('pelanggan_model');
        $this->load->model('header_transaksi_model');
        $this->load->model('transaksi_model');
        // Halaman ini diproteksi dengan simpele_pelanggan => check_login
        $this->simple_pelanggan->cek_login();
    }

    // Halaman dashboard
    public function index()
    {
        // Ambil data login id_pelanggan dari session
        $id_pelanggan        = $this->session->userdata('id_pelanggan');
        $header_transaksi    = $this->header_transaksi_model->pelanggan($id_pelanggan);

        $data = array(
            'title'             => 'Halaman Dashboard Pelanggan',
            'header_transaksi'  => $header_transaksi,
            'isi'               => 'dashboard/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    // Belanja
    public function belanja()
    {
        // Ambil data login id_pelanggan dari session
        $id_pelanggan           = $this->session->userdata('id_pelanggan');
        $header_transaksi    = $this->header_transaksi_model->pelanggan($id_pelanggan);

        $data = array(
            'title'             => 'Riwayat Belanja',
            'header_transaksi'  => $header_transaksi,
            'isi'               => 'dashboard/belanja'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
    // Detail
    public function detail($kode_transaksi)
    {
        // Ambil data login id_pelanggan dari session
        $id_pelanggan        = $this->session->userdata('id_pelanggan');
        $header_transaksi    = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $transaksi           = $this->transaksi_model->kode_transaksi($kode_transaksi);
        // Pastikan bahwa pelanggan hanya mengakses data transaksinya
        if ($header_transaksi->id_pelanggan != $id_pelanggan) {
            $this->session->set_flashdata('warning', 'Anda mencoba mengakses data transaksi orang lain');
            redirect(base_url('masuk'));
        }

        $data = array(
            'title'             => 'Riwayat Belanja',
            'header_transaksi'  => $header_transaksi,
            'transaksi'         => $transaksi,
            'isi'               => 'dashboard/detail'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    // Profil
    public function profil()
    {
        // Ambil data login id_pelanggan dari session
        $id_pelanggan        = $this->session->userdata('id_pelanggan');
        $pelanggan           = $this->pelanggan_model->detail($id_pelanggan);

        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_pelanggan',
            'Nama lengkap',
            'required',
            array('required' => '%s Harus diisi')
        );
        $valid->set_rules(
            'alamat',
            'Alamat lengkap',
            'required',
            array('required' => '%s Harus diisi')
        );
        $valid->set_rules(
            'telpon',
            'Nomor Telpon',
            'required',
            array('required' => '%s Harus diisi')
        );
        if ($valid->run() === FALSE) {

            //end validation

            $data = array(
                'title'      => 'Profil Saya',
                'pelanggan'  => $pelanggan,
                'isi'        => 'dashboard/profil'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
            //masuk database
        } else {
            $i = $this->input;
            // Kalau Password lebih dari 6 Maka, Password diganti
            if (strlen($i->post('password')) >= 6) {
                $data = array(
                    'id_pelanggan'          => $id_pelanggan, //dari session
                    'nama_pelanggan'        => $i->post('nama_pelanggan'),
                    'password'              => SHA1($i->post('password')),
                    'telpon'                => $i->post('telpon'),
                    'alamat'                => $i->post('alamat'),

                );
            } else {
                // Kalau Passwordnya kurang dari 6 maka password tidak diganti
                $data = array(
                    'id_pelanggan'          => $id_pelanggan, //dari session
                    'nama_pelanggan'        => $i->post('nama_pelanggan'),
                    'telpon'                => $i->post('telpon'),
                    'alamat'                => $i->post('alamat'),
                );
            }
            // End data update
            $this->pelanggan_model->edit($data);
            $this->session->set_flashdata('sukses', 'Update Profil berhasil');
            redirect(base_url('dashboard/profil'), 'refresh');
        }
        //end masuk database
    }
}

/* End of file Dashboard.php and path \application\controllers\Dashboard.php */