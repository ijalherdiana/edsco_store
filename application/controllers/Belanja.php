<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        $this->load->model('konfigurasi_model');
    }
    //Halaman belanja
    public function index()
    {
        $keranjang  = $this->cart->contents();

        $data   = array(
            'title'      => 'keranjang Belanja',
            'keranjang'  => $keranjang,
            'isi'        => 'belanja/list'

        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
    // Tambahkan ke keranjang belanja
    public function add()
    {
        //ambil data dari form
        $id            = $this->input->post('id');
        $qty           = $this->input->post('qty');
        $price         = $this->input->post('price');
        $name          = $this->input->post('name');
        $redirect_page = $this->input->post('redirect_page');

        //proses memasukan ke keranjang belanja
        $data = array(
            'id'      => $id,
            'qty'     => $qty,
            'price'   => $price,
            'name'    => $name
        );
        $this->cart->insert($data);
        //redirect page
        redirect($redirect_page, 'refresh');
    }
    // Update cart
    public function update_cart($rowid)
    {
        //Jika ada data rowid
        if ($rowid) {
            $data = array(
                'rowid' => $rowid,
                'qty'   => $this->input->post('qty') //diambil dari inputan list

            );
            $this->cart->update($data);

            $this->session->set_flashdata('sukses', 'Data Keranjang telah diupdate');

            redirect(base_url('belanja'), 'refresh');
        } else {
            // Jika tidak ada rowid
            redirect(base_url('belanja'), 'refresh');
        }
    }

    // Hapus semua isi keranjang belanja
    public function hapus($rowid = '')
    {
        if ($rowid) {
            // Hapus per item Keranjang
            $this->cart->remove($rowid);
            $this->session->set_flashdata('sukses', 'Data Keranjang belanja telah dihapus');
            redirect(base_url('belanja'), 'refresh');
        } else {
            //Hapus All
            $this->cart->destroy();
            $this->session->set_flashdata('sukses', 'Data Keranjang belanja telah dihapus');
            redirect(base_url('belanja'), 'refresh');
        }
    }
}

/* End of file Belanja.php and path \application\controllers\admin\Belanja.php */