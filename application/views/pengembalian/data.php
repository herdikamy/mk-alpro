<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Master
            <small>Pengembalian</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Data master</a></li>
            <li class="active">Pengembalian Buku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pengembalian Buku</h3>
                  <div class="pull-right">
                    <a href="<?=base_url('transaksi/pengembalian') ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah Data</a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table table-responsive">
                    <table id="example2" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>No Transaksi</th>
                          <th>Nama Peminjam</th>
                          <th>Buku</th>
                          <th>Quantity</th>
                          <th>Tanggal Pinjam</th>
                          <th>Wajib Kembali</th>
                          <th>Dikembalikan</th>
                          <th>Denda</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $no=1;
                      foreach ($list as $l) { ?>
                        <tr>
                          <td width="10px"><?=$no++ ?></td>
                          <td><?=$l['no_transaksi'] ?></td>
                          <td><?=$l['nama_lengkap'] ?></td>
                          <td><?=$l['judul_buku'] ?></td>
                          <td><?=$l['qty'] ?></td>
                          <td><?=$l['tanggal_pinjam'] ?></td>
                          <td><?=$l['tanggal_kembali'] ?></td>
                          <td><?=$l['dikembalikan'] ?></td>
                          <td><?=$l['denda'] ?></td>
                        </tr>
                      <?php 
                      }
                      ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>No Transaksi</th>
                          <th>Nama Peminjam</th>
                          <th>Buku</th>
                          <th>Quantity</th>
                          <th>Tgl Pinjam</th>
                          <th>Wajib Kembali</th>
                          <th>Dikembalikan</th>
                          <th>Denda</th>
                        </tr>
                      </tfoot>
                    </table>
                </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->