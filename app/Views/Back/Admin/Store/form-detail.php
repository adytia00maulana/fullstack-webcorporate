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

                <?php echo form_open_multipart(base_url('admin/utilities/update-store/'. $id));?>
                <?= csrf_field(); ?>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="id_ref_store">Type Store</label>
                            <select type="text" name="id_ref_store" class="form-control" id="id_ref_store" required>
                                <option value="<?= $id_ref_store ?>">
                                    <?php
                                        $finddingValue = array_filter($ref_stores, function ($obj) use ($id_ref_store) {
                                            return $obj['id'] == $id_ref_store;
                                        });
                                        echo ($finddingValue[key($finddingValue)]['name']);
                                    ?>
                                </option>
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
                            <input type="text" class="form-control" name="store_name" id="store_name" value="<?= $store_name ?? '' ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="store_image">Store Thumbnail</label>
                            <input type="text" readonly class="form-control" name="store_image" id="store_image" value="<?= $store_image ?? '' ?>">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="fileUpload">
                                <label class="custom-file-label" for="customFile">Choose file for Edit</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="store_link">Store Link</label>
                            <input type="text" name="store_link" class="form-control" id="store_link" value="<?= $store_link ?? '' ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>