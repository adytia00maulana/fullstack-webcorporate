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
                        <label for="">event name</label>
                        <input type="text" class="form-control" name="event_name">
                    </div>
                    <div class="form-group">
                        <label for="">event name</label>
                        <input type="text" class="form-control" name="event_name">
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>