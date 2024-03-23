<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>List Company Event</h1>
    </div>
    <div class="card-body p-0">
        <a class="btn btn-primary text-white my-2">Add Event</a>
        <div class="table-responsive">
            <table class="table table-striped table-md">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Event Name</th>
                        <th>Event Start</th>
                        <th>Event End</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a class="btn btn-secondary">Detail</a>
                            <a class="btn btn-warning text-white">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?= $this->endSection() ?>