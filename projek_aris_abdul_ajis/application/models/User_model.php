<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function cek($username,$password)
  {
    $username = $this->db->escape_str($username);
    $password = $this->db->escape_str($enpass);
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where(array(
     'username' => $username,
     'password' => $password
   ));
    $query = $this->db->get();
    return $query->row();
  }

  public function get_user()
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->order_by('id_user', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function get_username($username)
  {
    $this->db->select('username');
    $this->db->from('user');
    $this->db->where('username', $username);
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function detail_username($username)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username', $username);
    $query = $this->db->get();
    return $query->row();
  }

  public function detail($id_user)
  {
   $this->db->select('*');
   $this->db->from('user');
   $this->db->where('id_user', $id_user);
   $query = $this->db->get();
   return $query->row();
 }

 public function add($data)
 {
  $this->db->insert('user', $data);
}

public function edit($data)
{
  $this->db->where('id_user', $data['id_user']);
  $this->db->update('user', $data);
}

public function delete($data)
{
  $this->db->where('id_user', $data['id_user']);
  $this->db->delete('user', $data);
}

public function login($username,$enpass)
{
  $username = $this->db->escape_str($username);
  $password = $this->db->escape_str($enpass);
  $this->db->select('*');
  $this->db->from('user');
  $this->db->where(array(
   'username' => $username,
   'password' => $password,
   'status'   => '1'
 ));
  $query = $this->db->get();
  return $query->row();
}

public function ubahpassword($data)
{
  $this->db->where('id_user', $data['id_user']);
  $this->db->update('user', $data);
}
}
