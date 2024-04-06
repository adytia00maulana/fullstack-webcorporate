<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Form Store</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary text-white my-2 text-capitalize"
                    href="<?= base_url('admin/utilities/store') ?>">back</a>
                <hr>
                <?php echo form_open_multipart(base_url('admin/utilities/create-store'));?>
                <?= csrf_field(); ?>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="id_ref_store">Type Store</label>
                            <select type="text" name="id_ref_store" class="form-control" id="id_ref_store" required>
                                <option value="">Choose Data</option>
                                <?php $iTypeDataStore = 0; foreach ($ref_stores as $dataRefStore): $iTypeDataStore++;
                                $idRefStore = $dataRefStore['id'];
                                $nameRefStore = $dataRefStore['name'];
                                ?>
                                <option value="<?= $idRefStore ?>"><?= $nameRefStore ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="store_name">Store Name</label>
                            <input type="text" class="form-control" name="store_name" id="store_name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="store_image">Store Thumbnail</label>
                            <input type="hidden" class="form-control" name="store_image" id="store_image">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="fileUpload" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="store_link">Store Link</label>
                            <input type="text" name="store_link" class="form-control" id="store_link" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>