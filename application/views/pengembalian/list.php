<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Master
            <small>Peminjaman</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Data master</a></li>
            <li class="active">Peminjaman Buku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Peminjaman Buku</h3>
                  <div class="pull-right">
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>No Transaksi</th>
                          <th>Nama Peminjam</th>
                          <th>Kelas</th>
                          <th>Buku</th>
                          <th>Quantity</th>
                          <th>Tgl Pinjam</th>
                          <th>Tgl Kembali</th>
                          <th>Denda</th>
                          <th><i class="fa fa-gear"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; 
                      foreach ($list as $l) { 
                        $dateline = $l['tanggal_kembali'];
                        $kembali = date('Y-m-d');

                        $tgl_dateline = explode('-', $dateline);
                        $tgl_dateline = $tgl_dateline[2].'-'.$tgl_dateline[1].'-'.$tgl_dateline[0];

                        $tgl_kembali = explode('-', $kembali);
                        $tgl_kembali = $tgl_kembali[2].'-'.$tgl_kembali[1].'-'.$tgl_kembali[0];

                        $selisih = strtotime($tgl_kembali) - strtotime($tgl_dateline);
                        $selisih = $selisih / 86400;

                        if ($selisih >= 1) {
                        $hasil = floor($selisih);
                        } else {
                        $hasil = 0;
                        }

                      ?>
                        <tr>
                          <td width="10px"><?=$no++ ?></td>
                          <td><?=$l['no_transaksi'] ?></td>
                          <td><?=$l['nama_lengkap'] ?></td>
                          <td><?php 
                          $kelas = $this->db->get_where('kelas', ['id_kelas' => $l['id_kelas']])->row_array(); 
                          echo $kelas['nama_kelas']?></td>
                          <td><?=$l['judul_buku'] ?></td>
                          <td><?=$l['qty'] ?></td>
                          <td><?=$l['tanggal_pinjam'] ?></td>
                          <td><?=$l['tanggal_kembali'] ?></td>
                          <td><?php if ($hasil== 0 ) {
                            echo "0";
                          }else{
                            echo $hasil * 1000;
                          } ?></td>
                          <td><a class="btn btn-primary btn-sm" href="<?=base_url('transaksi/kembalikan/').$l['id_transaksi'].'/'.$hasil*1000 ?>"><i class="fa fa-exchange"></i></a></td>
                        </tr>
                      <?php } ?>
                        <tr>
                          <td  colspan="10"><center><a class=" btn btn-info" href="<?=base_url('transaksi/kembalikan_semua/').$l['no_transaksi'].'/'.$hasil*1000 ?>" ><i class="fa fa-exchange"></i> Kembalikan Semua</a></center></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->