<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{

	public function getAll()
	{
		$get = $this->db->get('report');
		return $get;
	}

}
