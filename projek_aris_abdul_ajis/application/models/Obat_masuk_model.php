<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_masuk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_obat_masuk()
	{
		$this->db->select('*');
		$this->db->from('obat_masuk');
		$this->db->order_by('id_obat_masuk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function obat_masuk($id_obat_masuk)
	{
		$this->db->select('*');
		$this->db->from('obat_masuk');
		$this->db->where('id_obat_masuk', $id_obat_masuk);
		$query = $this->db->get();
		return $query->row();
	}

	public function detail_obat_masuk($id_obat_masuk)
	{
		$this->db->select('*');
		$this->db->from('obat_masuk_detail');
		$this->db->where('id_obat_masuk', $id_obat_masuk);
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_obat)
	{
		$this->db->select('*');
		$this->db->from('obat o');
		$this->db->join('kategori k', 'k.id_kategori = o.id_kategori', 'left');
		$this->db->join('satuan s', 's.id_satuan = s.id_satuan', 'left');
		$this->db->join('jenis j', 'j.id_jenis = j.id_jenis', 'left');
		$this->db->where('o.id_obat', $id_obat);
		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file Obat_masuk_model.php */
/* Location: ./application/models/Obat_masuk_model.php */