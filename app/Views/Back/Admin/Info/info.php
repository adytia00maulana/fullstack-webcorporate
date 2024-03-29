<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>List Company Event</h1>
    </div>
    <div class="card-body p-0">
        <?php if(!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success">
        <?php echo session()->getFlashdata('message');?>
        </div>
        <?php endif ?>
        <a class="btn btn-primary text-white my-2" href="<?= base_url('admin/utilities/form-event') ?>">Add Event</a>
        <div class="table-responsive">
            <table class="table table-striped table-md">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Event Name</th>
                        <th>Thumbnail</th>
                        <th>Event Description</th>
                        <th>Event Start</th>
                        <th>Event End</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($events as $data_event) : ?>
                        <tr>
                            <td></td>
                            <td><?= $data_event['event_name'] ?></td>
                            <td>-</td>
                            <td class="text-break"><?= $data_event['description'] ?></td>
                            <td><?= date('Y-m-d', strtotime($data_event['start_date'])); ?></td>
                            <td><?= date('Y-m-d', strtotime($data_event['end_date'])); ?></td>
                            <td>
                                <a class="btn btn-secondary" href="<?= base_url('admin/utilities/form-detail-event/'.$data_event['id']) ?>">Detail</a>
                                <a class="btn btn-warning text-white">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?= $this->endSection() ?>