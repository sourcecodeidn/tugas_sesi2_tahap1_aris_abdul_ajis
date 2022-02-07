<?php defined('BASEPATH') or exit('No direct script access allowed');

class jenis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('jenis_model', 'jenis');
        $this->auth->ceklogin();
    }

    public function index()
    {
        $get_jenis = $this->jenis->get_jenis();
        $data = array(
            'title' => 'Data Jenis | Inventory',
            'data'  => $get_jenis,
            'content' => 'jenis/v_content'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_jenis',
            '<i class="feather icon-info"></i> Nama jenis obat',
            'required|is_unique[jenis.nama_jenis]',
            array(
                'required' => '%s harus di isi!',
                'is_unique' => '%s sudah terdaftar pada sistem!'
            )
        );
        if ($valid->run()) {
            $i = $this->input;
            $data = array(
                'nama_jenis' => $i->post('nama_jenis'),
                'id_user' => $this->session->userdata('id_user')
            );
            $this->jenis->add($data);
            $this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Jenis obat berhasil ditambahkan!');
            redirect(base_url('jenis'), 'refresh');
        }
        $data = array(
            'title' => 'Halaman Tambah Jenis Obat | Inventory',
            'content' => 'jenis/v_add'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function edit($id_jenis)
    {
        $detail = $this->jenis->detail($id_jenis);

        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_jenis',
            '<i class="feather icon-info"></i> Nama jenis obat',
            'required|is_unique[jenis.nama_jenis]',
            array(
                'required' => '%s harus di isi!',
                'is_unique' => '%s tidak boleh sama dengan yang udah ada!'
            )
        );

        if ($valid->run()) {
            $i = $this->input;
            $data = array(
                'id_jenis' => $id_jenis,
                'nama_jenis' => $i->post('nama_jenis'),
                'id_user' => $this->session->userdata('id_user')
            );
            $this->jenis->edit($data);
            $this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Jenis obat berhasil diubah!');
            redirect(base_url('jenis'), 'refresh');
        }

        $data = array(
            'title' => 'Halaman Tambah Jenis Obat | Inventory',
            'detail' => $detail,
            'content' => 'jenis/v_edit'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function delete($id_jenis)
    {
        $data = array(
            'id_jenis' => $id_jenis
        );
        $this->jenis->delete($data);
        $this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Jenis obat berhasil dihapus!');
        redirect(base_url('jenis'), 'refresh');
    }
}
