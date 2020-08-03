<!DOCTYPE html>
<html lang="en">
<head>
	<title>Perusahaan</title>
	<?php $this->load->view("_partials/head.php") ?>
</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
	<?php $this->load->view("_partials/navbar.php") ?>

	<!-- Page Content -->
	<div class="content-wrapper">
		<div class="row">
			
			<!-- Post Content Column -->
			<div class="col-md-10" style="margin-left: 100px; margin-top: 25px; ">

				<!-- Title -->
				<h1 class="my-4" style="font-family: Arial; font-size: 30px; font-weight: bold; color: #07528d;">Detail Perusahaan</h1><br>
				
				<!-- <div class="table table-detail"> -->
					<table class="table table-detail">

						<tr>
							<th rowspan="6" style="border-top: none; vertical-align: middle;"><img class="icard-img-top" style="width: auto; display:block; height: 190px; margin-left: auto; margin-right: auto" src="<?php echo base_url().'assets/images/Perusahaan/'.$detail->logo ?>" alt="Card image cap"></th>
						</tr>
						<tr>
							<th><b>Nama Perusahaaan</b></th>
							<td><?php echo $detail->nama ?></td>
						</tr>
						<tr>
							<th><b>Alamat Perusahaaan</b></th>
							<td><?php echo $detail->alamat ?></td>
						</tr>
						<tr>
							<th><b>Contact Perusahaan</b></th>
							<td><?php echo $detail->contact ?></td>
						</tr>
						<tr>
							<th><b>Email Perusahaaan</b></th>
							<td><?php echo $detail->email ?></td>
						</tr>
						<tr>
							<th><b>Deskripsi Perusahaaan</b></th>
							<td><?php echo $detail->deskripsi ?></td>
						</tr>
					</table>
					<!-- </div> -->

					<div style="padding-top: 30px;">
						<h4 style="margin-left: 40px;"><strong>Lowongan Tersedia :</strong></h4><br>
						<div class="table100 ver1 m-b-110">
							<div class="table100-head">
								<table>
									<thead>
										<tr class="row100 head">
											<th class="cell100 column1">No.</th>
											<th class="cell100 column2">Posisi</th>
											<th class="cell100 column2">Tanggal Berakhir</th>
											<th class="cell100 column3"></th>
										</tr>
									</thead>
								</table>
							</div>

							<div class="table100-body js-pscroll">
								<?php 
								$no=1;
								foreach ($detail_join as $key):
									?>
									<table>
										<tbody>
											<tr class="row100 body">
												<td class="cell100 column1"><?php echo $no++ ?></td>
												<td class="cell100 column2"><?php echo $key->posisi ?></td>
												<td class="cell100 column2"><?php echo $key->tanggal_berakhir ?></td>
												<td class="cell100 column3">
													<a type="button" class="btn btn-info" data-toggle="tooltip" title="Lihat detail" href="<?php echo site_url('lowongan/detail_lowongan/'.$key->id)?>"><i class="fa fa-eye"></i></a>
												</td>
											</tr>
										</tbody>
									</table>
								<?php endforeach; ?>
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