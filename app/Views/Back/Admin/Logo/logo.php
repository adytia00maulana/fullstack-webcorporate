<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Gallery</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Master Logo</h4>
            </div>
            <div class="card-body">
                <div class="section-title">Edit Logo</div>
                <?php if(isset($upload)) echo form_open_multipart($upload."0"); ?>
                <?= csrf_field(); ?>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="fileUpload[]" multiple accept="image/*">
                    <label class="custom-file-label" for="customFile" id="labelFile">Choose file .PNG, .JPG or .JPEG</label>
                </div>
                <button type="submit" class="btn btn-info" id="uploadFile" style="display: none">Upload</button>
                <?php echo form_close(); ?>
                <br/>
                <p></p>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>