<?= $this->extend('layouts/default') ?>
 
<?= $this->section('content') ?>

<div class="section-video-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="video-background-holder">
            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="<?= base_url('assets/master/home/video_banner.mp4') ?>" type="video/mp4">
            </video>
            <div class="video-background-content container h-100">
                <div class="d-flex h-100 text-center align-items-center">
                    <div class="w-100 text-white">
                    <h1 class="font-weight-bold">PT Multri Bestri Indonesia</h1>
                    <div class="content">
                        <p>Deskripsi Slider</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-visi-misi mt-3 mb-3 pt-3 pb-3">
    <div class="container">
        <h1 class="font-weight-bold font-italic text-center mb-3">Visi & Misi</h1>
        <div class="row">
            <div class="col-md-6 text-heebo">
                <p>Visi : Menjadikan Perusahaan Distributor yang baik dan terpercaya</p>
            </div>
            <div class="col-md-6 text-heebo">
                <p>Misi : Sebagai Importir untuk produk-produk Kosmetika, Ginseng dan  Produk  lainnya dengan mutu dan kualitas yang baik dan dipercaya masyarakat. <br>
                Menjadikan kemitraan kerjasama yang baik dan mitra bisnis yang saling menguntungkan</p>
            </div>
        </div>
    </div>
</div>

<div class="section-slider">
    <div class="slider-produk">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= base_url('assets/master/home/bg_ambas.png') ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/master/home/bg_ambas.png') ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/master/home/bg_produk.png') ?>" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-ceo-speech mt-5 pt-5">
    <div class="container">
        <h1 class="font-weight-bold font-italic text-center mb-3">Sambutan CEO</h1>
        <div class="row">
            <div class="col-md-6">
                <p class="text-sm-left text-wrap">
                    Welcome to KBShop ! <br>
                    First of all, I would like to express my sincere gratitude for your visit to our homepage. As you navigate our website, I sincerely hope you learn about the information of Korea Best shop based in Indonesia as an outstanding distributor of the best quality consumer products mostly from the exciting morning calm land of R.O. Korea. <br>
                    As a leading distributor of the best quality consumer goods, we are trying our best to grow with our customers based on the first priority of customer satisfaction in all terms of competitive price, quality, and convenience. <br>
                    Our aspiration is defined by a simple set of core business values that describe how we operate every single day – Trust, Passion, and Contribution. They reflect how we interact with our customers, our business partners, and our communities. I hope this provides you with a few good reasons to know KB(Korea Best) Shop better. Whether you are a potential customer, a business partner, we look forward to finding out how we can serve you for your perfect satisfaction. We wish the best to all visitors of our homepage. <br>
                    With best regards
                    C. S. Park , President & CEO
                </p>
            </div>
            <div class="col-md-6">
                <img src="<?= base_url('assets/master/home/park.png') ?>" alt="" class="img-fluid mt-5">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>