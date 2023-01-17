<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $sys->first_name;
          echo ' ' . $sys->last_name; ?></title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/dist/css/adminlte.min.css">
  <!-- Icon -->
  <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/assets/dist/img/bananalogo.jpeg">

  <style>
    .copyright {
      text-align: center;
      background: white;
      margin-top: 20px;
      font-size: 14px;
      color: grey;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url(); ?>/assets/dist/img/bananalogo.jpeg" height="60" width="60">
  </div>
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-warning" style="border-left: 1px solid #E5E4E2; border-right: 1px solid #E5E4E2;">
      <div class="card-header text-center">
        <h2><?= $sys->first_name; ?></h2>
        <a href="<?= base_url('home'); ?>" class="h1"><b><?= $sys->last_name; ?></b></a>
      </div>
      <div class="card-body">
        <h5 style="text-align: center;"><a href="<?= base_url('home'); ?>" class="text-warning">Home</a> / Register Page</h5>
        <div class="login-box-msg text-danger"><?= validation_errors(); ?></div>
        <form action="<?= base_url('login/auth_register'); ?>" method="post">
          <div>Nama Lengkap</div>
          <div class="input-group mb-3">
            <input name="nama" type="text" class="form-control" placeholder="Masukkan nama lengkap" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div>Email</div>
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="Masukkan email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div>Password</div>
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Minimal 5 karakter" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div>Confirm Password</div>
          <div class="input-group mb-3">
            <input name="cpassword" type="password" class="form-control" placeholder="Minimal 5 karakter" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-warning btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <p class="mb-1">
          <a href="<?= base_url('login'); ?>" style="color: orange;">Sudah punya akun?</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <footer>
      <div class="copyright" style="border: 1px solid #E5E4E2; border-radius: 10px;">&copy; <?= $sys->year; ?> All rights reserved.</div>
    </footer>
  </div>
  <!-- /.login-box -->
  <!-- jQuery -->
  <script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
</body>

</html>