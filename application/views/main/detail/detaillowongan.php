<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lowongan</title>
	<?php $this->load->view("_partials/head.php") ?>
</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
	<?php $this->load->view("_partials/navbar.php") ?>

	<!-- Page Content -->
	<div class="container">
		<div class="row">

			<!-- Post Content Column -->
			<div class="col-md-8" style="margin-top: 25px;">

				<!-- Title -->
				<h1 class="my-4" style="font-family: Arial; font-size: 30px; font-weight: bold; color: #07528d;">Detail Lowongan</h1>

				<hr>

				<!-- Preview Image -->
				<img class="img-fluid rounded detail-loker" src="<?php echo base_url().'/assets/images/Perusahaan/'.$detail->logo ?>" alt="">

				<hr>

				<!-- Post Content -->
				<h2 style="font-weight: bold; color: #002855;"><?php echo $detail->posisi?></h2>
				
				<h3>Perusahaan : </h3>
				<p>
					<?php echo $detail->nama ?>
				</p>

				<h3>Tanggal Berakhir : </h3>
				<p>
					<?php echo $detail->tanggal_berakhir?>
				</p>

				<h3>Deskripsi : </h3>
				<p style="text-align: justify;">
					<?php echo $detail->deskripsi?>
				</p>
				<?php if (!$this->session->userdata('username')) { ?>
					<a class="btn btn-primary btn-sm" href="<?php echo site_url('Lowongan/ajukan_lamaran/'.$detail->id) ?>">Ajukan Lamaran</a>
				<?php } elseif ($this->session->userdata('level') === 'Pelamar'){ ?>
					<a class="btn btn-primary btn-sm" href="<?php echo site_url('Lowongan/ajukan_lamaran/'.$detail->id) ?>">Ajukan Lamaran</a>
				<?php } elseif ($this->session->userdata('level') === 'Perusahaan'){ ?>
					<a class="btn btn-primary btn-sm" href="">Ajukan Lamaran</a>
				<?php }  ?>
				
				<hr>  

			</div>

		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->

	<?php $this->load->view("_partials/footer.php") ?>
	<?php $this->load->view("_partials/scrolltop.php") ?>
	<?php $this->load->view("_partials/js.php") ?>
</body>

</html>