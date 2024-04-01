<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Master Logo</h1>
    </div>

    <div class="section-body">
        <?php echo form_open_multipart($postData ?? '',  'id="setting-form"');?>
        <?= csrf_field(); ?>
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>Logo</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row align-items-center" hidden="hidden">
                        <label for="id" class="form-control-label col-sm-3 text-md-right">Id</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="id" class="form-control" id="id" value="<?= $id ?? 0 ?>">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="title" class="form-control-label col-sm-3 text-md-right">Site Title</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="title" class="form-control" id="title" value="<?= $title ?? '' ?>">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="filename" class="form-control-label col-sm-3 text-md-right">File Name Logo</label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" class="form-control" name="filename" id="filename" value="<?= $filename ?? '' ?>" readonly>
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
                    <div class="form-group row align-items-center">
                        <label class="form-control-label col-sm-3 text-md-right">Site Logo</label>
                        <div class="col-sm-6 col-md-9">
                            <div class="custom-file">
                                <input type="file" name="fileUpload" class="custom-file-input" id="fileUpload" onchange="changeFileLogo(event.target.files)">
                                <label class="custom-file-label" id="labelFileLogo">Choose File</label>
                            </div>
                            <div class="form-text text-muted">The image must have a maximum size of 3MB</div>
                        </div>
                    </div><div class="form-group row align-items-center">
                        <label class="form-control-label col-sm-3 text-md-right">Image Logo</label>
                        <div class="col-sm-6 col-md-auto bg-secondary p-2">
                            <img
                                    src="<?php
                                    if($filename == null){
                                        echo '';
                                    }else{
                                        $pathLogo = $viewPathLogo ?? '';
                                        $imgLogo = $filename ?? '';
                                        echo base_url(). $pathLogo.$imgLogo;
                                    }
                                    ?>"
                                    style="max-width: 200px" alt="Picture Not Found"
                                    onclick="viewImgLogo('<?= $filename ?>')"
                            >
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                    <button type="submit" class="btn btn-primary" id="save-btn" onclick="showLoader()">Save Changes</button>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</section>
<?= $this->endSection() ?>