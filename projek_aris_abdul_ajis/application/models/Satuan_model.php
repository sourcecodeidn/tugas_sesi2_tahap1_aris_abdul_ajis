<?php defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_satuan()
    {
        $this->db->select('*');
        $this->db->from('satuan');
        $this->db->order_by('id_satuan', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id_satuan)
    {
        $this->db->select('*');
        $this->db->from('satuan');
        $this->db->where('id_satuan', $id_satuan);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function add($data)
    {
        $this->db->insert('satuan', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_satuan', $data['id_satuan']);
        $this->db->update('satuan', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_satuan', $data['id_satuan']);
        $this->db->delete('satuan', $data);
    }

}
