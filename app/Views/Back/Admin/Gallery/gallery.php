<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Gallery</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Master Gallery</h4>
            </div>
            <div class="card-body">
                <div class="section-title">ADD Data Gallery</div>
                <?php if(isset($upload)) echo form_open_multipart($upload."0"); ?>
                <?= csrf_field(); ?>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="fileUpload[]" multiple accept="image/*" onchange="changeFileGallery(event.target.files, '0')">
                    <label class="custom-file-label" for="customFile" id="labelFile">Choose file .PNG, .JPG or .JPEG</label>
                </div>
                <button type="submit" class="btn btn-info" id="uploadFile" style="display: none">Upload</button>
                <?php echo form_close(); ?>
                <br/>
                <p></p>
                <div class="table-responsive">
                    <table class="table table-striped" id="table-gallery">
                        <thead class="table-primary">
                        <tr>
                            <th class="text-center">#</th>
                            <th>File Name</th>
                            <th>Created By</th>
                            <th>Created At</th>
                            <th>Updated By</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 0; foreach($getList as $row): $no++;?>
                            <?php
                            $id = $row['id'];
                            $filename = $row['filename'];
                            $filepath = $row['filepath'];
                            $created_by = $row['created_by'];
                            $created_date = $row['created_date'];
                            $updated_by = $row['updated_by'];
                            $updated_date = $row['updated_date'];
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $filename ?></td>
                                <td><?= $created_by ?></td>
                                <td><?= $created_date? date('D, d M Y H:i:s', strtotime($created_date)): '' ?></td>
                                <td><?= $updated_by? $updated_by : 'No Updated' ?></td>
                                <td><?= $updated_date? date('D, d M Y H:i:s', strtotime($updated_date)): 'No Updated' ?></td>
                                <td>
                                    <?php if(isset($upload)) echo form_open_multipart($upload.$id); ?>
                                    <?= csrf_field(); ?>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="fileUpload[]" onchange="changeFileGallery(event.target.files, <?= $id ?>)">
                                        <label class="custom-file-label" id="updatedFileUpload<?= $id ?>"></label>
                                        <input type="hidden" name="filename" value="<?= $filename ?>">
                                    </div>
                                    <button type="submit" class="btn btn-info" id="updatedFile<?= $id ?>" style="display: none">Upload</button>
                                    <?php echo form_close(); ?>
                                    <a class="btn btn-warning text-white" onclick="deleteGallery(<?= $id ?>, '<?= $filename ?>')">Delete</a>
                                    <a class="btn btn-secondary" onclick="viewImgGallery('<?= $filename ?>')">View</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>