<?= $this->extend('adm_layout/default') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
        <!-- <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
        </div> -->
    </div>

    <div class="row">
        <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Admin</h4>
                    </div>
                    <div class="card-body">
                        <?php //if(isset($totalUsers)) echo $totalUsers; ?>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Origin From</h4>
                    </div>
                    <div class="card-body">
                        <?php // if(isset($totalSourceProduct)) echo $totalSourceProduct;?>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-list"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Product</h4>
                    </div>
                    <div class="card-body">
                        <?php if(isset($totalDetailProduct)) echo $totalDetailProduct;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-address-card"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Gallery</h4>
                    </div>
                    <div class="card-body">
                        <?php if(isset($totalDetailProduct)) echo $totalDetailProduct;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Event</h4>
                    </div>
                    <div class="card-body">
                        <?php if(isset($totalDetailProduct)) echo $totalDetailProduct;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-store"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Store</h4>
                    </div>
                    <div class="card-body">
                        <?php if(isset($totalDetailProduct)) echo $totalDetailProduct;?>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Active Users Admin</h4>
                    </div>
                    <div class="card-body">
                        <?php //if(isset($totalUsersActive)) echo $totalUsersActive;?>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="row">
    <div class="col-lg-8 col-md-12 col-12 col-sm-12">
        <div class="card">
        <div class="card-header">
            <!-- <h4>Statistics User Activities</h4> -->
            <h4>Visitor Statistics</h4>
            <div class="card-header-action">
            <!-- <div class="btn-group">
                <a href="#" class="btn btn-primary">Week</a>
                <a href="#" class="btn">Month</a>
            </div> -->
            </div>
        </div>
        <div class="card-body">
            <canvas id="myChart" height="182"></canvas>
            <!-- <div class="statistic-details mt-sm-4">
            <div class="statistic-details-item">
                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                <div class="detail-value">$243</div>
                <div class="detail-name">Today's Sales</div>
            </div>
            <div class="statistic-details-item">
                <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                <div class="detail-value">$2,902</div>
                <div class="detail-name">This Week's Sales</div>
            </div>
            <div class="statistic-details-item">
                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                <div class="detail-value">$12,821</div>
                <div class="detail-name">This Month's Sales</div>
            </div>
            <div class="statistic-details-item">
                <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                <div class="detail-value">$92,142</div>
                <div class="detail-name">This Year's Sales</div>
            </div>
            </div> -->
        </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
        <div class="card">
        <div class="card-header">
            <h4>Recent Admin Activities</h4>
        </div>
        <div class="card-body">             
            <ul class="list-unstyled list-unstyled-border">
                <?php
                    $indexDash = 0;
                    foreach($getListActivities as $valueAct): $indexDash++;
                ?>
                <?php
                    $id = $valueAct['id'];
                    $type = $valueAct['type'];
                    $route_name = $valueAct['route_name'];
                    $route_params = $valueAct['route_params'];
                    $description = $valueAct['description'];
                    $created_by = $valueAct['created_by'];
                    $created_date = $valueAct['created_date'];
                ?>
                <li class="media">
                    <img class="mr-3 rounded-circle" width="50" src="<?php echo base_url(); ?>assets/admin/img/avatar/avatar-1.png" alt="avatar">
                    <div class="media-body">
                    <?php
                        $now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
                        $timeStamp = $now->format("Y-m-d H:i:s");
                        $start_datetime = new DateTime($timeStamp); 
                        $diff = $start_datetime->diff(new DateTime($created_date)); 
                    ?>
                    <div class="float-right<?= $diff->i == 0?' text-primary':'' ?>">
                        <?php
                            if($diff->i == 0) {
                                echo 'NOW';
                            }else{
                                if(($diff->days) >= 7 ) {
                                    echo $diff->m.' Months ago';
                                }else{
                                    $total_minutes = ($diff->days * 24 * 60); 
                                    $total_minutes += ($diff->h * 60); 
                                    $total_minutes += $diff->i; 
                                    
                                    if($total_minutes < 60) echo $total_minutes. ' Minutes ago';
                                    if($total_minutes >= 60 && $total_minutes < 1440) echo $total_minutes. ' Hours ago';
                                    if($total_minutes > 1440) echo $diff->days.' Days ago';
                                }
                            }
                        ?>
                    </div>
                    <div class="media-title"><?= $created_by ?></div>
                    <span class="text-small text-muted"><?= $description ?></span>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
            <!-- <div class="text-center pt-1 pb-1">
            <a href="#" class="btn btn-primary btn-lg btn-round">
                View All
            </a>
            </div> -->
        </div>
        </div>
    </div>
    </div>
</section>
<?= $this->endSection() ?>