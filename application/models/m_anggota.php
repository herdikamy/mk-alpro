<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_anggota extends CI_Model {

	public function list()
	{
		return $this->db->get('anggota')->result_array();
	}

	public function activated($data)
	{
		return $this->db->insert('tb_login', $data);
	}

	public function setval($id)
	{
		$this->db->set('activated', '1');
		$this->db->where('id_siswa', $id);
		return $this->db->update('anggota');
	}

}

/* End of file m_anggota.php */
/* Location: ./application/models/m_anggota.php */