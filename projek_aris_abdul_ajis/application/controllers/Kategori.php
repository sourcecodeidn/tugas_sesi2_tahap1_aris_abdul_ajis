<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model', 'kategori');
        $this->auth->ceklogin();
    }

    public function index()
    {
        $get_kategori = $this->kategori->get_kategori();
        $data = array(
            'title' => 'Data Kategori | Inventory',
            'data'  => $get_kategori,
            'content' => 'kategori/v_content'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_kategori',
            '<i class="feather icon-info"></i> Kategori',
            'required|is_unique[kategori.nama_kategori]',
            array(
                'requiured' => 'harus di isi!',
                'is_unique' => '%s sudah terdaftar pada sistem!'
            )
        );

        if ($valid->run()) 
        {
            $i = $this->input;
            $data = array(
                'nama_kategori' => $i->post('nama_kategori'),
                'id_user'       => $this->session->userdata('id_user')
            );
            $this->kategori->add($data);
            $this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Kategori obat berhasil ditambbahkan!');
            redirect(base_url('kategori'), 'refresh');
        }
        $data = array(
            'title' => 'Halaman Tambah Kategori Obat | Inventory',
            'content' => 'kategori/v_add'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function edit($id_kategori)
    {
        $detail = $this->kategori->detail($id_kategori);

        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_kategori',
            '<i class="feather icon-info"></i> Kategori ',
            'required|is_unique[kategori.nama_kategori]',
            array(
                'required' => '%s harus di isi!',
                'is_unique' => '%s tidak boleh sama dengan yang sudah ada!'
            )
        );

        if ($valid->run()) {
            $i = $this->input;
            $data = array(
                'id_kategori' => $id_kategori,
                'nama_kategori' => $i->post('nama_kategori'),
                'id_user'   => $this->session->userdata('id_user')
            );
            $this->kategori->edit($data);
            $this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Kategori obat berhasil diubah!');
            redirect(base_url('kategori'), 'refresh');
        }

        $data = array(
            'title' => 'Halaman Ubah Kategori Obat | Inventory',
            'detail'  => $detail,
            'content' => 'kategori/v_edit'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function delete($id_kategori)
    {
        $data = array(
            'id_kategori'   => $id_kategori
        );
        $this->kategori->delete($data);
        $this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Kategori obat berhasil dihapus!');
        redirect(base_url('kategori'), 'refresh');
    }
}
