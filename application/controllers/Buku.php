<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

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
				$this->load->model('m_buku');
				$this->load->model('m_rak');
			}
		}
	}

	public function index()
	{
		$data['title'] = 'Data Buku';
		$data['list'] = $this->m_buku->list();
		$this->load->view('load_view/header', $data);
		$this->load->view('load_view/aside');
		$this->load->view('buku/data', $data);
		$this->load->view('load_view/footer');
	}

	public function add()
	{
		$this->form_validation->set_rules('seri_buku', 'Seri Buku', 'trim|required|is_unique[buku.seri_buku]', ['required' => 'Seri Buku masih kosong!', 'is_unique' => 'Seri Buku sudah terdaftar!']);
		$this->form_validation->set_rules('rak', 'Rak Penyimpanan', 'trim|required', ['required' => 'Rak Penyimpanan belum dipilih!']);
		$this->form_validation->set_rules('judul_buku', 'Judul', 'trim|required', ['required' => 'Judul kosong!']);
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required', ['required' => 'Jumlah Buku kosong!']);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Tambah Buku';
			$data['list_rak'] = $this->m_rak->list();
			$this->load->view('load_view/header', $data);
			$this->load->view('load_view/aside');
			$this->load->view('buku/add', $data);
			$this->load->view('load_view/footer');
		} else {
			$data = [
				'id_rak' 		=> $this->input->post('rak'),
				'seri_buku' 	=> $this->input->post('seri_buku'),
				'judul_buku' 	=> $this->input->post('judul_buku'),
				'jumlah' 		=> $this->input->post('jumlah')
			];

			if ($this->m_buku->add($data) == TRUE) {
				$id_rak = $this->m_rak->checking($data['id_rak']);
				$kapasitas = $id_rak['kapasitas'];
				if ($this->m_buku->updatevalrak($data, $kapasitas) == TRUE) {
					redirect('buku');
				}
			}
		}
	}

	public function del($id)
	{
		$data = $this->m_buku->checking($id);
		$id_rak = $data['id_rak'];
		$jumlah = $data['jumlah'];
		$data2 = $this->m_rak->checking($id_rak);
		$kapasitas = $data2['kapasitas'];
		if ($this->m_buku->plusvalrak($id_rak,$jumlah,$kapasitas) == TRUE) {
			if ($this->m_buku->del($id) == TRUE) {
			redirect('buku');
			}
		}
	}

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */