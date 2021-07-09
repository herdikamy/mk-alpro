<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rak extends CI_Controller {

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
				$this->load->model('m_rak');
				$this->load->model('m_welcome');
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
		$data['title'] = 'Data Rak';
		$data['list'] = $this->m_rak->list();
		$this->load->view('load_view/header', $data);
		$this->load->view('load_view/aside');
		$this->load->view('rak/data', $data);
		$this->load->view('load_view/footer');
	}

	public function add()
	{
		$this->form_validation->set_rules('seri_rak', 'Seri Rak', 'trim|required', ['required' => 'Seri rak masih kosong!']);
		$this->form_validation->set_rules('nama_rak', 'Nama Rak', 'trim|required|is_unique[rak.nama_rak]', ['required' => 'Nama rak masih kosong!', 'is_unique' => 'Rak sudah terdaftar!']);
		$this->form_validation->set_rules('kapasitas_rak', 'Kapasitas', 'trim|required', ['required' => 'Kapasitas rak kosong!']);
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
			$data['title'] = 'Tambah Rak';
			$this->load->view('load_view/header', $data);
			$this->load->view('load_view/aside');
			$this->load->view('rak/add');
			$this->load->view('load_view/footer');
		} else {
			$data = [
				'seri_rak' 		=> $this->input->post('seri_rak'),
				'nama_rak' 		=> $this->input->post('nama_rak'),
				'kapasitas' => $this->input->post('kapasitas_rak')
			];
			if ($this->m_rak->add($data) == TRUE) {
				redirect('rak');
			}
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('nama_rak', 'Nama Rak', 'trim|required', ['required' => 'Nama rak masih kosong!']);
		$this->form_validation->set_rules('kapasitas_rak', 'Kapasitas', 'trim|required', ['required' => 'Kapasitas rak kosong!']);
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
			$data['edit'] = $this->m_rak->checking($id);
			$data['title'] = 'Tambah Rak';
			$this->load->view('load_view/header', $data);
			$this->load->view('load_view/aside');
			$this->load->view('rak/edit', $data);
			$this->load->view('load_view/footer');
		} else {
			$data = [
				'seri_rak' 	=> $this->input->post('seri_rak'),
				'nama_rak' 	=> $this->input->post('nama_rak'),
				'kapasitas' => $this->input->post('kapasitas_rak')
			];
			if ($this->m_rak->edit($data, $id) == TRUE) {
				redirect('rak');
			}
		}
	}

	public function del($id)
	{
		if ($this->m_rak->del($id) == TRUE) {
			redirect('rak');
		}
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
		$data['title'] = 'Import Rak';
		$this->load->view('load_view/header', $data);
		$this->load->view('load_view/aside');
		$this->load->view('rak/import');
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
    
                    $seri_rak = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nama_rak = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $kapasitas = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

                    $data[] = array(
                        'seri_rak'          => $seri_rak,
                        'nama_rak'          =>$nama_rak,
                        'kapasitas'         =>$kapasitas,
                    );
    
                } 
    
            }
    
            $this->db->insert_batch('rak', $data); ?>
    
            <script type="text/javascript"> 
			    alert("Import Berhasil"); 
			    window.location.href = "<?=base_url('rak') ?>";
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

}

/* End of file Rak.php */
/* Location: ./application/controllers/Rak.php */