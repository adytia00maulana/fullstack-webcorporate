<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>Dashboard - PT. Multi Bestri Indonesia</title>
            <!-- favicon -->
        <link rel="icon" type="image/x-icon" class="text-success" href="<?= base_url('assets/img/favicon512.png') ?>">
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
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/modules/izitoast/css/iziToast.min.css">

        <!-- Template CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/components.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/loading.css">
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

    <div id="myOverlay"></div>
    <div id="loadingGIF">
        <div class="wrapper-loading">
            <div class="loader">
                <svg viewBox="0 0 80 80">
                    <rect x="8" y="8" width="64" height="64"></rect>
                    <text
                            x="50%"
                            y="60%"
                            text-anchor="middle"
                            fill="white"
                            font-size="24"
                            font-weight="bold"
                    >
                        M
                    </text>
                </svg>
            </div>

            <div class="loader">
                <svg viewBox="0 0 80 80">
                    <rect x="8" y="8" width="64" height="64"></rect>
                    <text
                            x="50%"
                            y="60%"
                            text-anchor="middle"
                            fill="white"
                            font-size="24"
                            font-weight="bold"
                    >
                        B
                    </text>
                </svg>
            </div>

            <div class="loader">
                <svg viewBox="0 0 80 80">
                    <rect x="8" y="8" width="64" height="64"></rect>
                    <text
                            x="50%"
                            y="60%"
                            text-anchor="middle"
                            fill="white"
                            font-size="24"
                            font-weight="bold"
                    >
                        I
                    </text>
                </svg>
            </div>
        </div>
    </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: '#text-info',
            })
        </script>
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
        <script src="<?php echo base_url(); ?>assets/admin/modules/izitoast/js/iziToast.min.js"></script>

        <!-- Page Specific JS File
        <script src="<?php // echo base_url(); ?>assets/admin/js/page/index-0.js"></script>-->
        <script src="<?php echo base_url(); ?>assets/admin/js/page/modules-sweetalert.js"></script>

        <!-- Template JS File -->
        <script src="<?php echo base_url(); ?>assets/admin/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/custom.js"></script>

        <!-- Loader -->
        <script>
            $('#myOverlay').hide();
            $('#loadingGIF').hide();
        </script>
        <script>
            function showLoader(){
                $('#myOverlay').show();
                $('#loadingGIF').show();
            }
            function hideLoader(){
                $('#myOverlay').hide();
                $('#loadingGIF').hide();
            }
        </script>

        <!-- Toast in Flash data -->
        <script>
            if('<?= session()->getFlashdata('code') ?>'){
                if('<?= session()->getFlashdata('code') == "400" ?>'){
                    iziToast.error({
                        title: '<?= session()->getFlashdata('message') ?>',
                        message: '<?= session()->getFlashdata('result') ?>',
                        position: 'topRight'
                    });
                }
                if('<?= session()->getFlashdata('code') === "200" ?>'){
                    iziToast.success({
                        title: '<?= session()->getFlashdata('message') ?>',
                        message: '<?= session()->getFlashdata('result') ?>',
                        position: 'topRight'
                    });
                }
            }
        </script>

        <?= $this->include('Back/Admin/Product/Config/plugin-source-product'); ?>
        <?= $this->include('Back/Admin/Product/Config/plugin-product'); ?>
        <?= $this->include('Back/Admin/Product/Config/plugin-detail-product'); ?>
        <?= $this->include('Back/Admin/Gallery/Config/plugin_gallery'); ?>
        <?= $this->include('Back/Admin/Logo/Config/plugin_logo'); ?>
        <?= $this->include('Back/Admin/Visi_misi/Config/plugin_visi_misi'); ?>
    </body>
</html>