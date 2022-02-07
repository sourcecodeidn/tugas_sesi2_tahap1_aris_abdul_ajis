<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dokter_model', 'dm');
	}

	public function index()
	{
		$data = array(
			'title'	=> 'Data Dokter | Poliklinik',
			'data'  => $this->dm->get_dokter(),
			'content' => 'dokter/v_content'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$valid = $this->form_validation;

		$valid->set_rules(
			'nama',
			'<i class="feather icon-info"></i> Nama dokter',
			'required',
			array(
				'required' => '%s harus di isi!'
			)
		);
		if ($valid->run()) {
			$i = $this->input;
			$data = array(
				'nama_dokter' => $i->post('nama'),
				'alamat_dokter' => $i->post('alamat'),
				'telp_dokter' => $i->post('telp'),
				'bidang_keahlian' => $i->post('bidang'),
				'aktif' => "Y"
			);
			$this->dm->add($data);
			$this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Dokter berhasil ditambahkan!');
			redirect(base_url('dokter'), 'refresh');
		}
		$data = array(
			'title' => 'Tambah Data Dokter | Poliklinik',
			'content' => 'dokter/v_add'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function edit($id_dokter)
	{
		$detail = $this->dm->detail($id_dokter);

		$valid = $this->form_validation;

		$valid->set_rules(
			'nama',
			'<i class="feather icon-info"></i> Nama dokter',
			'required',
			array(
				'required' => '%s harus di isi!'
			)
		);

		if ($valid->run()) {
			$i = $this->input;
			$data = array(
				'id_dokter' => $id_dokter,
				'nama_dokter' => $i->post('nama'),
				'alamat_dokter' => $i->post('alamat'),
				'telp_dokter' => $i->post('telp'),
				'bidang_keahlian' => $i->post('bidang'),
				'aktif' => $i->post('aktif')
			);
			$this->dm->edit($data);
			$this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Dokter berhasil diubah!');
			redirect(base_url('dokter'), 'refresh');
		}

		$data = array(
			'title' => 'Ubah Data Dokter | Poliklinik',
			'detail' => $detail,
			'content' => 'dokter/v_edit'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function delete($id_dokter)
	{
		$data = array(
			'id_dokter' => $id_dokter
		);
		$this->dm->delete($data);
		$this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Dokter berhasil dihapus!');
		redirect(base_url('dokter'), 'refresh');
	}

}

/* End of file Dokter.php */
/* Location: ./application/controllers/Dokter.php */