<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Master
            <small>Buku</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Data master</a></li>
            <li class="active">Buku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Buku</h3>
                  <div class="pull-right">
                  	<?php
                    if ($this->session->userdata('level')=='Administrator') { ?>
                      <a href="<?=base_url('buku/add') ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah Data</a>
                      <a href="<?=base_url('buku/import') ?>" class="btn btn-success btn-xs"><i class="fa fa-upload"></i> Import Buku</a>
                    <?php
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
                        <th>Letak</th>
                        <th>Seri Buku</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Jumlah Buku</th>
                        <?php
                        if ($this->session->userdata('level')=='Administrator') { ?>
                          <th><i class="fa fa-gear"></i></th>
                        <?php
                      }else{ ?>
                        
                        <?php
                      }
                        ?>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    foreach ($list as $l) { ?>
                      <tr>
                        <td width="10px"><?=$no++ ?></td>
                        <td><?=$l['nama_rak'] ?></td>
                        <td><?=$l['seri_buku'] ?></td>
                        <td><?=$l['judul_buku'] ?></td>
                        <td><?=$l['penulis'] ?></td>
                        <td><?=$l['penerbit'] ?></td>
                        <td><?=$l['tahun_terbit'] ?></td>
                        <td><?php 
                        if ($l['jumlah'] == '0') {
                          echo "Habis Dipinjam";
                        }else{
                          echo $l['jumlah'];
                        }
                        ?>
                        </td>
                        <?php
                        if ($this->session->userdata('level')=='Administrator') { ?>
                          <td width="50px"><a class="btn btn-warning btn-xs" href="<?=base_url('buku/edit/').$l['id_buku'] ?>"><i class="fa fa-pencil"></i></a> <a onclick="return confirm('ingin menghapus data?')" class="btn btn-danger btn-xs" href="<?=base_url('buku/del/').$l['id_buku'] ?>"><i class="fa fa-trash"></i></a></td>
                        <?php
                      }else{ ?>
                        
                        <?php
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
                        <th>Letak</th>
                        <th>Seri Buku</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Jumlah Buku</th>
                        <?php
                        if ($this->session->userdata('level')=='Administrator') { ?>
                          <th><i class="fa fa-gear"></i></th>
                        <?php
                      }else{ ?>
                        
                        <?php
                      }
                        ?>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->