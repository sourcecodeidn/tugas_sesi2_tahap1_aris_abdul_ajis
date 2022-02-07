<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function get_dokter()
    {
        $this->db->select('*');
        $this->db->from('dokter');
        $this->db->order_by('id_dokter', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id_dokter)
    {
        $this->db->select('*');
        $this->db->from('dokter');
        $this->db->where('id_dokter', $id_dokter);
        $query = $this->db->get();
        return $query->row();
    }

    public function add($data)
    {
        $this->db->insert('dokter', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_dokter', $data['id_dokter']);
        $this->db->update('dokter', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_dokter', $data['id_dokter']);
        $this->db->delete('dokter', $data);
    }

}

/* End of file Dokter_model.php */
/* Location: ./application/models/Dokter_model.php */