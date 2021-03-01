<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_office extends CI_Model
{

	public function getAll()
	{
		$get = $this->db->get('damkar_ref');
		return $get;
	}

}
