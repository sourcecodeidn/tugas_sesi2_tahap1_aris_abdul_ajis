<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_pengaturan($id=1)
    {
        $this->db->select('*');
        $this->db->from('pengaturan');
        $this->db->where('id_pengaturan', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function edit($data)
    {
        $this->db->where('id_pengaturan', $data['id_pengaturan']);
        $this->db->update('pengaturan', $data);
    }
}
