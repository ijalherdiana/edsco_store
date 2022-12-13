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
        $this->load->model('rekening_model');
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

    // Konfirmasi pembayaran
    public function konfirmasi($kode_transaksi)
    {
        $header_transaksi   = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
        $rekening           = $this->rekening_model->listing();

        //validasi input
        $valid    = $this->form_validation;

        $valid->set_rules(
            'nama_bank',
            'Nama Bank',
            'required',
            array('required' => '%s Harus diisi')
        );

        $valid->set_rules(
            'rekening_pembayaran',
            'Nomor Rekening',
            'required',
            array(
                'required' => '%s Harus diisi'
            )
        );

        $valid->set_rules(
            'rekening_pelanggan',
            'Nama Pemilik Rekening',
            'required',
            array(
                'required' => '%s Harus diisi'
            )
        );
        $valid->set_rules(
            'tanggal_bayar',
            'Tanggal Pembayaran',
            'required',
            array(
                'required' => '%s Harus diisi'
            )
        );
        $valid->set_rules(
            'jumlah_bayar',
            'Jumlah Pembayaran',
            'required',
            array(
                'required' => '%s Harus diisi'
            )
        );

        if ($valid->run()) {
            // Checck jika gambar diganti
            if (!empty($_FILES['bukti_bayar']['name'])) {

                $config['upload_path']    = './assets/upload/image/';
                $config['allowed_types']  = 'gif|jpg|jpeg|png';
                $config['max_size']       = '2400'; //Dalam KB
                $config['max_width']      = '2024';
                $config['max_height']     = '2024';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('bukti_bayar')) {

                    //end validation

                    $data = array(
                        'title'             => 'Konfirmasi Pembayaran',
                        'header_transaksi'  => $header_transaksi,
                        'rekening'          => $rekening,
                        'error'             => $this->upload->display_errors(),
                        'isi'               => 'dashboard/konfirmasi'
                    );
                    $this->load->view('layout/wrapper', $data, FALSE);
                    //masuk database
                } else {
                    $upload_gambar = array('upload_data' => $this->upload->data());

                    //Create Thumbnail gambar

                    $config['image_library']  = 'gd2';
                    $config['source_image']   = './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];
                    //lokasi folder thumbnail
                    $config['new_image']      = './assets/upload/image/thumbs/';
                    $config['create_thumb']   = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']          = 250; //pixel
                    $config['height']         = 250;

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    //End create thumbnail

                    $i = $this->input;

                    $data = array(
                        'id_header_transaksi' => $header_transaksi->id_header_transaksi,
                        'status_bayar'       => ('konfirmasi'),
                        'jumlah_bayar'       => $i->post('jumlah_bayar'),
                        'rekening_pembayaran' => $i->post('rekening_pembayaran'),
                        'rekening_pelanggan' => $i->post('rekening_pelanggan'),
                        // Disimpan nama file gambar
                        'bukti_bayar'        => $upload_gambar['upload_data']['file_name'],
                        'id_rekening'        => $i->post('id_rekening'),
                        'tanggal_bayar'      => $i->post('tanggal_bayar'),
                        'nama_bank'          => $i->post('nama_bank'),

                    );
                    $this->header_transaksi_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
                    redirect(base_url('dashboard'), 'refresh');
                }
            } else {
                //Edit Produk tanpa ganti gambar
                $i = $this->input;

                $data = array(
                    'id_header_transaksi'  => $header_transaksi->id_header_transaksi,
                    'status_bayar'       => ('konfirmasi'),
                    'jumlah_bayar'       => $i->post('jumlah_bayar'),
                    'rekening_pembayaran' => $i->post('rekening_pembayaran'),
                    'rekening_pelanggan' => $i->post('rekening_pelanggan'),
                    // Disimpan nama file gambar
                    // 'bukti_bayar'        => $upload_gambar['upload_data']['file_name'],
                    'id_rekening'        => $i->post('id_rekening'),
                    'tanggal_bayar'      => $i->post('tanggal_bayar'),
                    'nama_bank'          => $i->post('nama_bank'),

                );
                $this->header_transaksi_model->edit($data);
                $this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
                redirect(base_url('dashboard'), 'refresh');
            }
        }
        //end masuk database
        $data = array(
            'title'             => 'Konfirmasi Pembayaran',
            'header_transaksi'  => $header_transaksi,
            'rekening'          => $rekening,
            'isi'               => 'dashboard/konfirmasi'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

/* End of file Dashboard.php and path \application\controllers\Dashboard.php */