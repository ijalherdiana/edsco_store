<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hero_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    //listing all hero
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('hero');
        $this->db->order_by('id_hero', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    public function home()
    {
        $this->db->select('*');
        $this->db->from('hero');
        $this->db->order_by('id_hero', 'desc');
        $this->db->where('hero.status_hero', 'publish'); //Tampilkan hanya yang status hero nya "Publikasikan"
        $query = $this->db->get();
        return $query->result();
    }

    //Detail hero
    public function detail($id_hero)
    {
        $this->db->select('*');
        $this->db->from('hero');
        $this->db->where('id_hero', $id_hero);
        $this->db->order_by('id_hero', 'desc');
        $query = $this->db->get();
        return $query->row();
    }


    //tambah
    public function tambah($data)
    {
        $this->db->insert('hero', $data);
    }

    //Edit
    public function edit($data)
    {
        $this->db->where('id_hero', $data['id_hero']);
        $this->db->update('hero', $data);
    }

    //Delete
    public function delete($data)
    {
        $this->db->where('id_hero', $data['id_hero']);
        $this->db->delete('hero', $data);
    }
}


/* End of file Hero_model.php and path \application\models\Hero_model.php */