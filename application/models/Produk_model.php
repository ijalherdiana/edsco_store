<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    //listing all produk
    public function listing()
    {
        $this->db->select(
            'produk.*,
        users.nama,
        kategori.nama_kategori,
        kategori.slug_kategori,
        COUNT(gambar.id_gambar) AS total_gambar'

        );
        $this->db->from('produk');
        //JOIN
        $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
        //END JOIN
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //listing all produk Home 
    public function home()
    {
        $this->db->select(
            'produk.*,
        users.nama,
        kategori.nama_kategori,
        kategori.slug_kategori,
        COUNT(gambar.id_gambar) AS total_gambar'

        );
        $this->db->from('produk');
        //JOIN
        $this->db->join('users', 'users.id_user = produk.id_user', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
        //END JOIN
        $this->db->where('produk.status_produk', 'publish'); //Tampilkan hanya yang status produk nya "Publikasikan"
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit(12); // Batasi maksimal 12 Produk
        $query = $this->db->get();
        return $query->result();
    }

    //Detail produk
    public function detail($id_produk)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Detail Gambar produk
    public function detail_gambar($id_gambar)
    {
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where('id_gambar', $id_gambar);
        $this->db->order_by('id_gambar', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Gambar
    public function gambar($id_produk)
    {
        $this->db->select('*');
        $this->db->from('gambar');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_gambar', 'desc');
        $query = $this->db->get();
        return $query->result();
    }



    //tambah
    public function tambah($data)
    {
        $this->db->insert('produk', $data);
    }

    //tambah gambar
    public function tambah_gambar($data)
    {
        $this->db->insert('gambar', $data);
    }

    //Edit
    public function edit($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->update('produk', $data);
    }

    //Delete
    public function delete($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->delete('produk', $data);
    }
    //Delete Gambar
    public function delete_gambar($data)
    {
        $this->db->where('id_gambar', $data['id_gambar']);
        $this->db->delete('gambar', $data);
    }
}


/* End of file Produk_model.php and path \application\models\Produk_model.php */