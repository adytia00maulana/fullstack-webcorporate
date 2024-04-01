<?= $this->extend('layouts/default') ?>
 
<?= $this->section('content') ?>
    <section id="trainers-index" class="section trainers-index">

      <div class="container">

        <div class="row">
            <?php
                $no = 0;
                foreach($getGallery as $dataGallery): $no++;
            ?>
            <?php
                $id = $dataGallery['id'];
                $filename = $dataGallery['filename'];
            ?>
            <div class="col-lg-4 col-md-6 d-flex p-1" data-aos="fade-up" data-aos-delay="100">
                <!-- <div class="member"> -->
                <img src="<?= base_url().$viewPathGallery.$filename ?>" class="img-fluid" alt="">
                    <!-- <div class="member-content">
                        <h4>Walter White</h4>
                        <span>Web Development</span>
                        <p>
                        Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
                        </p>
                        <div class="social">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div> -->
                <!-- </div> -->
            </div>
            <?php endforeach; ?>

        </div>

      </div>

    </section>
<?= $this->endSection() ?>