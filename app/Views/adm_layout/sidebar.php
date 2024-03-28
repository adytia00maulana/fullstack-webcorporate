<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="<?php echo base_url('admin'); ?>">PT. Multi Bestri Indonesia</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="<?php echo base_url('admin'); ?>">MBI</a>
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
        <li><a href="<?php if(isset($url_gallery)) echo $url_gallery ?>" class="nav-link"><i class="fas fa-address-card"></i> <span>Gallery</span></a></li>
        <li><a href="<?php if(isset($url_event)) echo $url_event ?>" class="nav-link"><i class="fas fa-info-circle"></i> <span>Event</span></a></li>
        <li><a href="<?php if(isset($url_visi_misi)) echo $url_visi_misi ?>" class="nav-link"><i class="fas fa-flag"></i> <span>Visi and Misi</span></a></li>
        <!-- <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google Maps</span></a>
            <ul class="dropdown-menu">
                <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                <li><a href="gmaps-marker.html">Marker</a></li>
                <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                <li><a href="gmaps-route.html">Route</a></li>
                <li><a href="gmaps-simple.html">Simple</a></li>
            </ul>
        </li>            <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i> <span>Modules</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>
                <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                <li><a class="nav-link" href="modules-datatables.html">DataTables</a></li>
                <li><a class="nav-link" href="modules-flag.html">Flag</a></li>
                <li><a class="nav-link" href="modules-font-awesome.html">Font Awesome</a></li>
                <li><a class="nav-link" href="modules-ion-icons.html">Ion Icons</a></li>
                <li><a class="nav-link" href="modules-owl-carousel.html">Owl Carousel</a></li>
                <li><a class="nav-link" href="modules-sparkline.html">Sparkline</a></li>
                <li><a class="nav-link" href="modules-sweet-alert.html">Sweet Alert</a></li>
                <li><a class="nav-link" href="modules-toastr.html">Toastr</a></li>
                <li><a class="nav-link" href="modules-vector-map.html">Vector Map</a></li>
                <li><a class="nav-link" href="modules-weather-icon.html">Weather Icon</a></li>
            </ul>
        </li>
        <li class="menu-header">Pages</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
            <ul class="dropdown-menu">
                <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                <li><a href="auth-login.html">Login</a></li>
                <li><a href="auth-register.html">Register</a></li>
                <li><a href="auth-reset-password.html">Reset Password</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i> <span>Errors</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="errors-503.html">503</a></li>
                <li><a class="nav-link" href="errors-403.html">403</a></li>
                <li><a class="nav-link" href="errors-404.html">404</a></li>
                <li><a class="nav-link" href="errors-500.html">500</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Features</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                <li><a class="nav-link" href="features-posts.html">Posts</a></li>
                <li><a class="nav-link" href="features-profile.html">Profile</a></li>
                <li><a class="nav-link" href="features-settings.html">Settings</a></li>
                <li><a class="nav-link" href="features-setting-detail.html">Setting Detail</a></li>
                <li><a class="nav-link" href="features-tickets.html">Tickets</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
            <ul class="dropdown-menu">
                <li><a href="utilities-contact.html">Contact</a></li>
                <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                <li><a href="utilities-subscribe.html">Subscribe</a></li>
            </ul>
        </li>
        <li>
            <a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a>
        </li> -->
    </ul>

    <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
        </a>
    </div> -->
</aside>