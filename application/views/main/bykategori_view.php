<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lowongan Kerja</title>
	<?php $this->load->view("_partials/head.php") ?>
</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
	<?php $this->load->view("_partials/navbar.php") ?>

	<!-- Page Content -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="leftcolumn">
				<!-- Blog Entries Column -->
				<div class="col-md-10">
					
					<h1 class="my-4">Daftar Lowongan</h1>
					<hr>

					<!-- Blog Post -->
					<?php if(is_array($kategori)):?>
						<?php foreach ($kategori as $key):
							?>
							<div class="card mb-4 card-loker">
								<img class="card-img-top" src="<?php echo base_url().'/assets/images/Perusahaan/'.$key->logo ?>" alt="Card image cap">
								<div class="card-body list-loker">
									<h2 class="card-title"> <?php echo $key->posisi ?></h2>
									<hr>
									<p class="card-text"> <?php echo substr($key->deskripsi, 0, 150); ?>.....</p>
									<a class="btn btn-primary btn-sm btn-detail" href="<?php echo site_url('lowongan/detail_lowongan/'.$key->id)?>">Detail</a>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
					<div>
						<?php echo $pagination; ?>
					</div>
					<br>
				</div>
			</div>


			<div class="rightcolumn">
				<!-- Sidebar Widgets Column -->
				<div class="col-md-13">

					<!-- Search Widget -->
					<div class="card my-4">
						<h5 class="card-header style-widget">Pencarian</h5>
						<div class="card-body">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Kata kunci ...">
								<span class="input-group-btn">
									<button class="btn btn-secondary btn-cari" type="button">Cari!</button>
								</span>
							</div>
						</div>
					</div>

					<!-- Categories Widget -->
					<?php
					$getAll_kategori = $this->lowongan_model->get_kategori();
					?>
					<div class="card my-4">
						<h5 class="card-header style-widget">Kategori Pekerjaan</h5>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<ul class="list-unstyled mb-0">
										<?php foreach ($getAll_kategori as $key):
											?>
											<li>
												<a href="<?php echo site_url('lowongan/by_kategori/'.$key->kategori)?>"><?php echo $key->kategori; ?></a>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div> 
	</div> 

	<?php $this->load->view("_partials/footer.php") ?>
	<?php $this->load->view("_partials/scrolltop.php") ?>
	<?php $this->load->view("_partials/js.php") ?>
</body>

</html>