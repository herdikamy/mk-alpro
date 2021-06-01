<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model {

	public function show($val)
	{
		return $this->db->get_where('tb_login', ['id' => $val])->row_array();
	}
	public function show_s($val)
	{
		// return $this->db->get_where('tb_login', ['id' => $val])->row_array();
	}
	public function update($data)
	{
		$this->db->set('email', $data['email']);
		$this->db->set('password', $data['password']);
		$this->db->where('id', $data['id']);
		return $this->db->update('tb_login');
	}

}

/* End of file m_profile.php */
/* Location: ./application/models/m_profile.php */