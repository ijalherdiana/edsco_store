<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        //Proteksi Halaman
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $user = $this->user_model->listing();
        $data = array(
            'title' => 'Data Pengguna',
            'user'  => $user,
            'isi'   => 'admin/user/list'
        );
        $this->load->view('admin/templates/wrapper', $data, FALSE);
    }
    //Tambah User
    public function tambah()
    {
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama',
            'Nama lengkap',
            'required',
            array('required' => '%s Harus diisi')
        );
        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required' => '%s Harus diisi',
                'valid_email' => '%s Tidak Valid',
            )
        );
        $valid->set_rules(
            'username',
            'Username',
            'required|min_length[6]|max_length[32]|is_unique[users.username]',
            array(
                'required' => '%s Harus diisi',
                'min_length' => '%s Minimal 6 Karakter',
                'max_length' => '%s Maksimal 32 Karakter',
                'is_unique' => '%s Sudah ada. Buat username baru.'
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
                'title' => 'Tambah Pengguna',
                'isi'   => 'admin/user/tambah'
            );
            $this->load->view('admin/templates/wrapper', $data, FALSE);
        }
        //masuk database
        else {
            $i = $this->input;
            $data = array(
                'nama'        => $i->post('nama'),
                'email'       => $i->post('email'),
                'username'    => $i->post('username'),
                'password'    => SHA1($i->post('password')),
                'akses_level' => $i->post('akses_level')
            );
            $this->user_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambah');
            redirect(base_url('admin/user'), 'refresh');
        }
        //end masuk database
    }

    //Edit User
    public function edit($id_user)
    {
        $user = $this->user_model->detail($id_user);
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama',
            'Nama lengkap',
            'required',
            array('required' => '%s Harus diisi')
        );
        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required' => '%s Harus diisi',
                'valid_email' => '%s Tidak Valid',
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
                'title' => 'Edit Pengguna',
                'user'  => $user,
                'isi'   => 'admin/user/edit'
            );
            $this->load->view('admin/templates/wrapper', $data, FALSE);
        }
        //masuk database
        else {
            $i = $this->input;
            $data = array(
                'id_user'     => $id_user,
                'nama'        => $i->post('nama'),
                'email'       => $i->post('email'),
                'username'    => $i->post('username'),
                'password'    => SHA1($i->post('password')),
                'akses_level' => $i->post('akses_level')
            );
            $this->user_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data berhasil diedit');
            redirect(base_url('admin/user'), 'refresh');
        }
        //end masuk database
    }

    public function delete($id_user)
    {
        $data = array('id_user' => $id_user);
        $this->user_model->delete($data);
        $this->session->set_flashdata('warning', 'Data berhasil Dihapus');
        redirect('admin/user', 'refresh');
    }
}

/* End of file User.php and path \application\controllers\admin\User.php */