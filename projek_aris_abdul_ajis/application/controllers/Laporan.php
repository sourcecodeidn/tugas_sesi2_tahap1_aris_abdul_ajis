<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->auth->ceklogin();
    $this->load->model('obat_model','obat');
    $this->load->model('laporan_model','laporan');
    $this->load->helper('campur');

  }

  public function index()
  { 
   $data = array(
     'title'      => 'Laporan | Inventory',
     'content'    => 'laporan/v_content' 
   );
   $this->load->view('layout/v_wrapper', $data, FALSE);

 }

 public function obm_perbulan()
 {
  $bulan = $this->input->get('bulan');
  $tahun = $this->input->get('tahun');
  $obm_perbulan = $this->laporan->obm_perbulan($bulan,$tahun);
  $data = array(
    'title' => 'Laporan Obat Masuk Perbulan | Inventory',
    'data'  => $obm_perbulan
  );
  $this->load->view('laporan/v_obm_perbulan', $data, FALSE);
}

public function obm_pertahun()
{
  $tahun = $this->input->get('tahun');
  $obm_pertahun = $this->laporan->obm_pertahun($tahun);
  $data = array(
    'title' => 'Laporan Obat Masuk Pertahun | Inventory',
    'data'  => $obm_pertahun
  );
  $this->load->view('laporan/v_obm_pertahun', $data, FALSE);
}

public function obk_perbulan()
{
  $bulan = $this->input->get('bulan');
  $tahun = $this->input->get('tahun');
  $obk_perbulan = $this->laporan->obk_perbulan($bulan,$tahun);
  $data = array(
    'title' => 'Laporan Obat Keluar Perbulan | Inventory',
    'data'  => $obk_perbulan
  );
  $this->load->view('laporan/v_obk_perbulan', $data, FALSE);
}

public function obk_pertahun()
{
  $tahun = $this->input->get('tahun');
  $obk_pertahun = $this->laporan->obk_pertahun($tahun);
  $data = array(
    'title' => 'Laporan Obat Keluar Pertahun | Inventory',
    'data'  => $obk_pertahun
  );
  $this->load->view('laporan/v_obk_pertahun', $data, FALSE);
}

public function semuadataobat()
{
  $get_obat = $this->obat->get_obat();
  $data = array(
    'title' => 'Laporan Semua Data Obat | Inventory',
    'data'  => $get_obat
  );
  $this->load->view('laporan/v_semua_data_obat', $data, FALSE);

}
}
?>