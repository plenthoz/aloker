<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php echo $pageTitle; ?> | Kominfo Nganjuk</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="<?php echo base_url('assets/css1/style.css'); ?>" type="text/css" rel="stylesheet">
	<link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
</head>
<body>
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar">

			<div class="profile-box">
				<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(<?php echo base_url('assets/images/') . $this->session->userdata('level').'/'.$this->session->userdata('avatar'); ; ?>);"></a>
				<div class="text-center">
					<a href="#!name"><span class="text-center"><?php echo ucwords(strtolower($this->session->userdata('nama'))); ?></span></a>
					<span> | </span>
					<a href="#!email"><span class="white-text email"><?php echo ucwords(strtolower($this->session->userdata('level'))); ?></span></a>
				</div>
			</div>

			<div class="p-4 pt-5">
				<ul class="list-unstyled components mb-5" style="margin-top: 20px">
					<?php if($this->session->userdata('level') == 'Administrator'): ?>
						<li>
							<a href="<?php echo base_url('loker'); ?>"><i class="material-icons"></i>Lowongan Kerja</a>
						</li>
						<li>
							<a href="<?php echo base_url('users'); ?>"><i class="material-icons"></i>Admin</a>
						</li>
						<li>
							<a href="<?php echo base_url('users/user_perusahaan'); ?>"><i class="material-icons"></i>Perusahaan</a>
						</li>
						<li>
							<a href="<?php echo base_url('users/user_pelamar'); ?>"><i class="material-icons"></i>Pelamar</a>
						</li>
						<li>
							<a href="<?php echo base_url('lamaran/list_lamaran'); ?>"><i class="material-icons"></i>Lamaran</a>
						</li>
						<li>
							<div class="divider"></div>
						</li>
					<?php endif; ?>
					<?php if($this->session->userdata('level') === 'Perusahaan'): ?>
						<li>
							<a href="<?php echo base_url('loker/loker_perusahaan/'); ?>"><i class="material-icons"></i>Loker Perusahaan</a>
						</li>
						<li>
							<a href="<?php echo base_url('lamaran/lamaran_masuk'); ?>"><i class="material-icons"></i>Lamaran Masuk</a>
						</li>
					<?php endif; ?>
					<?php if($this->session->userdata('level') === 'Pelamar'): ?>
						<li>
							<a href="<?php echo base_url('lamaran/lamaran_terkirim'); ?>"><i class="material-icons"></i>Lamaran Terkirim</a>
						</li>
					<?php endif; ?>
					<li>
						<a href="<?php echo base_url('profile'); ?>"><i class="material-icons"></i>Profile</a>
					</li>
					<li>
						<a href="<?php echo base_url('auth/logout'); ?>"><i class="material-icons"></i>Logout</a>
					</li>
				</ul>
			</div>

		</nav>
		<div id="content" class="main-panel">
			<nav class="navbar header-nav navbar-expand-lg bg-light" style="">
				<div class="container-fluid">
					<a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/images/navbar_logo.png') ?>"></a>
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
						<i class="fa fa-bars"></i>
						<!-- <span class="sr-only">Toggle Menu</span> -->
					</button>
					<!---->
					<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fa fa-bars"></i>
					</button>
					<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
						<ul class="navbar-nav" style="font-size: 18px; font-weight: 500;">
							<?php if(!$this->session->userdata('username')): ?>
								<li><a class="nav-link active" href="<?php echo base_url() ?>">Home</a></li>
								<li><a class="nav-link" href="<?php echo site_url('lowongan') ?>">Lowongan Pekerjaan</a></li>
								<li><a class="nav-link" href="<?php echo site_url('perusahaan') ?>">Perusahaan</a></li>
								<li><a class="nav-link" href="<?php echo base_url('auth/login') ?>">LOGIN</a></li>
								<?php else: ?>
									<li><a class="nav-link" style="color: black;" href="<?php echo site_url('lowongan') ?>">Lowongan Pekerjaan</a></li>
									<li><a class="nav-link" style="color: black;" href="<?php echo site_url('perusahaan') ?>">Perusahaan</a></li>
									<li><a class="nav-link" style="color: black;" href="<?php echo base_url('profile') ?>">AKUN</a></li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</nav>
			<div class="content" style="padding: 1.5% 4% 1.5% 4%;">
				<div class="container-fluid">
					<?php echo $pageContent; ?>
				</div>
			</div>
		</div>
	</div>

		<script src="<?php echo base_url('assets/js1/jquery.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js1/popper.js' ); ?>"></script>
		<script src="<?php echo base_url('assets/js1/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js1/main.js'); ?>"></script>
		<script src="<?php echo base_url(); ?>assets/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap4.min.js"></script>
		<?php echo $data_table; ?>
		<!-- 	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
		<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
		<script src="<?php echo base_url('assets/ckeditor/adapters/jquery.js'); ?>"></script>
		<script type="text/javascript">
			$('textarea.texteditor').ckeditor();
		</script>
</body>
</html>


