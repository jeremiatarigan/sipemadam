<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_level();
        $this->load->model('M_laporan');
    }


    public function index()
    {
        check_level();
        $data['title']    = 'Laporan Management';
        $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['alllaporan']  = $this->M_laporan->getAll();
        $this->load->view('backend/include/header', $data);
        $this->load->view('backend/include/sidebar', $data);
        $this->load->view('backend/include/topbar', $data);
        $this->load->view('backend/laporan/index', $data);
        $this->load->view('backend/include/footer');
    }
}
