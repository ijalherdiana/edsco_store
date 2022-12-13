<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    // Total Produk
    public function total_produk()
    {

        $this->db->select('COUNT(*) AS total');
        $this->db->from('produk');
        $query = $this->db->get();
        return $query->row();
    }
    // Total Customer
    public function total_pelanggan()
    {

        $this->db->select('COUNT(*) AS total');
        $this->db->from('pelanggan');
        $query = $this->db->get();
        return $query->row();
    }
    // Total Header Transaksi
    public function total_header_transaksi()
    {

        $this->db->select('COUNT(*) AS total'); // Hitung seluruh isi dari table header transaksi
        $this->db->from('header_transaksi'); // Diambil dari table database
        $query = $this->db->get();
        return $query->row();
    }
    // Total Transaksi
    public function total_transaksi() //
    {

        $this->db->select('SUM(transaksi.total_harga) AS total');
        $this->db->from('transaksi'); // Diambil dari table database
        // $this->db->join('header_transaksi', 'header_transaksi.kode_transaksi = transaksi.kode_transaksi');
        // $this->db->group_by('title');
        $query = $this->db->get();
        return $query->row();
    }
    // Total Header Transaksi
    public function total_berita()
    {

        $this->db->select('COUNT(*) AS total'); // Hitung seluruh isi dari table header transaksi
        $this->db->from('berita'); // Diambil dari table database
        $query = $this->db->get();
        return $query->row();
    }
    // Total Header Transaksi
    public function total_rekening()
    {

        $this->db->select('COUNT(*) AS total'); // Hitung seluruh isi dari table header transaksi
        $this->db->from('rekening'); // Diambil dari table database
        $query = $this->db->get();
        return $query->row();
    }
}


/* End of file Dashboard_model.php and path \application\models\Dashboard_model.php */