<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= !empty($getLogo)? $getLogo[0]['title'] : '' ?><?= '-'.$title ?? ''; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/img/favicon512.png" rel="icon">
    <!-- <link href="<?php echo base_url(); ?>assets/front_end/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url(); ?>assets/front_end/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/front_end/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/front_end/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/front_end/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/front_end/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url(); ?>assets/front_end/assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent bg-success">
        <div class="container d-flex align-items-center">

            <!-- <h1 class="logo me-auto"><a href="index.html">Rapid</a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="index.html" class="logo me-auto"><img src="<?= !empty($getLogo)? base_url().$viewPathLogo.$getLogo[0]['filename']  : '#' ?>" alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <?= $this->include('layouts/navbar') ?>
            </nav><!-- .navbar -->

            <div class="social-links">
                <a href="https://www.tiktok.com/@kbshop.official" class="tiktok"><i class="bi bi-tiktok"></i></a>
                <a href="https://www.facebook.com/kbshopofc" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/kbshopofficial/?hl=id" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCIE8f-jSZ63U1u4zk7IKWgA" class="youtube"><i class="bi bi-youtube"></i></a>
            </div>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="clearfix">
        <div class="container d-flex h-auto w-100">
            <!-- <div class="row justify-content-center align-self-center" data-aos="fade-up"> -->
            <div class="row justify-content-center align-self-center" data-aos="zoom-in">
                <!-- <div class="col-lg-6 intro-info order-lg-first order-last" data-aos="zoom-in" data-aos-delay="100">
                    <h2><?php // echo !empty($getLogo)? $getLogo[0]['title'] : '' ?><br>for Your <span>Business!</span></h2>
                    <div>
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>

                <div class="col-lg-6 intro-img order-lg-last order-first" data-aos="zoom-out" data-aos-delay="200">
                    <img src="<?php // echo base_url(); ?>assets/front_end/assets/img/intro-img.svg" alt="" class="img-fluid">
                </div> -->
                <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                    <source src="<?= base_url().'assets/front_end/assets/video/Video banner web.mp4' ?>" type="video/mp4">
                </video>
            </div>

        </div>
    </section><!-- End Hero -->

    <main id="main">
        <?= $this->renderSection('content') ?>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="section-bg">
        <?= $this->include('layouts/footer') ?>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url(); ?>assets/front_end/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?php echo base_url(); ?>assets/front_end/assets/vendor/aos/aos.js"></script>
    <script src="<?php echo base_url(); ?>assets/front_end/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/front_end/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/front_end/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/front_end/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/front_end/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url(); ?>assets/front_end/assets/js/main.js"></script>
    
    <!-- Custom -->
    <?= $this->include('Front/Config/plugin_fornt_end'); ?>

</body>

</html>