<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_anggota extends CI_Model {

	public function list()
	{
		$this->db->join('kelas', 'kelas.id_kelas = anggota.id_kelas');
		return $this->db->get('anggota')->result_array();
	}

	public function get($id)
	{
		return $this->db->get_where('anggota', ['id_siswa' => $id])->row_array();
	}

	public function edit($data)
	{
		$this->db->set('nis', $data['nis']);
		$this->db->set('nama_lengkap', $data['nama_lengkap']);
		$this->db->set('id_kelas', $data['id_kelas']);
		$this->db->set('email', $data['email']);
		$this->db->where('id_siswa', $data['id_siswa']);
		return $this->db->update('anggota');
	}

	public function add($data)
	{
		return $this->db->insert('anggota', $data);
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

	public function del($id)
	{
		return $this->db->delete('anggota', ['id_siswa' => $id]);
	}

	public function del_account($id)
	{
		return $this->db->delete('tb_login', ['id_level' => $id]);
	}

}

/* End of file m_anggota.php */
/* Location: ./application/models/m_anggota.php */