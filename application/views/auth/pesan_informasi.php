<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Loker Nganjuk</title>
  <!-- CSS  -->
  <?php $this->load->view("_partials/head.php") ?>
</head>

<body id="page-top">
  <?php $this->load->view("_partials/navbar.php") ?>    
  <main class="container" style="display: flex; flex-wrap: wrap; justify-content: center;">
    <div class="card" style="margin-top: 100px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width: 40%;">
      <h3 class="card-header style-widget" style="height: 70px;"><b>Selamat Datang!!!</b></h3>
      <div class="card-body">
        <div>
          <h4>Terima kasih telah melakukan registrasi.</h4>
          <p>Silakan cek email anda untuk melakukan aktivasi akun!</p>
        </div>
      </div>
    </div>
  </main>

  <?php $this->load->view("_partials/js.php") ?>
</body>
</html>