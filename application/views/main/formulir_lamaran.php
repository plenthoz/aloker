<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lowongan Kerja</title>
	<?php $this->load->view("_partials/head.php") ?>
</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
	<?php $this->load->view("_partials/navbar.php") ?>

	<!-- Page Content -->
	<div class="container" style="margin-top: 10px; margin-bottom: 20px;">

		<!-- Message -->
		<div class="card bg-info py-2 text-center" style="border-radius: 10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
			<div class="card-body">
				<p class="text-white m-0">Teliti data diri anda sebelum menekan tombol Submit. <br> Jika ada yang perlu dirubah, silakan edit data diri di <a href="<?php echo base_url('Profile') ?>">Halaman Profile</a>!</p>
			</div>
		</div>

		<!-- Content Row -->
		<div class="row">
			<div class="col-lg-8" style="margin: auto; width: 85%; padding-top: 30px;">
				<h2><b>Informasi Pribadi</b></h2>
			</div>
			<div class="col-lg-8" style="margin: auto; width: 70%; padding: 20px; ">
				<table class="table">
					<tr>
						<th><b>Nama</b></th>
						<td><?php echo $this->session->userdata('nama'); ?></td>
					</tr>
					<tr>
						<th><b>NIK</b></th>
						<td><?php echo $this->session->userdata('nik'); ?></td>
					</tr>
					<tr>
						<th><b>Tanggal Lahir</b></th>
						<td><?php echo $this->session->userdata('ttl'); ?></td>
					</tr>
					<tr>
						<th><b>Alamat</b></th>
						<td><?php echo $this->session->userdata('alamat');?></td>
					</tr>
					<tr>
						<th><b>No. Telepon</b></th>
						<td><?php echo $this->session->userdata('telp'); ?></td>
					</tr>
					<tr>
						<th><b>Email</b></th>
						<td><?php echo $this->session->userdata('email'); ?></td>
					</tr>
					<tr>
						<th><b>Status</b></th>
						<td><?php echo $this->session->userdata('status'); ?></td>
					</tr>
					<tr>
						<th><b>Pendidikan</b></th>
						<td><?php echo $this->session->userdata('pendidikan'); ?></td>
					</tr>

					<tr>
						<th><b>Foto*</b></th>
						<td><a href="<?php echo base_url('assets/images/') . $this->session->userdata('level').'/'.$this->session->userdata('avatar'); ; ?>">foto.jpg</a></td>
					</tr>
					<tr>
						<th><b>CV*</b></th>
						<td><a href="<?php echo base_url('assets/files/') . $this->session->userdata('id_pelamar').'_pdf.pdf'; ; ?>">CV.pdf</a></td>
					</tr>
					<caption>
						<p>*Untuk melihat Foto dan CV, klik nama file!</p>
					</caption>
				</table>
				<div style="float: right; margin-right: 10%;">
					<a class="btn btn-primary btn-sm" href="<?php echo base_url('lamaran/apply/'.$id['id_lowongan']); ?>">Submit</a>
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