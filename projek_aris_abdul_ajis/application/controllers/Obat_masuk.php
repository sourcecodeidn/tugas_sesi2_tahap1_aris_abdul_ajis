<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat_masuk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('obat_model', 'obat');
		$this->load->model('obat_masuk_model', 'obat_masuk');
		$this->load->model('supplier_model', 'supplier');
		$this->load->helper('string');
		$this->load->helper('campur');
	}


	public function index()
	{
		$get_obat_masuk = $this->obat_masuk->get_obat_masuk();
		$data = array(
			'title' => "Obat Masuk | Inventory",
			'data'	=> $get_obat_masuk,
			'content'	=> 'obat_masuk/v_content'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function detail($id_obat_masuk)
	{
		$obat_masuk = $this->obat_masuk->obat_masuk($id_obat_masuk);
		$detail_obat_masuk = $this->obat_masuk->detail_obat_masuk($id_obat_masuk);
		$data = array(
			'title' => "Detail Obat Masuk | Inventory",
			'obat_masuk'	=> $obat_masuk,
			'detail_obat_masuk'	=> $detail_obat_masuk,
			'content'	=> 'obat_masuk/v_detail'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function nota($id_obat_masuk)
	{
		$obat_masuk = $this->obat_masuk->obat_masuk($id_obat_masuk);
		$detail_obat_masuk = $this->obat_masuk->detail_obat_masuk($id_obat_masuk);
		$data = array(
			'title' => "Nota Obat Masuk | Inventory",
			'obat_masuk'	=> $obat_masuk,
			'detail_obat_masuk'	=> $detail_obat_masuk,
		);
		$this->load->view('obat_masuk/v_nota', $data, FALSE);
	}

	public function transaksi()
	{
		$data_obat = $this->obat->get_obat();
		$get_supplier = $this->supplier->get_supplier();
		$data = array(
			'title' => "Transaksi Obat Masuk | Inventory",
			'obat'	=> $data_obat,
			'supplier'	=> $get_supplier,
			'content'	=> 'obat_masuk/v_transaksi'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function masukankeranjang()
	{
		$obat = $this->obat->detail($this->input->post('id_obat'));

		$data = array(
			'id'      => $obat->id_obat,
			'qty'     => $this->input->post('jumlah'),
			'price'   => $this->input->post('harga_beli'),
			'name'    => $obat->nama_obat,
			'kategori' => $obat->nama_kategori,
			'jenis' => $obat->nama_jenis,
			'satuan' => $obat->nama_satuan,
			'expired'   =>  $this->input->post('expired'),
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Data obat berhasil ditambahkan!');
		redirect(base_url('obat_masuk/transaksi'));
	}

	public function hapuskeranjang()
	{
		$data = array(
			'rowid'   => $this->input->get('rowid'),
			'qty'     => $this->input->get('qty'),
		);
		$this->cart->update($data);
		$this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Data obat berhasil dihapus!');
		redirect(base_url('obat_masuk/transaksi'));
	}

	public function batal()
	{
		$this->cart->destroy();
		redirect(base_url('obat_masuk'));
	}

	public function checkout()
	{
		if (empty($this->cart->contents())) 
		{
			$this->session->set_flashdata('danger', '<i class="feather icon-info"></i> Transaksi gagal disimpan, transaksi tidak boleh kosong!');
			redirect(base_url('obat_masuk/transaksi'));
		}
		else
		{
			$kode = $this->input->post('kode');
			$nama_supplier = $this->input->post('nama_supplier');
			$tgl_masuk = $this->input->post('tgl_masuk');
			$total = $this->input->post('total');

			$obat_masuk = array(
				'nama_supplier'	=> $nama_supplier,
				'kode_obat_masuk'	=> $kode,
				'total'	=> $total,
				'tanggal_masuk'	=> $tgl_masuk,
				'id_user'	=> $this->session->userdata('id_user')
			);

			$this->db->insert('obat_masuk',$obat_masuk);
			$id_obat =  $this->db->insert_id();

			foreach ($this->cart->contents() as $items):
				$detail['id_obat_masuk'] 	= $id_obat;
				$detail['nama_obat'] 	= $items['name'];
				$detail['kategori_obat'] 	= $items['kategori'];
				$detail['jenis_obat'] 	= $items['jenis'];
				$detail['satuan_obat'] 	= $items['satuan'];
				$detail['jumlah'] 	= $items['qty'];
				$detail['harga_beli'] 	= $items['price'];
				$detail['subtotal']		= $items['subtotal'];
				$this->db->insert('obat_masuk_detail',$detail);
				$obat = $this->db->where('id_obat',$items['id'])->get('obat')->row();
				$harga_baru['harga_beli'] = $items['price'];
				$this->db->where('id_obat',$obat->id_obat)->update('obat',$harga_baru);
				$data = array(
					'id_obat'	=> $items['id'],
					'tanggal_expired'	=> $items['expired'],
					'stok'				=> $items['qty'],
				);
				$this->db->insert('stok', $data);
			endforeach;
			$this->cart->destroy();
			$this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Transaksi berhasil disimpan!');
			redirect(base_url('obat_masuk'));
		}

	}
}
