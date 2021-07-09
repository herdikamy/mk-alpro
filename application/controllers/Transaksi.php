<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('email')){
			redirect('auth');
		}
			$this->load->helper('tgl_indo_helper');
			$this->load->model('m_transaksi');
			$this->load->model('m_anggota');
			$this->load->model('m_buku');
			$this->load->model('m_welcome');
			$this->load->library('Zend');
	}

	public function index()
	{
		redirect('transaksi/peminjaman');
	}

	public function peminjaman()
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
		$data['title'] = 'Data Peminjaman';
		$data['list'] = $this->m_transaksi->listpeminjaman();
		$this->load->view('load_view/header', $data);
		$this->load->view('load_view/aside');
		$this->load->view('peminjaman/data', $data);
		$this->load->view('load_view/footer');
	}

	public function pengembalian()
	{
		$this->form_validation->set_rules('nopeminjaman', 'No Peminjaman', 'trim|required', ['required' => 'Form masih kosong']);

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
			$data['title'] = 'Pengembalian';
			$this->load->view('load_view/header', $data);
			$this->load->view('load_view/aside');
			$this->load->view('pengembalian/index');
			$this->load->view('load_view/footer');
		} else {
			$post = $this->input->post('nopeminjaman');
			$data['list'] = $this->db->query("SELECT * FROM transaksi INNER JOIN anggota ON anggota.id_siswa=transaksi.id_anggota INNER JOIN buku ON buku.id_buku=transaksi.id_buku WHERE no_transaksi='$post' OR nama_lengkap='$post' OR nama_lengkap LIKE '%$post%' AND status='Dipinjam'")->result_array();
			if ($data['list'] == TRUE) {
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
				$data['title'] = 'Pengembalian';
				$this->load->view('load_view/header', $data);
				$this->load->view('load_view/aside');
				$this->load->view('pengembalian/list', $data);
				$this->load->view('load_view/footer');
			}else{ ?>
				<script>window.alert('Tidak ada data ditemukan');
					window.location.href='<?=base_url('transaksi/pengembalian') ?>'</script>
			<?php }
		}
	}

	public function add()
	{
		$this->form_validation->set_rules('no_transaksi', 'No Transaksi', 'trim|required', ['required' => 'No Transaksi Kosong!']);
		$this->form_validation->set_rules('peminjam', 'Nama Peminjam', 'trim|required', ['required' => 'Nama Peminjam Kosong!']);
		$this->form_validation->set_rules('qty', 'Quantity', 'trim|required', ['required' => 'Quantity Kosong!']);
		$this->form_validation->set_rules('user', 'Pustakawan', 'trim|required', ['required' => 'Pustakawan Kosong!']);
		$this->form_validation->set_rules('buku', 'Buku', 'trim|required', ['required' => 'Tidak ada buku yang dipilih!']);
		$this->form_validation->set_rules('tgl_pjm', 'Tanggal Pinjam', 'trim|required', ['required' => 'Tanggal Pinjam Kosong!']);
		$this->form_validation->set_rules('tgl_kbl', 'Tanggal Kembali', 'trim|required', ['required' => 'Tanggal Kembali Kosong!']);

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
			$data['title'] = 'Peminjaman Buku';
			$data['anggota'] = $this->m_anggota->list();
			$data['buku'] = $this->m_buku->list();
			$invoice = $this->db->query("SELECT * FROM chart_book ORDER BY id_chart ASC LIMIT 1")->row_array();
			$data['chart'] = $this->m_transaksi->listchart($invoice['invoice']);
			$data['count_chart'] = $this->m_transaksi->count_chart($invoice['invoice']);
			$this->load->view('load_view/header', $data);
			$this->load->view('load_view/aside');
			$this->load->view('peminjaman/add');
			$this->load->view('load_view/footer');
		} else {
			$this->_act();
		}
	}

	private function _act()
	{
		$buku = $this->db->get_where('buku', ['id_buku' => $this->input->post('buku')])->row_array();
		$peminjam = $this->db->get_where('anggota',['id_siswa' => $this->input->post('peminjam')])->row_array();

		if ($buku['jumlah'] < 1) { ?>
			<script>window.alert('Buku Tidak Tersedia, pilih buku lain untuk dipinjam');
					window.location.href='<?=base_url('transaksi/add') ?>';
			</script>
		<?php 
	} else{

		$data = [
				'id_anggota'		=> $this->input->post('peminjam'),
				'id_buku'			=> $this->input->post('buku'),
				'invoice'			=> $this->input->post('no_transaksi'),
				'peminjam'			=> $peminjam['nama_lengkap'],
				'barcode_buku'		=> $buku['seri_buku'],
				'judul_buku'		=> $buku['judul_buku'],
				'penulis'			=> $buku['penulis'],
				'penerbit'			=> $buku['penerbit'],
				'jumlah'			=> $this->input->post('qty'),
				'jumlah_default'	=> $buku['jumlah'],
				'dipinjam'			=> $buku['dipinjam']
			];

			$checktransaksi = $this->m_transaksi->checktransaksi($data['id_anggota'],$data['id_buku']);
			$checkbook = $this->m_transaksi->checkbook($data['barcode_buku']);
			$countperanggota = $this->m_transaksi->countperanggota($data['id_anggota']);

			if ($countperanggota > 2) { ?>
				<script>window.alert('Anda telah mencapai batas peminjaman maksimal(3 Buku), Kembalikan beberapa buku terlebih dahulu');
						window.location.href='<?=base_url('transaksi/add') ?>';
				</script>
			<?php }else{
				if ($checktransaksi > 0) { ?>
					<script>window.alert('Anda masih meminjam buku ini, silahkan kembalikan terlebih dahulu');
							window.location.href='<?=base_url('transaksi/add') ?>';
					</script>
				<?php }else{
					if ($checkbook > 0) { ?>
						<script>window.alert('Anda sudah meminjam buku ini, silahkan pilih buku berbeda');
								window.location.href='<?=base_url('transaksi/add') ?>';
						</script>
					<?php 
					} else{
						$max_chart = $this->m_transaksi->count_chart($this->input->post('no_transaksi'));

						if ($max_chart > 2) {
							?>
							<script>window.alert('anda sudah meminjam buku sesuai batas maksimal (3)');
									window.location.href='<?=base_url('transaksi/add') ?>';
							</script>
						<?php
						}else{	
							$this->db->insert('chart_book', $data);
							redirect('transaksi/add');
						}
					}
				}
			}
		}
	}

	public function remove_book($id)
	{
		if ($this->db->delete('chart_book', ['id_chart' => $id]) == TRUE) {
			redirect('transaksi/add');
		}
	}

	public function remove_chart($invoice)
	{
		if ($this->db->delete('chart_book', ['invoice' => $invoice]) == TRUE) {
			redirect('transaksi/add');
		}
	}

	public function checkout($invoice)
	{
		if ($this->m_transaksi->count_chart($invoice) > 1) {
			$checkout = $this->db->get_where('chart_book', ['invoice' => $invoice])->result_array();

		    $result = array();
			foreach ($checkout as $key) {
				$result[] = array( 				
					'id_anggota' => $key['id_anggota'],
					'id_buku'	=> $key['id_buku'],
					'qty'		=> $key['jumlah'],
					'no_transaksi'	=> $key['invoice'],
					'tanggal_pinjam'	=> date('Y-m-d'),
					'tanggal_kembali'	=> date('Y-m-d',strtotime("+7 day", strtotime(date('Y-m-d')))),
					'dikembalikan'	=> '0000-00-00',
					'denda'		=> '0',
					'status'	=> 'Dipinjam'
				);
			}

			$buku = $this->db->get_where('buku',['id_buku' => $key['id_buku']])->result_array();

			$result_buku = array();
			foreach($checkout as $val){
			 $result_buku[] = array(
			  "id_buku" => $val['id_buku'],
			  "jumlah"  => $val['jumlah_default'] - 1,
			  "dipinjam" => $val['dipinjam'] + 1
			 );
			}

	    	if ($this->db->update_batch('buku', $result_buku, 'id_buku')==TRUE) {
			    if ($this->db->insert_batch('transaksi', $result)==TRUE) {
			    	if ($this->db->delete('chart_book', ['invoice' => $invoice]) == TRUE) {
				    	if ($this->m_transaksi->counttransaksi() < 1) {
							$data = [
								'tanggal'	=> date('Y-m-d'),
								'jumlah'	=> 1
							];
							if ($this->db->insert('count_transaksi', $data) == TRUE) {
								$this->generate_barcode($invoice);
							}
						}elseif ($this->m_transaksi->counttransaksi() > 0) {
							$data = $this->db->get_where('count_transaksi',['tanggal' => date('Y-m-d')])->row_array();
							$counter = $data['jumlah'] + 1;
							$this->db->set('jumlah', $counter);
							$this->db->where('tanggal', date('Y-m-d'));
							$this->db->update('count_transaksi');
							$this->generate_barcode($invoice);
						} 
				    }
		    	}
	    	}
		}elseif ($this->m_transaksi->count_chart($invoice) < 2) {
			$checkout = $this->db->get_where('chart_book', ['invoice' => $invoice])->row_array();

		 //    $result = array();
			// foreach ($checkout as $key) {
				$result = [
					'id_anggota' => $checkout['id_anggota'],
					'id_buku'	=> $checkout['id_buku'],
					'qty'		=> $checkout['jumlah'],
					'no_transaksi'	=> $checkout['invoice'],
					'tanggal_pinjam'	=> date('Y-m-d'),
					'tanggal_kembali'	=> date('Y-m-d',strtotime("+7 day", strtotime(date('Y-m-d')))),
					'dikembalikan'	=> '0000-00-00',
					'denda'		=> '0',
					'status'	=> 'Dipinjam'
				];
			// }

			$buku = $this->db->get_where('buku',['id_buku' => $checkout['id_buku']])->row_array();

			// $result_buku = array();
			// foreach($checkout as $val){
			 $result_buku = [
			  "id_buku" => $checkout['id_buku'],
			  "jumlah"  => $checkout['jumlah_default'] - 1,
			  "dipinjam" => $checkout['dipinjam'] + 1
			 ];
			// }

	    	if ($this->m_transaksi->update_buku($result_buku)==TRUE) {
			    if ($this->db->insert('transaksi', $result)==TRUE) {
			    	if ($this->db->delete('chart_book', ['invoice' => $invoice]) == TRUE) {
				    	if ($this->m_transaksi->counttransaksi() < 1) {
							$data = [
								'tanggal'	=> date('Y-m-d'),
								'jumlah'	=> 1
							];
							if ($this->db->insert('count_transaksi', $data) == TRUE) {
								$this->generate_barcode($invoice);
							}
						}elseif ($this->m_transaksi->counttransaksi() > 0) {
							$data = $this->db->get_where('count_transaksi',['tanggal' => date('Y-m-d')])->row_array();
							$counter = $data['jumlah'] + 1;
							$this->db->set('jumlah', $counter);
							$this->db->where('tanggal', date('Y-m-d'));
							$this->db->update('count_transaksi');
							$this->generate_barcode($invoice);
						} 
				    }
		    	}
	    	}
		}
	}

	private function generate_barcode($invoice)
	{
		$data = $this->db->get_where('transaksi', ['no_transaksi' => $invoice])->row_array();
		$this->zend->load('Zend/Barcode');
		Zend_Barcode::render('code128', 'image', array('text' => $invoice));
		redirect('transaksi/cetak_peminjaman/'.$invoice);
	}

	public function show_barcode($value)
	{
		// $data = $this->db->get_where('anggota', ['id_siswa' => $id])->row_array();
		$this->zend->load('Zend/Barcode');
		Zend_Barcode::render('code128', 'image', array('text' => $value, 'barHeight' => 100, 'barThinWidth' => 2, 'withBorder' => TRUE));
	}

	public function cetak_peminjaman($invoice)
	{
		$data['title'] = 'Cetak Kartu';
		$data['user'] = $this->db->query("SELECT * FROM transaksi INNER JOIN anggota ON anggota.id_siswa=transaksi.id_anggota INNER JOIN buku ON buku.id_buku=transaksi.id_buku WHERE no_transaksi='$invoice'")->row_array();
		$data['count'] = $this->m_transaksi->countperinvoice($invoice);
		$data['pinjam'] = $this->db->query("SELECT * FROM transaksi INNER JOIN anggota ON anggota.id_siswa=transaksi.id_anggota INNER JOIN buku ON buku.id_buku=transaksi.id_buku WHERE no_transaksi='$invoice'")->result_array();
		$this->load->view('load_view/header', $data);
		$this->load->view('load_view/aside', $data);
		$this->load->view('peminjaman/cetak', $data);
		$this->load->view('load_view/footer');
	}

	public function data_pengembalian()
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
		$data['title'] = 'Pengembalian';
		$data['list'] = $this->m_transaksi->listkembali();
		$this->load->view('load_view/header', $data);
		$this->load->view('load_view/aside');
		$this->load->view('pengembalian/data', $data);
		$this->load->view('load_view/footer');
	}

	public function kembalikan_semua($invoice, $denda)
	{
		$row = $this->db->get_where('transaksi', ['no_transaksi' => $invoice])->result_array();
		$kembalikan = array();
			foreach($row as $val){
			 $kembalikan[] = array(
			  "no_transaksi" => $val['no_transaksi'],
			  "dikembalikan"  => date('Y-m-d'),
			  "denda" => $denda,
			  "status"	=> 'Dikembalikan'
			 );
			}
			if ($this->db->update_batch('transaksi', $kembalikan, 'no_transaksi')==TRUE) {
				$data = $this->db->get_where('transaksi', ['no_transaksi' => $invoice])->result_array();
				$buku = array();
					foreach($data as $val){
					$data_buku = $this->db->get_where('buku', ['id_buku' => $val['id_buku']])->row_array();
					 $buku[] = array(
					 "id_buku" => $val['id_buku'],
					 "jumlah"  => $data_buku['jumlah'] + $val['qty'],
					 "dipinjam" => $data_buku['dipinjam'] - $val['qty']
					);
					}
					if ($this->db->update_batch('buku', $buku, 'id_buku')==TRUE){ ?>
					<script>window.alert('Pengembalian Berhasil');
					window.location.href="<?=base_url('transaksi/data_pengembalian') ?>"</script>
				<?php }
			}
	}

	public function kembalikan($id, $denda)
	{
		$kembalikan = array();
			$kembalikan[] = array(
			 "id_transaksi" => $id,
			 "dikembalikan"  => date('Y-m-d'),
			 "denda" => $denda,
			 "status"	=> 'Dikembalikan'
			);

			if ($this->db->update_batch('transaksi', $kembalikan, 'id_transaksi')==TRUE) {
				$data = $this->db->get_where('transaksi', ['id_transaksi' => $id])->row_array();
				$id_buku = $data['id_buku'];
				$data_buku = $this->db->get_where('buku', ['id_buku' => $id_buku])->row_array();
				$buku = array();
					$buku[] = array(
					 "id_buku" => $id_buku,
					 "jumlah"  => $data_buku['jumlah'] + $data['qty'],
					 "dipinjam" => $data_buku['dipinjam'] - $data['qty']
					);
				if ($this->db->update_batch('buku', $buku, 'id_buku')==TRUE){ ?>
					<script>window.alert('Pengembalian Satu Buku Berhasil');
					window.location.href="<?=base_url('transaksi/pengembalian') ?>"</script>
				<?php }
			}
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */