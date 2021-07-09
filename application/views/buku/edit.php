<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Master
            <small>Edit Buku</small>
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
                  <h3 class="box-title">Form Edit Buku</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-sm-offset-3 col-sm-6 col-lg-offset-4 col-lg-4">        
                      <div class="my-4">
                          <div class="form-horizontal form-inline">
                              <a href="<?=base_url('buku')?>" class="btn btn-default btn-xs">
                                  <i class="fa fa-arrow-left"></i> Batal
                              </a>
                          </div>
                      </div>
                      <?=form_open('buku/edit/'.$edit['id_buku'])?>
                      <table id="form-table" class="table text-center table-condensed">
                          <tr>
                            <td>Seri Buku<td>
                            <td><input type="text" name="seri_buku" class="form-control" value="<?=$edit['seri_buku'] ?>" readonly><td>
                          </tr>
                          <tr>
                            <td>Rak Penyimpanan<td>
                            <td><select name="rak" class="form-control" autofocus>
                            <option value="">-- Pilih Rak</option>
                            <?php
                            foreach ($list_rak as $k) { ?>
                              <option value="<?=$k['id_rak']?>" <?php if ($edit['id_rak'] == $k['id_rak']) {
                              echo "selected";
                            } ?>><?=$k['nama_rak'] ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <td>
                          </tr>
                          <tr>
                            <td>Judul Buku<td>
                            <td><input autocomplete="off" autofocus="on" type="text" name="judul_buku" class="form-control" value="<?=$edit['judul_buku'] ?>"><td>
                          </tr>
                          <tr>
                            <td>Penulis<td>
                            <td><input autocomplete="off" autofocus="on" type="text" name="penulis" class="form-control" value="<?=$edit['penulis'] ?>"><td>
                          </tr>
                          <tr>
                            <td>Penerbit<td>
                            <td><input autocomplete="off" autofocus="on" type="text" name="penerbit" class="form-control" value="<?=$edit['penerbit'] ?>"><td>
                          </tr>
                          <tr>
                            <td>Jumlah<td>
                            <td><input autocomplete="off" type="text" name="jumlah" class="form-control" value="<?=$edit['jumlah'] ?>"><td>
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