<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<br>
<br>
<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h3>Brand Ambassador</h3>
            <p></p>
        </div>

        <div class="row">
            <?php
                $no = 0;
                foreach($getListBa as $dataBa): $no++;
                $splitFileName = explode("_", $dataBa['filename']);
                $getFileName = $splitFileName[2];
                $splitDotfileName = explode(".", $getFileName)
            ?>
            <div class="col-lg-3 col-md-6 p-2" data-aos="fade-up" data-aos-delay="<?= $no*100 ?>">
                <div class="member bg-white">
                    <img src="<?= base_url().$viewPathBrandAmbassador.$dataBa['filename'] ?>" class="img-fluid" style="min-height: 200px; max-height: 200px" alt="Responsive Image">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>
                                <?php 
                                    $data = $splitDotfileName[(count($splitDotfileName)-1)];
                                    (int) $lengthData = -(strlen($data)+1);
                                ?>
                                <a href="<?= base_url().$viewPathBrandAmbassador.$dataBa['filename'] ?>" class="portfolio-lightbox text-white" data-gallery="portfolioGallery" title="<?= substr($getFileName, 0, $lengthData) ?>"><?= substr($getFileName, 0, $lengthData) ?></a>
                            </h4>
                            <span>Brand Ambassador</span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section><!-- End Team Section -->
<?= $this->endSection() ?>