<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simple_pelanggan
{
    public function __construct()
    {
        $this->CI = &get_instance();
        // load data model user
        $this->CI->load->model('pelanggan_model');
    }

    // fungsi login
    public function login($email, $password)
    {
        $check = $this->CI->pelanggan_model->login($email, $password);
        // Jika ada data user , maka create session login
        if ($check) {
            $id_pelanggan   = $check->id_pelanggan;
            $nama_pelanggan = $check->nama_pelanggan;
            //create session
            $this->CI->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->CI->session->set_userdata('nama_pelanggan', $nama_pelanggan);
            $this->CI->session->set_userdata('email', $email);
            //redirect ke halaman admin yang di proteksi
            redirect(base_url('dashboard'), 'refresh');
        }
        // jika tidak ada maka akan diminta login kembali
        else {
            $this->CI->session->set_flashdata('warning', 'Password atau Username Salah');
            redirect(base_url('masuk'), 'refresh');
        }
    }

    // fungsi cek login
    public function cek_login()
    {
        // Memeriksa apakah session sudah atau belum, jika belum alihkan ke halaman login
        if ($this->CI->session->userdata('email') == "") {
            $this->CI->session->set_flashdata('warning', 'Anda belum login');
            redirect(base_url('masuk'), 'refresh');
        }
    }

    // fungsi logut
    public function logout()
    {
        // Membuang semua session yang di set saat login
        $this->CI->session->set_userdata('id_pelanggan');
        $this->CI->session->set_userdata('nama_pelanggan');
        $this->CI->session->set_userdata('email');
        //setelah session dibuang, maka alihkan ke halaman login
        $this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
        redirect(base_url('masuk'), 'refresh');
    }
}


/* End of file Simple_pelanggan.php and path \application\libraries\Simple_pelanggan.php */