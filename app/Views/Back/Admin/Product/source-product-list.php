<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <h1>Application List</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Source Product</h4>
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
                            <?php
                                $no = 0;
                                if(isset($activePaginate)){
                                    if($activePaginate > 1) $no = (($activePaginate - 1) * 5);
                                }
                                foreach($getList as $row): $no++;
                            ?>
                            <?php
                                $id = $row['id'];
                                $name = $row['name'];
                                $active = $row['active'];
                                $created_by = $row['created_by'];
                                $created_date = $row['created_date'];
                                $updated_by = $row['updated_by'];
                                $updated_date = $row['updated_date'];
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $name ?></td>
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
                                    <td><a class="btn btn-secondary" id="modal-source-product">Detail</a></td>
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
                            <?php
                            $no = 1;
                            $active = false;
                            if(isset($listPaginate)) $no = 0;
                            foreach ($listPaginate as $data): $no = $data;?>
                                <li class="page-item <?= (($activePaginate ?? 1) == $data)? "active":"";?>"><a class="page-link" href="<?php $paginate = $no; if(isset($url_source_product_list)) echo $url_source_product_list.$paginate ?>"><?= $no ?></a></li>
                            <?php endforeach; ?>
                            <!-- <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <form class="modal-part" id="modal-source-product-value" action="<?php if(isset($postData)) echo $postData;?>" method="post">
        <?php // echo form_open($postData, array('class' => 'modal-part', 'id' => 'modal-source-product-value'));?>
        <?php // csrf_field(); ?>
            <p>This login form is taken from elements with <code>#modal-login-part</code> id.</p>
            <div class="form-group">
                <label>Username</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Email" name="email"/>
                </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
            </div>
            <div class="form-group mb-0">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                </div>
            </div>
        <?php // form_close(); ?>
    </form>
<?= $this->endSection() ?>