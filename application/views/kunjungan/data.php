<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Master
            <small>Rak</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Data master</a></li>
            <li class="active">Rak Buku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Rak Buku</h3>
                  <div class="pull-right">
                    <a href="<?=base_url('kunjungan') ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah Data</a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIS/NISN</th>
                          <th>Nama Siswa</th>
                          <th>Kelas</th>
                          <th>Tanggal Kunjungan</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $no=1;
                      foreach ($list as $l) { ?>
                        <tr>
                          <td width="10px"><?=$no++ ?></td>
                          <td><?=$l['nis'] ?></td>
                          <td><?=$l['nama_lengkap'] ?></td>
                          <td><?php $data = $this->db->get_where('kelas', ['id_kelas' => $l['id_kelas']])->row_array(); 
                          echo $data['nama_kelas'];
                          ?></td>
                          <td><?=$l['tgl_kunjungan'] ?></td>
                        </tr>
                      <?php 
                      }
                      ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>NIS/NISN</th>
                          <th>Nama Siswa</th>
                          <th>Kelas</th>
                          <th>Tanggal Kunjungan</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->