<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('rekening_model');
        //Proteksi Halaman
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $rekening = $this->rekening_model->listing();
        $data = array(
            'title'     => 'Data Rekening',
            'rekening'  => $rekening,
            'isi'       => 'admin/rekening/list'
        );
        $this->load->view('admin/templates/wrapper', $data, FALSE);
    }
    //Tambah Rekening
    public function tambah()
    {
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            //sesuai database
            'nama_bank',
            //Nama Rekening(Sesuai Tampilan)
            'Nama Rekening',
            //is_unique(nama rekening tidak boleh sama). rekening(nama table).nama rekening(nama filed)
            'required',
            array(
                'required' => '%s Harus diisi'
            )
        );
        $valid = $this->form_validation;
        $valid->set_rules(
            //sesuai database
            'nama_pemilik',
            //Nama Rekening(Sesuai Tampilan)
            'Nama Pemilik Rekening',
            //is_unique(nama rekening tidak boleh sama). rekening(nama table).nama rekening(nama filed)
            'required',
            array(
                'required' => '%s Harus diisi'
            )
        );
        $valid->set_rules(
            //sesuai database
            'nomor_rekening',
            //Nama Rekening(Sesuai Tampilan)
            'Nomor Rekening',
            //is_unique(nama rekening tidak boleh sama). rekening(nama table).nama rekening(nama filed)
            'required|is_unique[rekening.nomor_rekening]',
            array(
                'required' => '%s Harus diisi',
                'is_unique' => '%s Sudah ada. Buat Nomor Rekening baru'
            )
        );

        if ($valid->run() === FALSE) {

            //end validation

            $data = array(
                'title' => 'Tambah Rekening',
                'isi'   => 'admin/rekening/tambah'
            );
            $this->load->view('admin/templates/wrapper', $data, FALSE);
        }
        //masuk database
        else {
            $i             = $this->input;
            $data = array(
                'nama_bank'      => $i->post('nama_bank'),
                'nomor_rekening' => $i->post('nomor_rekening'),
                'nama_pemilik'   => $i->post('nama_pemilik'),

            );
            $this->rekening_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data berhasil ditambah');
            redirect(base_url('admin/rekening'), 'refresh');
        }
        //end masuk database
    }

    //Edit Rekening
    public function edit($id_rekening)
    {
        $rekening = $this->rekening_model->detail($id_rekening);
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_bank',
            'Nama rekening',
            'required',
            array('required' => '%s Harus diisi')
        );


        if ($valid->run() === FALSE) {

            //end validation

            $data = array(
                'title' => 'Edit Rekening',
                'rekening'  => $rekening,
                'isi'   => 'admin/rekening/edit'
            );
            $this->load->view('admin/templates/wrapper', $data, FALSE);
        }
        //masuk database
        else {
            $i             = $this->input;
            $data = array(
                'id_rekening'    => $id_rekening,
                'nama_bank'      => $i->post('nama_bank'),
                'nomor_rekening' => $i->post('nomor_rekening'),
                'nama_pemilik'   => $i->post('nama_pemilik'),
            );
            $this->rekening_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data berhasil diedit');
            redirect(base_url('admin/rekening'), 'refresh');
        }
        //end masuk database
    }

    public function delete($id_rekening)
    {
        $data = array('id_rekening' => $id_rekening);
        $this->rekening_model->delete($data);
        $this->session->set_flashdata('warning', 'Data berhasil Dihapus');
        redirect('admin/rekening', 'refresh');
    }
}

/* End of file Rekening.php and path \application\controllers\admin\Rekening.php */