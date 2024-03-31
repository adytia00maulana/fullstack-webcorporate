<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Form Update Store</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary text-white my-2 text-capitalize"
                    href="<?= base_url('admin/utilities/store') ?>">back</a>
                <hr>
                <form action="<?= base_url('admin/utilities/update-store/' . $stores->id) ?>" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Store Name</label>
                            <input type="text" class="form-control" name="store_name" id=""
                                value="<?= $stores->store_name ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Event Thumbnail</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Store Link</label>
                            <input type="text" name="store_link" class="form-control" id="" value="<?= $stores->store_link ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>