<?= $this->extend('layouts/default') ?>
 
<?= $this->section('content') ?>
    <section id="courses-course-details" class="courses-course-details section">

      <div class="container" data-aos="fade-up">

        <div class="row">
          <!-- <div class="col-lg-8"> -->
          <div class="col-lg-12">
            <img src="<?= base_url().$viewPathProduct.$getDetailProduct->filename ?>" class="img-fluid" alt="">
            <h3><?= $getDetailProduct->name ?></h3>
            <p>
              <?= $getDetailProduct->description ?>
            </p>
          </div>
          <!-- <div class="col-lg-4">

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Trainer</h5>
              <p><a href="#">Walter White</a></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Course Fee</h5>
              <p>$165</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Available Seats</h5>
              <p>30</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Schedule</h5>
              <p>5.00 pm - 7.00 pm</p>
            </div>

          </div> -->
        </div>

      </div>

    </section>

    <section id="tabs" class="tabs section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Kemasan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Komposisi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Cara Pemakaian</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Mantaat</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                    <h3>Kemasan</h3>
                    <!-- <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p> -->
                    <p>10 Sachet, 30 Sachet/Box</p>
                  </div>
                  <!-- <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/tabs/tab-1.png" alt="" class="img-fluid">
                  </div> -->
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                    <h3>Komposisi</h3>
                    <!-- <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p> -->
                    <p>10 Sachet, 30 Sachet/Box</p>
                  </div>
                  <!-- <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/tabs/tab-2.png" alt="" class="img-fluid">
                  </div> -->
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                    <h3>Cara Pemakaian</h3>
                    <!-- <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p> -->
                    <p>1 sachet di minum satu hari, dapat diminum oleh laki-laki dan perempuan semua usia</p>
                  </div>
                  <!-- <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/tabs/tab-3.png" alt="" class="img-fluid">
                  </div> -->
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-12 details order-2 order-lg-1">
                    <h3>Mantaat</h3>
                    <!-- <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p> -->
                    <p>Menjaga Imunitas dan Daya Tahan Tubuh</p>
                  </div>
                  <!-- <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/tabs/tab-4.png" alt="" class="img-fluid">
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>
<?= $this->endSection() ?>