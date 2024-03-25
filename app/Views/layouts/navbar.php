<ul>
    <li>
        <a
                href="<?= base_url() ?>"
                class="<?php
                if(isset($activeUrl)){
                    if($activeUrl.'/' == (string) current_url()) echo 'active';
                }else{
                    echo '';
                }?>"
        >Home</a></li>
    <li>
        <a
                href="<?= base_url(). 'about'; ?>"
                class="<?php
                if(isset($activeUrl)){
                    if($activeUrl.'/about' == (string) current_url()) echo 'active';
                }else{
                    echo '';
                }?>"
        >Visi Misi</a></li>
    <li class="dropdown has-dropdown">
        <a
                href="#"
                class="<?php
                if(isset($activeUrl)){
                    if($activeUrl.'/product' == (string) current_url()) echo 'active';
                }else{
                    echo '';
                }?>"
        ><span>Produk</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
            <li><a href="<?= base_url(). 'product'; ?>">Korean Ginseng</a></li>
            <li><a href="<?= base_url(). 'product'; ?>">Kosmetik</a></li>
        </ul>
    </li>
    <li>
        <a
                href="<?= base_url(). 'gallery'; ?>"
                class="<?php
                if(isset($activeUrl)){
                    if($activeUrl.'/gallery' == (string) current_url()) echo 'active';
                }else{
                    echo '';
                }?>"
        >Galeri</a>
    </li>
    <li class="dropdown has-dropdown">
        <a href=""
           class="<?php
                if(isset($activeUrl)){
                   if ($activeUrl.'/brand' == (string) current_url() || $activeUrl.'/info' == (string) current_url()) {
                       echo 'active';
                   } else {
                       echo '';
                   }
                }
           ?>"
        ><span>Info</span> <i class="bi bi-chevron-down"></i>
        </a>
        <ul>
            <li><a href="<?= base_url(). 'brand'; ?>">Brand Ambasador</a></li>
            <li><a href="<?= base_url(). 'info'; ?>">Event</a></li>
        </ul>
    </li>
    <!-- <li class="megamenu has-dropdown"><a href="#"><span>Mega Menu</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
            <li>
                <a href="#">Column 1 link 1</a>
                <a href="#">Column 1 link 2</a>
                <a href="#">Column 1 link 3</a>
            </li>
            <li>
                <a href="#">Column 2 link 1</a>
                <a href="#">Column 2 link 2</a>
                <a href="#">Column 3 link 3</a>
            </li>
            <li>
                <a href="#">Column 3 link 1</a>
                <a href="#">Column 3 link 2</a>
                <a href="#">Column 3 link 3</a>
            </li>
            <li>
                <a href="#">Column 4 link 1</a>
                <a href="#">Column 4 link 2</a>
                <a href="#">Column 4 link 3</a>
            </li>
            <li>
                <a href="#">Column 5 link 1</a>
                <a href="#">Column 5 link 2</a>
                <a href="#">Column 5 link 3</a>
            </li>
        </ul>
    </li> -->
    <li>
        <a
                href="<?= base_url(). 'contact'; ?>"
                class="<?php
                if(isset($activeUrl)){
                    if($activeUrl.'/contact' == (string) current_url()) echo 'active';
                }else{
                    echo '';
                }?>"
        >Kontak Kami</a></li>
    <li>
        <a
                href="<?= base_url(). 'faq'; ?>"
                class="<?php
                if(isset($activeUrl)){
                    if($activeUrl.'/faq' == (string) current_url()) echo 'active';
                }else{
                    echo '';
                }?>"
        >FAQ</a></li>
</ul>
<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>