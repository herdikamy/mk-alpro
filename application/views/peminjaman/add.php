<?php
    // $data = '1234567890';
    // $string = 'PJM-';

    // for ($i=0; $i < 10; $i++) { 
    //   $pjm = rand(0, strlen($data)-1);
    //   $string .= $data{$pjm};
    // }
    
    $today  = date("ymd");
    $query  = $this->db->query("SELECT max(no_transaksi) AS last FROM transaksi WHERE no_transaksi LIKE '%$today%'")->row_array();
    $data   = $query;
    $lastNoPjm  = $data['last'];
    $lastNoUrut   = substr($lastNoPjm, 10, 8);
    $nextNoUrut   = $lastNoUrut + 1;
    $nextNoPjm  = 'PJM-'.$today.sprintf('%04s', $nextNoUrut);

?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form
            <small>Peminjaman Buku</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?=base_url('rak') ?>">Peminjaman Buku</a></li>
            <li class="active">add</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <?=form_open('transaksi/add'); ?>
          <div class="row">
            <div class="col-lg-4">
              <div class="box box-widget">
                <div class="box-body">
                  <table width="100%">
                    <tr>
                      <td style="vertical-align: top;">
                        <label for="date">Date</label>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="date" name="tgl_pjm" id="pjm" readonly value="<?=date('Y-m-d') ?>" class="form-control">
                          <?= form_error('tgl_pjm','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align: top;">
                        <label for="user">Pustakawan</label>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="text" name="user" id="user" value="<?=$this->session->userdata('nama_lengkap'); ?>" class="form-control" readonly>
                          <?= form_error('tgl_pjm','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align: top;">
                        <label for="peminjam">Peminjam</label>
                      </td>
                      <td>
                        <div class="form-group">
                          <select name="peminjam" class="form-control select2" style="width: 100%;">
                            <option>-- Pilih --</option>
                            <?php foreach ($anggota as $a) { ?>
                              <option value="<?=$a['id_siswa'] ?>"><?=$a['nis'] ?> - <?=$a['nama_lengkap'] ?></option>
                            <?php } ?>
                          </select>
                          <?= form_error('peminjam','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="box box-widget">
                <div class="box-body">
                  <table width="100%">
                    <tr>
                      <td style="vertical-align: top; width: 30%">
                        <label for="date">Buku</label>
                      </td>
                      <td>
                        <div class="form-group input-group">
                          <select name="buku" class="form-control select2" style="width: 100%;">
                            <option>-- Temukan Buku --</option>
                            <?php foreach ($buku as $b) { ?>
                              <option value="<?=$b['id_buku'] ?>"><?=$b['seri_buku'] ?> - <?=$b['judul_buku'] ?></option>
                            <?php } ?>
                          </select>
                          <?= form_error('buku','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align: top;">
                        <label for="user">Qty</label>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="number" name="qty" id="qty" readonly value="1" min="1" class="form-control">
                          <?= form_error('qty','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        <div>
                          <button type="submit" name="add_brw" id="add_brw" class="btn btn-primary">
                            <i class="fa fa-cart-plus"></i> Add
                          </button>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="box box-widget">
                <div class="box-body">
                  <div align="right">
                    <h4>Invoice Peminjaman <b><span id="invoice" name="invoice"><?=$nextNoPjm ?></span></b></h4>
                    <input type="hidden" name="no_transaksi" value="<?=$nextNoPjm ?>">
                    <?= form_error('no_transaksi','<small class="text-danger pl-3">', '</small>'); ?>
                    <?php 
                    $tgl_kembali = strtotime("+7 day", strtotime(date('Y-m-d')));
                    ?>
                    <h2><b><span id="tgl_kembali"><input type="date" id="tgl-kbl" name="tgl_kbl" value="<?=date('Y-m-d', $tgl_kembali)  ?>" readonly></span></b></h2>
                    <?= form_error('tgl_kbl','<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- /.row -->
          <?=form_close(); ?>

          <div class="row">
            <div class="col-lg-12">
              <div class="box box-widget">
                <div class="box-body table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Peminjam</th>
                        <th>Barcode</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Jumlah</th>
                        <th><i class="fa fa-gears"></i></th>
                      </tr>
                    </thead>
                    <?php if ($count_chart > 0) { ?>
                    <tbody>
                    <?php $no=1; 
                    foreach ($chart as $d) { ?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <th><?=$d['peminjam'] ?></th>
                        <td><?=$d['barcode_buku'] ?></td>
                        <td><?=$d['judul_buku'] ?></td>
                        <td><?=$d['penulis'] ?></td>
                        <td><?=$d['penerbit'] ?></td>
                        <td><?=$d['jumlah'] ?></td>
                        <td><a href="<?=base_url('transaksi/remove_book/').$d['id_chart'] ?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                    <?php }else{ ?>
                    <tbody>
                      <tr>
                        <td colspan="9" class="text-center">Tidak ada buku yang dipilih</td>
                      </tr>
                    </tbody>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-3">
              <div class="pull-right">
                
              </div>
            </div>

            <div class="col-lg-3">
              <div class="pull-right">
                
              </div>
            </div>

            <div class="col-lg-3">
              <div class="pull-right">
                
              </div>
            </div>

            <div class="col-lg-3">
              <div>
                <?php if ($count_chart > 0) { ?>  
                  <a href="<?=base_url('transaksi/remove_chart/').$nextNoPjm ?>" id="cancel_borrow" class="btn btn-flat btn-warning">
                    <i class="fa fa-refresh"></i> CANCEL
                  </a><br><br>
                  <a href="<?=base_url('transaksi/checkout/').$nextNoPjm ?>" id="process_borrow" class="btn btn-flat btn-lg btn-success">
                    <i class="fa fa-paper-plane-o"></i> Process Borrow
                  </a>
                <?php } ?>
              </div>
            </div>
          </div>