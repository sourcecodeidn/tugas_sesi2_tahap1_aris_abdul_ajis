<?php defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('supplier_model', 'supplier');
        $this->auth->ceklogin();
    }

    public function index()
    {
        $data_supplier = $this->supplier->get_supplier();

        $valid = $this->form_validation;

        $valid->set_rules(
            'nama',
            '<i class="feather icon-info"></i> Nama supplier',
            'required',
            array(
                'required' => '%s harus di isi!'
            )
        );

        if ($valid->run()) {
            $i = $this->input;
            $data = array(
                'nama_supplier'    => $i->post('nama'),
                'telepon_supplier' => $i->post('telepon'),
                'alamat_supplier'  => $i->post('alamat'),
                'keterangan'       => $i->post('keterangan'),
                'id_user'          => $this->session->userdata('id_user')
            );
            $this->supplier->add($data);
            $this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Data supplier berhasil ditambahkan!');
            redirect(base_url('supplier'), 'refresh');
        }

        $data = array(
            'title' => 'Data Supplier | Inventory',
            'data'  => $data_supplier,
            'content'  => 'supplier/v_content'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function data_supplier()
    {
        $data = $this->supplier->detail($this->input->post('id_supplier'));
        echo json_encode($data);
    }

    public function edit()
    {
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_supplier',
            '<i class="feather icon-info"></i> Supplier',
            'required',
            array(
                'required' => '%s harus di isi!'
            )
        );

        if ($valid->run()) {
            $i = $this->input;
            $data = array(
                'id_supplier'    => $i->post('id_supplier'),
                'nama_supplier'    => $i->post('nama_supplier'),
                'telepon_supplier' => $i->post('telepon_supplier'),
                'alamat_supplier'  => $i->post('alamat_supplier'),
                'keterangan'       => $i->post('keterangan_supplier'),
                'id_user'          => $this->session->userdata('id_user')
            );
            $this->supplier->edit($data);
            $this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Data supplier berhasil diubah!');
            redirect(base_url('supplier'), 'refresh');
        }
    }

    public function delete($id_supplier)
    {
        $data = array(
            'id_supplier' => $id_supplier
        );
        $this->supplier->delete($data);
        $this->session->set_flashdata('sukses', '<i class="feather icon-info"></i> Data supplier berhasil dihapus!');
        redirect(base_url('supplier'), 'refresh');
    }
}
