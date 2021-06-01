<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function checking($data)
	{
		return $this->db->get_where('tb_login',['email' => $data])->row_array();
	}

	public function register($data)
	{
		return $this->db->insert('anggota', $data);
	}

}

/* End of file m_auth.php */
/* Location: ./application/models/m_auth.php */