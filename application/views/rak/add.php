<?php
    $query  = $this->db->query("SELECT max(seri_rak) AS last FROM rak")->row_array();
    $data   = $query;
    $lastnorak  = $data['last'];
    $lastnourut   = substr($lastnorak, 4, 2);
    $nextnourut   = $lastnourut + 1;
    $nextnorak  = 'RK'.sprintf('%04s', $nextnourut);
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Master
            <small>Tambah Rak</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?=base_url('rak') ?>">Rak Buku</a></li>
            <li class="active">add</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Tambah Rak</h3>
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
                      <?=form_open('rak/add')?>
                      <table id="form-table" class="table text-center table-condensed">
                          <tr>
                            <td>Seri Rak<td>
                            <td><input type="text" autofocus="on" autocomplete="off" name="seri_rak" class="form-control" value="<?=set_value('seri_rak')?>" ><?= form_error('seri_rak','<small class="text-danger pl-3">', '</small>'); ?><td>
                          </tr>
                          <tr>
                            <td>Nama Rak<td>
                            <td><input autocomplete="off" autofocus="on" type="text" name="nama_rak" class="form-control" value="<?=set_value('nama_rak') ?>"><?= form_error('nama_rak','<small class="text-danger pl-3">', '</small>'); ?><td>
                            
                          </tr>
                          <tr>
                            <td>Kapasitas<td>
                            <td><input autocomplete="off" type="text" name="kapasitas_rak" class="form-control" value="<?=set_value('kapasitas_rak') ?>"><?= form_error('kapasitas_rak','<small class="text-danger pl-3">', '</small>'); ?><td>
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