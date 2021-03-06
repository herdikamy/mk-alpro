<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=base_url('assets') ?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets') ?>/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url('assets') ?>/plugins/iCheck/square/blue.css">
    <!-- icon head url -->
    <link rel="icon" type="icon" href="<?=base_url('assets/') ?>icon.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page" style="background-image: url('<?=base_url('assets/dist/img/bg-3.jpg') ?>');
    background-repeat: no-repeat;
    background-size: cover;">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?=base_url('assets') ?>/index2.html"><b>Perpustakaan</b><br>SMAN 1 Gadingrejo</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?=base_url('auth') ?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" autofocus="on" name="email" autocomplete="off" class="form-control" placeholder="Email/Username" value="<?= set_value('email') ?>">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <?= form_error('email','<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" value="<?=set_value('password') ?>">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?= form_error('password','<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="row">
            <div class="col-xs-8">
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <!-- <a href="#">I forgot my password</a><br> -->
        <a href="<?=base_url('auth/register') ?>" class="text-center">Register a new membership</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url('assets') ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url('assets') ?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?=base_url('assets') ?>/plugins/iCheck/icheck.min.js"></script>

  </body>
</html>
