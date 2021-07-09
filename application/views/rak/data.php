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
                  	<a href="<?=base_url('rak/add') ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah Data</a>
                    <a href="<?=base_url('rak/import') ?>" class="btn btn-success btn-xs"><i class="fa fa-upload"></i> Import Data</a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Seri rak</th>
                          <th>Nama Rak</th>
                          <th>Kapasitas</th>
                          <th><i class="fa fa-gear"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $no=1;
                      foreach ($list as $l) { ?>
                        <tr>
                          <td width="10px"><?=$no++ ?></td>
                          <td><?=$l['seri_rak'] ?></td>
                          <td><?=$l['nama_rak'] ?></td>
                          <td><?php if ($l['kapasitas'] == '0') {
                            echo 'Penuh';
                          }else {
                            echo $l['kapasitas'].' Buku';
                          } ?></td>
                          <td width="50px"><a class="btn btn-warning btn-xs" href="<?=base_url('rak/edit/').$l['id_rak'] ?>"><i class="fa fa-pencil"></i></a> <a onclick="return confirm('ingin menghapus data?')" class="btn btn-danger btn-xs" href="<?=base_url('rak/del/').$l['id_rak'] ?>"><i class="fa fa-trash"></i></a></td>
                        </tr>
                      <?php 
                      }
                      ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Seri rak</th>
                          <th>Nama Rak</th>
                          <th>Kapasitas</th>
                          <th><i class="fa fa-gear"></i></th>
                        </tr>
                      </tfoot>
                    </table>
                </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->