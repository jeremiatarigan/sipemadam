<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_level();
        $this->load->model('m_user');
    }


    public function index()
    {
        check_level();
        $data['title']    = 'User Management';
        $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['allUser']  = $this->m_user->getAll_user();
        $this->load->view('backend/include/header', $data);
        $this->load->view('backend/include/sidebar', $data);
        $this->load->view('backend/include/topbar', $data);
        $this->load->view('backend/usermanagement', $data);
        $this->load->view('backend/include/footer');
    }

    public function user_resetPassword($kd_user)
    {
        $data['no_formulir']    = $this->db->get_where('user', array('kd_user' => $kd_user), 1)->row();
        $password    = password_hash(1234, PASSWORD_DEFAULT);
        $this->db->query("UPDATE user SET password ='" . $password . "' WHERE kd_user ='$kd_user'");
        $this->session->set_flashdata("success", "Berhasil Mereset User (1234)");
        redirect('user');
    }

    public function user_diactivated($kd_user)
    {
        $data['no_formulir']    = $this->db->get_where('user', array('kd_user' => $kd_user), 1)->row();
        $this->db->query("UPDATE user SET is_active ='0' WHERE kd_user ='$kd_user'");

        $this->session->set_flashdata("success", "Berhasil Menonaktifkan User");
        redirect('user');
    }

    public function user_activated($kd_user)
    {
        $data['no_formulir']    = $this->db->get_where('user', array('kd_user' => $kd_user), 1)->row();
        $this->db->query("UPDATE user SET is_active ='1' WHERE kd_user ='$kd_user'");

        $this->session->set_flashdata("success", "Berhasil Mengaktifkan User");
        redirect('user');
    }
}
