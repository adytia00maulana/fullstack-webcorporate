<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Form Event</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary text-white my-2 text-capitalize"
                    href="<?= base_url('admin/utilities/event') ?>">back</a>
                <hr>
                <?php echo form_open_multipart(base_url('admin/utilities/create-event'));?>
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="event_name">Event Name</label>
                            <input id="event_name" type="text" class="form-control" name="event_name">
                        </div>
                        <div class="col-md-6">
                            <label>Event Thumbnail</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fileUpload" name="fileUpload" onchange="changeFileEvent()">
                                <label class="custom-file-label" for="fileUpload" id="labelFileUploadEvent">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>End Date</label>
                            <input type="date" name="end_date" class="form-control" id="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Event Description</label>
                        <textarea class="form-control" name="description" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>