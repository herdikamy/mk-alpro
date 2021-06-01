<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('email')){
			redirect('auth');
		}else {
			$this->load->model('m_profile');
			$this->load->helper('tgl_indo_helper');
		}
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', ['required' => 'Email Masih Kosong!', 'valid_email' => 'Email Tidak Valid!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[retype]', ['matches' => 'Password Tidak Sesuai!', 'min_length' => 'Password terlalu pendek!', 'required' => 'Password masih kosong']);
		$this->form_validation->set_rules('retype', 'Password', 'trim|min_length[5]|matches[password]', ['matches' => 'Password Tidak Sesuai!']);
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Profile';
			if ($this->session->userdata('level')=='Administrator') {
				$data['profile'] = $this->m_profile->show($this->session->userdata('id_user'));
			}else{
				$data['profile'] = $this->m_profile->show_s($this->session->userdata('id_user'));
			}
			$this->load->view('load_view/header', $data);
			$this->load->view('load_view/aside');
			$this->load->view('profile/index');
			$this->load->view('load_view/footer');
		} else {
			$this->_update();
		}
	}

	private function _update()
	{
		$data = [
			'id'		=> $this->input->post('id'),
			'email'		=> $this->input->post('email'),
			'password'	=> password_hash($this->input->post('password'), PASSWORD_DEFAULT)
		];
		if ($this->m_profile->update($data) == TRUE) {
			redirect();
		}
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */