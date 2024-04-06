<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Faq</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <!-- <div class="card-header">
                 <h4>ABOUT US</h4>
             </div>-->
             <div class="row">
                 <div class="col-12">
                     <div class="card">
                         <!--<div class="card-header">
                             <h4>Full Summernote</h4>
                         </div>-->
                        <div class="card-body">
                            <?php echo form_open($post);?>
                            <?= csrf_field(); ?>
                            <div class="form-group row mb-4" hidden="hidden">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="id">ID</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control selectric" id="id" name="id" value="<?php
                                    $id = 0;
                                    if(isset($getData)){
                                        if(count($getData) > 0) $id = $getData[0]['id'];
                                    }

                                    echo $id;
                                    ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="title">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" id="title" name="title" value="<?php
                                        $title = 'Admin Template';
                                        if(isset($getData)){
                                            if(count($getData) > 0) $title = $getData[0]['title'];
                                        }

                                        echo $title;
                                        ?>"
                                    >
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="description">Content</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote" id="description" name="description">
                                        <?php
                                            if(isset($getData)){
                                                if(count($getData) > 0) echo $getData[0]['description'];
                                            }
                                        ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-primary">Publish</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>