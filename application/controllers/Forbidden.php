<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forbidden extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Access Blocked';
		$this->load->view('forbidden', $data);
	}

}

/* End of file Forbidden.php */
/* Location: ./application/controllers/Forbidden.php */