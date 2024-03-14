<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>PT. Multi Bestri Indonesia</title>

        <!-- General CSS Files -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/modules/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/modules/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/modules/summernote/summernote-bs4.css">

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/modules/weather-icon/css/weather-icons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/modules/weather-icon/css/weather-icons-wind.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/modules/summernote/summernote-bs4.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/modules/datatables/datatables.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

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
        <div class="main-wrapper main-wrapper-1">
            <!-- Nav Bar -->
            <?= $this->include('adm_layout/navbar') ?>

            <!-- Side Bar -->
            <div class="main-sidebar sidebar-style-2">
                <?= $this->include('adm_layout/sidebar') ?>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?= $this->renderSection('content') ?>
            </div>

            <!-- Footer -->
            <?= $this->include('adm_layout/footer') ?>
        </div>
    </div>

        <!-- General JS Scripts -->
        <script src="<?php echo base_url(); ?>assets/admin/modules/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/popper.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/tooltip.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/stisla.js"></script>

        <!-- JS Libraries -->
        <script src="<?php echo base_url(); ?>assets/admin/modules/simple-weather/jquery.simpleWeather.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/chart.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/summernote/summernote-bs4.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/sweetalert/sweetalert.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/summernote/summernote-bs4.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/datatables/datatables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/modules/jquery-ui/jquery-ui.min.js"></script>

        <!-- Page Specific JS File
        <script src="<?php // echo base_url(); ?>assets/admin/js/page/index-0.js"></script>-->
        <script src="<?php echo base_url(); ?>assets/admin/js/page/modules-sweetalert.js"></script>

        <!-- Template JS File -->
        <script src="<?php echo base_url(); ?>assets/admin/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/custom.js"></script>

        <?= $this->include('Back/Admin/Product/Config/plugin-source-product'); ?>
        <?= $this->include('Back/Admin/Product/Config/plugin-product'); ?>
        <?= $this->include('Back/Admin/Product/Config/plugin-detail-product'); ?>
        <?= $this->include('Back/Admin/Gallery/Config/plugin_gallery'); ?>

        <script>
            const url = '<?= base_url().'login' ?>'
            const session = '<?= isset($_SESSION['username'])? $_SESSION['username'] : "" ?>'
            if(!session) window.location.href=url;
        </script>
    </body>
</html>