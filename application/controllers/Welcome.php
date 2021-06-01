<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('email')){
			redirect('auth');
		}else {
			$this->load->model('m_welcome');
			$this->load->helper('tgl_indo_helper');
		}
	}

	public function index()
	{
		$data['jumlahrak'] = $this->m_welcome->rak();
		$data['jumlahbuku'] = $this->m_welcome->buku();
		$data['jumlahanggota'] = $this->m_welcome->anggota();
		$data['title'] = 'Dashboard';
		$this->load->view('load_view/header', $data);
		$this->load->view('load_view/aside');
		$this->load->view('dashboard');
		$this->load->view('load_view/footer');
	}
}
