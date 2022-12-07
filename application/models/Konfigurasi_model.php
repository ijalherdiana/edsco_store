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
}


/* End of file Konfigurasi_model.php and path \application\models\Konfigurasi_model.php */