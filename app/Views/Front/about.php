<?= $this->extend('layouts/default') ?>
 
<?= $this->section('content') ?>
<br>
<br>
<br>
<br>
<!-- Contact Section -->
<section id="contact" class="contact section">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h3>Contact Us</h3>
            <!-- <p></p> -->
        </header>
    </div>
    <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <!-- <iframe style="border:0; width: 100%; height: 300px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
        <img src="<?= base_url() ?>assets/front_end/assets/img/cs.png" class="img-fluid w-50" style="max-height: 300px" alt="">
    </div><!-- End Google Maps -->
</section><!-- /Contact Section -->
<?= $this->endSection() ?>