<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
    <section class="section">
        <div class="section-header">
            <h1>Application List</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Master Product</h4>
                </div>
                <div class="card-body p-0">
                    <a class="float-right btn btn-primary text-white" id="modal-source-product" onclick="showModalProduct(null)">Add</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Source Product</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Updated By</th>
                                <th>Updated At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 0; foreach($getList as $row): $no++;?>
                            <?php
                                $id = $row['id'];
                                $id_source_product = $row['id_source_product'];
                                $source_product_name = $row['source_product_name'];
                                $code = $row['code'];
                                $name = $row['name'];
                                $active = $row['active'];
                                $created_by = $row['created_by'];
                                $created_date = $row['created_date'];
                                $updated_by = $row['updated_by'];
                                $updated_date = $row['updated_date'];
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $source_product_name ?></td>
                                    <td><?= $code ?></td>
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
                                    <td>
                                        <a class="btn btn-secondary" onclick="showModalProduct(<?= $id ?>)">Detail</a>
                                        <a class="btn btn-warning text-white" onclick="deleteProduct(<?= $id ?>)">Delete</a>
                                    </td>
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
                                <li class="page-item <?= (($activePaginate ?? 1) == $data)? "active":"";?>"><a class="page-link" href="<?php $paginate = $no; if(isset($url_product_list)) echo $url_product_list.$paginate ?>"><?= $no ?></a></li>
                            <?php endforeach; ?>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Master Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open($postData);?>
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group" hidden="hidden">
                        <label for="id">Id</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="ID" id="id" name="id" value="0"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_source_product">Source Product</label>
                        <div class="input-group">
                            <select class="form-control" id="id_source_product" name="id_source_product">
                                <option value="">Choose Data</option>
                                <?php $iSourceData = 0; foreach ($getSourceProductList as $dataSourceProduct): $iSourceData++;
                                $idSourceData = $dataSourceProduct['id'];
                                $nameSourceData = $dataSourceProduct['name'];
                                ?>
                                <option value="<?= $idSourceData ?>"><?= $nameSourceData ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="code">Product Code</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Product Code" id="code" name="code"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Product Name" id="name" name="name"/>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="active" class="custom-control-input" id="active" value="1">
                            <label class="custom-control-label" for="active">Active?</label>
                        </div>
                    </div>
                    <div class="form-group" hidden="hidden">
                        <label for="created_by">Created By</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Created By" id="created_by" name="created_by"/>
                        </div>
                    </div>
                    <div class="form-group" hidden="hidden">
                        <label for="created_date">Created Date</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Created Date" id="created_date" name="created_date"/>
                        </div>
                    </div>
                    <div class="form-group" hidden="hidden">
                        <label for="updated_by">Updated By</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Updated By" id="updated_by" name="updated_by"/>
                        </div>
                    </div>
                    <div class="form-group" hidden="hidden">
                        <label for="updated_date">Updated Date</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Updated Date" id="updated_date" name="updated_date"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="showLoader()">Save changes</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>