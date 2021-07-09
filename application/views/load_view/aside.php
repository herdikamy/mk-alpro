<?php if ($this->uri->segment(2)=='print_card' OR $this->uri->segment(2)=='cetak_peminjaman') {
  
}else{ ?>
<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php if ($this->session->userdata('level')=='Administrator') {
                    echo base_url('assets/')."dist/img/user2-160x160.jpg";
                  }else{
                    $session = $this->session->userdata('id_level');
                    $data = $this->db->get('anggota', ['id_siswa' => $session])->row_array();
                    if ($data['jk'] == 'Laki-laki' || $data['jk'] == 'L' || $data['jk'] == 'l') {
                      echo base_url('assets/')."dist/img/avatar5.png";
                    }elseif($data['jk'] == 'Perempuan' || $data['jk'] == 'P' || $data['jk'] == 'p'){
                      echo base_url('assets/')."dist/img/avatar2.png";
                    }
                  }
                  ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?=$this->session->userdata('nama_lengkap'); ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if ($this->uri->segment(1)=='' OR $this->uri->segment(1) == 'welcome') {
              echo "active";
            } ?> treeview">
              <a href="<?=base_url() ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <?php
            if ($this->session->userdata('level') == 'Administrator') {
              ?>
            <li class="header">DATA MASTER</li>
            <li class="<?php if ($this->uri->segment(1)=='rak') {
              echo "active";
            } ?>"><a href="<?=base_url('rak') ?>"><i class="fa fa-reorder"></i> <span>RAK</span></a></li>
            <li class="<?php if ($this->uri->segment(1)=='buku') {
              echo "active";
            } ?>"><a href="<?=base_url('buku') ?>"><i class="fa fa-book"></i> <span>BUKU</span></a></li>
            <li class="<?php if ($this->uri->segment(1)=='anggota') {
              echo "active";
            } ?>"><a href="<?=base_url('anggota') ?>"><i class="fa fa-users"></i> <span>ANGGOTA</span></a></li>
            <li class="<?php if ($this->uri->segment(1)=='kunjungan') {
              echo "active";
            } ?>"><a href="<?=base_url('kunjungan') ?>"><i class="fa fa-sign-in"></i> <span>KUNJUNGAN</span></a></li>
            <li class="header">TRANSAKSI</li>
            <li class="<?php if ($this->uri->segment(2)=='peminjaman' || $this->uri->segment(1)=='transaksi' && $this->uri->segment(2)=='add') {
              echo "active";
            } ?>"><a href="<?=base_url('transaksi/peminjaman') ?>"><i class="fa fa-upload"></i> <span>PEMINJAMAN</span></a></li>
            <li class="<?php if ($this->uri->segment(2)=='pengembalian' || $this->uri->segment(2)=='data_pengembalian') {
              echo "active";
            } ?>"><a href="<?=base_url('transaksi/pengembalian') ?>"><i class="fa fa-download"></i> <span>PENGEMBALIAN</span></a></li>

            <?php
            }else{ ?>
            <li class="<?php if ($this->uri->segment(2)=='buku') {
              echo "active";
            } ?>"><a href="<?=base_url('siswa/buku') ?>"><i class="fa fa-book"></i> <span>BUKU</span></a></li>
            <li class="<?php if ($this->uri->segment(2)=='history') {
              echo "active";
            } ?>"><a href="<?=base_url('siswa/history') ?>"><i class="fa fa-list"></i> <span>HISTORY</span></a></li>
            <?php
            }
            ?>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
<?php } ?>