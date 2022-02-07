<?php defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_supplier()
    {
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->order_by('id_supplier', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id_supplier)
    {
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->where('id_supplier', $id_supplier);
        $query = $this->db->get();
        return $query->row();
    }

    public function add($data)
    {
        $this->db->insert('supplier', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_supplier', $data['id_supplier']);
        $this->db->update('supplier', $data); 
    }

    public function delete($data)
    {
        $this->db->where('id_supplier', $data['id_supplier']);
        $this->db->delete('supplier', $data); 
    }
}
