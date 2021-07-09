
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Master
            <small>Edit Anggota</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?=base_url('anggota') ?>">Anggota</a></li>
            <li class="active">edit</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Edit Anggota</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4">        
                      <div class="my-4">
                          <div class="form-horizontal form-inline">
                              <a href="<?=base_url('anggota')?>" class="btn btn-default btn-xs">
                                  <i class="fa fa-arrow-left"></i> Batal
                              </a>
                          </div>
                      </div>
                      <?=form_open('anggota/edit/'.$get['id_siswa'])?>
                      <table id="form-table" class="table text-center table-condensed">
                        <input type="hidden" name="id" value="<?=$get['id_siswa'] ?>">
                          <tr>
                            <td>NIS/NISN<td>
                            <td><input type="text" readonly="" name="nis" class="form-control" value="<?=$get['nis'] ?>" placeholder="NIS/NISN" autofocus="on" autocomplete="off"><?= form_error('nis','<small class="text-danger pl-3">', '</small>'); ?><td>
                          </tr>
                          <tr>
                            <td>Nama Lengkap<td>
                            <td><input type="text" placeholder="Nama Lengkap" name="fullname" class="form-control" value="<?=$get['nama_lengkap'] ?>" autocomplete="off"><?= form_error('fullname','<small class="text-danger pl-3">', '</small>'); ?><td>
                          </tr>
                          <tr>
                            <td>Kelas<td>
                            <td><select name="kelas" class="form-control">
                            <option value="">-- Pilih Kelas --</option>
                            <?php
                            foreach ($kelas as $k) { ?>
                              <option value="<?=$k['id_kelas']?>" <?php if ($get['id_kelas'] == $k['id_kelas']) {
                                echo "selected";
                              } ?>><?=$k['nama_kelas'] ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?= form_error('kelas','<small class="text-danger pl-3">', '</small>'); ?>
                          <td>
                          </tr>
                          <tr>
                            <td>Jenis Kelamin<td>
                            <td><select name="jk" class="form-control">
                              <option value="">-- Jenis Kelamin --</option>
                              <option value="Laki-laki" <?php if ($get['jk'] == 'L' || $get['jk'] == 'Laki-laki') {
                                echo "selected";
                              } ?>>Laki-laki</option>
                              <option value="Perempuan" <?php if ($get['jk'] == 'P' || $get['jk'] == 'Perempuan') {
                                echo "selected";
                              } ?>>Perempuan</option>
                            </select>
                            <?= form_error('jk','<small class="text-danger pl-3">', '</small>'); ?>
                          <td>
                          </tr>
                          <tr>
                            <td>Email<td>
                            <td><input type="text" autocomplete="off" class="form-control" name="email" placeholder="Email" value="<?= $get['email'] ?>">
                            <?php  
                            // form_error('email','<small class="text-danger pl-3">', '</small>'); 
                            ?>
                            <td>
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