<?php defined('BASEPATH') or exit('No direct script access allowed');

class Public_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function detail_user($id_user)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->row();
    }

    public function totobatmasuk()
    {
        $this->db->select('*');
        $this->db->from('obat_masuk');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function totobatkeluar()
    {
        $this->db->select('*');
        $this->db->from('obat_keluar');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function totobat()
    {
        $this->db->select('*');
        $this->db->from('obat');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function totuser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_instansi($id=1)
    {
         $this->db->select('*');
        $this->db->from('pengaturan');
        $this->db->where('id_pengaturan', $id);
        $query = $this->db->get();
        return $query->row();
    }
}
