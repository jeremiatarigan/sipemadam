<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('staff');
		$this->db->where('username', $post['username']);
		$this->db->where('password2', md5($post['password']));
		$query = $this->db->get();
		return $query;
	}

	public function get($id = null)
	{
		$this->db->from('staff');
		if ($id != null) {
			$this->db->where('kd_staff', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function getAll_User()
	{
		$getUser = $this->db->query("select * from user_view where role_id NOT IN ('admin')");
		return $getUser;
	}

	public function getUserById($id)
	{
		$getUser = $this->db->get_where('user', ['kd_user' => $id])->row_array();
		return $getUser;
	}
}
