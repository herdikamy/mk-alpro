<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Master
            <small>Edit Rak</small>
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
                  <h3 class="box-title">Form Edit Rak</h3>
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
                      <?=form_open('profile')?>
                      <input type="hidden" name="id" value="<?=$profile['id'] ?>">
                      <table id="form-table" class="table text-center table-condensed">
                        <?php if ($this->session->userdata('level')=='Administrator') { ?>  
                        <?php
                        }else{ ?>
                          <tr>
                            <td>Nama Lengkap<td>
                            <td><input type="text" name="seri_rak" class="form-control" value="<?=$profile['seri_rak'] ?>" readonly><td>
                          </tr>
                        <?php
                        } ?>
                          <tr>
                            <td>Email<td>
                            <td><input autocomplete="off" autofocus="on" type="text" name="email" class="form-control" value="<?=$profile['email'] ?>"><?= form_error('email','<small class="text-danger pl-3">', '</small>'); ?><td>
                          </tr>
                          <tr>
                            <td>Ganti Password<td>
                            <td><input autocomplete="off" type="password" name="password" class="form-control"><?= form_error('password','<small class="text-danger pl-3">', '</small>'); ?><td>
                          </tr>
                          <tr>
                            <td>Konfirmasi Password<td>
                            <td><input autocomplete="off" type="password" name="retype" class="form-control"><?= form_error('retype','<small class="text-danger pl-3">', '</small>'); ?><td>
                          </tr>
                      </table>
                      <button type="submit" class="mb-4 btn btn-block bg-purple btn-flat">
                          <i class="fa fa-save"></i> Update
                      </button>
                      <?=form_close()?>
                  </div>
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->