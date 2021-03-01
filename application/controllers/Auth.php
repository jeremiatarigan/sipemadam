<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_office');
	}

	public function index()
	{
		check_already_login();
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Login Page';
			$this->load->view('backend/include/auth_header', $data);
			$this->load->view('backend/login');
			$this->load->view('backend/include/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email', TRUE);
		$password = $this->input->post('password', TRUE);

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			// cek aktif user
			if ($user['is_active'] == 1) {

				if (password_verify($password, $user['password'])) {

					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];

					$this->session->set_userdata($data);
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Login Gagal,Password Salah!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Login Gagal,User Sudah tidak Aktif!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Login Gagal,Email Tidak Terdaftar!</div>');
			redirect('auth');
		}
	}

	public function registrationPage()
	{
		$data['title'] = 'Registration Page';

		$data['alloffice']  = $this->M_office->getAll();
		$this->load->view('backend/include/auth_header', $data);
		$this->load->view('backend/registration');
		$this->load->view('backend/include/auth_footer');
	}

	public function registration()
	{
		check_not_login();
		check_level();

	
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
			'matches' => 'password tidak sama!',
			'min_length' => 'password terlalu lemah'
		]);

		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Registration Page';

			$this->load->view('backend/include/auth_header', $data);
			$this->load->view('backend/registration');
			$this->load->view('backend/include/auth_footer');
		} else {

			$data = [
				'nama' 		=> htmlspecialchars($this->input->post('nama', TRUE)),
				'email' 	=> htmlspecialchars($this->input->post('email', TRUE)),
				'username' 	=> htmlspecialchars(strtolower(trim(str_replace(" ","",$this->input->post('nama', TRUE))))),
				'image' 	=> 'default.jpg',
				'password'	=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id'	=> 2,
				'damkar_id' => $this->input->post('damkar_id'),
				'is_active' => 1,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Registrasi Berhasil!</div>');
			redirect('user');
		}
	}

	public function profile()
	{
		check_not_login();
		$data['title'] = 'Profile Page';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('backend/include/header', $data);
		$this->load->view('backend/include/sidebar', $data);
		$this->load->view('backend/include/topbar', $data);
		$this->load->view('backend/profile', $data);
		$this->load->view('backend/include/footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Logout Berhasil!</div>');
		redirect('auth');
	}


	public function editProfile()
	{
		check_not_login();
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');

		if ($this->form_validation->run() == FALSE) {

			$data['title'] = 'Edit Profile';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('backend/include/header', $data);
			$this->load->view('backend/include/sidebar', $data);
			$this->load->view('backend/include/topbar', $data);
			$this->load->view('backend/editProfile', $data);
			$this->load->view('backend/include/footer');
		} else {
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

			$nama = htmlspecialchars($this->input->post('nama'));
			$email = htmlspecialchars($this->input->post('email'));

			// cek gambar
			$upload_image = $_FILES['image']['name'];


			if ($upload_image) {
				$config['upload_path'] = './profile';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '1024';

				$this->upload->initialize($config);
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {

					$old_image = $data['user']['image'];
					// var_dump($old_image);die();
					if ($old_image != 'default.png'); {
						unlink(FCPATH . 'profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
					die();
				}
			}

			$this->db->set('nama', $nama);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Updates Berhasil!</div>');
			redirect('auth/editProfile');
		}
	}

	public function ubahPassword()
	{
		check_not_login();
		$data['title'] = 'Ubah Password';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('password_sekarang', 'Password Sekarang', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|trim|min_length[3]|matches[new_password1]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('backend/include/header', $data);
			$this->load->view('backend/include/sidebar', $data);
			$this->load->view('backend/include/topbar', $data);
			$this->load->view('backend/ubahPassword', $data);
			$this->load->view('backend/include/footer');
		} else {
			$password_sekarang = $this->input->post('password_sekarang');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($password_sekarang, $data['user']['password'])) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Saat ini salah!</div>');
				redirect('auth/ubahPassword');
			} else {
				if ($password_sekarang == $new_password) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password tidak boleh sama dengan password saat ini!</div>');
					redirect('auth/ubahPassword');
				} else {
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password telah diubah!!</div>');
					redirect('auth/ubahPassword');
				}
			}
		}
	}
}
