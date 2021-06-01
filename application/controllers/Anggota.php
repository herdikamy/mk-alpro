<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('email')){
			redirect('auth');
		}else{
			if ($this->session->userdata('level') != 'Administrator') {
				redirect('forbidden');
			}else{
				$this->load->helper('tgl_indo_helper');
				$this->load->model('m_anggota');
			}
		}
	}

	public function index()
	{
		$data['title'] = 'Data Anggota';
		$data['list'] = $this->m_anggota->list();
		$this->load->view('load_view/header', $data);
		$this->load->view('load_view/aside');
		$this->load->view('anggota/data', $data);
		$this->load->view('load_view/footer');
	}

	public function act($id)
	{
		$anggota = $this->db->get_where('anggota', ['id_siswa' == $id])->row_array();
		$data = [
				'email'		 	=> $anggota['email'],
				'nama_lengkap'	=> $anggota['nama_lengkap'],
				'password'	 	=> password_hash($anggota['nis'],PASSWORD_DEFAULT),
				'level'			=> 'Anggota',
				'sejak'			=>	date('Y-m-d'),
				'id_level' 		=> $anggota['id_siswa']
			];
		if ($this->m_anggota->activated($data) == TRUE) {
			if ($this->m_anggota->setval($id) == TRUE) {
				redirect('anggota');
			}
		}
	}

}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */