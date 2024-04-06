<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="<?php echo base_url('admin'); ?>"><?= $site_name ?? 'Admin Template' ?></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="<?php echo base_url('admin'); ?>"><?= $sort_name_site ?? 'AT' ?></a>
    </div>
    <ul class="sidebar-menu">
        <!-- <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
                <li class=active><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
            </ul>
        </li> -->
        <li class="menu-header">Menu</li>
        <!-- <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Master Users</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php // if(isset($url_role_list)) echo $url_role_list ?>">Role</a></li>
                <li><a class="nav-link" href="<?php // if(isset($url_users_list)) echo $url_users_list ?>">Users</a></li>
            </ul>
        </li> -->
        <li><a href="<?php if(isset($url_logo)) echo $url_logo ?>" class="nav-link"><i class="fas fa-building"></i> <span>Logo</span></a></li>
        <li><a href="<?php if(isset($url_ba)) echo $url_ba ?>" class="nav-link"><i class="fas fa-users"></i> <span>Brand Ambassador</span></a></li>
        <li><a href="<?php $paginateSource=1; if(isset($url_source_product_list)) echo $url_source_product_list.$paginateSource ?>" class="nav-link"><i class="fas fa-map-marker-alt"></i> <span>Source Product</span></a></li>
        <li><a href="<?php if(isset($url_product_list)) echo $url_product_list."1" ?>" class="nav-link"><i class="fas fa-store"></i> <span>Master Product</span></a></li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Product</span></a>
            <ul class="dropdown-menu">
                <?php $i = 0; foreach ($getListProduct as $data): $i++;
                    $id = $data['id'];
                    $name = $data['name'];
                    ?>
                    <li><a class="nav-link" href="<?php $paginate = 1; if(isset($url_detail_product_list)) echo $url_detail_product_list.$id."/".$paginate ?>"><?=$name?></a></li>
                <?php endforeach; ?>
            </ul>
        </li>
        <!-- <li><a href="<?php // if(isset($url_about_us)) echo $url_about_us ?>" class="nav-link"><i class="fas fa-globe"></i> <span>About Us</span></a></li> -->
        <!-- <li><a href="<?php // if(isset($url_faq)) echo $url_faq ?>" class="nav-link"><i class="fas fa-user"></i> <span>Faq</span></a></li> -->
        <!-- <li><a href="<?php // if(isset($url_product_list)) echo $url_product_list ?>" class="nav-link"><i class="fas fa-user"></i> <span>Contact</span></a></li> -->
        <!-- <li><a href="<?php // if(isset($url_gallery)) echo $url_gallery ?>" class="nav-link"><i class="fas fa-address-card"></i> <span>Gallery</span></a></li> -->
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-address-card"></i> <span>Gallery</span></a>
            <ul class="dropdown-menu">
                <?php $i = 0; foreach ($getListProduct as $data): $i++;
                    $id = $data['id'];
                    $name = $data['name'];
                    ?>
                    <li><a class="nav-link" href="<?php if(isset($url_gallery)) echo $url_gallery.$id ?>"><?=$name?></a></li>
                <?php endforeach; ?>
            </ul>
        </li>
        <li><a href="<?php if(isset($url_event)) echo $url_event ?>" class="nav-link"><i class="fas fa-info-circle"></i> <span>Event</span></a></li>
        <li><a href="<?php if(isset($url_store)) echo $url_store ?>" class="nav-link"><i class="fas fa-store"></i> <span>Store</span></a></li>
        <li><a href="<?php if(isset($url_visi_misi)) echo $url_visi_misi ?>" class="nav-link"><i class="fas fa-flag"></i> <span>Visi and Misi</span></a></li>
    </ul>
</aside>