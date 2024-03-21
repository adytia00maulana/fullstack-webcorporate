<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>PT. Multi Bestri Indonesia</title>

        <!-- General CSS Files -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/modules/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/modules/fontawesome/css/all.min.css">

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/modules/weather-icon/css/weather-icons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/modules/weather-icon/css/weather-icons-wind.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/modules/summernote/summernote-bs4.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/modules/bootstrap-social/bootstrap-social.css">

        <!-- Template CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/components.css">
        <!-- Start GA -->
        <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script> -->
        <!-- <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-94034622-3');
        </script> -->
        <!-- /END GA -->
    </head>

    <body>
        <div id="app">
            <section class="section">
                <div class="container mt-5">
                    <?= $this->renderSection('content') ?>
                </div>
            </section>
        </div>

        <!-- General JS Scripts -->
        <script src="<?php echo base_url(); ?>assets/admin/modules/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/popper.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/tooltip.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php  echo base_url(); ?>assets/admin/modules/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/stisla.js"></script>

        <!-- JS Libraies -->
        <script src="<?php echo base_url(); ?>assets/admin/modules/simple-weather/jquery.simpleWeather.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/chart.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/summernote/summernote-bs4.js"></script>

        <!-- Page Specific JS File
        <script src="<?php // echo base_url(); ?>assets/admin/js/page/index-0.js"></script> -->

        <!-- Template JS File -->
        <script src="<?php echo base_url(); ?>assets/admin/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/custom.js"></script>
    </body>
</html>