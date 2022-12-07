<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simple_login
{
    public function __construct()
    {
        $this->CI = &get_instance();
        // load data model user
        $this->CI->load->model('user_model');
    }

    // fungsi login
    public function login($username, $password)
    {
        $check = $this->CI->user_model->login($username, $password);
        // Jika ada data user , maka create session login
        if ($check) {
            $id_user = $check->id_user;
            $nama = $check->nama;
            $akses_level = $check->akses_level;
            //create session
            $this->CI->session->set_userdata('id_user', $id_user);
            $this->CI->session->set_userdata('nama', $nama);
            $this->CI->session->set_userdata('username', $username);
            $this->CI->session->set_userdata('akses_level', $akses_level);
            //redirect ke halaman admin yang di proteksi
            redirect(base_url('admin/dashboard'), 'refresh');
        }
        // jika tidak ada maka akan diminta login kembali
        else {
            $this->CI->session->set_flashdata('warning', 'Password atau Username Salah');
            redirect(base_url('login'), 'refresh');
        }
    }

    // fungsi cek login
    public function cek_login()
    {
        // Memeriksa apakah session sudah atau belum, jika belum alihkan ke halaman login
        if ($this->CI->session->userdata('username') == "") {
            $this->CI->session->set_flashdata('warning', 'Anda belum login');
            redirect(base_url('login'), 'refresh');
        }
    }

    // fungsi logut
    public function logout()
    {
        // Membuang semua session yang di set saat login
        $this->CI->session->set_userdata('id_user');
        $this->CI->session->set_userdata('nama');
        $this->CI->session->set_userdata('username');
        $this->CI->session->set_userdata('akses_level');
        //setelah session dibuang, maka alihkan ke halaman login
        $this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
        redirect(base_url('login'), 'refresh');
    }
}


/* End of file Simple_login.php and path \application\libraries\Simple_login.php */