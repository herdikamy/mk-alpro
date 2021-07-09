<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Master
            <small>Import Rak</small>
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
                  <h3 class="box-title">Form Import Rak</h3>
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
                      <form method="post" action="<?php echo base_url('Rak/importExcel') ?>" enctype="multipart/form-data">
                      <table id="form-table" class="table text-center table-condensed">
                          <tr>
                            <input type="file" name="file" class="form-control">
                          </tr>
                      </table>
                      <button type="submit" class="mb-4 btn btn-block bg-purple btn-flat">
                          <i class="fa fa-save"></i> Simpan
                      </button>
                      </form>
                  </div>
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->