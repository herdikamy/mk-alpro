<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.9/admin/html/login_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Nov 2015 11:56:35 GMT -->
<head>
  <meta charset="utf-8" />
  <title>Registration Page</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  
  <!-- ================== BEGIN BASE CSS STYLE ================== -->
  <link rel="icon" type="icon" href="<?=base_url('assets/') ?>icon.png">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="<?=base_url() ?>assets1/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?=base_url() ?>assets1/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="<?=base_url() ?>assets1/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- <link href="<?=base_url() ?>assets1/css/animate.min.css" rel="stylesheet" /> -->
    <link href="<?=base_url() ?>assets1/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?=base_url() ?>assets1/css/style_nyunyu.min.css" rel="stylesheet" />
    <link href="<?=base_url() ?>assets1/css/style-responsive_nyunyu.min.css" rel="stylesheet" />
    <link href="<?=base_url() ?>assets1/css/theme/default_nyunyu.css" rel="stylesheet" id="theme" />
    <link href="<?=base_url() ?>assets1/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url('assets') ?>/plugins/iCheck/square/blue.css">
    <script src="<?=base_url() ?>assets1/plugins/pace/pace.min.js"></script>
    <script src="<?=base_url() ?>assets1/plugins/jquery/jquery-1.9.1.min.js"></script>
    <script src="<?=base_url() ?>assets1/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
    <script src="<?=base_url() ?>assets1/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
    <script src="<?=base_url() ?>assets1/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url() ?>assets1/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?=base_url() ?>assets1/js/notifIt.js"></script>
    <script type="text/javascript" src="<?=base_url() ?>assets1/js/jquery.blockUI.js"></script>
    <script src="<?=base_url() ?>assets1/js/apps.min.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
  <!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top bg-white">
  <!-- begin #page-loader -->
  <div id="page-loader" class="fade in"><span class="spinner"></span></div>
  <!-- end #page-loader -->
  
  <!-- begin #page-container -->
  <div id="page-container" class="fade">
      <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    <img src="<?=base_url() ?>assets/dist/img/bg-login/libs-2.jpg" data-id="login-cover-image" alt="" />
                </div>
                <div class="news-caption">
                    <h4 class="caption-title"><i class="fa fa-book text-success"></i> SMAN 1 GADINGREJO</h4>
                    <p>
                        JL. Tegalsari No.001 Kabupaten Pringsewu
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <span class="logo"></span> Perpustakaan
                        <small> SMAN 1 GADINGREJO</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-pencil"></i>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    <form action="<?=base_url('auth/register') ?>" method="POST" class="margin-bottom-0">
                        <div class="form-group m-b-15">
                            <input type="text" class="form-control input-lg" autofocus="on" autocomplete="off" name="fullname" placeholder="Full name" value="<?= set_value('fullname') ?>"/>
                            <?= form_error('fullname','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group m-b-15">
                            <select name="jk" class="form-control input-lg">
                              <option value="">-- Jenis Kelamin --</option>
                              <option value="Laki-laki">Laki-laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                            <?= form_error('jk','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group m-b-15">
                            <select name="kelas" class="form-control input-lg">
                              <option value="">-- Kelas --</option>
                              <?php foreach ($kelas as $k) { ?>
                                <option value="<?=$k['id_kelas'] ?>"><?=$k['nama_kelas'] ?></option>
                              <?php } ?>
                            </select>
                            <?= form_error('kelas','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group m-b-15">
                            <input type="text" autocomplete="off" class="form-control input-lg" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                            <?= form_error('email','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group m-b-15">
                            <input type="text" class="form-control input-lg" name="nis" placeholder="NIS/NISN">
                            <?= form_error('nis','<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group m-b-15">
                            <div class="col-xs">
                              <div class="">
                                <label>
                                  <input type="checkbox" name="agree"> I agree to the <a href="#">terms</a>
                                  <br><?= form_error('agree','<small class="text-danger pl-3">', '</small>'); ?>
                                </label>
                              </div>
                            </div><!-- /.col -->
                        </div>
                        <div class="login-buttons m-b-15">
                            <button type="submit" name="simpan" class="btn btn-success btn-block btn-lg">Register</button>
                        </div>
                        <p class="text-center text-inverse">
                            <a href="<?=base_url('auth') ?>" class="text-center">I already have a membership</a>
                        </p>
                        <hr />
                        <p class="text-center text-inverse">
                            &copy; SMANDING All Right Reserved 2021
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->
        
        <!-- begin theme-panel -->
        
        <!-- end theme-panel -->
  </div>
  <!-- end page container -->
  
  <!-- ================== BEGIN BASE JS ================== -->
  <script src="<?=base_url() ?>assets1/plugins/jquery/jquery-1.9.1.min.js"></script>
  <script src="<?=base_url() ?>assets1/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
  <script src="<?=base_url() ?>assets1/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
  <script src="<?=base_url() ?>assets1/plugins/bootstrap/js/bootstrap.min.js"></script>
  <!--[if lt IE 9]>
    <script src="<?=base_url() ?>assets1/crossbrowserjs/html5shiv.js"></script>
    <script src="<?=base_url() ?>assets1/crossbrowserjs/respond.min.js"></script>
    <script src="<?=base_url() ?>assets1/crossbrowserjs/excanvas.min.js"></script>
  <![endif]-->
  <script src="<?=base_url() ?>assets1/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?=base_url() ?>assets1/plugins/jquery-cookie/jquery.cookie.js"></script>
  <!-- ================== END BASE JS ================== -->
  
  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="<?=base_url() ?>assets1/js/apps.min.js"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->
  <!-- iCheck -->
  <script src="<?=base_url('assets') ?>/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      App.init();
    });
  </script>
  <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-53034621-1', 'auto');
      ga('send', 'pageview');
    </script>
</body>

<!-- Mirrored from seantheme.com/color-admin-v1.9/admin/html/login_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Nov 2015 11:56:36 GMT -->
</html>

