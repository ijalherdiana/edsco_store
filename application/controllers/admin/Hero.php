<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hero extends CI_Controller
{
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hero_model');
        //Proteksi Halaman
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $hero = $this->hero_model->listing();
        $data = array(
            'title' => 'Data Hero',
            'hero'  => $hero,
            'isi'   => 'admin/hero/list'
        );
        $this->load->view('admin/templates/wrapper', $data, FALSE);
    }
    //Tambah Hero
    public function tambah()
    {
        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            'judul',
            'Judul',
            'required',
            array('required' => '%s Harus diisi')
        );
        $valid->set_rules(
            'deskripsi',
            'Deskripsi',
            'required',
            array(
                'required'    => '%s Harus diisi',
            )
        );

        if ($valid->run()) {


            $config['upload_path']   = './assets/upload/image/thumbs/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = '2400';
            $config['max_width']     = '2024';
            $config['max_height']    = '2024';

            $this->load->library('upload', $config);

            //Jika terjadi error maka tampuilkan di $error pada array variabel $data
            if (!$this->upload->do_upload('gambar')) {

                //end validation

                $data = array(
                    'title' => 'Tambah Hero',
                    'error' => $this->upload->display_errors(),
                    'isi'   => 'admin/hero/tambah'
                );
                $this->load->view('admin/templates/wrapper', $data, FALSE);
            }
            //masuk database
            else {
                $upload_gambar = array('upload_data' => $this->upload->data());
                // create thumbnail gambar
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];
                //lokasi folder thumbnail
                $config['new_image']        = './assets/upload/image/thumbs/';
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 250;
                $config['height']           = 250;

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                // end create thumbnail

                $i = $this->input;
                $data = array(
                    'judul'        => $i->post('judul'),
                    'deskripsi'    => $i->post('deskripsi'),
                    'gambar'       => $upload_gambar['upload_data']['file_name'],
                    'status_hero'  => $i->post('status_hero'),
                );
                $this->hero_model->tambah($data);
                $this->session->set_flashdata('sukses', 'Data berhasil ditambah');
                redirect(base_url('admin/hero'), 'refresh');
            }
        }
        //end masuk database
        $data = array(
            'title' => 'Tambah Hero',
            'isi'   => 'admin/hero/tambah'
        );
        $this->load->view('admin/templates/wrapper', $data, FALSE);
    }

    //Edit Hero
    public function edit($id_hero)
    {
        // Ambil adata hero yang akan diedit
        $hero   = $this->hero_model->detail($id_hero);

        //validasi input
        $valid = $this->form_validation;
        $valid->set_rules(
            'judul',
            'Judul',
            'required',
            array('required' => '%s Harus diisi')
        );
        $valid->set_rules(
            'deskripsi',
            'Deskripsi',
            'required',
            array(
                'required'    => '%s Harus diisi',
            )
        );

        if ($valid->run()) {
            //Akan ada dua kondisi 1. Mengedit Hero tanpa edit Gambar, 2. Mengedit dengan ganti gambar
            //Check jika gambar diganti (Jika Gambar tidak kosong)
            if (!empty($_FILES['gambar']['name'])) {

                $config['upload_path']   = './assets/upload/image/thumbs/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '2400';
                $config['max_width']     = '2024';
                $config['max_height']    = '2024';

                $this->load->library('upload', $config);

                //Jika terjadi error maka tampuilkan di $error pada array variabel $data
                if (!$this->upload->do_upload('gambar')) {

                    //end validation

                    $data = array(
                        'title' => 'Edit Hero:' . $hero->judul,
                        'hero'  => $hero,
                        'error' => $this->upload->display_errors(),
                        'isi'   => 'admin/hero/edit'
                    );
                    $this->load->view('admin/templates/wrapper', $data, FALSE);
                }
                //masuk database
                else {
                    $upload_gambar = array('upload_data' => $this->upload->data());
                    // create thumbnail gambar
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];
                    //lokasi folder thumbnail
                    $config['new_image']        = './assets/upload/image/thumbs/';
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 250;
                    $config['height']           = 250;

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    // end create thumbnail

                    $i = $this->input;
                    $data = array(
                        'id_hero'      => $id_hero,
                        'judul'        => $i->post('judul'),
                        'deskripsi'    => $i->post('deskripsi'),
                        'gambar'       => $upload_gambar['upload_data']['file_name'],
                        'status_hero'  => $i->post('status_hero'),
                    );
                    $this->hero_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data berhasil diedit');
                    redirect(base_url('admin/hero'), 'refresh');
                }
            } else {
                // Edit Hero tanpa ganti gambar
                $i = $this->input;
                $data = array(
                    'id_hero'      => $id_hero,
                    'judul'        => $i->post('judul'),
                    'deskripsi'    => $i->post('deskripsi'),
                    'status_hero'  => $i->post('status_hero'),
                    // 'gambar'       => $upload_gambar['upload_data']['file_name'],
                );
                $this->hero_model->edit($data);
                $this->session->set_flashdata('sukses', 'Data berhasil diedit');
                redirect(base_url('admin/hero'), 'refresh');
            }
        }
        //end masuk database
        $data = array(
            'title' => 'Edit Hero' . $hero->judul,
            'hero'  => $hero,
            'isi'   => 'admin/hero/edit'
        );
        $this->load->view('admin/templates/wrapper', $data, FALSE);
    }

    public function delete($id_hero)
    {
        // Proses hapus gambar
        //panggil data hero 
        $hero   = $this->hero_model->detail($id_hero);
        // Sebelum menghapus data nya maka , yang pertama dihapus adalah gambarnya terlebih dahulu dengan perintah unlink
        unlink('./assets/upload/image/thumbs/' . $hero->gambar);
        // End Prosess hapus
        $data = array('id_hero' => $id_hero);
        $this->hero_model->delete($data);
        $this->session->set_flashdata('warning', 'Data berhasil Dihapus');
        redirect('admin/hero', 'refresh');
    }
}

/* End of file Hero.php and path \application\controllers\admin\Hero.php */