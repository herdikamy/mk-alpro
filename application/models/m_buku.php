<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model {

	public function list()
	{
		$this->db->join('rak', 'rak.id_rak = buku.id_rak', 'inner');
		return $this->db->get('buku')->result_array();
	}

	public function add($data)
	{
		return $this->db->insert('buku', $data);
	}

	public function updatevalrak($data, $kapasitas)
	{
		$this->db->set('kapasitas', $kapasitas - $data['jumlah']);
		$this->db->where('id_rak', $data['id_rak']);
		return $this->db->update('rak');
	}

	public function checking($id)
	{
		return $this->db->get_where('buku', ['id_buku' => $id])->row_array();
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
		return $this->db->delete('buku', ['id_buku' => $id]);
	}

	public function plusvalrak($id_rak, $jumlah, $kapasitas)
	{
		$this->db->set('kapasitas', $kapasitas + $jumlah);
		$this->db->where('id_rak', $id_rak);
		return $this->db->update('rak');
	}

}

/* End of file m_buku.php */
/* Location: ./application/models/m_buku.php */