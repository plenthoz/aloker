<!DOCTYPE html>
<html lang="en">
<head>
	<title>Perusahaan</title>
	<?php $this->load->view("_partials/head.php") ?>
</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
	<?php $this->load->view("_partials/navbar.php") ?>

	<!-- Page Content -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="leftcolumn">
				<h1 class="my-4">Daftar Perusahaan</font>
				</h1>
				<hr>

				<!-- Blog Entries Column -->
				<div class="col-md-6-perusahaan">

					<!-- Post -->
					<?php
					foreach ($perusahaan as $key):
						?>
						<div class="card mb-4-perusahaan" style="width: 50%; flex: auto; border: none; padding: 10px;">
							<div class="card-body" style="border: 1px solid rgba(0, 0, 0, .125); border-bottom-left-radius: .25rem; border-bottom-right-radius: .25rem;">
								<img class="card-img-top img-responsive" src="<?php echo base_url().'assets/images/Perusahaan/'.$key->logo ?>" alt="Card image cap" style="width: auto; display:block; height: 190px; margin-left: auto; margin-right: auto">
								<hr>
								<h2 class="card-title"> <?php echo $key->nama; ?></h2>
								<a class="btn btn-primary btn-sm btn-detail" id="myBtn" href="<?php echo site_url('perusahaan/detail_perusahaan/'.$key->id_perusahaan)?>">Detail</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<hr>
				<div>
					<?php echo $pagination; ?>
				</div>
				<br>
			</div>

			<div class="rightcolumn">
				<!-- Sidebar Widgets Column -->
				<div class="col-md-14">
					<!-- Search Widget -->
					<form action="<?php echo base_url('perusahaan/search')?>" action="GET">
					<div class="card my-4">
						<h5 class="card-header style-widget">Pencarian</h5>
						<div class="card-body">
							<?php echo form_open('perusahaan/search'); ?>
							<div class="input-group">
								<input type="text" class="form-control" name="keyword" id="keyword" placeholder="Kata kunci ...">
								<span class="input-group-btn">
									<button class="btn btn-secondary btn-cari" type="submit">Cari!</button>
								</span>
							</div>
							<?php echo form_close() ?>
						</div>
					</div>
					</form>
				</div>
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