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
                    <a class="float-right btn btn-primary text-white" id="modal-source-product" onclick="showModal(null)">Add</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Originated From</th>
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
                                    <td>
                                        <a class="btn btn-secondary" id="modal-source-product" onclick="showModal(<?= $id ?>)">Detail</a>
                                        <a class="btn btn-warning text-white" href="<?= $deleteDataById.$id ?>">Delete</a>
                                        <!-- <a class="btn btn-warning text-white" id="modal-source-product" onclick="deleteShowModal(<?php // $id ?>)">Delete</a> -->
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
    </form>

    <!-- Modal -->
    <div class="modal fade" id="sourceProductModal" tabindex="-1" aria-labelledby="sourceProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sourceProductModalLabel">Source Product</h5>
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
                        <label for="name">Originated From</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="originated from" id="name" name="name"/>
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
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>