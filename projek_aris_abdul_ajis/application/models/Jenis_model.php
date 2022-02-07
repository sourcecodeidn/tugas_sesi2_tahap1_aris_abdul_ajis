<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_jenis()
    {
        $this->db->select('*');
        $this->db->from('jenis');
        $this->db->order_by('id_jenis', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id_jenis)
    {
        $this->db->select('*');
        $this->db->from('jenis');
        $this->db->where('id_jenis', $id_jenis);
        $query = $this->db->get();
        return $query->row();
    }

    public function add($data)
    {
        $this->db->insert('jenis', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_jenis', $data['id_jenis']);
        $this->db->update('jenis', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_jenis', $data['id_jenis']);
        $this->db->delete('jenis', $data);
    }

}

/* End of file ModelName.php */

?>