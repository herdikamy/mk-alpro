<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Master
            <small>Peminjaman</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Data master</a></li>
            <li class="active">Peminjaman Buku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Peminjaman Buku</h3>
                  <div class="pull-right">
                    <?php
                    if ($this->session->userdata('level')=='Administrator') { ?>
                      <a href="<?=base_url('transaksi/add') ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah Data</a>
                    <?php }else{

                    }
                    ?>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>No Transaksi</th>
                          <?php
                          if ($this->session->userdata('level')=='Administrator') { ?>
                            <th>Nama Peminjam</th>
                          <?php }
                          ?>
                          <th>Buku</th>
                          <th>Quantity</th>
                          <th>Tgl Pinjam</th>
                          <th>Tgl Kembali</th>
                          <?php
                          if ($this->session->userdata('level')=='Anggota') { ?>
                            <th>Status</th>
                          <?php }
                          ?>
                          <?php
                          if ($this->session->userdata('level')=='Anggota') { ?>
                            <th>Tanggal Pengembalian</th>
                          <?php }
                          ?>
                          <?php
                          if ($this->session->userdata('level')=='Anggota') { ?>
                            <th>Denda</th>
                          <?php }
                          ?>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $no=1;
                      foreach ($list as $l) { ?>
                        <tr>
                          <td width="10px"><?=$no++ ?></td>
                          <td><?=$l['no_transaksi'] ?></td>
                          <?php
                          if ($this->session->userdata('level')=='Administrator') { ?>
                          <td><?=$l['nama_lengkap'] ?></td>
                          <?php }
                          ?>
                          <td><?=$l['judul_buku'] ?></td>
                          <td><?=$l['qty'] ?></td>
                          <td><?=$l['tanggal_pinjam'] ?></td>
                          <td><?=$l['tanggal_kembali'] ?></td>
                          <?php
                          if ($this->session->userdata('level')=='Anggota') { ?>
                          <td><?=$l['status'] ?></td>
                          <?php }
                          ?>
                          <?php
                          if ($this->session->userdata('level')=='Anggota') {
                            if ($l['dikembalikan'] == '0000-00-00') { ?>
                              <td>-</td>
                            <?php }else{ ?>
                              <td><?=$l['dikembalikan'] ?></td>
                            <?php }
                          }
                          ?>
                          <?php
                          if ($this->session->userdata('level')=='Anggota') {
                            if ($l['denda'] == '0') { ?>
                              <td>-</td>
                            <?php }else{ ?>
                              <td><?=$l['denda'] ?></td>
                            <?php }
                          }
                          ?>
                        </tr>
                      <?php 
                      }
                      ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>No Transaksi</th>
                          <?php
                          if ($this->session->userdata('level')=='Administrator') { ?>
                            <th>Nama Peminjam</th>
                          <?php }
                          ?>
                          <th>Buku</th>
                          <th>Quantity</th>
                          <th>Tgl Pinjam</th>
                          <th>Tgl Kembali</th>
                          <?php
                          if ($this->session->userdata('level')=='Anggota') { ?>
                            <th>Status</th>
                          <?php }
                          ?>
                          <?php
                          if ($this->session->userdata('level')=='Anggota') { ?>
                            <th>Tanggal Pengembalian</th>
                          <?php }
                          ?>
                          <?php
                          if ($this->session->userdata('level')=='Anggota') { ?>
                            <th>Denda</th>
                          <?php }
                          ?>
                        </tr>
                      </tfoot>
                    </table>
                </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->