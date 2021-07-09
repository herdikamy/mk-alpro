<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller {

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
				$this->load->model('m_welcome');
			}
		}
	}

	public function index()
	{
		$this->form_validation->set_rules('nis', 'NIS', 'trim|required', ['required' => 'Form masih kosong']);

		if ($this->form_validation->run() == FALSE) {
			$data['mustbacknow'] = $this->m_welcome->countmustbacknow();
			$data['resultmustbacknow'] = $this->m_welcome->resultmustbacknow();
			$data['countusernonactive'] = $this->m_welcome->countusernonactive();
			$data['resultusernonactive'] = $this->m_welcome->resultusernonactive();
			$data['borrowtoday'] = $this->m_welcome->borrowtoday();
			$data['resultborrowtoday'] = $this->m_welcome->resultborrowtoday();
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
			$data['title'] = 'Kunjungan Siswa';
			$this->load->view('load_view/header', $data);
			$this->load->view('load_view/aside');
			$this->load->view('kunjungan/index');
			$this->load->view('load_view/footer');
		} else {
			$data = $this->db->get_where('anggota', ['nis' => $this->input->post('nis')])->row_array();

			$insert = [
				'id_anggota' 	=> $data['id_siswa'],
				'tgl_kunjungan'	=> date('Y-m-d')
			];

			if ($this->m_welcome->checkperanak($data['id_siswa']) > 0) { ?>
				<script>window.alert('Data Sudah Ditemukan');
				window.location.href='<?=base_url('kunjungan/data') ?>';</script>
			<?php }else{
				if ($this->db->insert('kunjungan', $insert) == TRUE) {
					if ($this->m_welcome->countkunjungan() < 1) {
						$data = [
							'tanggal'	=> date('Y-m-d'),
							'jumlah'	=> 1
						];
						if ($this->db->insert('count_kunjungan', $data) == TRUE) {
							redirect('kunjungan');
						}
					}elseif ($this->m_welcome->countkunjungan() > 0) {
						$data = $this->db->get_where('count_kunjungan',['tanggal' => date('Y-m-d')])->row_array();
						$counter = $data['jumlah'] + 1;
						$this->db->set('jumlah', $counter);
						$this->db->where('tanggal', date('Y-m-d'));
						$this->db->update('count_kunjungan');
						redirect('kunjungan');
					}
				}
			}
		}
	}

	public function data()
	{
		$data['mustbacknow'] = $this->m_welcome->countmustbacknow();
		$data['resultmustbacknow'] = $this->m_welcome->resultmustbacknow();
		$data['countusernonactive'] = $this->m_welcome->countusernonactive();
		$data['resultusernonactive'] = $this->m_welcome->resultusernonactive();
		$data['borrowtoday'] = $this->m_welcome->borrowtoday();
		$data['resultborrowtoday'] = $this->m_welcome->resultborrowtoday();
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
		$data['title'] = 'Data Kunjungan';
		$data['list'] = $this->db->query('SELECT * FROM kunjungan INNER JOIN anggota ON anggota.id_siswa=kunjungan.id_anggota')->result_array();
		$this->load->view('load_view/header', $data);
		$this->load->view('load_view/aside');
		$this->load->view('kunjungan/data');
		$this->load->view('load_view/footer');
	}

}

/* End of file Kunjungan.php */
/* Location: ./application/controllers/Kunjungan.php */