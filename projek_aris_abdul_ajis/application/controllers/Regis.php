<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pasien_model', 'pm');
	}

	public function index()
	{
		$data = array(
			'title' => 'Data Registrasi | Poliklinik',
			'data'  => $this->pm->get_pasien(),
			'content' => 'pasien/v_content'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

}

/* End of file Regis.php */
/* Location: ./application/controllers/Regis.php */