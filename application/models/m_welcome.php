<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_welcome extends CI_Model {

	public function rak()
	{
		return $this->db->count_all('rak');
	}

	public function buku()
	{
		return $this->db->get('buku')->result_array();
	}

	public function anggota()
	{
		return $this->db->count_all('anggota');
	}

	// public function countpetugas()
	// {
	// 	$this->db->where('level','Petugas');
	// 	return $this->db->count_all_results('login');
	// }

}

/* End of file m_welcome.php */
/* Location: ./application/models/m_welcome.php */