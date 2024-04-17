<?= $this->extend('layouts/default') ?>
 
<?= $this->section('content') ?>
<br>
<br>
<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h3><?= $ref_store_name ?? 'Our Store' ?></h3>
            <p></p>
        </header>

        <div class="row g-5">
            <?php
                $no = 0;
                foreach($getDataListStore as $dataStore): $no++;
            ?>
            <div class="col-md-6 col-lg-4 wow bounceInUp" data-aos="zoom-in" data-aos-delay="<?= $no*50 ?>">
                <div class="box">
                    <!-- <div class="icon"> -->
                    <div class="p-2">
                        <img src="<?= base_url().$viewPathStore.$dataStore['store_image'] ?>" class="img-fluid rounded mx-auto d-block" style="max-height: 100px;" alt="">
                    </div>
                    <h4 class="title"><a href="<?= !isset($dataStore['store_link'])||$dataStore['store_link'] =='/'? '#':$dataStore['store_link']; ?>"><?= $dataStore['store_name'] ?></a></h4>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section><!-- End Services Section -->
<?= $this->endSection() ?>