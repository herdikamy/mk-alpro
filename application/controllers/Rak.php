<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rak extends CI_Controller {

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
				$this->load->model('m_rak');
			}
		}
	}

	public function index()
	{
		$data['title'] = 'Data Rak';
		$data['list'] = $this->m_rak->list();
		$this->load->view('load_view/header', $data);
		$this->load->view('load_view/aside');
		$this->load->view('rak/data', $data);
		$this->load->view('load_view/footer');
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_rak', 'Nama Rak', 'trim|required|is_unique[rak.nama_rak]', ['required' => 'Nama rak masih kosong!', 'is_unique' => 'Rak sudah terdaftar!']);
		$this->form_validation->set_rules('kapasitas_rak', 'Kapasitas', 'trim|required', ['required' => 'Kapasitas rak kosong!']);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Tambah Rak';
			$this->load->view('load_view/header', $data);
			$this->load->view('load_view/aside');
			$this->load->view('rak/add');
			$this->load->view('load_view/footer');
		} else {
			$data = [
				'seri_rak' 		=> $this->input->post('seri_rak'),
				'nama_rak' 		=> $this->input->post('nama_rak'),
				'kapasitas' => $this->input->post('kapasitas_rak')
			];
			if ($this->m_rak->add($data) == TRUE) {
				redirect('rak');
			}
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('nama_rak', 'Nama Rak', 'trim|required', ['required' => 'Nama rak masih kosong!']);
		$this->form_validation->set_rules('kapasitas_rak', 'Kapasitas', 'trim|required', ['required' => 'Kapasitas rak kosong!']);
		if ($this->form_validation->run() == FALSE) {
			$data['edit'] = $this->m_rak->checking($id);
			$data['title'] = 'Tambah Rak';
			$this->load->view('load_view/header', $data);
			$this->load->view('load_view/aside');
			$this->load->view('rak/edit', $data);
			$this->load->view('load_view/footer');
		} else {
			$data = [
				'seri_rak' 	=> $this->input->post('seri_rak'),
				'nama_rak' 	=> $this->input->post('nama_rak'),
				'kapasitas' => $this->input->post('kapasitas_rak')
			];
			if ($this->m_rak->edit($data, $id) == TRUE) {
				redirect('rak');
			}
		}
	}

	public function del($id)
	{
		if ($this->m_rak->del($id) == TRUE) {
			redirect('rak');
		}
	}

}

/* End of file Rak.php */
/* Location: ./application/controllers/Rak.php */