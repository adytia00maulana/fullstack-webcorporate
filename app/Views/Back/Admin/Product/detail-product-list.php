<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <h1>Application List</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4><?= $title ?? 'Detail Product' ?></h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md" id="table-detail-product">
                            <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Source Product</th>
                                <th>Code Product</th>
                                <th>Detail Product Name</th>
                                <th>Description</th>
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
                                $id_product = $row['id_product'];
                                $name_product = $row['name_product'];
                                $id_source_product = $row['id_source_product'];
                                $name_source_product = $row['name_source_product'];
                                $code = $row['code'];
                                $name = $row['name'];
                                $filename = $row['filename'];
                                $filepath = $row['filepath'];
                                $description = $row['description'];
                                $active = $row['active'];
                                $created_by = $row['created_by'];
                                $created_date = $row['created_date'];
                                $updated_by = $row['updated_by'];
                                $updated_date = $row['updated_date'];
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $name_source_product ?></td>
                                    <td><?= $code ?></td>
                                    <td><?= $name ?></td>
                                    <td><?= $description ?></td>
                                    <td><?= $created_by ?></td>
                                    <td><?= $created_date? date('D, d M Y H:i:s', strtotime($created_date)): '' ?></td>
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
                                    <td><button type="button" class="btn btn-secondary">Detail</button></td>
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
                                    <li class="page-item <?= (($activePaginate ?? 1) == $data)? "active":"";?>"><a class="page-link" href="<?php $paginate = $no; if(isset($url_detail_product_list)) echo $url_detail_product_list.$id_product."/".$paginate ?>"><?= $no ?></a></li>
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

            <div class="modal-part">
                <div class="form-group">
                    <label for="table">ID</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="ID" name="id_product" id="id_product">
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_product">ID Product</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="ID Product" name="id_product_product" id="id_product_product">
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_product_product">Product Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="Product Name" name="name_product_product" id="name_product_product">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name_product_product">ID Source Product</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="ID Source Product" name="id_source_product_product" id="id_source_product_product">
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_source_product_product">Source Product Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="Source Product Name" name="name_source_product_product" id="name_source_product_product">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name_source_product_product">Code Detail Product</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="Code Detail Product" name="code_product" id="code_product">
                    </div>
                </div>
                <div class="form-group">
                    <label for="code_product">Detail Product Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="Detail Product Name" name="name_product" id="name_product">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name_product">File Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="File Name" name="filename_product" id="filename_product">
                    </div>
                </div>
                <div class="form-group">
                    <label for="filename_product">File Path</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="File Path" name="filepath_product" id="filepath_product">
                    </div>
                </div>
                <div class="form-group">
                    <label for="filepath_product">Description</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="Description" name="description_product" id="description_product">
                    </div>
                </div>
                <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="active_product" id="active_product" class="custom-control-input" value="1">
                        <label class="custom-control-label" for="active">Active?</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description_product">Created By</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="Created By" name="created_by_product" id="created_by_product">
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>