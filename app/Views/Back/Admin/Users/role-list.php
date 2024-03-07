<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <h1>Application List</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Role</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Role Name</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Updated By</th>
                                <th>Updated At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 0; foreach($getListRole as $row): $no++;?>
                            <?php
                                $id = $row['id'];
                                $role_name = $row['role_name'];
                                $active = $row['active'];
                                $created_by = $row['created_by'];
                                $created_date = $row['created_date'];
                                $updated_by = $row['updated_by'];
                                $updated_date = $row['updated_date'];
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $role_name ?></td>
                                    <td><?= $created_date? date('D, d M Y H:i:s', strtotime($created_date)): '' ?></td>
                                    <td><?= $created_by ?></td>
                                    <td><?= $updated_by? $updated_by : 'No Updated' ?></td>
                                    <td><?= $updated_date? date('D, d M Y H:i:s', strtotime($updated_date)): 'No Updated' ?></td>
                                    <td>
                                        <?php
                                        if(isset($active)){
                                            if($active == 1){
                                                echo('<div class="badge badge-success">Active</div>');
                                            }else{
                                                echo('<div class="badge badge-danger">Not Active</div>');
                                            }
                                        }else{
                                            echo('<div class="badge badge-danger">Not Active</div>');
                                        }
                                        ?>
                                    </td>
                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>