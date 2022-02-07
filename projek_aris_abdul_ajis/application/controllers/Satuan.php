<?php defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('satuan_model', 'satuan');
        $this->auth->ceklogin();
    }

    public function index()
    {
        $get_satuan = $this->satuan->get_satuan();
        $data = array(
            'title' => 'Data Satuan | Inventory',
            'data'  => $get_satuan,
            'content' => 'satuan/v_content'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_satuan',
            '<i class="feather icon-info"></i> Nama satuan obat',
            'required|is_unique[satuan.nama_satuan]',
            array(
                'required' => '%s harus di isi!',
                'is_unique' => '%s sudah terdaftar pada sistem!'
            )
        );

        if($valid->run())
        {
            $i = $this->input;
            $data = array(
                'nama_satuan' => $i->post('nama_satuan'),
                'id_user' => $this->session->userdata('id_user')
            );
            $this->satuan->add($data);
            $this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Satuan berhasil ditambahkan!');
            redirect(base_url('satuan'), 'refresh');
        }

        $data = array(
            'title' => 'Halaman Tambah Satuan | Inventory',
            'content' => 'satuan/v_add'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function edit($id_satuan)
    {
        $detail = $this->satuan->detail($id_satuan);

        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_satuan',
            '<i class="feather icon-info"></i> Nama satuan obat',
            'required|is_unique[satuan.nama_satuan]',
            array(
                'required' => '%s harus di isi!',
                'is_unique' => '%s tidak boleh sama dengan yang sudah ada!'
            )
        );

        if($valid->run())
        {
            $i = $this->input;
            $data = array(
                'id_satuan' => $id_satuan,
                'nama_satuan' => $i->post('nama_satuan'),
                'id_user' => $this->session->userdata('id_user')
            );
            $this->satuan->edit($data);
            $this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Satuan berhasil diubah!');
            redirect(base_url('satuan'), 'refresh');
        }

        $data = array(
            'title' => 'Halaman Tambah Satuan | Inventory',
            'detail'    => $detail,
            'content' => 'satuan/v_edit'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function delete($id_satuan)
    {
        $data = array(
            'id_satuan' => $id_satuan
        );
        $this->satuan->delete($data);
        $this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Satuan obat berhasil dihapus!');
        redirect(base_url('satuan'), 'refresh');
    }
}
