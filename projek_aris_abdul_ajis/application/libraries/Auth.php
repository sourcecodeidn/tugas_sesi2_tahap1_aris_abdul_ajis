<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth
{
	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('user_model', 'model');
	}

	public function login($username,$enpass)
	{
		$cek = $this->CI->model->login($username,$enpass);
		if ($cek) 
		{
			$data = array(
				'id_user'    => $cek->id_user,
				'nama'    	 => $cek->nama,
				'username'   => $cek->username,
				'password'   => $cek->password,
				'email'    	 => $cek->email,
				'telepon'    => $cek->telepon,
				'level'      => $cek->level,
				'jk'      => $cek->jk,
				'foto'       => $cek->foto,
				'alamat'       => $cek->alamat,
				'level'     => $cek->level,
				'status'     => $cek->status,
				'login'      => true
			);
			$this->CI->session->set_userdata($data);
			redirect(base_url('dashboard'),'refresh');
		}
		else
		{
			$this->CI->session->set_flashdata('danger', '<i class="fa fa-info-circle"></i> Password anda salah!');
			redirect(base_url('login'),'refresh');
		}
	}

	public function ceklogin()
	{
		if (!$this->CI->session->userdata('login')) 
		{
			$this->CI->session->set_flashdata('danger', '<i class="fa fa-info-circle"></i> Anda belum login!');
			redirect(base_url('login'),'refresh');
		}
	}

	public function logout()
	{
		$data = array(
			'id_user',
			'nama',
			'username',
			'password',
			'email',
			'telepon',
			'level',
			'jk',
			'foto',
			'alamat',
			'level',
			'status',
			'login'
		);
		$this->CI->session->unset_userdata($data);
		$this->CI->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> Anda berhasil logout!');
		redirect(base_url('login'),'refresh');
	}
}
