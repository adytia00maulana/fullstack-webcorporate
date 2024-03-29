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
                <form action="<?= base_url('admin/utilities/create-event') ?>" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Event Name</label>
                            <input type="text" class="form-control" name="event_name" id="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Event Thumbnail</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>End Date</label>
                            <input type="date" name="end_date" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Event Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>