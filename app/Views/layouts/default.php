<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<!-- style css -->
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/product.css') ?>" />
	<!-- font google outfit and heebo -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Pathway+Extreme:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <title><?= $title; ?></title>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-dark fw-bold sticky-top font-pathway-extreme" style="background-color: silver">
		<div class="container">
			<a class="navbar-brand text-uppercase" href="<?= base_url('#') ?>">
			<img src="<?= base_url('assets/img/logo_mbi.png') ?>" width="90px" class="img-fluid" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item mr-5 text-capitalize">
						<a class="nav-link" href="<?= base_url('about') ?>">Tentang Kami</a>
					</li>
					<li class="nav-item mr-5 text-capitalize">
						<a class="nav-link" href="<?= base_url('product') ?>">Produk</a>
					</li>
					<li class="nav-item mr-5 text-capitalize">
						<a class="nav-link" href="<?= base_url('gallery') ?>">Galeri</a>
					</li>
					<li class="nav-item mr-5 text-capitalize">
						<a class="nav-link" href="<?= base_url('info') ?>">Info</a>
					</li>
					<li class="nav-item mr-5 text-capitalize">
						<a class="nav-link" href="<?= base_url('contact') ?>">Kontak Kami</a>
					</li>
					<li class="nav-item mr-5 text-capitalize">
						<a class="nav-link" href="<?= base_url('faq') ?>">Faq</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
		<div class="content-wrapper">
			<?= $this->renderSection('content') ?>			
		</div>
	
		<footer class="footer p-3 bg-secondary">
			<div class="container text-center">Copyright &copy <?= Date('Y') ?> Makmur Bersama Indonesia</div>
		</footer>

	<!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>