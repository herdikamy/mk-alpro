<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

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
				$this->load->model('m_anggota');
				$this->load->model('m_welcome');
				$this->load->library('Zend');
			}
		}
	}

	public function index()
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
		$data['title'] = 'Data Anggota';
		$data['list'] = $this->m_anggota->list();
		$this->load->view('load_view/header', $data);
		$this->load->view('load_view/aside');
		$this->load->view('anggota/data', $data);
		$this->load->view('load_view/footer');
	}

	public function add()
	{
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required', ['required' => 'Jenis Kelamin Masih Kosong!']);
		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required', ['required' => 'Kelas Masih Kosong!']);
		$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required', ['required' => 'Fullname Masih Kosong!']);
		// $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tb_login.email]', ['required' => 'Email Masih Kosong!', 'valid_email' => 'Email Tidak Valid!', 'is_unique' => 'Email Sudah Terdaftar!']);
		$this->form_validation->set_rules('nis', 'NIS/NISN', 'required|trim|min_length[5]', ['min_length' => 'NIS/NISN terlalu pendek!', 'required' => 'NIS/NISN masih kosong']);
		if ($this->form_validation->run() == false) {
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
			$data['kelas'] = $this->db->get('kelas')->result_array();
			$data['title'] = 'Tambah Anggota';
			$this->load->view('load_view/header', $data);
			$this->load->view('load_view/aside');
			$this->load->view('anggota/add');
			$this->load->view('load_view/footer');
		} else {
			$this->_execute();
		}
	}

	private function _execute()
	{
		$data = [
			'nis'			=> $this->input->post('nis'),
			'nama_lengkap' 	=> $this->input->post('fullname'),
			'jk' 			=> $this->input->post('jk'),
			'id_kelas'		=> $this->input->post('kelas'),
			'email'			=> $this->input->post('email')
		];

		if ($this->m_anggota->add($data) == TRUE) {?>
			<script>alert('Berhasil');
			window.location.href='<?=base_url('anggota') ?>';
			</script>
		<?php
		}

	}

	public function act($id)
	{
		$anggota = $this->db->get_where('anggota', ['id_siswa' => $id])->row_array();
		$data = [
				'email'		 	=> $anggota['nis'],
				'nama_lengkap'	=> $anggota['nama_lengkap'],
				'password'	 	=> password_hash($anggota['nis'],PASSWORD_DEFAULT),
				'level'			=> 'Anggota',
				'sejak'			=>	date('Y-m-d'),
				'id_level' 		=> $anggota['id_siswa']
			];
		if ($this->m_anggota->activated($data) == TRUE) {
			if ($this->m_anggota->setval($id) == TRUE) {
				$this->generate_barcode($id);
			}
		}
	}

	private function generate_barcode($id)
	{
		$data = $this->db->get_where('anggota', ['id_siswa' => $id])->row_array();
		$this->zend->load('Zend/Barcode');
		Zend_Barcode::render('code128', 'image', array('text' => $data['nis']));
		redirect('anggota');
	}

	public function show_barcode($value)
	{
		// $data = $this->db->get_where('anggota', ['id_siswa' => $id])->row_array();
		$this->zend->load('Zend/Barcode');
		Zend_Barcode::render('code128', 'image', array('text' => $value, 'barHeight' => 100, 'barThinWidth' => 2, 'withBorder' => TRUE, 'drawText' => FALSE));
	}

	public function print_card($id)
	{
		$data['title'] = 'Cetak Kartu';
		$data['user'] = $this->db->query("SELECT * FROM anggota INNER JOIN kelas ON kelas.id_kelas=anggota.id_kelas WHERE id_siswa='$id'")->row_array();
		$this->load->view('load_view/header', $data);
		$this->load->view('load_view/aside', $data);
		$this->load->view('anggota/cetak_kartu', $data);
		$this->load->view('load_view/footer');
	}

	public function Import()
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
		$data['title'] = 'Import Anggota';
		$this->load->view('load_view/header', $data);
		$this->load->view('load_view/aside');
		$this->load->view('anggota/import');
		$this->load->view('load_view/footer');
	}

	public function importExcel(){
        if(isset($_FILES["file"]["name"])){
              // upload
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size =$_FILES['file']['size'];
            $file_type=$_FILES['file']['type'];
            // move_uploaded_file($file_tmp,"Import/".$file_name); // simpan filenya di folder uploads
            
            $object = PHPExcel_IOFactory::load($file_tmp);
    
            foreach($object->getWorksheetIterator() as $worksheet){
    
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
    
                for($row=2; $row<=$highestRow; $row++){
    
                    $nis = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $jk = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $kelas = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $tryid = $this->db->query("SELECT * FROM kelas WHERE nama_kelas='$kelas' OR nama_kelas LIKE '%$kelas%'")->row_array();
                    $id_kelas = $tryid['id_kelas'];
                    $email = $worksheet->getCellByColumnAndRow(4, $row)->getValue();

                    $data[] = array(
                    	'id_kelas'		=> $id_kelas,
                        'nis'         	=> $nis,
                        'nama_lengkap'  =>$nama,
                        'jk'     		=>$jk,
                        'email'	     	=>$email,
                    );
    
                } 
    
            }
    
            $this->db->insert_batch('anggota', $data); ?>
    
            <script type="text/javascript"> 
			    alert("Import Berhasil"); 
			    window.location.href = "<?=base_url('anggota') ?>";
			</script>;
        <?php }
        else
        { ?>
            <script type="text/javascript"> 
			    alert("Import Gagal"); 
			    window.location.href = "<?=base_url('import') ?>";
			</script>;
            
        <?php }
    }

    public function edit($id)
    {
    	$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required', ['required' => 'Jenis Kelamin Masih Kosong!']);
		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required', ['required' => 'Kelas Masih Kosong!']);
		$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required', ['required' => 'Fullname Masih Kosong!']);
		// $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tb_login.email]', ['required' => 'Email Masih Kosong!', 'valid_email' => 'Email Tidak Valid!', 'is_unique' => 'Email Sudah Terdaftar!']);
		$this->form_validation->set_rules('nis', 'NIS/NISN', 'required|trim|min_length[5]', ['min_length' => 'NIS/NISN terlalu pendek!', 'required' => 'NIS/NISN masih kosong']);
		if ($this->form_validation->run() == false) {
	    	$data['get'] = $this->m_anggota->get($id);
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
			$data['kelas'] = $this->db->get('kelas')->result_array();
			$data['title'] = 'Tambah Anggota';
			$this->load->view('load_view/header', $data);
			$this->load->view('load_view/aside');
			$this->load->view('anggota/edit');
			$this->load->view('load_view/footer');
		} else {
			$this->_execute_edit();
		}
    }

	private function _execute_edit()
	{
		$data = [
			'id_siswa'		=> $this->input->post('id'),
			'nis'			=> $this->input->post('nis'),
			'nama_lengkap' 	=> $this->input->post('fullname'),
			'jk' 			=> $this->input->post('jk'),
			'id_kelas'		=> $this->input->post('kelas'),
			'email'			=> $this->input->post('email')
		];

		if ($this->m_anggota->edit($data) == TRUE) {?>
			<script>alert('Berhasil');
			window.location.href='<?=base_url('anggota') ?>';
			</script>
		<?php
		}

	}

	public function del($id)
	{
		if ($this->m_anggota->del($id) == TRUE) {
			if ($this->m_anggota->del_account($id) == TRUE) {
				redirect('anggota');
			}
		}
	}

}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */