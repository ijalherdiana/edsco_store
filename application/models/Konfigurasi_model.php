<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    // Listing
    public function listing()
    {
        $query  = $this->db->get('konfigurasi');
        return $query->row();
    }

    //Edit
    public function edit($data)
    {
        $this->db->where('id_konfigurasi', $data['id_konfigurasi']);
        $this->db->update('konfigurasi', $data);
    }
    // Load menu kategori Produk
    public function nav_produk()
    {
        $this->db->select('produk.*,kategori.nama_kategori,
                        kategori.slug_kategori,');
        $this->db->from('produk');

        //JOIN
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        //END JOIN
        $this->db->group_by('produk.id_kategori');
        //Urutkan sesuai urutan Kategori Produk
        $this->db->order_by('kategori.urutan', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}


/* End of file Konfigurasi_model.php and path \application\models\Konfigurasi_model.php */