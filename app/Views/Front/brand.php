<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1 class="p-5 text-center">Brand Ambasador</h1>
    <div class="row">
        <div class="PostSlide">
            <div class="innerContainer active">
                <div class="slider">
                    <div class="slide">
                        <div
                        class="img-fluid" style="background:url('<?= base_url('assets/img/ba/syahnaz1.png') ?>')">
                        </div>
                    </div>
                    <div class="slide">
                        <div
                        class="img-fluid" style="background:url('<?= base_url('assets/img/ba/alice_nor1.png') ?>')">
                        </div>
                    </div>
                    <div class="slide">
                        <div
                        class="img-fluid" style="background:url('<?= base_url('assets/img/ba/bp2.png') ?>')">
                        </div>
                    </div>
                    <div class="slide">
                        <div
                        class="img-fluid" style="background:url('<?= base_url('assets/img/ba/haikal2.png') ?>')">
                        </div>
                    </div>
                    <div class="slide">
                        <div
                        class="img-fluid" style="background:url('<?= base_url('assets/img/ba/ashanty.jpg') ?>')">
                        </div>
                    </div>
                    <div class="slide">
                        <div
                            class="img-fluid" style="background:url('<?= base_url('assets/img/ba/paramita.jpg') ?>')">
                        </div>
                    </div>

                </div>

                <div class="handles">
                    <span class="prev">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.0001 19.92L8.48009 13.4C7.71009 12.63 7.71009 11.37 8.48009 10.6L15.0001 4.07999"
                                stroke="rgb(55 65 81/1)" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </span>
                    <span class="next">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.99991 19.92L15.5199 13.4C16.2899 12.63 16.2899 11.37 15.5199 10.6L8.99991 4.07999"
                                stroke="rgb(55 65 81/1)" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </div>
                <div class="dots">
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>