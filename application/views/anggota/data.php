<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Master
            <small>Anggota</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Data master</a></li>
            <li class="active">Angota</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Anggota</h3>
                  <div class="pull-right">
                  	<a href="<?=base_url('anggota/add') ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah Data</a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIS/NISN</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th><i class="fa fa-gear"></i></th>
                      </tr>
                    </thead>
                    <?php
                    $no=1;
                    foreach ($list as $l) { ?>
                    <tbody>
                      <tr>
                        <td width="10px"><?=$no++ ?></td>
                        <td><?=$l['nis'] ?></td>
                        <td><?=$l['nama_lengkap'] ?></td>
                        <td><?=$l['email'] ?></td>
                        <?php
                        if ($l['activated'] == '0') { ?>
                          <td width="50px"><a onclick="return confirm('Aktivasi User?')" class="btn btn-info btn-xs" href="<?=base_url('anggota/act/').$l['id_siswa'] ?>"><i class="fa fa-unlock"></i></a></td>
                        <?php
                        }else { ?>
                          <td width="50px"><a class="btn btn-warning btn-xs" href="<?=base_url('anggota/edit/').$l['id_siswa'] ?>"><i class="fa fa-pencil"></i></a> <a onclick="return confirm('ingin menghapus data?')" class="btn btn-danger btn-xs" href="<?=base_url('anggota/del/').$l['id_siswa'] ?>"><i class="fa fa-trash"></i></a></td>
                        <?php
                        }
                        ?>
                      </tr>
                    </tbody>
                    <?php 
                    }
                    ?>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>NIS/NISN</th>
                        <th>Nama</th>
                        <th>email</th>
                        <th><i class="fa fa-gear"></i></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->