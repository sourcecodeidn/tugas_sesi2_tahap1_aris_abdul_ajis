<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'model');
        
    }
    
    public function index()
    {
        $valid = $this->form_validation;

        $this->form_validation->set_rules(
            'username',
            'Username',
            'required',
            array('required'  => '%s harus di isi!')
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required'  => '%s harus di isi!')
        );

        if ($valid->run()) {
            $username    = $this->input->post('username');
            $get_username = $this->model->get_username($username);
            if ($get_username == 1) {
                $detail_username = $this->model->detail_username($username);
                $password   = sha1(md5($this->input->post('password')));
                $enpass     = crypt($password, $detail_username->password);
                $this->auth->login($username, $enpass);
            } else {
                $this->session->set_flashdata('danger', '<i class="fa fa-info-circle"></i> Username tidak ada!');
                redirect(base_url('login'), 'refresh');
            }
        }
        $data = array(
            'title' => 'Login | Inventory'
        );
        $this->load->view('login/v_login', $data, FALSE);
    }

    public function logout()
    {
        $this->auth->logout();
    }
}
