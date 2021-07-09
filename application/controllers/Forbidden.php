<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forbidden extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('email')){
			redirect('');
		}
	}

	public function index()
	{
		$data['title'] = 'Access Blocked';
		$this->load->view('forbidden', $data);
	}

}

/* End of file Forbidden.php */
/* Location: ./application/controllers/Forbidden.php */