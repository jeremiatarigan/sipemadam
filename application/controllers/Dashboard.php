<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
		public function __construct()
		{
            
            parent::__construct();
            check_not_login();
        }

    public function index(){
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('backend/include/header',$data);
        $this->load->view('backend/include/sidebar',$data);
        $this->load->view('backend/include/topbar',$data);
        $this->load->view('backend/dashboard',$data);
        $this->load->view('backend/include/footer');
    }

   
}