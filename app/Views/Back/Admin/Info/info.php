<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>List Company Event</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary text-white my-2 float-right" href="<?= base_url('admin/utilities/form-event') ?>">Add Event</a>
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
                        <tr <?= empty($getList) ? '': "hidden='hidden'" ?>>
                            <td colspan="7" class="text-center">No data available in table</td>
                        </tr>
                        <?php
                            $no = 0;
                            $getData = $events ?? [];
                            foreach ($getData as $data_event) : $no++
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data_event['event_name'] ?></td>
                                <td><?= $data_event['filename'] ?? '-' ?></td>
                                <td class="text-break"><?= $data_event['description'] ?></td>
                                <td><?= date('d-m-Y', strtotime($data_event['start_date'])); ?></td>
                                <td><?= date('d-m-Y', strtotime($data_event['end_date'])); ?></td>
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
        </div>
    </div></section>
<?= $this->endSection() ?>