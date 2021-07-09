<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

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
				$this->load->model('m_buku');
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
		$data['title'] = 'Data Buku';
		$data['list'] = $this->m_buku->list();
		$this->load->view('load_view/header', $data);
		$this->load->view('load_view/aside');
		$this->load->view('buku/data', $data);
		$this->load->view('load_view/footer');
	}

	public function add()
	{
		$this->form_validation->set_rules('seri_buku', 'Seri Buku', 'trim|required|is_unique[buku.seri_buku]', ['required' => 'Seri Buku masih kosong!', 'is_unique' => 'Seri Buku sudah terdaftar!']);
		$this->form_validation->set_rules('rak', 'Rak Penyimpanan', 'trim|required', ['required' => 'Rak Penyimpanan belum dipilih!']);
		$this->form_validation->set_rules('judul_buku', 'Judul', 'trim|required', ['required' => 'Judul kosong!']);
		$this->form_validation->set_rules('penulis', 'Penulis', 'trim|required', ['required' => 'Penulis kosong!']);
		$this->form_validation->set_rules('penerbit', 'Judul', 'trim|required', ['required' => 'Penerbit kosong!']);
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required', ['required' => 'Jumlah Buku kosong!']);
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
			$data['title'] = 'Tambah Buku';
			$data['list_rak'] = $this->m_rak->list();
			$this->load->view('load_view/header', $data);
			$this->load->view('load_view/aside');
			$this->load->view('buku/add', $data);
			$this->load->view('load_view/footer');
		} else {
			$data = [
				'id_rak' 		=> $this->input->post('rak'),
				'seri_buku' 	=> $this->input->post('seri_buku'),
				'judul_buku' 	=> $this->input->post('judul_buku'),
				'penulis'	 	=> $this->input->post('penulis'),
				'penerbit'	 	=> $this->input->post('penerbit'),
				'tahun_terbit'	=> $this->input->post('tahun_terbit'),
				'jumlah' 		=> $this->input->post('jumlah')
			];

			if ($this->m_buku->add($data) == TRUE) {
				$id_rak = $this->m_rak->checking($data['id_rak']);
				$kapasitas = $id_rak['kapasitas'];
				if ($this->m_buku->updatevalrak($data, $kapasitas) == TRUE) {
					redirect('buku');
				}
			}
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
		$data['title'] = 'Import Buku';
		$this->load->view('load_view/header', $data);
		$this->load->view('load_view/aside');
		$this->load->view('buku/import');
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
    
                    $rak = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $tryid = $this->db->query("SELECT * FROM rak WHERE nama_rak='$rak' OR nama_rak LIKE '%$rak%'")->row_array();
                    $id_rak = $tryid['id_rak'];
                    $seri_buku = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $judul_buku = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $penulis = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $penerbit = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $tahunterbit = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $jumlah = $worksheet->getCellByColumnAndRow(6, $row)->getValue();

                    $data[] = array(
                        'id_rak'         =>$id_rak,
                        'seri_buku'      =>$seri_buku,
                        'judul_buku'     =>$judul_buku,
                        'penulis'	     =>$penulis,
                        'penerbit' 		 =>$penerbit,
                        'tahun_terbit'	 =>$tahunterbit,
                        'jumlah'    	 =>$jumlah,
                    );
    
                } 
    
            }
    
            $this->db->insert_batch('buku', $data); ?>
    
            <script type="text/javascript"> 
			    alert("Import Berhasil"); 
			    window.location.href = "<?=base_url('buku') ?>";
			</script>;
        <?php 
    }else{ ?>
            <script type="text/javascript"> 
			    alert("Import Gagal"); 
			    window.location.href = "<?=base_url('import') ?>";
			</script>;
            
        <?php }
    }

	public function edit($id)
	{
		$this->form_validation->set_rules('seri_buku', 'Seri Buku', 'trim|required', ['required' => 'Seri Buku masih kosong!']);
		$this->form_validation->set_rules('rak', 'Rak Penyimpanan', 'trim|required', ['required' => 'Rak Penyimpanan belum dipilih!']);
		$this->form_validation->set_rules('judul_buku', 'Judul', 'trim|required', ['required' => 'Judul kosong!']);
		$this->form_validation->set_rules('penulis', 'Penulis', 'trim|required', ['required' => 'Penulis kosong!']);
		$this->form_validation->set_rules('penerbit', 'Judul', 'trim|required', ['required' => 'Penerbit kosong!']);
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required', ['required' => 'Jumlah Buku kosong!']);
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
			$data['edit'] = $this->m_buku->checking($id);
			$data['list_rak'] = $this->m_rak->list();
			$data['title'] = 'Edit Buku';
			$this->load->view('load_view/header', $data);
			$this->load->view('load_view/aside');
			$this->load->view('buku/edit', $data);
			$this->load->view('load_view/footer');
		} else {
			$data1 = [
				'seri_buku' 	=> $this->input->post('seri_buku'),
				'id_rak'		=> $this->input->post('rak'),
				'judul_buku' 	=> $this->input->post('judul_buku'),
				'penulis'	 	=> $this->input->post('penulis'),
				'penerbit'	 	=> $this->input->post('penerbit'),
				'jumlah'	 	=> $this->input->post('jumlah')
			];
			$data = $this->m_buku->checking($id);
			$id_rak = $data['id_rak'];
			$jumlah = $data['jumlah'];
			$data2 = $this->m_rak->checking($id_rak);
			$kapasitas = $data2['kapasitas'];
			$id_rak2 = $data1['id_rak'];
			$data3 = $this->m_rak->checking($id_rak2);
			$kapasitas2 = $data3['kapasitas'];
			if ($this->m_buku->plusvalrak($id_rak,$jumlah,$kapasitas) == TRUE) {
				if ($this->m_buku->updatevalrak($data1, $kapasitas2) == TRUE) {
					if ($this->m_buku->edit($data1, $id) == TRUE) {
					redirect('buku');
					}
				}
			}
		}
	}

	public function del($id)
	{
		$data = $this->m_buku->checking($id);
		$id_rak = $data['id_rak'];
		$jumlah = $data['jumlah'];
		$data2 = $this->m_rak->checking($id_rak);
		$kapasitas = $data2['kapasitas'];
		if ($this->m_buku->plusvalrak($id_rak,$jumlah,$kapasitas) == TRUE) {
			if ($this->m_buku->del($id) == TRUE) {
			redirect('buku');
			}
		}
	}

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */