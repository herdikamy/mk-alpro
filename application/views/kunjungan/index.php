
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form
            <small>Kehadiran Pengunjung</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?=base_url('kunjungan') ?>">Kehadiran Pengunjung</a></li>
            <li class="active">add</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-12" style="margin-top: 200px;">
              <div class="box box-widget">
                <div class="box-body">
                  <div class="my-4">
                      <div class="form-horizontal form-inline">
                          <a href="<?=base_url('kunjungan/data')?>" class="btn btn-default btn-xs">
                              <i class="fa fa-arrow-left"></i> Data
                          </a>
                      </div>
                  </div>
                  <?=form_open('kunjungan'); ?>
                  <table width="100%">
                    <tr>
                      <td style="vertical-align: top; width: 30%">
                        <label for="date">Type/Scan Here</label>
                      </td>
                      <td>
                        <div class="form-group input-group">
                          <input type="text" name="nis" autocomplete="off" class="form-control" autofocus="">
                          <span class="input-group-btn">
                            <button type="submit" class="btn btn-info btn-flat">
                              <i class="fa fa-save"></i>
                            </button>
                          </span>
                        </div>
                          <?= form_error('nis','<small class="text-danger pl-3">', '</small>'); ?>
                      </td>
                    </tr>
                  </table>
                  <?=form_close(); ?>
                </div>
              </div>
            </div>
          </div><!-- /.row -->