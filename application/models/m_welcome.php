<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_welcome extends CI_Model {

	public function rak()
	{
		return $this->db->count_all('rak');
	}

	public function buku()
	{
		return $this->db->get('buku')->result_array();
	}

	public function anggota()
	{
		return $this->db->count_all('anggota');
	}

	public function countpinjam()
	{
		$date = date('Y-m-d');
		$query = $this->db->query("SELECT * FROM transaksi WHERE status='Dipinjam' AND tanggal_pinjam='$date'");
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function countkembali()
	{
		$date = date('Y-m-d');
		$query = $this->db->query("SELECT * FROM transaksi WHERE status='Dikembalikan' AND dikembalikan='$date'");
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function chartkunjungan()
	{
		$date = date('Y-m-d');
		$bfrnow = strtotime("-6 day", strtotime($date));
		$fixdate = date('Y-m-d', $bfrnow);
		return $this->db->query("SELECT * FROM count_kunjungan WHERE tanggal BETWEEN '$fixdate' AND '$date' ORDER BY tanggal ASC LIMIT 7")->result_array();
	}

	public function countpria()
	{
		$query = $this->db->query("SELECT * FROM anggota WHERE jk='Laki-laki' OR jk='L'");
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function countwanita()
	{
		$query = $this->db->query("SELECT * FROM anggota WHERE jk='Perempuan' OR jk='P'");
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function chart_tr()
	{
		$date = date('Y-m-d');
		$bfrnow = strtotime("-6 day", strtotime($date));
		$fixdate = date('Y-m-d', $bfrnow);
		return $this->db->query("SELECT * FROM count_transaksi WHERE tanggal BETWEEN '$fixdate' AND '$date' ORDER BY tanggal ASC LIMIT 7")->result_array();
	}

	public function countbuku()
	{
		$query = $this->db->get('buku');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function chart_buku()
	{
		$query = $this->db->get('buku');
	    if($query->num_rows()>0)
	    {
	    	$limit = $query->num_rows();
	    	if ($limit<'10') {
	    		return $this->db->query("SELECT * FROM buku ORDER BY dipinjam DESC LIMIT $limit")->result_array();
	    	}else{
				return $this->db->query("SELECT * FROM buku ORDER BY dipinjam DESC LIMIT 10")->result_array();
	    	}
	    }
	    else
	    {
	    	return 0;
	    }
	}

	public function countkunjungan()
	{
		$query = $this->db->get_where('count_kunjungan', ['tanggal' => date('Y-m-d')]);
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function checkperanak($id)
	{
		$query = $this->db->get_where('kunjungan', ['id_anggota' => $id]);
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function bukudipinjam()
	{
		$id = $this->session->userdata('id_level');
		$query = $this->db->query("SELECT * FROM transaksi WHERE id_anggota='$id' AND status='Dipinjam'");
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function bukudikembalikan()
	{
		$id = $this->session->userdata('id_level');
		$query = $this->db->query("SELECT * FROM transaksi WHERE id_anggota='$id' AND status='Dikembalikan'");
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function borrowtoday()
	{
		$date=date('Y-m-d');
		$query = $this->db->query("SELECT * FROM transaksi WHERE tanggal_pinjam='$date' AND status='Dipinjam'");
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function resultborrowtoday()
	{
		$date=date('Y-m-d');
		$query = $this->db->query("SELECT * FROM transaksi WHERE tanggal_pinjam='$date' AND status='Dipinjam'");
	    if($query->num_rows()>0)
	    {
	      return $query->result_array();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function countmustbacknow()
	{
		$date=date('Y-m-d');
		$query = $this->db->query("SELECT * FROM transaksi WHERE tanggal_kembali='$date' AND status='Dipinjam'");
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function countusernonactive()
	{
		
		$query = $this->db->query("SELECT * FROM anggota WHERE activated='0'");
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function resultusernonactive()
	{
		
		$query = $this->db->query("SELECT * FROM anggota WHERE activated='0'");
	    if($query->num_rows()>0)
	    {
	      return $query->result_array();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function resultmustbacknow()
	{
		$date=date('Y-m-d');
		$query = $this->db->query("SELECT * FROM transaksi WHERE tanggal_kembali='$date' AND status='Dipinjam'");
	    if($query->num_rows()>0)
	    {
	      return $query->result_array();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function countmustbacknow2()
	{
		$date=date('Y-m-d');
		$id=$this->session->userdata('id_level');
		$query = $this->db->query("SELECT * FROM transaksi WHERE tanggal_kembali='$date' AND status='Dipinjam' AND id_anggota='$id'");
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function resultmustbacknow2()
	{
		$date=date('Y-m-d');
		$id=$this->session->userdata('id_level');
		$query = $this->db->query("SELECT * FROM transaksi WHERE tanggal_kembali='$date' AND status='Dipinjam' AND id_anggota='$id'");
	    if($query->num_rows()>0)
	    {
	      return $query->result_array();
	    }
	    else
	    {
	      return 0;
	    }
	}
}

/* End of file m_welcome.php */
/* Location: ./application/models/m_welcome.php */