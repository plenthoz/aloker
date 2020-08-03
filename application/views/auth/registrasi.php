<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Loker Nganjuk</title>
  <!-- CSS  -->
  <?php $this->load->view("_partials/head.php") ?>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css') ?>">
  
</head>

<body id="page-top">
  <?php $this->load->view("_partials/navbar.php") ?>

  <div class="container">
    <div class="card card-login mx-auto" style="width: 35rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top: 8%;">
      <h2 class="card-header style-widget" style="padding: .99rem 1.75rem;">Registrasi</h2>
      <div class="card-body">
        <div style="padding-top: 15px;">
          <form id="login-form" method="post" action="<?php echo base_url('registrasi/proses_register'); ?>">
            <div class="form-group">
              <?php if(validation_errors()): ?>
                <div class="col s12">
                  <div class="card-panel red">
                    <span class="white-text"><?php echo validation_errors('<p>', '</p>'); ?></span>
                  </div>
                </div>
              <?php endif; ?>
              <div class="form-group">
                <div class="form-label-group">
                  <input id="email" type="text" class="form-control" name="email" placeholder="Email" required="required" autofocus="autofocus" value="<?php echo set_value("email"); ?>">
                  <label for="email">Email</label>
              	</div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input id="username" type="text" class="form-control" name="username" placeholder="Username" required="required" autofocus="autofocus" value="<?php echo set_value("username"); ?>">
                  <label for="username">Username</label>
              	</div>
              </div>
              <div class="form-row">
              	<div class="col-md-6">
                  <div class="form-label-group">
                  <input id="password" type="password" class="form-control" name="password" placeholder="Password" required="required" autofocus="autofocus" value="<?php echo set_value("password"); ?>">
                  <label for="password">Password</label>
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-label-group">
                  <input id="password_conf" type="password" class="form-control" name="password_conf" placeholder="Konfirmasi Password" required="required" autofocus="autofocus" value="<?php echo set_value("password_conf"); ?>">
                  <label for="password_conf">Konfirmasi Password</label>
                  </div>
                  </div>
              </div>
            </div>
            <button class="btn btn-success btn-block" id="daftar" type="submit" name="daftar" value="Daftar" style="margin-top: 20px; margin-bottom: 30px">Registrasi</button>
          </form>
          <div class="text-left">
            <p style="margin-top: 30px">Sudah punya akun? <a style="color: #007bff;" href="<?php echo base_url('auth/login'); ?>">Login sekarang!</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view("_partials/js.php") ?>
</body>
</html>