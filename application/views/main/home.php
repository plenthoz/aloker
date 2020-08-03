<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <!-- Site Metas -->
    <title>Loker Nganjuk</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php $this->load->view("_partials/head.php") ?>
</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <?php $this->load->view("_partials/navbar.php") ?>

    <!-- Start Banner -->
    <div class="ulockd-home-slider">
        <div class="container-fluid">
            <div class="row">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators custom-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo base_url('/assets/images/slider-1.jpg') ?>" class="d-block w-100" alt="gambar">
                            <div class="carousel-caption d-md-block" style="width: 100%; left: 2%;">
                                <div class="slide_text" style="float: left; text-align: left;">
                                    <h3><span class="theme_color">LOKER</span> NGANJUK</h3>
                                    <h4 style="">MENCARI DAN MELAMAR PEKERJAAN<br>DENGAN SANGAT MUDAH</h4>
                                    <p style="">Temukan pekerjaan sesuai keahlianmu hanya dalam waktu
                                        <br>beberapa menit saja dan dapatkan pekerjaan secepatnya!</p>
                                        <a class="contact_bt" href="<?php echo site_url('Registrasi/register') ?>">Registrasi</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo base_url('/assets/images/slider-2.jpg') ?>" class="d-block w-100" alt="gambar">
                            <div class="carousel-caption d-md-block" style="right: 2%;">
                                <div class="slide_text" style="float: right; text-align: right;">
                                    <h3><span class="theme_color">LOKER</span> NGANJUK</h3>
                                    <h4 style="">MENCARI DAN MELAMAR PEKERJAAN<br>DENGAN SANGAT MUDAH</h4>
                                    <p style="">Temukan pekerjaan sesuai keahlianmu hanya dalam waktu
                                        <br>beberapa menit saja dan dapatkan pekerjaan secepatnya!</p>
                                        <a class="contact_bt" style="float: right;" href="<?php echo site_url('Registrasi/register') ?>">Registrasi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .Slider -->
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full center">
                        <div class="heading_main text_align_center">
                            <h2><span class="theme_color">KITA DAPAT</span> MEMBANTU KARIRMU</h2>
                            <p class="large">Dapatkan Pekerjaanmu Dengan Mudah</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- section -->
    <div class="section layout_padding theme_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 text_align_center">
                    <div class="full">
                        <img class="img-responsive" src="<?php echo base_url('assets/images/resume_img.png') ?>" alt="#" />
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 white_fonts">
                    <h3 class="small_heading">TEMUKAN KARIRMU DISINI</h3>
                    <p>MEMBANTU ANDA MENEMUKAN BERBAGAI MACAM LOWONGAN PEKERJAAN DI KABUPATEN NGANJUK</p>
                    <p>Keterbatasan informasi terkait lowongan pekerjaan yang ada di Kabupaten Nganjuk, membuat Dinas Tenaga Kerja Kab. Nganjuk berinovasi untuk membuat suatu website yang berisi lowongan-lowongan pekerjaan dari berbagai perusahaan yang ada di Kab. Nganjuk. Temukan pekerjaan sesuai dengan keahlianmu disini!</p>
                    <a href="<?php echo site_url('lowongan') ?>" class="hvr-radial-out button-theme">Lihat Lowongan Pekerjaan ></a>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->

    <!-- section -->
    <div class="section layout_padding">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="full center margin-bottom_30">
                        <div class="heading_main text_align_center">
                            <h2><span class="theme_color">PERUSAHAAN</span> MITRA</h2>
                            <p class="large">Beberapa Perusahaan Telah Terdaftar Disini</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="<?php echo base_url('assets/images/logo-1.jpg') ?>" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="<?php echo base_url('assets/images/logo-2.jpg') ?>" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="<?php echo base_url('assets/images/logo-3.jpg') ?>" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="<?php echo base_url('assets/images/logo-4.jpg') ?>" alt="#" />
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="<?php echo base_url('assets/images/logo-1.jpg') ?>" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="<?php echo base_url('assets/images/logo-2.jpg') ?>" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="<?php echo base_url('assets/images/logo-3.jpg') ?>" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="<?php echo base_url('assets/images/logo-4.jpg') ?>" alt="#" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>
                </div>

                <div class="col-lg-12">
                    <p>Beberapa perusahan di Kabupaten Nganjuk telah mendaftarkan perusahaan mereka disini. Anda juga bisa mendaftarkan perusahaan anda dengan menghubungi <a href="">Kotak Kita</a>. Dengan demikian, perusahaan yang telah terdaftar dapat memasang iklan lowongan pekerjaan di website ini.</p>
                </div>

                <div class="col-lg-12">
                    <div class="full center">
                        <a href="<?php echo site_url('Perusahaan') ?>" class="hvr-radial-out button-theme">Lihat Perusahaan Terdaftar ></a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- end section -->

    <?php $this->load->view("_partials/footer.php") ?>

    <?php $this->load->view("_partials/scrolltop.php") ?>

    <?php $this->load->view("_partials/js.php") ?>
</body>

</html>