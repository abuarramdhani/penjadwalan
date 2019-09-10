<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RKstudio | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <?php
  if (isset($this->session->ses_id) == TRUE) {
    redirect('dashboard');
  }
   ?>
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>RK</b>studio</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

      <div class='alert alert-success'>
        <p style='text-align: center;'><i class='logo-notif-login fa fa-info-circle'></i> <teks>Silahkan login untuk mengakses sistem</teks</p>
      </div>


      <div class="form-group username">
        <input id="username" name="username" type="text" class="form-control" placeholder="Username">
        <label class="error" for="username" id="username_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
        <label class="vali" for="username" id="username_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan huruf dan angka.</label>
      </div>
      <div class="form-group password">
        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
        <span class="show fa fa-unlock-alt"></span>
        <label class="error" for="password" id="password_error" hidden><i class="fa fa-times-circle-o"></i> Kolom ini tidak boleh kosong.</label>
        <label class="vali" for="password" id="password_vali" hidden><i class="fa fa-times-circle-o"></i> Hanya boleh memasukkan huruf dan angka.</label>
      </div>

      <style media="screen">
      .show {
        float: right;
        margin-right: 12px;
        margin-top: -22px;
        position: relative;
        z-index: 2;
      }

      .show:hover{
        cursor: pointer;
      }

      #password{
        padding-right: 40px;
      }
      </style>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input id="remember" name="remember" value="TRUE" type="checkbox"> Ingat Saya
            </label>
          </div>
          <a href="#" data-toggle="modal" data-target="#modal-lupa_password">Lupa password?</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button id="login" name="login" type="submit" class="btn btn-primary btn-block btn-flat btn-warning">Login</button>
        </div>
        <!-- /.col -->
      </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php $this->load->view('modals/lupa_password'); ?>
<?php $this->load->view('modals/info'); ?>
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

<?php
$this->load->view('validasi/login/form_login');
$this->load->view('validasi/login/login');
$this->load->view('script/modal-lupa_password');
?>

</body>
</html>
