<?= $this->extend('adm_layout/default') ?>

<?php// $this->extend('adm_layout/default_old') ?>

<?= $this->section('content') ?>
    <div class="content">
        <body>
            <div id="app">
            <section class="section">
            <div class="container mt-5">
                <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="<?= base_url('auth/check') ?>" class="needs-validation" novalidate="">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                <div class="invalid-feedback text-capitalize">Mohon masukkan alamat email anda</div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                <div class="invalid-feedback text-capitalize">mohon masukkan password anda</div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Login
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-4 mb-3">
                            <div class="text-success text-muted">
                                <a style="text-decoration: none;" href="<?= base_url('home') ?>">PTMakmur Bersama Indonesia</a>
                            </div>
                        </div>
                        <div class="row sm-gutters"></div>
                    </div>
                    <div class="simple-footer font-weight-bold">
                        Copyright &copy; Sruntulan <?= date('Y') ?>
                    </div>
                </div>
                </div>
            </div>
            </section>
        </div>
    </div>
<?= $this->endSection() ?>