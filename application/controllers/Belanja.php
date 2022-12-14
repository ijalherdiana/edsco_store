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
        $this->load->model('pelanggan_model');
        $this->load->model('header_transaksi_model');
        $this->load->model('transaksi_model');
        //LOAD HELPER RANDOM STRING
        $this->load->helper('string');
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

    // Checkout
    public function checkout()
    {
        // check pelanggan sudah login atau belum? jika belum maka nanti harus registrasi
        // dan juga sekaligus login. Mengecek dengan session email.

        // Kondisi sudah login
        if ($this->session->userdata('email')) {
            // Email dan nama pelanggan diambil dari session
            $email           = $this->session->userdata('email');
            $nama_pelanggan  = $this->session->userdata('nama_pelanggan');
            $pelanggan       = $this->pelanggan_model->sudah_login($email, $nama_pelanggan);

            $keranjang  = $this->cart->contents();

            //validasi input
            $valid = $this->form_validation;
            $valid->set_rules(
                'nama_pelanggan',
                'Nama lengkap',
                'required',
                array('required' => '%s Harus diisi')
            );
            $valid->set_rules(
                'telpon',
                'Nomor telpon',
                'required',
                array('required' => '%s Harus diisi')
            );
            $valid->set_rules(
                'alamat',
                'Alamat',
                'required',
                array('required' => '%s Harus diisi')
            );
            $valid->set_rules(
                'email',
                'Email',
                'required|valid_email',
                array(
                    'required'     => '%s Harus diisi',
                    'valid_email' => '%s Tidak Valid'
                )
            );

            if ($valid->run() === FALSE) {

                //end validation

                $data   = array(
                    'title'      => 'Checkout',
                    'keranjang'  => $keranjang,
                    'pelanggan'  => $pelanggan,
                    'isi'        => 'belanja/checkout'

                );
                $this->load->view('layout/wrapper', $data, FALSE);
                // Masuk Database
            } else {
                $i = $this->input;
                $data = array(
                    'id_pelanggan'          => $pelanggan->id_pelanggan,
                    'nama_pelanggan'        => $i->post('nama_pelanggan'),
                    'email'                 => $i->post('email'),
                    'telpon'                => $i->post('telpon'),
                    'alamat'                => $i->post('alamat'),
                    'kode_transaksi'        => $i->post('kode_transaksi'),
                    'tanggal_transaksi'     => $i->post('tanggal_transaksi'),
                    'jumlah_transaksi'      => $i->post('jumlah_transaksi'),
                    'status_bayar'          => 'Belum',
                    'tanggal_post'          => date('Y-m-d H:i:s')
                );
                // Proses masuk ke header Transaksi
                $this->header_transaksi_model->tambah($data);
                // Proses masuk ke tabel Transakai
                foreach ($keranjang as $keranjang) {
                    $sub_total  = $keranjang['price'] * $keranjang['qty'];
                    $data = array(
                        'id_pelanggan'      => $pelanggan->id_pelanggan,
                        'kode_transaksi'    => $i->post('kode_transaksi'),
                        'id_produk'         => $keranjang['id'],
                        'harga'             => $keranjang['price'],
                        'jumlah'            => $keranjang['qty'],
                        'total_harga'       => $sub_total,
                        'tanggal_transaksi' => $i->post('tanggal_transaksi')
                    );
                    $this->transaksi_model->tambah($data);
                }
                // End Proses masuk ke tabel Transaksi
                // Setellah masuk ke tabel transaksi maka keranjang dikosongka lagi
                $this->cart->destroy();
                //End Pengosongan keranjang
                $this->session->set_flashdata('sukses', 'Check out berhasil');
                redirect(base_url('belanja/checkout'), 'refresh');
            }
            //End masuk database
        } else {
            // Kalau belum, maka harus registrasi
            $this->session->set_flashdata('sukses', 'Silahkan login atau Registrasi terlebih dahulu');
            redirect(base_url('registrasi'), 'refresh');
        }
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