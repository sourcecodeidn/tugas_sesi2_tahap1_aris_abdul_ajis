<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->auth->ceklogin();
    }
    
    public function index()
    {
        $data = array(
            'title' => 'Dasboard | Inventory',
            'content' => 'dashboard/v_content'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
}
?>