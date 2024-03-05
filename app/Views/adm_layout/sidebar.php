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
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Master Users</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php if(isset($url_role_list)) echo $url_role_list ?>">Role</a></li>
                <li><a class="nav-link" href="<?php if(isset($url_users_list)) echo $url_users_list ?>">Users</a></li>
            </ul>
        </li>
        <!-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> -->
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Master Produk</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="bootstrap-alert.html">Source Produk</a></li>
                <li><a class="nav-link" href="bootstrap-alert.html">Produk</a></li>
                <li><a class="nav-link" href="bootstrap-alert.html">Galeri</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Lain - lain</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="components-article.html">Tentang Kami</a></li>
                <li><a class="nav-link" href="components-hero.html">Kontak</a></li>
            </ul>
        </li>
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