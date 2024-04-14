<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="zoom-in">
            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper text-center">
                    <div class="swiper-slide">
                        <img src="<?php echo base_url(); ?>assets/front_end/assets/img/bg ambas.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php echo base_url(); ?>assets/front_end/assets/img/bg produk.png" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">

        <div class="container" data-aos="fade-up">
            <div class="row">

                <div class="col-lg-5 col-md-6">
                    <div class="about-img" data-aos="fade-right" data-aos-delay="100">
                        <img src="<?php echo base_url(); ?>assets/front_end/assets/img/MR. PARK.png" alt="">
                    </div>
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="about-content" data-aos="fade-left" data-aos-delay="100">
                        <h2>CEO Message</h2>
                        <h3>Welcome to KB Shop !</h3>
                        <p>First of all, I would like to express my sincere gratitude for your visit to our homepage.</p>
                        <p>As you navigate our website, I sincerely hope you learn about the information of Korea Best shop based in Indonesia as an outstanding distributor of the best quality consumer products mostly from the exciting morning calm land of R.O. Korea.
                        <br>As a leading distributor of the best quality consumer goods, we are trying our best to grow with our customers based on the first priority of customer satisfaction in all terms of competitive price, quality, and convenience.
                        <br>Our aspiration is defined by a simple set of core business values that describe how we operate every single day – Trust, Passion, and Contribution. They reflect how we interact with our customers, our business partners, and our communities.</p>
                        <p>I hope this provides you with a few good reasons to know KB(Korea Best) Shop better. Whether you are a potential customer, a business partner, we look forward to finding out how we can serve you for your perfect satisfaction.
                        <br>We wish the best to all visitors of our homepage.</p>
                        <p>With best regards</p>
                        <p>C. S. Park , President & CEO</p>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- End About Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container" data-aos="zoom-in">

            <header class="section-header">
                <h3>Our Store</h3>
            </header>

            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <?php $i=0; foreach($getAllStores as $dataStores): $i++;
                        $store_image = $dataStores['store_image'];
                        $store_name = $dataStores['store_name'];
                    ?>
                    <div class="swiper-slide"><img src="<?= base_url().$viewPathStore.$store_image ?>" class="img-fluid" alt=""></div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Clients Section -->
<?= $this->endSection() ?>