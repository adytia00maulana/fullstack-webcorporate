<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Gallery</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <!-- <div class="card-header">
                 <h4>ABOUT US</h4>
             </div>-->
             <div class="row">
                 <div class="col-12">
                     <div class="card">
                         <div class="card-header">
                             <h4>Gallery</h4>
                         </div>
                         <div class="card-body">
                             <div class="section-title">File Browser</div>
                             <?php if(isset($upload)) echo form_open_multipart($upload."0"); ?>
                             <?= csrf_field(); ?>
                             <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="customFile" name="fileUpload[]" multiple onchange="changeFileGallery(event.target.files)">
                                 <label class="custom-file-label" for="customFile" id="labelFile">Choose file</label>
                             </div>
                             <button type="submit" class="btn btn-info" id="uploadFile" style="display: none">Upload</button>
                             <?php echo form_close(); ?>
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>