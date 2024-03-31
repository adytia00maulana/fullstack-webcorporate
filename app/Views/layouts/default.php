<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $title ?? ''; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/img/favicon512.png" rel="icon">
    <link href="<?php echo base_url(); ?>assets/front_end/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url(); ?>assets/front_end/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/front_end/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/front_end/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/front_end/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/front_end/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?php echo base_url(); ?>assets/front_end/assets/css/main.css" rel="stylesheet">
</head>

<body>

<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="<?= base_url() ?>" class="logo d-flex align-items-center me-auto" style="background-color: gray">
             <img src="<?php echo base_url(); ?>assets/img/logo_new.png" alt="">
        </a>

        <nav id="navmenu" class="navmenu">
            <?= $this->include('layouts/navbar') ?>
        </nav>

    </div>
</header>

<main class="main">
    <?= $this->renderSection('content') ?>
</main>

<footer id="footer" class="footer position-relative">
    <?= $this->include('layouts/footer') ?>
</footer>

<!-- Scroll Top -->
<a href="<?= base_url() ?>" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="<?php echo base_url(); ?>assets/front_end/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/front_end/assets/vendor/php-email-form/validate.js"></script>
<script src="<?php echo base_url(); ?>assets/front_end/assets/vendor/aos/aos.js"></script>
<script src="<?php echo base_url(); ?>assets/front_end/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/front_end/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?php echo base_url(); ?>assets/front_end/assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="<?php echo base_url(); ?>assets/front_end/assets/js/main.js"></script>

</body>

</html>