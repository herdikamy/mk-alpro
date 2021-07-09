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
		if ($this->session->userdata('level')=='Administrator') {
			$data['jumlahrak'] = $this->m_welcome->rak();
			$data['jumlahbuku'] = $this->m_welcome->buku();
			$data['jumlahanggota'] = $this->m_welcome->anggota();
			$data['countpinjam'] = $this->m_welcome->countpinjam();
			$data['countkembali'] = $this->m_welcome->countkembali();
			$data['buku'] = $this->m_welcome->countbuku();
			$data['pria'] = $this->m_welcome->countpria();
			$data['wanita'] = $this->m_welcome->countwanita();
			$data['chart'] = $this->m_welcome->chartkunjungan();
			$data['chart_tr'] = $this->m_welcome->chart_tr();
			$data['chart_buku'] = $this->m_welcome->chart_buku();
			$data['mustbacknow'] = $this->m_welcome->countmustbacknow();
			$data['resultmustbacknow'] = $this->m_welcome->resultmustbacknow();
			$data['countusernonactive'] = $this->m_welcome->countusernonactive();
			$data['resultusernonactive'] = $this->m_welcome->resultusernonactive();
			$data['borrowtoday'] = $this->m_welcome->borrowtoday();
			$data['resultborrowtoday'] = $this->m_welcome->resultborrowtoday();
			$data['title'] = 'Dashboard';
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
			$this->load->view('load_view/header', $data);
			$this->load->view('load_view/aside');
			$this->load->view('dashboard');
			$this->load->view('load_view/footer');
		}else {
			$data['jumlahbuku'] = $this->m_welcome->buku();
			$data['bukudipinjam'] = $this->m_welcome->bukudipinjam();
			$data['bukudikembalikan'] = $this->m_welcome->bukudikembalikan();
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
			$data['title'] = 'Dashboard';
			$this->load->view('load_view/header', $data);
			$this->load->view('load_view/aside');
			$this->load->view('siswa/dashboard');
			$this->load->view('load_view/footer');
		}
	}
}
