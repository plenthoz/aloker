<!-- Start header -->
<header class="top-header">
    <nav class="navbar header-nav navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/images/navbar_logo.png') ?>"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                <ul class="navbar-nav">
                    <?php if(!$this->session->userdata('username')): ?>
                        <li><a class="nav-link active" href="<?php echo base_url() ?>">Home</a></li>
                        <li><a class="nav-link" href="<?php echo site_url('lowongan') ?>">Lowongan Pekerjaan</a></li>
                        <li><a class="nav-link" href="<?php echo site_url('perusahaan') ?>">Perusahaan</a></li>
                        <li><a class="nav-link active" href="<?php echo base_url('auth/login') ?>">LOGIN</a></li>
                    <?php else: ?>
                        <li><a class="nav-link" href="<?php echo site_url('lowongan') ?>">Lowongan Pekerjaan</a></li>
                        <li><a class="nav-link" href="<?php echo site_url('perusahaan') ?>">Perusahaan</a></li>
                        <li><a class="nav-link active" href="<?php echo base_url('profile') ?>">AKUN</a></li>
                    <?php endif; ?>
                </ul>
            </div>
    
        </div>
    </nav>
</header>
