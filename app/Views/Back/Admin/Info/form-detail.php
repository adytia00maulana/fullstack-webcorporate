<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Form Update Event</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary text-white my-2 text-capitalize"
                    href="<?= base_url('admin/utilities/event') ?>">back</a>
                <hr>
                <?php echo form_open_multipart(base_url('admin/utilities/update-event/' . $id));?>
                <?= csrf_field(); ?>
                    <div class="form-group row">
                        <div class="col">
                            <label for="event_name">Event Name</label>
                            <input type="text" class="form-control" name="event_name" id="event_name" value="<?= $event_name ?? ''; ?>">
                        </div>
                        <div class="col">
                            <label for="filename">Event Thumbnail</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fileUpload" name="fileUpload" onchange="changeFileEvent()">
                                <label class="custom-file-label" for="fileUpload" id="labelFileUploadEvent">Choose file for Edit</label>
                            </div>
                            <input type="text" class="form-control" id="filename" name="filename" value="<?= $filename ?? '' ?>" readonly/>
                            <button type="button" class="btn btn-secondary" onclick="viewImgEvent('<?= $filename ?? '' ?>')">View</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="start_date" value="<?= $start_date ?? ''; ?>">
                        </div>
                        <div class="col">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" class="form-control" id="end_date" value="<?= $end_date ?? ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Event Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3" style="height:100px"><?= $description ?? ''; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="section-title">ADD Data Event</div>
                <?php if(isset($uploadEvent)) echo form_open_multipart($uploadEvent."0"); ?>
                <?= csrf_field(); ?>
                <input type="hidden" name="id_event" id="id_event" value="<?= $id ?? '' ?>">
                <input type="hidden" name="position" id="position" value="0">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="fileUpload[]" multiple accept="image/*" onchange="changeFileDetailEvent(event.target.files, '0')">
                    <label class="custom-file-label" for="customFile" id="labelFile">Choose file .PNG, .JPG or .JPEG</label>
                </div>
                <div class="form-text text-muted">The image must have a maximum size of 8MB</div>
                <button type="submit" class="btn btn-info" id="uploadFile" style="display: none" onclick="showLoader()">Upload</button>
                <?php echo form_close(); ?>
                <br/>
                <p></p>
                <div class="table-responsive">
                    <table class="table table-striped" id="table-event">
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
                        <?php $no = null; foreach($getList as $row): $no++;?>
                            <?php
                            $id = $row['id'];
                            $filename = $row['filename'];
                            $position = $row['position'];
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
                                    <input type="hidden" name="id_event" id="id_event" value="<?= $id ?? '' ?>">
                                    <input type="hidden" name="position" id="position" value="<?= $position ?? 0 ?>">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="fileUpload[]" onchange="changeFileDetailEvent(event.target.files, <?= $id ?>)">
                                        <label class="custom-file-label" id="updatedFileUpload<?= $id ?>">Edit</label>
                                        <input type="hidden" name="filename" value="<?= $filename ?>">
                                    </div>
                                    <button type="submit" class="btn btn-info" id="updatedFile<?= $id ?>" style="display: none" onclick="showLoader()">Upload</button>
                                    <?php echo form_close(); ?>
                                    <a class="btn btn-warning text-white" id="deleteFile<?= $id ?>" onclick="deleteDetailEvent(<?= $id ?>, '<?= $filename ?>')">Delete</a>
                                    <a class="btn btn-secondary" id="viewFile<?= $id ?>" onclick="viewImgDetailEvent('<?= $filename ?>')">View</a>
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