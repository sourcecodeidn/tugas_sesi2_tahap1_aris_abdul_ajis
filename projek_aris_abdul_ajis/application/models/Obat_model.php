<?php defined('BASEPATH') or exit('No direct script access allowed');

class Obat_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_obat()
    {
        $this->db->select('o.*, k.nama_kategori, s.nama_satuan, j.nama_jenis');
        $this->db->from('obat o');
        $this->db->join('kategori k', 'k.id_kategori = o.id_kategori', 'left');
        $this->db->join('satuan s', 's.id_satuan = o.id_satuan', 'left');
        $this->db->join('jenis j', 'j.id_jenis = o.id_jenis', 'left');
        $this->db->order_by('o.id_obat', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id_obat)
    {
        $this->db->select('o.*, k.nama_kategori, k.id_kategori, s.nama_satuan, s.id_satuan, j.nama_jenis, j.id_jenis');
        $this->db->from('obat o');
        $this->db->join('kategori k', 'k.id_kategori = o.id_kategori', 'left');
        $this->db->join('satuan s', 's.id_satuan = o.id_satuan', 'left');
        $this->db->join('jenis j', 'j.id_jenis = o.id_jenis', 'left');
        $this->db->where('o.id_obat', $id_obat);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_stok($id_obat)
    {
        $this->db->select('SUM(s.stok) AS totals');
        $this->db->from('stok s');
        $this->db->where('id_obat', $id_obat);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_stok_r($id_obat)
    {
        $this->db->select('*');
        $this->db->from('stok');
        $this->db->where('id_obat', $id_obat);
        $this->db->order_by('tanggal_expired', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_stok($id_obat,$stok_update,$tgl)
    {
        $data = array(
            'stok'  => $stok_update
        );
        $this->db->where('id_obat', $id_obat);
        $this->db->where('tanggal_expired', $tgl);
        $this->db->update('stok', $data);
    }
    public function add($data)
    {
        $this->db->insert('obat', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_obat', $data['id_obat']);
        $this->db->update('obat', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_obat', $data['id_obat']);
        $this->db->delete('obat', $data);
    }
}
