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
			$this->load->model('m_welcome');
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
				$data['mustbacknow'] = $this->m_welcome->countmustbacknow();
				$data['resultmustbacknow'] = $this->m_welcome->resultmustbacknow();
				$data['countusernonactive'] = $this->m_welcome->countusernonactive();
				$data['resultusernonactive'] = $this->m_welcome->resultusernonactive();
				$data['borrowtoday'] = $this->m_welcome->borrowtoday();
				$data['resultborrowtoday'] = $this->m_welcome->resultborrowtoday();
				$data['profile'] = $this->m_profile->show($this->session->userdata('id_user'));
				$notif = 0;
				if($data['mustbacknow']>0){
					$notif = $notif + 1;
				}
				if($data['countusernonactive']>0){
					$notif = $notif + 1;
				}
				if($data['borrowtoday']>0){
					$notif = $notif + 1;
				}
				$data['notif'] = $notif;
			}else{
				$data['profile'] = $this->m_profile->show_s($this->session->userdata('id_user'));
				$data['mustbacknow2'] = $this->m_welcome->countmustbacknow2();
				$data['resultmustbacknow2'] = $this->m_welcome->resultmustbacknow();
				$notif = 0;
				if($data['mustbacknow2']>0){
					$notif = $notif + 1;
				}
				// if($data['countusernonactive']>0){
				// 	$notif = $notif + 1;
				// }
				// if($data['borrowtoday']>0){
				// 	$notif = $notif + 1;
				// }
				$data['notif'] = $notif;
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