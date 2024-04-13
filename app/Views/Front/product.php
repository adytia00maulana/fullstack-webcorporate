<?= $this->extend('layouts/default') ?>
 
<?= $this->section('content') ?>
<p></p>
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing section-bg wow fadeInUp">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
        <h3><?= empty($getListDetailProduct)? 'Product' : $getListDetailProduct[0]['name_product'] ?></h3>
        <?php if(empty($getListDetailProduct)) { ?>
            <p></p>
        <?php } else { ?>
            <p>
                <?php if($getListDetailProduct[0]['filename_product'] != NULL) { ?>
                    <img src="<?= base_url().$viewPathProduct.$getListDetailProduct[0]['filename_product']?>" class="img-fluid w-75 h-75" alt="">
                <?php } ?>
            </p>
        <?php } ?>
    </header>

    <div class="row flex-items-xs-middle flex-items-xs-center">
        <?php
            $no = 0;
            foreach($getListDetailProduct as $dataDetailProd): $no++;
        ?>
        <div class="col-xs-12 col-lg-4 p-2" data-aos="fade-up" data-aos-delay="<?= $no*100 ?>">
            <div class="card">
            <div class="card-header">
                <img src="<?= base_url().$viewPathDetailProduct.$dataDetailProd['filename'] ?>" class="img-fluid w-50 h-50 rounded" alt="">
            </div>
            <div class="card-block">
                <h4 class="card-title"><?= $dataDetailProd['name']; ?></h4>
                <ul class="list-group">
                    <li class="list-group-item"><?= $dataDetailProd['description']; ?></li>
                </ul>
                <a href="<?= $url_detail_product.$dataDetailProd['id'] ??'' ?>" class="btn">Choose Product</a>
            </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
  </div>

</section><!-- End Pricing Section -->
<?= $this->endSection() ?>