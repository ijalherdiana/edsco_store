<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load Model
        $this->load->model('konfigurasi_model');
    }
    // Konfigurasi Umum
    public function index()
    {
        $konfigurasi    = $this->konfigurasi_model->listing();

        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            //sesuai database
            'namaweb',
            //Nama Kategori(Sesuai Tampilan)
            'Nama Website',
            //is_unique(nama kategori tidak boleh sama). kategori(nama table).nama kategori(nama filed)
            'required',
            array(
                'required' => '%s Harus diisi',
            )
        );

        if ($valid->run() === FALSE) {

            //end validation

            $data = array(
                'title'         => 'Konfigurasi website',
                'konfigurasi'   => $konfigurasi,
                'isi'           => 'admin/konfigurasi/list',
            );
            $this->load->view('admin/templates/wrapper', $data, FALSE);
        }
        //masuk database
        else {
            $i             = $this->input;
            $data = array(
                'id_konfigurasi'      => $konfigurasi->id_konfigurasi,
                'namaweb'             => $i->post('namaweb'),
                'tagline'             => $i->post('tagline'),
                'email'               => $i->post('email'),
                'website'             => $i->post('website'),
                'keywords'            => $i->post('keywords'),
                'metatext'            => $i->post('metatext'),
                'telepon'             => $i->post('telepon'),
                'alamat'              => $i->post('alamat'),
                'facebook'            => $i->post('facebook'),
                'instagram'           => $i->post('instagram'),
                'deskripsi'           => $i->post('deskripsi'),
                'rekening_pembayaran' => $i->post('rekening_pembayaran'),

            );
            $this->konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data berhasil diupdate');
            redirect(base_url('admin/konfigurasi/'), 'refresh');
        }
        //end masuk database
    }

    // Konfigurasi Logo
    public function logo()
    {
        $konfigurasi    = $this->konfigurasi_model->listing();

        //validasi input
        $valid    = $this->form_validation;

        $valid->set_rules(
            'namaweb',
            'Nama Website',
            'required',
            array('required' => '%s Harus diisi')
        );

        if ($valid->run()) {
            // Checck jika gambar diganti
            if (!empty($_FILES['logo']['name'])) {

                $config['upload_path']    = './assets/upload/image';
                $config['allowed_types']  = 'gif|jpg|jpeg|png';
                $config['max_size']       = '2400'; //Dalam KB
                $config['max_width']      = '2024';
                $config['max_height']     = '2024';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('logo')) {

                    //end validation

                    $data = array(
                        'title'       => 'Konfigurasi Logo Website',
                        'konfigurasi' => $konfigurasi,
                        'error'       => $this->upload->display_errors(),
                        'isi'         => 'admin/konfigurasi/logo'
                    );
                    $this->load->view('admin/templates/wrapper', $data, FALSE);
                }
                //masuk database
                else {
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
                        'id_konfigurasi'   => $konfigurasi->id_konfigurasi,
                        'namaweb'          => $i->post('namaweb'),
                        // Disimpan nama file gambar
                        'logo'           => $upload_gambar['upload_data']['file_name'],


                    );
                    $this->konfigurasi_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data berhasil diupdate');
                    redirect(base_url('admin/konfigurasi/logo'), 'refresh');
                }
            } else {
                //Edit Produk tanpa ganti gambar
                $i = $this->input;

                $data = array(
                    'id_konfigurasi'   => $konfigurasi->id_konfigurasi,
                    'namaweb'          => $i->post('namaweb'),
                    // Disimpan nama file gambar
                    // 'logo'           => $upload_gambar['upload_data']['file_name'],


                );
                $this->konfigurasi_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data berhasil diupdate');
                redirect(base_url('admin/konfigurasi'), 'refresh');
            }
        }
        //end masuk database
        $data = array(
            'title'       => 'Konfigurasi Logo Website',
            'konfigurasi' => $konfigurasi,
            'isi'         => 'admin/konfigurasi/logo'
        );
        $this->load->view('admin/templates/wrapper', $data, FALSE);
    }

    // Konfigurasi icon
    public function icon()
    {
        $konfigurasi    = $this->konfigurasi_model->listing();

        //validasi input
        $valid    = $this->form_validation;

        $valid->set_rules(
            'namaweb',
            'Nama Website',
            'required',
            array('required' => '%s Harus diisi')
        );

        if ($valid->run()) {
            // Checck jika gambar diganti
            if (!empty($_FILES['icon']['name'])) {

                $config['upload_path']    = './assets/upload/image';
                $config['allowed_types']  = 'gif|jpg|jpeg|png';
                $config['max_size']       = '2400'; //Dalam KB
                $config['max_width']      = '2024';
                $config['max_height']     = '2024';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('icon')) {

                    //end validation

                    $data = array(
                        'title'       => 'Konfigurasi Icon Website',
                        'konfigurasi' => $konfigurasi,
                        'error'       => $this->upload->display_errors(),
                        'isi'         => 'admin/konfigurasi/icon'
                    );
                    $this->load->view('admin/templates/wrapper', $data, FALSE);
                }
                //masuk database
                else {
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
                        'id_konfigurasi'   => $konfigurasi->id_konfigurasi,
                        'namaweb'          => $i->post('namaweb'),
                        // Disimpan nama file gambar
                        'icon'           => $upload_gambar['upload_data']['file_name'],


                    );
                    $this->konfigurasi_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data berhasil diupdate');
                    redirect(base_url('admin/konfigurasi/icon'), 'refresh');
                }
            } else {
                //Edit Produk tanpa ganti gambar
                $i = $this->input;

                $data = array(
                    'id_konfigurasi'   => $konfigurasi->id_konfigurasi,
                    'namaweb'          => $i->post('namaweb'),
                    // Disimpan nama file gambar
                    // 'logo'           => $upload_gambar['upload_data']['file_name'],


                );
                $this->konfigurasi_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data berhasil diupdate');
                redirect(base_url('admin/konfigurasi'), 'refresh');
            }
        }
        //end masuk database
        $data = array(
            'title'       => 'Konfigurasi Icon Website',
            'konfigurasi' => $konfigurasi,
            'isi'         => 'admin/konfigurasi/icon'
        );
        $this->load->view('admin/templates/wrapper', $data, FALSE);
    }
}

/* End of file Konfigurasi.php and path \application\controllers\admin\Konfigurasi.php */