<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->auth->ceklogin();
        $this->load->model('pengaturan_model', 'pengaturan');
        
    }

    public function index()
    {
        $get_pengaturan = $this->pengaturan->get_pengaturan();

        $valid = $this->form_validation;

        $valid->set_rules('instansi', '<i class="feather icon-info"></i> Nama instansi', 'required',
            array(
                'required' => '%s harus di isi!'
            ));

        if ($valid->run()) 
        {
           $config['upload_path']         = './public/media/upload-pengaturan/';
           $config['allowed_types']     = 'gif|jpg|png|jpeg';
           $config['max_size']          = '2400';
           $config['max_width']         = '2024';
           $config['max_height']          = '2024';

           $this->load->library('upload', $config);

           if (!$this->upload->do_upload('logo')) {
            $i = $this->input;
            $data = array(
                'id_pengaturan'   => $i->post('id_pengaturan'),
                'instansi'        => $i->post('instansi'),
                'pimpinan'        => $i->post('pimpinan'),
                'alamat'          => $i->post('alamat'),
                'website'         => $i->post('website'),
                'email'           => $i->post('email'),
                'telepon'         => $i->post('telepon')
            );
            $this->pengaturan->edit($data);
            $this->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> Pengaturan berhasil diubah!');
            redirect(base_url('pengaturan'), 'refresh');
        } 
        else 
        {
            if (!empty($get_pengaturan->logo)) 
            {
                unlink('./public/media/upload-pengaturan/'.$get_pengaturan->logo);
            }
            $upload_gambar = array('upload_data' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './public/media/upload-pengaturan/' . $upload_gambar['upload_data']['file_name'];
            $config['new_image']    = './public/media/upload-pengaturan-thumb/';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']         = 2024;
            $config['height']       = 2024;

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();

            $i = $this->input;
            $data = array(
               'id_pengaturan'   => $i->post('id_pengaturan'),
               'instansi'        => $i->post('instansi'),
               'pimpinan'        => $i->post('pimpinan'),
               'alamat'          => $i->post('alamat'),
               'website'         => $i->post('website'),
               'email'           => $i->post('email'),
               'telepon'         => $i->post('telepon'),
               'logo'         => $upload_gambar['upload_data']['file_name']
           );
            $this->pengaturan->edit($data);
            $this->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> Pengaturan berhasil diubah!');
            redirect(base_url('pengaturan'), 'refresh');
        }
    }
    $data = array(
        'title' => 'Pengaturan | Inventory',
        'data'  => $get_pengaturan,
        'content' => 'pengaturan/v_content'
    );
    $this->load->view('layout/v_wrapper', $data, FALSE);

}

}
?>