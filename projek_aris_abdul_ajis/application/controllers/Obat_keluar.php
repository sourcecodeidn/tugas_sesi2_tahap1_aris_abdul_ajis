<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_keluar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('obat_model', 'obat');
		$this->load->model('obat_keluar_model', 'obat_keluar');
		$this->load->helper('campur');
		$this->load->helper('string');
	}

	public function index()
	{
		$get_obat_keluar = $this->obat_keluar->get_obat_keluar();
		$data = array(
			'title' => "Obat keluar | Inventory",
			'data'	=> $get_obat_keluar,
			'content'	=> 'obat_keluar/v_content'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function detail($id_obat_keluar)
	{
		$obat_keluar = $this->obat_keluar->obat_keluar($id_obat_keluar);
		$detail_obat_keluar = $this->obat_keluar->detail_obat_keluar($id_obat_keluar);
		$data = array(
			'title' => "Detail Obat Keluar | Inventory",
			'obat_keluar'	=> $obat_keluar,
			'detail_obat_keluar'	=> $detail_obat_keluar,
			'content'	=> 'obat_keluar/v_detail'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function nota($id_obat_keluar)
	{
		$obat_keluar = $this->obat_keluar->obat_keluar($id_obat_keluar);
		$detail_obat_keluar = $this->obat_keluar->detail_obat_keluar($id_obat_keluar);
		$data = array(
			'title' => "Nota Obat Keluar | Inventory",
			'obat_keluar'	=> $obat_keluar,
			'detail_obat_keluar'	=> $detail_obat_keluar,
		);
		$this->load->view('obat_keluar/v_nota', $data, FALSE);
	}


	public function transaksi()
	{
		$data_obat = $this->obat->get_obat();
		$data = array(
			'title' => "Transaksi Obat keluar | Inventory",
			'obat'	=> $data_obat,
			'content'	=> 'obat_keluar/v_transaksi'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function masukankeranjang()
	{
		$obat = $this->obat->detail($this->input->post('id_obat'));

		$get_stok      = $this->obat->get_stok($this->input->post('id_obat'));

		$stok_all = $get_stok->totals;

		if ($this->input->post('jumlah') > $stok_all) 
		{
			$this->session->set_flashdata('danger', '<i class="feather icon-info"></i> Transaksi gagal ditambahkan, stok tidak tersedia!');
			redirect(base_url('obat_keluar/transaksi'));
		}
		else
		{
			if ($obat->harga_jual==0 || $obat->harga_jual <= $obat->harga_beli) 
			{
				$this->session->set_flashdata('danger', '<i class="feather icon-info"></i> Transaksi gagal ditambahkan, harga jual 0 atau kurang dari harga beli. Silahkan update harga jual pada data obat!');
				redirect(base_url('obat_keluar/transaksi'));
			}
			else
			{
				$data = array(
					'id'      => $obat->id_obat,
					'qty'     => $this->input->post('jumlah'),
					'price'   => $obat->harga_jual,
					'name'    => $obat->nama_obat,
					'kategori' => $obat->nama_kategori,
					'jenis' => $obat->nama_jenis,
					'satuan' => $obat->nama_satuan,
				);
				$this->cart->insert($data);
				$this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Transaksi berhasil ditambahkan!');
				redirect(base_url('obat_keluar/transaksi'));
			}
		}

		if($qty <= $stok_all) {

      // Lakukan Perulangan pd setiap List Stok Barang
      // hasil ($result): 

      // nama     tgl          stok       step
      //----------------------------
      // beras    2018-02-01    30         1 (++)
      // beras    2018-02-03    50         2 
      // beras    2018-02-03    40         3 

			while($row = mysqli_fetch_assoc($result)) {

				$tgl  = $row['tgl'];
				$stok = $row['stok'];

          // Selama Qty > 0 (belum habis) artinya => stok pd setiap list akan terus dieksekusi (dikurangi) 
          // logika nya gini :

          // --------loop 1--------
          // qty beli = 50 .... stok (1 feb) = 30 maka 
          // qty - stok => 50 - 30 = 20 (masih kurang maka ambil di stok tgl berikutnya ...)
          // artinya ekseskui lanjut ...

          // --------loop 2--------
          // qty beli = 20 .... stok (3 feb) = 50 maka
          // qty - stok => 20 - 50 = -30 (hasil -minus) artinya $qty > 0 == false ... (tidak terpenuhi)
          // maka pengurangan stok (update data) akan dijalankan sampai disini

				if($qty > 0) { 

              // buat var $temp sbg. pengurang
					$temp = $qty;

              //proses pengurangan
					$qty = $qty - $stok;

              // jika hasil pengurangan > 0 berarti stok pd list pertama kurang  .. jadi update stok jd 0.. 
              // contoh : qty = 50 , stok = 30 .....maka 50 - 30 = 20.. (20 > 0 =>true)
              // dan juga sebaliknya jika stok berikutnya cukup yawess.. $stok - $temp;

					if($qty > 0) {      
						$stok_update = 0;
					}else{
						$stok_update = $stok - $temp;
					}

					$sql = "UPDATE barang SET stok = $stok_update WHERE nama = '$barang' AND tgl = '$tgl'";
					echo "<br>$sql<br><br>";
					mysqli_query($conn, $sql);
				}
			}
		}else{

			echo "Stok Barang Tidak Cukup, Stok = $stok_all <br><br>";
		}   
		
	}

	public function hapuskeranjang()
	{
		$data = array(
			'rowid'   => $this->input->get('rowid'),
			'qty'     => $this->input->get('qty'),
		);
		$this->cart->update($data);
		$this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Data obat berhasil dihapus!');
		redirect(base_url('obat_keluar/transaksi'));
	}

	public function batal()
	{
		$this->cart->destroy();
		redirect(base_url('obat_keluar'));
	}

	public function checkout()
	{
		if (empty($this->cart->contents())) 
		{
			$this->session->set_flashdata('danger', '<i class="feather icon-info"></i> Transaksi gagal disimpan, transaksi tidak boleh kosong!');
			redirect(base_url('obat_keluar/transaksi'));
		}
		else
		{
			$kode = $this->input->post('kode');
			$tgl_keluar = $this->input->post('tgl_keluar');
			$total = $this->input->post('total');

			$obat_keluar = array(
				'kode_obat_keluar'	=> $kode,
				'total'	=> $total,
				'tanggal_keluar'	=> $tgl_keluar,
				'id_user'	=> $this->session->userdata('id_user')
			);

			$this->db->insert('obat_keluar',$obat_keluar);
			$id_obat =  $this->db->insert_id();

			foreach ($this->cart->contents() as $items):
				$detail['id_obat_keluar'] 	= $id_obat;
				$detail['nama_obat'] 	= $items['name'];
				$detail['kategori_obat'] 	= $items['kategori'];
				$detail['jenis_obat'] 	= $items['jenis'];
				$detail['satuan_obat'] 	= $items['satuan'];
				$detail['jumlah'] 	= $items['qty'];
				$detail['harga_jual'] 	= $items['price'];
				$detail['subtotal'] 	= $items['subtotal'];
				$this->db->insert('obat_keluar_detail',$detail);
				$obat = $this->obat->get_stok_r($items['id']);
				$qty = $items['qty'];
				foreach ($obat as $key => $value) 
				{
					$tgl = $value->tanggal_expired;
					$stok = $value->stok;

					
					if($qty > 0) { 

              // buat var $temp sbg. pengurang
						$temp = $qty;

              //proses pengurangan
						$qty = $qty - $stok;

              // jika hasil pengurangan > 0 berarti stok pd list pertama kurang  .. jadi update stok jd 0.. 
              // contoh : qty = 50 , stok = 30 .....maka 50 - 30 = 20.. (20 > 0 =>true)
              // dan juga sebaliknya jika stok berikutnya cukup yawess.. $stok - $temp;

						if($qty > 0) {      
							$stok_update = 0;
						}else{
							$stok_update = $stok - $temp;
						}

						$this->obat->update_stok($items['id'],$stok_update,$tgl);
					}
					
					
				}
			endforeach;
			$this->cart->destroy();
			$this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Transaksi berhasil disimpan!');
			redirect(base_url('obat_keluar'));
		}
	}
}
