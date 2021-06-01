<?php
    $query  = $this->db->query("SELECT max(seri_buku) AS last FROM buku")->row_array();
    $data   = $query;
    $lastnorak  = $data['last'];
    $lastnourut   = substr($lastnorak, 4, 2);
    $nextnourut   = $lastnourut + 1;
    $nextnorak  = 'BK'.sprintf('%04s', $nextnourut);
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Master
            <small>Tambah Buku</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?=base_url('buku') ?>">Buku</a></li>
            <li class="active">add</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Tambah Buku</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4">        
                      <div class="my-4">
                          <div class="form-horizontal form-inline">
                              <a href="<?=base_url('rak')?>" class="btn btn-default btn-xs">
                                  <i class="fa fa-arrow-left"></i> Batal
                              </a>
                          </div>
                      </div>
                      <?=form_open('buku/add')?>
                      <table id="form-table" class="table text-center table-condensed">
                          <tr>
                            <td>Seri Buku<td>
                            <td><input type="text" name="seri_buku" class="form-control" value="<?=$nextnorak ?>" readonly><td>
                          </tr>
                          <tr>
                            <td>Rak Penyimpanan<td>
                            <td><select name="rak" class="form-control" autofocus>
                            <option value="">-- Pilih Rak</option>
                            <?php
                            foreach ($list_rak as $k) { ?>
                              <option value="<?=$k['id_rak']?>"><?=$k['nama_rak'] ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?= form_error('rak','<small class="text-danger pl-3">', '</small>'); ?>
                          <td>
                          </tr>
                          <tr>
                            <td>Judul Buku<td>
                            <td><input autocomplete="off" autofocus="on" type="text" name="judul_buku" class="form-control" value="<?=set_value('judul_buku') ?>"><?= form_error('judul_buku','<small class="text-danger pl-3">', '</small>'); ?><td>
                            
                          </tr>
                          <tr>
                            <td>Jumlah<td>
                            <td><input autocomplete="off" type="text" name="jumlah" class="form-control" value="<?=set_value('jumlah') ?>"><?= form_error('jumlah','<small class="text-danger pl-3">', '</small>'); ?><td>
                          </tr>
                      </table>
                      <button type="submit" class="mb-4 btn btn-block bg-purple btn-flat">
                          <i class="fa fa-save"></i> Simpan
                      </button>
                      <?=form_close()?>
                  </div>
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->