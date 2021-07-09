<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('email')){
			redirect('auth');
		}
			$this->load->helper('tgl_indo_helper');
			$this->load->model('m_buku');
			$this->load->model('m_rak');
			$this->load->model('m_transaksi');
			$this->load->model('m_welcome');
	}

	public function buku()
	{
		$data['mustbacknow2'] = $this->m_welcome->countmustbacknow2();
		$data['resultmustbacknow2'] = $this->m_welcome->resultmustbacknow();
		$notif = 0;
			if($data['mustbacknow2']>0){
				$notif = $notif + 1;
			}
			// if($data['countusernonactive2']>0){
			// 	$notif = $notif + 1;
			// }
			// if($data['borrowtoday2']>0){
			// 	$notif = $notif + 1;
			// }
			$data['notif'] = $notif;
		$data['title'] = 'Data Buku';
		$data['list'] = $this->m_buku->list();
		$this->load->view('load_view/header', $data);
		$this->load->view('load_view/aside');
		$this->load->view('buku/data', $data);
		$this->load->view('load_view/footer');
	}

	public function history()
	{
		$data['mustbacknow2'] = $this->m_welcome->countmustbacknow2();
		$data['resultmustbacknow2'] = $this->m_welcome->resultmustbacknow();
		$notif = 0;
			if($data['mustbacknow2']>0){
				$notif = $notif + 1;
			}
			$data['notif'] = $notif;
		$data['title'] = 'Data Buku';
		$data['list'] = $this->m_transaksi->listpersiswa();
		$this->load->view('load_view/header', $data);
		$this->load->view('load_view/aside');
		$this->load->view('peminjaman/data', $data);
		$this->load->view('load_view/footer');
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */