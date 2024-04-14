<?= $this->extend('layouts/default') ?>
 
<?= $this->section('content') ?>
<p></p>
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="/">Home</a></li>
      <li>Product Details</li>
    </ol>
    <h2><?= $getDetailProduct->name ?></h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
  <div class="container">

    <div class="row gy-4">
      <div class="col-lg-8">
        <!-- <div class="portfolio-details-slider swiper">
          <div class="swiper-wrapper align-items-center">

            <div class="swiper-slide"> -->
              <img src="<?= base_url().$viewPathDetailProduct.$getDetailProduct->filename ?>" class="img-fluid w-100 h-100" alt="Responsive image">
            <!-- </div> -->

            <!-- <div class="swiper-slide">
              <img src="<?php // echo base_url().$viewPathDetailProduct.$getDetailProduct->filename ?>" alt="">
            </div>

            <div class="swiper-slide">
              <img src="<?php // echo base_url().$viewPathDetailProduct.$getDetailProduct->filename ?>" alt="">
            </div> -->

          <!-- </div>
          <div class="swiper-pagination"></div>
        </div> -->
      </div>

      <div class="col-lg-4">
        <div class="portfolio-info">
          <h3>Project information</h3>
          <ul>
            <li>
                <strong>Packaging</strong>:
                <br/><?= $getDetailProduct->packaging ?>
            </li>
            <li>
                <strong>Composition</strong>:
                <br/><?= $getDetailProduct->composition ?>
            </li>
            <li>
                <strong>Usage Method</strong>:
                <br/><?= $getDetailProduct->usage_method ?>
            </li>
            <li>
                <strong>Benefits</strong>:
                <br/><?= $getDetailProduct->benefits ?>
             </li>
          </ul>
        </div>
        <div class="portfolio-description">
          <h2>Detail <?= $getDetailProduct->name ?></h2>
          <p>
            <?= $getDetailProduct->description ?>
          </p>
        </div>
        <a href="https://linktr.ee/kbshopofficial" class="btn btn-success">Get Now on Official Online Store</a>
      </div>
    </div>

  </div>
</section><!-- End Portfolio Details Section -->

<?= $this->endSection() ?>