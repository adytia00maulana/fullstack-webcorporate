<?= $this->extend('layouts/default') ?>
 
<?= $this->section('content') ?>

<div class="section-video-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="jumbotron-fluid">
                <div class="content-video">
                    <video class="img-fluid" autoplay loop muted>
                        <source src="https://mdbcdn.b-cdn.net/img/video/Tropical.mp4" type="video/mp4" />
                    </video>
                    <div class="carousel-caption d-none d-md-block">
                        <h4 class="font-weight-bold">PT Makmur Bersama Indonesia</h4>
                        <p>Deskripsi Slider</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-explore-content p-3 my-3 bg-transparent">
    <div class="container">
        <h1 class="text-start font-weight-bold font-italic mb-3">Jelajahi Konten Kami</h1>
        <div class="row">
            <div class="col-md-12">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis magni sed accusamus voluptatibus autem dignissimos totam delectus doloremque blanditiis provident nemo error ullam fugit, enim iure alias rerum deserunt ex a assumenda eveniet odit. Eum recusandae laudantium distinctio eius omnis exercitationem, ratione vitae culpa perspiciatis.
            </div>
        </div>
    </div>
</div>

<div class="section-product-service p-3 my-3" style="background: #eaeaea;">
    <div class="container">
        <h1 class="text-center font-weight-bold font-italic mb-4">Produk & Layanan</h1>
        <div class="row">
            <div class="col-md-6">
                <p class="text-sm-left text-wrap">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque expedita est saepe. Nostrum eligendi distinctio, ratione odit eum, maiores odio dolor unde maxime accusamus tempore.
                </p>
            </div>
            <div class="col-md-6">
                <img src="http://localhost/ci-park-adm/assets/img/stisla-fill.svg" alt="" class="img-fluid w-50">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>