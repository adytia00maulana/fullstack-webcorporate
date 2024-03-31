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
    </div>
</section>
<?= $this->endSection() ?>