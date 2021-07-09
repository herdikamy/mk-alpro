        <!-- <section class="content"> -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header text-center">
                  <h3 class="box-title">Bukti Peminjaman</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <!-- <div class="table table-responsive"> -->
                    <table class="table table-borederd">
                      <tr>
                        <td>
                          <!-- <div class="card mb-3"> -->
                            <div class="row">
                              <div class="col-lg-3 col-xs-4">
                                <div class="card-body">
                                  <img src="<?php
                                  if ($user['jk'] == 'Laki-laki' OR $user['jk'] == 'L') {
                                    echo base_url('assets/dist/img/avatar5.png');
                                  }else{
                                    echo base_url('assets/dist/img/avatar2.png');
                                  }
                                  ?>" alt="...">
                                  <?php if ($count < 2 ) { ?>
                                  <?php }elseif ($count > 1) { ?>
                                    <p class="card-text" style="margin-top: 24px;">Tanggal Pinjam : <?=longdate_indo(date('Y-m-d')) ?></p>
                                  <?php } ?>
                                </div>
                              </div>
                              <div class="col-lg-3 col-xs-4">
                                <div class="card-body">
                                  <p class="card-text">NIS/NISN : <?=$user['nis'] ?></p>
                                  <p class="card-text">Nama     : <?=$user['nama_lengkap'] ?></p>
                                  <?php
                                  $siswa = $this->db->get_where('anggota',['id_siswa' => $user['id_anggota']])->row_array();
                                  $kelas = $this->db->get_where('kelas',['id_kelas' => $siswa['id_kelas']])->row_array();
                                  ?>
                                  <p class="card-text">Kelas     : <?=$kelas['nama_kelas'] ?></p>
                                  <p class="card-text">Jenis Kelamin    : <?=$user['jk'] ?></p>
                                  <?php if ($count < 2 ) { ?>
                                    <p class="card-text">Buku    : <?=$user['seri_buku'].' - '.$user['judul_buku'] ?></p>
                                  <?php }elseif ($count > 1) { ?>
                                    <table border="1">
                                      <thead>
                                        <tr>
                                          <th <?php if ($count > 1 ) { ?>colspan="2"<?php } ?> class="text-center">Buku</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <?php foreach ($pinjam as $data) { ?>
                                            <td><?=$data['judul_buku'] ?></td>
                                          <?php } ?>
                                        </tr>
                                      </tbody>
                                    </table>
                                  <?php } ?>
                                  <?php
                                  $tgl_kembali = strtotime("+7 day", strtotime(date('Y-m-d')));
                                  ?>
                                  <?php if ($count < 2 ) { ?>
                                    <p class="card-text">Tanggal Pinjam : <?=longdate_indo(date('Y-m-d')) ?></p>
                                  <?php }elseif ($count > 1) { ?>
                                  <?php } ?>
                                  <p class="card-text">Wajib Dikembalikan : <?=longdate_indo(date('Y-m-d', $tgl_kembali)) ?></p>
                                </div>
                              </div>
                              <div class="col-lg-3 col-xs-4">
                                <div class="card-body" style="margin-top:60px;">
                                  <?php $kode = $user['no_transaksi']; ?>
                                  <img src="<?=site_url('transaksi/show_barcode/'.$kode) ?>" alt="">
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
              <i class="fa fa-scissors"> </i> Cut Here<div style="border-bottom:3px dotted #000000;"></div>
            </div>
          </div>