<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rak extends CI_Model {

	public function list()
	{
		return $this->db->get('rak')->result_array();
	}

	public function add($data)
	{
		return $this->db->insert('rak', $data);
	}

	public function checking($id)
	{
		return $this->db->get_where('rak', ['id_rak' => $id])->row_array();
	}

	public function edit($data, $id)
	{
		$this->db->set('seri_rak', $data['seri_rak']);
		$this->db->set('nama_rak', $data['nama_rak']);
		$this->db->set('kapasitas', $data['kapasitas']);
		$this->db->where('id_rak', $id);
		return $this->db->update('rak');
	}

	public function del($id)
	{
		return $this->db->delete('rak', ['id_rak' => $id]);
	}

}

/* End of file m_rak.php */
/* Location: ./application/models/m_rak.php */