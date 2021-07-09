<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function listpeminjaman()
	{
		return $this->db->query("SELECT * FROM transaksi INNER JOIN anggota ON anggota.id_siswa=transaksi.id_anggota INNER JOIN buku ON buku.id_buku=transaksi.id_buku WHERE status='Dipinjam' OR status LIKE '%Dipinjam%'")->result_array();
	}

	public function listpersiswa()
	{
		$id = $this->session->userdata('id_level');
		return $this->db->query("SELECT * FROM transaksi INNER JOIN anggota ON anggota.id_siswa=transaksi.id_anggota INNER JOIN buku ON buku.id_buku=transaksi.id_buku WHERE id_anggota='$id'")->result_array();
	}

	public function update_buku($result_buku)
	{
		$this->db->set('jumlah', $result_buku['jumlah']);
		$this->db->set('dipinjam', $result_buku['dipinjam']);
		$this->db->where('id_buku', $result_buku['id_buku']);
		return $this->db->update('buku');
	}

	public function listchart($invoice)
	{
		return $this->db->get_where('chart_book', ['invoice' => $invoice])->result_array();
	}

	public function checktransaksi($anggota, $buku)
	{
		$query = $this->db->query("SELECT * FROM transaksi WHERE id_anggota='$anggota' AND id_buku='$buku' AND status='Dipinjam'");
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function countperanggota($anggota)
	{
		$query = $this->db->query("SELECT * FROM transaksi WHERE id_anggota='$anggota' AND status='Dipinjam'");
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function checkbook($barcode)
	{
		$query = $this->db->get_where('chart_book', ['barcode_buku' => $barcode]);
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function count_chart($invoice)
	{
		$query = $this->db->get_where('chart_book', ['invoice' => $invoice]);
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function counttransaksi()
	{
		$query = $this->db->get_where('count_transaksi', ['tanggal' => date('Y-m-d')]);
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function listkembali()
	{
		return $this->db->query("SELECT * FROM transaksi INNER JOIN anggota ON anggota.id_siswa=transaksi.id_anggota INNER JOIN buku ON buku.id_buku=transaksi.id_buku WHERE status='Dikembalikan' OR status LIKE '%Dikembalikan%'")->result_array();
	}

	public function countperinvoice($invoice)
	{
		$query = $this->db->get_where('transaksi', ['no_transaksi' => $invoice]);
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

}

/* End of file M_transaksi.php */
/* Location: ./application/models/M_transaksi.php */