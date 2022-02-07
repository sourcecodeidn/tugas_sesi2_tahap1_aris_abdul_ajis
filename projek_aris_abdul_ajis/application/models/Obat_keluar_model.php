<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_keluar_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function get_obat_keluar()
	{
		$this->db->select('*');
		$this->db->from('obat_keluar');
		$this->db->order_by('id_obat_keluar', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function obat_keluar($id_obat_keluar)
	{
		$this->db->select('*');
		$this->db->from('obat_keluar');
		$this->db->where('id_obat_keluar', $id_obat_keluar);
		$query = $this->db->get();
		return $query->row();
	}

	public function detail_obat_keluar($id_obat_keluar)
	{
		$this->db->select('*');
		$this->db->from('obat_keluar_detail');
		$this->db->where('id_obat_keluar', $id_obat_keluar);
		$query = $this->db->get();
		return $query->result();
	}

}