<?php defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('obat_model', 'obat');
        $this->load->model('kategori_model', 'kategori');
        $this->load->model('jenis_model', 'jenis');
        $this->load->model('satuan_model', 'satuan');
        $this->auth->ceklogin();
        $this->load->helper('string');
    }

    public function index()
    {
        $get_obat = $this->obat->get_obat();
        $kategori = $this->kategori->get_kategori();
        $jenis = $this->jenis->get_jenis();
        $satuan = $this->satuan->get_satuan();

        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_obat',
            '<i class="feather icon-info"></i> Nama obat',
            'required|is_unique[obat.nama_obat]',
            array(
                'required' => '%s harus di isi!',
                'is_unique' => '%s sudah terdaftar pada sistem!'
            )
        );

        if ($valid->run()) {
            $i = $this->input;
            $data = array(
                'id_jenis'     => $i->post('jenis'),
                'id_kategori'  => $i->post('kategori'),
                'id_satuan'    => $i->post('satuan'),
                'kode_obat'    => $i->post('kode'),
                'nama_obat'    => $i->post('nama_obat'),
                'brand'        => $i->post('brand'),
                'indikasi'     => $i->post('indikasi'),
                'dosis'        => $i->post('dosis'),
                'kemasan'      => $i->post('kemasan'),
                'letak_obat'      => $i->post('letak_obat'),
                'id_user'     => $this->session->userdata('id_user')
            );
            $this->obat->add($data);
            $this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Data obat berhasil ditambahkan');
            redirect(base_url('obat'), 'refresh');
        }

        $data = array(
            'title' => 'Data Obat | Inventory',
            'data'  => $get_obat,
            'kategori' => $kategori,
            'jenis'    => $jenis,
            'satuan' => $satuan,
            'content' => 'obat/v_content'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    // public function add()
    // {

    //     $data = array(
    //         'title' => 'Halaman Tambah Data Obat | Inventory',

    //         'content' => 'obat/v_add'
    //     );
    //     $this->load->view('layout/v_wrapper', $data, FALSE);
    // }

    public function edit($id_obat)
    {
        $detail = $this->obat->detail($id_obat);
        $kategori = $this->kategori->get_kategori();
        $jenis = $this->jenis->get_jenis();
        $satuan = $this->satuan->get_satuan();

        $valid = $this->form_validation;

        $this->form_validation->set_rules(
            'nama_obat',
            '<i class="feather icon-info"></i>',
            'required',
            array(
                'required' => '%s harus di isi!'
            )
        );

        if ($valid->run()) {
            $i = $this->input;
            $data = array(
                'id_obat'     => $id_obat,
                'nama_obat'   => $i->post('nama_obat'),
                'id_kategori' => $i->post('id_kategori'),
                'id_jenis'    => $i->post('id_jenis'),
                'id_satuan'   => $i->post('id_satuan'),
                'harga_beli'  => $i->post('harga_beli'),
                'harga_jual'  => $i->post('harga_jual'),
                'brand'       => $i->post('brand'),
                'indikasi'    => $i->post('indikasi'),
                'dosis'       => $i->post('dosis'),
                'kemasan'     => $i->post('kemasan'),
                'letak_obat'     => $i->post('letak_obat'),
                'id_user'     => $this->session->userdata('id_user')
            );
            $this->obat->edit($data);
            $this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Data obat berhasil diubah');
            redirect(base_url('obat'), 'refresh');
        }

        $data = array(
            'title' => 'Halaman Ubah Data Obat | Inventory',
            'detail'  => $detail,
            'kategori' => $kategori,
            'jenis'    => $jenis,
            'satuan' => $satuan,
            'content' => 'obat/v_edit'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function delete($id_obat)
    {
        $data = array(
            'id_obat' => $id_obat
        );
        $this->obat->delete($data);
        $this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Data obat berhasil dihapus');
        redirect(base_url('obat'), 'refresh');
    }

    public function detail($id_obat)
    {
      $stok = $this->db->where('id_obat',$id_obat)->get('stok')->result();
      $data = array(
        'title' => 'Data Obat | Inventory',
        'detail'    => $this->obat->detail($id_obat),
        'stok'      => $stok,
        'content' => 'obat/v_detail'
    );
      $this->load->view('layout/v_wrapper', $data, FALSE);
  }
}
