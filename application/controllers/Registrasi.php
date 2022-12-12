<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('pelanggan_model');
    }

    // Halaman registrasi
    public function index()
    {
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_pelanggan',
            'Nama lengkap',
            'required',
            array('required' => '%s Harus diisi')
        );
        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[pelanggan.email]',
            array(
                'required'    => '%s Harus diisi',
                'valid_email' => '%s Tidak Valid',
                'is_unique'   => '%s Sudah Terdaftar'
            )
        );
        $valid->set_rules(
            'password',
            'Password',
            'required',
            array(
                'required' => '%s Harus diisi'
            )
        );

        if ($valid->run() === FALSE) {

            //end validation

            $data = array(
                'title' => 'Registrasi Pelanggan',
                'isi'   => 'registrasi/list'
            );

            $this->load->view('layout/wrapper', $data, FALSE);

            //masuk database
        } else {
            $i = $this->input;
            $data = array(
                'status_pelanggan'      => 'Pending',
                'nama_pelanggan'        => $i->post('nama_pelanggan'),
                'email'                 => $i->post('email'),
                'password'              => SHA1($i->post('password')),
                'telpon'                => $i->post('telpon'),
                'alamat'                => $i->post('alamat'),
                'tanggal_daftar'        => date('Y-m-d H:i:s')
            );
            $this->pelanggan_model->tambah($data);

            // Create session Login pelanggan
            $this->session->set_userdata('email', $i->post('email'));
            $this->session->set_userdata('nama_pelanggan', $i->post('nama_pelanggan'));
            // End Create Session

            $this->session->set_flashdata('sukses', 'Registrasi berhasil');
            redirect(base_url('registrasi/sukses'), 'refresh');
        }
        //end masuk database
    }

    // Sukses
    public function sukses()
    {
        $data = array(
            'title' => 'Registrasi berhasil',
            'isi'   => 'registrasi/sukses'

        );

        $this->load->view('layout/wrapper', $data, FALSE);
    }
}


/* End of file Registrasi.php and path \application\controllers\Registrasi.php */