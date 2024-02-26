<?= $this->extend('layouts/default') ?>
 
<?= $this->section('content') ?>
<div class="content-about-us">
    <div class="container py-3 my-3">
        <h1 class="text-center my-5 font-weight-bold">Produk Kami</h1>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card mt-3">
                        <img src="<?= base_url('assets/master/product/skincare/aloe_vera/aloe_vera_sooth.jpg') ?>" class="img-fluid w-100" alt="">
                        <div class="card-body">
                            <p class="card-text text-truncate">
                                Gel lidah buaya yang terbuat dari extract lidah buaya mampu melembabkan dan menutrisi secara alami serta
                                memberikan rasa segar pada kulit wajah. Selain untuk wajah, MAGIC PLUS White Aloe Vera Soothing Gel
                                dapat digunakan untuk bagian yang lain seperti tangan, kaki dan rambut. MAGIC PLUS White Aloe Vera
                                Soothing Gel juga dapat digunakan oleh Wanita dan Pria disetiap waktu.
                            </p>
                            <div class="card-title text-capitalize text-center">
                                <p class="font-weight-bold">
                                    aloe vera sooth
                                    <a href="#" class="card-link btn btn-primary float-right">Detail</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mt-3">
                        <img src="<?= base_url('assets/master/product/skincare/cover_classic/cover_classic_two_way_cake.png') ?>" class="img-fluid w-100" alt="">
                    <div class="card-body">
                        <p class="card-text text-truncate">
                            Cover Classic TWO WAY CAKE, ONE TOUCH PERFECT COVER
                            Mencerahkan kulit wajah dari dalam dan luar.
                        </p>
                        <div class="card-title text-capitalize text-center">
                            <p class="font-weight-bold">
                                cover classic
                                <a href="#" class="card-link btn btn-primary float-right">Detail</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>