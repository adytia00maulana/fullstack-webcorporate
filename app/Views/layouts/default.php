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

    <title>CI PARK</title>
  </head>
  <body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-success fw-bold">
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
						<a class="nav-link" href="<?= base_url('') ?>">Produk</a>
					</li>
				    <li class="nav-item mr-5 text-uppercase">
						<a class="nav-link" href="<?= base_url('') ?>">Galer-i</a>
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


	<header class="jumbotron jumbotron-fluid mt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">Hirup Gampang Kalo Ada Codeigniter</h1>
				</div>
				<div class="col-md-6">
					Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat alias dolorem aspernatur commodi explicabo voluptatum veniam iusto provident enim ipsa consequatur nihil atque, maiores repudiandae voluptatem dolores, quasi numquam id placeat praesentium earum, architecto harum temporibus? Similique recusandae voluptatem voluptate, fuga id ratione hic impedit? Repellat facere, perferendis velit reiciendis dolores esse tempora pariatur, obcaecati magni ducimus laborum quia reprehenderit impedit ad iusto atque laudantium quaerat. Sequi quam excepturi illum temporibus consequuntur? Expedita nemo iusto et modi aut, dolores, eius distinctio doloremque quas aliquam voluptatum sit! Nisi asperiores magni in voluptate corrupti, commodi vero odio neque suscipit inventore maiores unde.
				</div>
								<div class="col-md-6">
					Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat alias dolorem aspernatur commodi explicabo voluptatum veniam iusto provident enim ipsa consequatur nihil atque, maiores repudiandae voluptatem dolores, quasi numquam id placeat praesentium earum, architecto harum temporibus? Similique recusandae voluptatem voluptate, fuga id ratione hic impedit? Repellat facere, perferendis velit reiciendis dolores esse tempora pariatur, obcaecati magni ducimus laborum quia reprehenderit impedit ad iusto atque laudantium quaerat. Sequi quam excepturi illum temporibus consequuntur? Expedita nemo iusto et modi aut, dolores, eius distinctio doloremque quas aliquam voluptatum sit! Nisi asperiores magni in voluptate corrupti, commodi vero odio neque suscipit inventore maiores unde.
				</div>
			</div>
		</div>
    </header>
    
    <?= $this->renderSection('content') ?>

	<footer class="jumbotron jumbotron-fluid mt-5 mb-0">
		<div class="container text-center">Copyright &copy <?= Date('Y') ?> Sruntulan</div>
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