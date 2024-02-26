<?= $this->extend('layouts/default') ?>
 
<?= $this->section('content') ?>
<div class="section-contact-us">
    <div class="row">
    <div class="col-md-12">
            <div class="container-contact">
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d112061.09262729759!2d77.208022!3d28.632485!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x644e33bc3def0667!2sIndior+Tours+Pvt+Ltd.!5e0!3m2!1sen!2sus!4v1527779731123" width="100%" height="650px" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
            <div class="contact-form">
                <h1 class="title">Contact Us</h1>
                <form action="">
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Your Name" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="e-mail" placeholder="Your E-mail Adress" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="tel" name="phone" placeholder="Your Phone Number"/>
                    </div>
                    <textarea class="form-control" name="text" id="" rows="8" placeholder="Your Message"></textarea>
                    <div class="" style="padding: 1.4em 0 0 2.6em">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
     </div>
</div>
</div>
<?= $this->endSection() ?>