<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Office extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_level();
        $this->load->model('M_office');
    }


    public function index()
    {
        check_level();
        $data['title']    = 'Office Management';
        $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['alloffice']  = $this->M_office->getAll();
        $this->load->view('backend/include/header', $data);
        $this->load->view('backend/include/sidebar', $data);
        $this->load->view('backend/include/topbar', $data);
        $this->load->view('backend/office/index', $data);
        $this->load->view('backend/include/footer');
    }


}
