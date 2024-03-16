<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <h1>List Company Info</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Company Info</h4>
                </div>
                <div class="card-body p-3">
                    <form action="<?= base_url('') ?>" method="post">
                        <div class="form-group">
                            <textarea name="info" id="text-info" rows="10" cols="80"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>