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
			<!-- Blog Entries Column -->
			<div class="leftcolumn">

				<h1 class="my-4">Hasil Pencarian Perusahaan</h1>
				<hr>

				<!-- Blog Entries Column -->
				<div class="flex-card">

					<!-- Post -->
					<?php if($perusahaan): ?>
					<?php
					foreach ($perusahaan as $key):
						?>
						<div class="card mb-4-perusahaan" style="width: 50%; flex: auto; border: none; padding: 10px;">
							<div class="card-body" style="border: 1px solid rgba(0, 0, 0, .125); border-bottom-left-radius: .25rem; border-bottom-right-radius: .25rem;">
								<img class="card-img-top" src="<?php echo base_url().'/assets/images/Perusahaan/'.$key->logo ?>" alt="Card image cap" style="width: auto; display:block; height: 190px; margin-left: auto; margin-right: auto">
								<hr>
								<h2 class="card-title title-perusahaan"><?php echo $key->nama; ?></h2>
								<a class="btn btn-primary btn-sm btn-detail" id="myBtn" href="<?php echo site_url('perusahaan/detail_perusahaan/'.$key->id_perusahaan)?>">Detail</a>
							</div>
						</div>
					<?php endforeach; ?>
					<?php else: ?>
						<div class="my-5">
					<p style=" font-family: Arial; font-style: oblique; font-size: 25px; font-weight: bold; text-align: center;"> Maaf,  perusahaan yang Anda cari tidak ditemukan. </p>
				</div>

				<hr>
				<?php endif; ?>
					<div>
						<?php echo $pagination; ?>
					</div>
				</div>
			</div>

			<div class="rightcolumn">
				<!-- Sidebar Widgets Column -->
				<div class="col-md-14">
					<div class="card my-4">
						<h5 class="card-header style-widget">Pencarian</h5>
						<div class="card-body">
							<?php echo form_open('perusahaan/search'); ?>
							<div class="input-group">
								<input type="text" class="form-control" name="keyword" id="keyword" placeholder="Kata kunci...">
								<span class="input-group-btn">
									<button class="btn btn-success btn-cari" type="submit">Cari!</button>
								</span>
							</div>
							<?php echo form_close() ?>
						</div>
					</div>
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