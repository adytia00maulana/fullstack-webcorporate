<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>List Stores</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Stores</h4>
        </div>
        <div class="card-body">
            <a class="btn btn-primary text-white my-2 float-right" href="<?= base_url('admin/utilities/form-store') ?>">Add Store</a>
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Store Name</th>
                        <th>Store Link</th>
                        <th>Thumbnail</th>
                        <th>Create</th>
                        <th>Update</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr <?= empty($getList) ? '': "hidden='hidden'" ?>>
                        <td colspan="7" class="text-center">No data available in table</td>
                    </tr>
                    <?php $no=0; foreach ($stores as $data_store) : $no++?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data_store['store_name']; ?></td>
                            <td><?= $data_store['store_link'] ?></td>
                            <td><?= $data_store['store_image'] ?? '-' ?></td>
                            <td><?= date('Y-m-d', strtotime($data_store['created'])) ?></td>
                            <td><?= date('Y-m-d', strtotime($data_store['updated'])) ?></td>
                            <td>
                                <a class="btn btn-secondary" href="<?= base_url('admin/utilities/form-detail-store/'.$data_store['id']) ?>">Detail</a>
                                <a class="btn btn-warning text-white">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>