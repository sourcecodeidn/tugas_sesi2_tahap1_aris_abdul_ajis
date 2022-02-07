<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'user');
        $this->load->helper('campur');
        $this->auth->ceklogin();
    }

    public function index()
    {
        $get_user = $this->user->get_user();
        $data = array(
            'title' => 'Manajemen User | Inventory',
            'data'  => $get_user,
            'content'   => 'user/v_content'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $valid = $this->form_validation;

        $valid->set_rules(
            'username',
            '<i class="feather icon-info"></i> Username',
            'required|is_unique[user.username]',
            array(
                'requiured' => 'harus di isi!',
                'is_unique' => '%s tidak tersedia!'
            )
        );

        if ($valid->run()) {

            $config['upload_path']       = './public/media/upload-user/';
            $config['allowed_types']     = 'gif|jpg|png|jpeg';
            $config['max_size']          = '2400';
            $config['max_width']         = '2024';
            $config['max_height']        = '2024';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $i = $this->input;
                $data = array(
                    'nama'          => $i->post('nama'),
                    'username'      => $i->post('username'),
                    'password'      => bcrypt(sha1(md5($i->post('password')))),
                    'email'         => $i->post('email'),
                    'telepon'       => $i->post('telepon'),
                    'jk'            => $i->post('jk'),
                    'alamat'        => $i->post('alamat'),
                    'level'         => $i->post('level')
                );
                $this->user->add($data);
                $this->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> User berhasil ditambahkan!');
                redirect(base_url('user'), 'refresh');
            } 
            else 
            {
                $upload_gambar = array('upload_data' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './public/media/upload-user/' . $upload_gambar['upload_data']['file_name'];
                $config['new_image']    = './public/media/upload-user-thumb/';
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 2024;
                $config['height']       = 2024;

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();

                $i = $this->input;
                $data = array(
                    'nama'         => $i->post('nama'),
                    'username'     => $i->post('username'),
                    'password'     => bcrypt(sha1(md5($i->post('password')))),
                    'email'        => $i->post('email'),
                    'telepon'      => $i->post('telepon'),
                    'jk'           => $i->post('jk'),
                    'foto'         => $upload_gambar['upload_data']['file_name'],
                    'alamat'       => $i->post('alamat'),
                    'level'        => $i->post('level')
                );
                $this->user->add($data);
                $this->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> User berhasil ditambahkan!');
                redirect(base_url('user'), 'refresh');
            }
        }
        $data = array(
            'title' => 'Tambah User | Inventory',
            'content'   => 'user/v_add'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function detail($id_user)
    {
        $detail = $this->user->detail($id_user);
        $data = array(
            'title' => 'Detail User | Inventory',
            'detail'  => $detail,
            'content'   => 'user/v_detail'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function edit($id_user)
    {
      $detail = $this->user->detail($id_user);

      $valid = $this->form_validation;

      $valid->set_rules(
        'username',
        '<i class="feather icon-info"></i> Username',
        'required',
        array(
            'requiured' => 'harus di isi!'
        )
    );

      if ($valid->run()) {

        $config['upload_path']       = './public/media/upload-user/';
        $config['allowed_types']     = 'gif|jpg|png|jpeg';
        $config['max_size']          = '2400';
        $config['max_width']         = '2024';
        $config['max_height']        = '2024';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $i = $this->input;
            $data = array(
                'id_user'          => $id_user,
                'nama'          => $i->post('nama'),
                'username'      => $i->post('username'),
                'email'         => $i->post('email'),
                'telepon'       => $i->post('telepon'),
                'jk'            => $i->post('jk'),
                'alamat'        => $i->post('alamat'),
                'status'        => $i->post('status')
            );
            $this->user->edit($data);
            $this->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> User berhasil diubah!');
            redirect(base_url('user'), 'refresh');
        } 
        else 
        {
            $upload_gambar = array('upload_data' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './public/media/upload-user/' . $upload_gambar['upload_data']['file_name'];
            $config['new_image']    = './public/media/upload-user-thumb/';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']         = 2024;
            $config['height']       = 2024;

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();

            $i = $this->input;
            $data = array(
              'id_user'          => $id_user,
              'nama'          => $i->post('nama'),
              'username'      => $i->post('username'),
              'email'         => $i->post('email'),
              'telepon'       => $i->post('telepon'),
              'jk'            => $i->post('jk'),
              'foto'         => $upload_gambar['upload_data']['file_name'],
              'alamat'        => $i->post('alamat'),
              'status'        => $i->post('status')
          );
            $this->user->edit($data);
            $this->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> User berhasil diubah!');
            redirect(base_url('user'), 'refresh');
        }
    }

    $data = array(
        'title' => 'Ubah User | Inventory',
        'detail'  => $detail,
        'content'   => 'user/v_edit'
    );
    $this->load->view('layout/v_wrapper', $data, FALSE);
}

public function delete($id_user)
{
    $detail = $this->user->detail($id_user);

    if (!empty($detail->foto)) 
    {
        unlink('./public/media/upload-user/'.$detail->foto);
    }

    $data = array(
        'id_user' => $id_user
    );
    $this->user->delete($data);
    $this->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> User berhasil dihapus!');
    redirect(base_url('user'), 'refresh');
}

public function profil($id_user)
{
    $detail = $this->user->detail($id_user);

    $valid = $this->form_validation;

    $valid->set_rules('nama', '<i class="feather icon-info"></i> Nama', 'required',
        array(
            'required' => '%s harus di isi!'
        ));

    if ($valid->run()) 
    {

        $config['upload_path']       = './public/media/upload-user/';
        $config['allowed_types']     = 'gif|jpg|png|jpeg';
        $config['max_size']          = '2400';
        $config['max_width']         = '2024';
        $config['max_height']        = '2024';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {

            $i = $this->input;

            $data = array(
                'id_user'   => $id_user,
                'nama'      => $i->post('nama'),
                'email'     => $i->post('email'),
                'telepon'   => $i->post('telepon'),
                'jk'        => $i->post('jk'),
                'alamat'    => $i->post('alamat')
            );

            $this->user->edit($data);
            $this->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> Profil berhasil diubah!');
            redirect(base_url('user/profil/'.$id_user), 'refresh');
        } 
        else 
        {
            if (!empty($detail->foto)) 
            {
                unlink('./public/media/upload-user/'.$detail->foto);
            }
            $upload_gambar = array('upload_data' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './public/media/upload-user/' . $upload_gambar['upload_data']['file_name'];
            $config['new_image']    = './public/media/upload-user-thumb/';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']         = 2024;
            $config['height']       = 2024;

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();

            $i = $this->input;
            $data = array(
                'id_user'   => $id_user,
                'nama'      => $i->post('nama'),
                'email'     => $i->post('email'),
                'telepon'   => $i->post('telepon'),
                'jk'        => $i->post('jk'),
                'foto'      => $upload_gambar['upload_data']['file_name'],
                'alamat'    => $i->post('alamat')
            );
            $this->user->edit($data);
            $this->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> Profil berhasil diubah!');
            redirect(base_url('user/profil/'.$id_user), 'refresh');
        }
    }

    $data = array(
        'title' => 'Profil | Inventory',
        'detail'    => $detail,
        'content'   => 'user/v_profil'
    );
    $this->load->view('layout/v_wrapper', $data, FALSE);
}

public function ubahpassword($id_user)
{
    $detail = $this->user->detail($id_user);

    $valid = $this->form_validation;

    $valid->set_rules('pass', '<i class="feather"></i> ', 'required',
        array(
            'required' => '%s harus di isi!'
        ));

    if ($valid->run()) 
    {
        $i = $this->input;
        $username   = $i->post('username');
        $enpass     = sha1(md5($i->post('pass')));
        $get_username =  $this->user->detail_username($username);
        $pass     = crypt($enpass, $get_username->password);
        $password   = $i->post('password');
        $repassword = $i->post('repassword');
        $ambil = $this->user->login($username,$pass);

        if ($ambil) 
        {
            if ($password!=$repassword) 
            {
                $this->session->set_flashdata('danger', '<i class="fa fa-info-circle"></i> Konfirmasi password tidak benar, silahkan konfirmasi password dengan benar!');
                redirect(base_url('user/ubahpassword/'.$id_user), 'refresh');
            }
            else
            {
                $data = array(
                    'id_user'   => $id_user,
                    'password'  => bcrypt(sha1(md5($password)))
                );
                $this->user->ubahpassword($data);
                $this->session->set_flashdata('sukses', '<i class="fa fa-info-circle"></i> Password Anda berhasil diubah!');
                redirect(base_url('user/ubahpassword/'.$id_user), 'refresh');
            }
        }
        else
        {
           $this->session->set_flashdata('danger', '<i class="fa fa-info-circle"></i> Password lama Anda salah!');
           redirect(base_url('user/ubahpassword/'.$id_user), 'refresh');
       }
   }

   $data = array(
    'title' => 'Ubah Password | Inventory',
    'detail'    => $detail,
    'content'   => 'user/v_ubahpassword'
);
   $this->load->view('layout/v_wrapper', $data, FALSE);
}
}
