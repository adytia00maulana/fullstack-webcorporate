<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Visi and Misi</h1>
    </div>

    <div class="section-body">
        <?php echo form_open($postData ?? '',  'id="setting-form"');?>
        <?= csrf_field(); ?>
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>Visi</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row align-items-center" hidden="hidden">
                        <label for="id" class="form-control-label col-sm-3 text-md-right">Id</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="id" class="form-control" id="id" value="<?= $id ?? 0 ?>">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="visi" class="form-control-label col-sm-3 text-md-right" hidden="hidden">Visi</label>
                        <div class="col-md-12">
                            <textarea class="form-control summernote" name="visi" id="visi"><?= $visi ?? '' ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                    <button type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
                </div>
            </div>
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>Misi</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row align-items-center">
                        <label for="misi" class="form-control-label col-sm-3 text-md-right" hidden="hidden">Misi</label>
                        <div class="col-md-12">
                            <textarea class="form-control summernote" name="misi" id="misi"><?= $misi ?? '' ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row align-items-center" hidden="hidden">
                        <label for="created_by" class="form-control-label col-sm-3 text-md-right">Created By</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="created_by" class="form-control" id="created_by" value="<?= $created_by ?? '' ?>">
                        </div>
                    </div>
                    <div class="form-group row align-items-center" hidden="hidden">
                        <label for="created_date" class="form-control-label col-sm-3 text-md-right">Created Date</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="created_date" class="form-control" id="created_date" value="<?= $created_date ?? '' ?>">
                        </div>
                    </div>
                    <div class="form-group row align-items-center" hidden="hidden">
                        <label for="updated_by" class="form-control-label col-sm-3 text-md-right">Updated By</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="updated_by" class="form-control" id="updated_by" value="<?= $updated_by ?? '' ?>">
                        </div>
                    </div>
                    <div class="form-group row align-items-center" hidden="hidden">
                        <label for="updated_date" class="form-control-label col-sm-3 text-md-right">Updated Date</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="updated_date" class="form-control" id="updated_date" value="<?= $updated_date ?? '' ?>">
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                    <button type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</section>
<?= $this->endSection() ?>