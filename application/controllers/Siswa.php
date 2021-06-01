<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function index()
	{
		$this->load->view('load_view/header');
		$this->load->view('load_view/aside');
		$this->load->view('siswa/dashboard');
		$this->load->view('load_view/footer');
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */