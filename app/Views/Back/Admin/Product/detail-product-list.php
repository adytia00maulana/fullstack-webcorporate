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
                    <a class="float-right btn btn-primary text-white" id="modal-source-product" onclick="showModalDetailProduct(null)">Add</a>
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
                                    <td>
                                        <a class="btn btn-secondary" onclick="showModalDetailProduct(<?= $id ?>)">Detail</a>
                                        <a class="btn btn-warning text-white" onclick="deleteDetailProduct(<?= $id ?>)">Delete</a>
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
        </div>
    </section>

        <!-- Modal -->
    <div class="modal fade" id="detailProductModal" aria-labelledby="detailProductModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailProductModalLabel"><?= $title ?? 'Detail Product' ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart($postData);?>
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group" hidden="hidden">
                        <label for="id">ID</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="ID" name="id" id="id" value="0">
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
                    <div class="form-group" hidden="hidden">
                        <label for="id_product">ID Product</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="id_product" name="id_product" value="<?= $id_product ?>">
                            <!-- <select class="form-control" id="id_product" name="id_product">
                                <option value="">Choose Data</option>
                                <?php /*$iData = 0; foreach ($getProductList as $dataProduct): $iData++;
                                    $idData = $dataProduct['id'];
                                    $nameData = $dataProduct['name'];
                                    ?>
                                    <option value="<?= $idData ?>"><?= $nameData ?></option>
                                <?php endforeach; */?>
                            </select> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="code">Code Detail Product</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Code Detail Product" name="code" id="code">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Detail Product Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Detail Product Name" name="name" id="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="filename">File</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="File Name" name="filename" id="filename" readonly>
                        </div>
                        <a class="btn btn-secondary" id="fileUploadViewDetailProduct" style="display: none" onclick="viewImgDetailProduct()">View</a>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="fileUpload" onchange="changeFileDetailProduct()">
                            <label class="custom-file-label" id="fileUploadDetailProduct">Choose File</label>
                        </div>
                    </div>
                    <div class="form-group" hidden="hidden">
                        <label for="filepath">File Path</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="File Path" name="filepath" id="filepath">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Description" name="description" id="description">
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="active" id="active" class="custom-control-input" value="1">
                            <label class="custom-control-label" for="active">Active?</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>