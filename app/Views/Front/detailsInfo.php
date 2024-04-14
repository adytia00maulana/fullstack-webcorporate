<?= $this->extend('layouts/default') ?>
 
<?= $this->section('content') ?>
<br>
<br>
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h3 class="section-title"><?= isset($event_name)? $event_name:'Our Event' ?></h3>
        </header>
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <?php
                $no = 0;
                foreach($getListDetailsEvent as $dataDetailsEvent): $no++;
            ?>
            <?php
                $id = $dataDetailsEvent['id'];
                $filename = $dataDetailsEvent['filename'];
            ?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-web" data-wow-delay="<?= 0..$no?>s">
                <div class="portfolio-wrap">
                    <img src="<?= base_url().$viewPathDetailEvent.$filename ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4><a href="<?= base_url().$viewPathDetailEvent.$filename ?>" class="portfolio-lightbox" data-gallery="portfolioGallery" title="<?= ($event_name??'Event')." ".$no ?>"><?= ($event_name??'Event')." ".$no ?></a></h4>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section><!-- End Portfolio Section -->
<?= $this->endSection() ?>