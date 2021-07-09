<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perpustakaan | <?=$title ?></title>

    <style type="text/css" media="screen">
      .rotateimg90 {
        -webkit-transform:rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
      }
    </style>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=base_url('assets/') ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?=base_url('assets/') ?>plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets/') ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url('assets/') ?>dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url('assets/') ?>plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?=base_url('assets/') ?>plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?=base_url('assets/') ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?=base_url('assets/') ?>plugins/select2/select2.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?=base_url('assets/') ?>plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?=base_url('assets/') ?>plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?=base_url('assets/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- icon head url -->
    <link rel="icon" type="icon" href="<?=base_url('assets/') ?>icon.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <?php if ($this->uri->segment(2)=='print_card' OR $this->uri->segment(2)=='cetak_peminjaman') { ?>
    <body onclick="OpenInNewTab();">
  <?php }else{ ?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>P</b>erpus</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Perpus</b>takaan</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning"><?php 
                  if ($this->session->userdata('level')=='Administrator') {
                      if ($notif == 0) {
                        echo "";
                      }else{
                        echo $notif;
                      }
                      ?></span>
                  <?php
                  }else{
                    if ($mustbacknow2 > 0) {
                      echo $notif;
                    } ?></span>
                  <?php }
                  ?>  
                </a>
                <?php
                if ($this->session->userdata('level')=='Administrator') {
                  if ($mustbacknow > 0 || $countusernonactive > 0 || $borrowtoday > 0) { ?>
                  <ul class="dropdown-menu">
                    <li class="header">You have <?=$notif ?> notifications</li>
                    <li>
                      <!-- inner menu: contains the actual data -->
                      <ul class="menu">
                        <li>
                          <a href="<?=base_url('transaksi/pengembalian') ?>">
                            <i class="fa fa-book text-red"></i> <?php if ($mustbacknow != 0) { ?>
                              <?=$mustbacknow ?> buku harus kembali hari ini
                            <?php }else{
                              echo "-";
                            } ?>
                          </a>
                        </li>
                        <li>
                          <a href="<?=base_url('anggota') ?>">
                            <i class="fa fa-users text-aqua"></i> <?=$countusernonactive ?> anggota baru menunggu di aktivasi
                          </a>
                        </li>
                        <li>
                          <a href="<?=base_url('transaksi/peminjaman') ?>">
                            <i class="fa fa-book text-green"></i> <?php if ($borrowtoday != 0) { ?>
                              <?=$borrowtoday ?> Buku Dipinjam hari ini
                            <?php }else{
                              echo "-";
                            } ?>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <!-- <li class="footer"><a href="#">View all</a></li> -->
                  </ul>
                <?php }else{ ?>
                  <ul class="dropdown-menu">
                    <li class="header"> <?php if ($mustbacknow > 0) {
                      echo "You have 1 notifications";
                    }else{
                      echo "Nothing notifications";
                    } ?></li>
                  </ul>
                <?php }
              }else{
                if ($mustbacknow2 > 0) { ?>
                  <ul class="dropdown-menu">
                    <li class="header">You have <?php if ($mustbacknow2 > 0) {
                      echo "1";
                    } ?> notifications</li>
                    <li>
                      <!-- inner menu: contains the actual data -->
                      <ul class="menu">
                        <li>
                          <a href="<?=base_url('transaksi/pengembalian') ?>">
                            <i class="fa fa-book text-green"></i> <?=$mustbacknow2 ?> buku harus kembali hari ini
                          </a>
                        </li>
                      </ul>
                    </li>
                    <!-- <li class="footer"><a href="#">View all</a></li> -->
                  </ul>
                <?php }else{ ?>
                  <ul class="dropdown-menu">
                    <li class="header"> <?php if ($mustbacknow2 > 0) {
                      echo "You have 1 notifications";
                    }else{
                      echo "Nothing notifications";
                    } ?></li>
                  </ul>
              <?php 
            }
          } ?>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php if ($this->session->userdata('level')=='Administrator') {
                    echo base_url('assets/')."dist/img/user2-160x160.jpg";
                  }else{
                    $session = $this->session->userdata('id_level');
                    $data = $this->db->get('anggota', ['id_siswa' => $session])->row_array();
                    if ($data['jk'] == 'Laki-laki' || $data['jk'] == 'L' || $data['jk'] == 'l') {
                      echo base_url('assets/')."dist/img/avatar5.png";
                    }elseif($data['jk'] == 'Perempuan' || $data['jk'] == 'P' || $data['jk'] == 'p'){
                      echo base_url('assets/')."dist/img/avatar2.png";
                    }
                  }
                  ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?=$this->session->userdata('level'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php if ($this->session->userdata('level')=='Administrator') {
                    echo base_url('assets/')."dist/img/user2-160x160.jpg";
                  }else{
                    $session = $this->session->userdata('id_level');
                    $data = $this->db->get('anggota', ['id_siswa' => $session])->row_array();
                    if ($data['jk'] == 'Laki-laki' || $data['jk'] == 'L' || $data['jk'] == 'l') {
                      echo base_url('assets/')."dist/img/avatar5.png";
                    }elseif($data['jk'] == 'Perempuan' || $data['jk'] == 'P' || $data['jk'] == 'p'){
                      echo base_url('assets/')."dist/img/avatar2.png";
                    }
                  }
                  ?>" class="img-circle" alt="User Image">
                    <p><?php if ($this->session->userdata('level')=='Administrator') {
                      echo $this->session->userdata('level')." Perpustakaan";
                    }else{
                      echo $this->session->userdata('nama_lengkap');
                    } ?>
                      <small>Since <?=shortdate_indo($this->session->userdata('sejak')); ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li> -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?=base_url('profile') ?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?=base_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!-- <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
            </ul>
          </div>
        </nav>
      </header>
  <?php } ?>