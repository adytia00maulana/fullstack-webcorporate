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

    <title><?= $title; ?></title>
  </head>
  <body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-success fw-bold sticky-top">
		<div class="container">
			<a class="navbar-brand text-uppercase" href="<?= base_url('home') ?>">Home</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item mr-5 text-uppercase">
						<a class="nav-link" href="<?= base_url('about') ?>">Tentang Kami</a>
					</li>
                    <li class="nav-item mr-5 text-uppercase">
						<a class="nav-link" href="<?= base_url('product') ?>">Produk</a>
					</li>
				    <li class="nav-item mr-5 text-uppercase">
						<a class="nav-link" href="<?= base_url('gallery') ?>">Galer-i</a>
					</li>
					<li class="nav-item mr-5 text-uppercase">
						<a class="nav-link" href="<?= base_url('info') ?>">Info</a>
					</li>
					<li class="nav-item mr-5 text-uppercase">
						<a class="nav-link" href="<?= base_url('contact') ?>">Kontak Kami</a>
					</li>
					<li class="nav-item mr-5 text-uppercase">
						<a class="nav-link" href="<?= base_url('faq') ?>">Faq</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="wrapper">
		<div class="header">
			<div class="jumbotron jumbotron-fluid wall-home">
				<div class="container">
					<h1 class="display-4 text-white text-center fw-bold">PT Makmur Bersama Indonesia</h1>
				</div>
			</div>
		</div>x
		<div class="content">
			    <?= $this->renderSection('content') ?>			
		</div>
		<footer class="jumbotron jumbotron-fluid mt-5 mb-0">
			<div class="container text-center">Copyright &copy <?= Date('Y') ?> Sruntulan</div>
		</footer>
	</div>

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