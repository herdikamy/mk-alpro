<!-- <div class="content-wrapper"> -->
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
          <h1>
            Data Master
            <small>Anggota</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Data master</a></li>
            <li class="active">Angota</li>
          </ol>
        </section> -->

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header text-center">
                  <h3 class="box-title">Kartu Anggota
                    <br>
                    <br>
                    Perpustakaan SMAN 1 Gadingrejo
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <!-- <div class="table table-responsive"> -->
                    <table class="table table-borederd">
                      <tr>
                        <td>
                          <!-- <div class="card mb-3"> -->
                            <div class="row">
                              <div class="col-lg-3 col-xs-4">
                                <img src="<?php
                                if ($user['jk'] == 'Laki-laki' OR $user['jk'] == 'L') {
                                  echo base_url('assets/dist/img/avatar5.png');
                                }else{
                                  echo base_url('assets/dist/img/avatar2.png');
                                }
                                ?>" alt="...">
                              </div>
                              <div class="col-lg-3 col-xs-4">
                                <div class="card-body">
                                  
                                  <br>
                                  <p class="card-text">NIS/NISN : <?=$user['nis'] ?></p>
                                  <p class="card-text">Nama     : <?=$user['nama_lengkap'] ?></p>
                                  <p class="card-text">Kelas     : <?=$user['nama_kelas'] ?></p>
                                  <p class="card-text">Email    : <?php if ($user['email'] == NULL) {
                                    echo "-";
                                  }else{
                                    echo $user['email'];
                                  } ?></p>
                                  <p class="card-text">Jenis Kelamin    : <?=$user['jk'] ?></p>
                                </div>
                              </div>
                              <div class="col-lg-3 col-xs-4">
                                <div class="card-body" style="margin-top:60px;">
                                  <?php $kode = $user['nis']; ?>
                                  <img src="<?=site_url('anggota/show_barcode/'.$kode) ?>" alt="">
                                </div>
                              </div>
                            </div>
                          <!-- </div> -->
                        </td>
                      </tr>
                    </table>
                  <!-- </div> -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="row">
            <div class="col-xs-12">
              <div style="border-bottom:3px dotted #000000;"></div>
            </div>
          </div>