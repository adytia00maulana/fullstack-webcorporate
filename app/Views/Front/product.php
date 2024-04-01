<?= $this->extend('layouts/default') ?>
 
<?= $this->section('content') ?>
<section id="courses-list" class="section courses-list">
    <div class="container">
        <div class="row">
            <?php
                $no = 0;
                foreach($getListDetailProduct as $dataDetailProd): $no++;
            ?>
            <?php
                $id = $dataDetailProd['id'];
                $id_product = $dataDetailProd['id_product'];
                $name_product = $dataDetailProd['name_product'];
                $id_source_product = $dataDetailProd['id_source_product'];
                $name_source_product = $dataDetailProd['name_source_product'];
                $code = $dataDetailProd['code'];
                $name = $dataDetailProd['name'];
                $filename = $dataDetailProd['filename'];
                $filepath = $dataDetailProd['filepath'];
                $description = $dataDetailProd['description'];
                $active = $dataDetailProd['active'];
                $created_by = $dataDetailProd['created_by'];
                $created_date = $dataDetailProd['created_date'];
                $updated_by = $dataDetailProd['updated_by'];
                $updated_date = $dataDetailProd['updated_date'];
            ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="course-item">
                    <img src="<?= base_url().$viewPathProduct.$filename ?>" class="img-fluid" alt="...">
                    <div class="course-content">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <p class="category"><?= $name_product ?></p>
                        <!-- <p class="price">$169</p> -->
                    </div>

                    <h3><a href="<?= $url_detail_product.$id ?>"><?= $name ?></a></h3>
                    <p class="description" data-toggle="tooltip" data-placement="right" title="<?= (chunk_split($description, 100, "\n")); ?>"><?= (chunk_split($description, 100, "\n")); ?></p>
                    <!-- <div class="trainer d-flex justify-content-between align-items-center">
                        <div class="trainer-profile d-flex align-items-center">
                        <img src="assets/img/trainers/trainer-1-2.jpg" class="img-fluid" alt="">
                        <a href="" class="trainer-link">Antonio</a>
                        </div>
                        <div class="trainer-rank d-flex align-items-center">
                        <i class="bi bi-person user-icon"></i>&nbsp;50
                        &nbsp;&nbsp;
                        <i class="bi bi-heart heart-icon"></i>&nbsp;65
                        </div>
                    </div> -->
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>