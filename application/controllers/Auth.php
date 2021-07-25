<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
	}

	public function index()
	{
		if($this->session->userdata('email')){
			redirect('welcome');
		}

		$this->form_validation->set_rules('email', 'Email/Username', 'trim|required', ['required' => 'Kolom Masih Kosong!']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'Password Masih Kosong!']);
		if ($this->form_validation->run() == false) {
		$this->load->view('login-v2');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->m_auth->checking($email);
		
		if($user == TRUE){
			if(password_verify($password, $user['password'])){
				$data = [
					'id_user'	=> $user['id'],
					'email' 	=> $user['email'],
					'nama_lengkap' 	=> $user['nama_lengkap'],
					'level' 	=> $user['level'],
					'sejak'		=> $user['sejak'],
					'id_level'	=> $user['id_level'],
					'status'    => "login"	
				];
				$this->session->set_userdata($data);
				redirect('welcome');
			} else {?>
				<script>alert('Password Salah');
				window.location.href='<?=base_url('auth') ?>';
				</script>
			<?php
			}
		}else{?>
				<script>alert('Email Tidak Terdaftar');
				window.location.href='<?=base_url('auth') ?>';
				</script>
			<?php
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required', ['required' => 'Jenis Kelamin Masih Kosong!']);
		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required', ['required' => 'Kelas Masih Kosong!']);
		$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required', ['required' => 'Fullname Masih Kosong!']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tb_login.email]', ['required' => 'Email Masih Kosong!', 'valid_email' => 'Email Tidak Valid!', 'is_unique' => 'Email Sudah Terdaftar!']);
		$this->form_validation->set_rules('nis', 'NIS/NISN', 'required|trim|min_length[5]', ['min_length' => 'NIS/NISN terlalu pendek!', 'required' => 'NIS/NISN masih kosong']);
		$this->form_validation->set_rules('agree', 'Agree', 'trim|required', ['required' => 'Cheklis Agree!']);
		if ($this->form_validation->run() == false) {
			$data['kelas'] = $this->db->get('kelas')->result_array();
			$this->load->view('register-v2',$data);
		} else {
			$this->_regis();
		}
	}

	private function _regis()
	{
		$data = [
			'nis'			=> $this->input->post('nis'),
			'nama_lengkap' 	=> $this->input->post('fullname'),
			'jk' 			=> $this->input->post('jk'),
			'id_kelas'		=> $this->input->post('kelas'),
			'email'			=> $this->input->post('email')
		];

		if ($this->m_auth->register($data) == TRUE) {?>
			<script>alert('Registrasi Berhasil, data anda sedang di verifikasi');
			window.location.href='<?=base_url('auth') ?>';
			</script>
		<?php
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */