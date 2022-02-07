<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function obm_perbulan($bulan,$tahun)
	{
		$this->db->select('*');
		$this->db->from('obat_masuk om');
		$this->db->join('obat_masuk_detail omd', 'omd.id_obat_masuk = om.id_obat_masuk', 'left');
		$where = "month(tanggal_masuk)='$bulan' AND year(tanggal_masuk)='$tahun'";
		$this->db->where($where);
		$this->db->order_by('om.id_obat_masuk', 'desc');
		$query = $this->db->get();
		return $query->result();	
	}

	public function obm_pertahun($tahun)
	{
		$this->db->select('*');
		$this->db->from('obat_masuk om');
		$this->db->join('obat_masuk_detail omd', 'omd.id_obat_masuk = om.id_obat_masuk', 'left');
		$where = "year(tanggal_masuk)='$tahun'";
		$this->db->where($where);
		$this->db->order_by('om.id_obat_masuk', 'desc');
		$query = $this->db->get();
		return $query->result();	
	}

	public function obk_perbulan($bulan,$tahun)
	{
		$this->db->select('*');
		$this->db->from('obat_keluar ok');
		$this->db->join('obat_keluar_detail okd', 'okd.id_obat_keluar = ok.id_obat_keluar', 'left');
		$where = "month(tanggal_keluar)='$bulan' AND year(tanggal_keluar)='$tahun'";
		$this->db->where($where);
		$this->db->order_by('ok.id_obat_keluar', 'desc');
		$query = $this->db->get();
		return $query->result();	
	}

	public function obk_pertahun($tahun)
	{
		$this->db->select('*');
		$this->db->from('obat_keluar ok');
		$this->db->join('obat_keluar_detail okd', 'okd.id_obat_keluar = ok.id_obat_keluar', 'left');
		$where = "year(tanggal_keluar)='$tahun'";
		$this->db->where($where);
		$this->db->order_by('ok.id_obat_keluar', 'desc');
		$query = $this->db->get();
		return $query->result();	
	}

}