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
        >Home</a>
    </li>
    <li>
        <a
                href="<?= base_url(). 'about'; ?>"
                class="<?php
                if(isset($activeUrl)){
                    if($activeUrl.'/about' == (string) current_url()) echo 'active';
                }else{
                    echo '';
                }?>"
        >Visi Misi</a>
    <!-- </li>
    <li>
        <a
                href="<?php // base_url(). 'contact'; ?>"
                class="<?php
                //if(isset($activeUrl)){
                //    if($activeUrl.'/contact' == (string) current_url()) echo 'active';
                //}else{
                //    echo '';
                //}?>"
        >Kontak Kami</a>
    </li> -->
    <li class="dropdown has-dropdown">
        <a
                href="#"
                class="<?php
                if(isset($activeUrl)){
                    if($activeUrl.'/product' == (string) current_url()) echo 'active';
                }else{
                    echo '';
                }?>"
        ><span>Produk</span> <i class="bi bi-chevron-down"></i>
        </a>
        <ul>
            <?php $i=0; foreach($getListProduct as $row): $i++;
                $id = $row['id'];
                $name = $row['name'];
            ?>
            <li><a href="<?= base_url(). 'product'.$id; ?>"><?= $name ?></a></li>
            <?php endforeach; ?>
        </ul>
    </li>
    <li>
        <a
                href="<?= base_url(). 'about'; ?>"
                class="<?php
                if(isset($activeUrl)){
                    if($activeUrl.'/about' == (string) current_url()) echo 'active';
                }else{
                    echo '';
                }?>"
        >Berita</a>
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
        <a
                href="#"
                class="<?php
                if(isset($activeUrl)){
                    if($activeUrl.'/product' == (string) current_url()) echo 'active';
                }else{
                    echo '';
                }?>"
        ><span>Toko</span> <i class="bi bi-chevron-down"></i>
        </a>
        <ul>
            <?php $i=0; foreach($getListStores as $row): $i++;
                $id = $row['id'];
                $name = $row['name'];
                ?>
                <li><a href="<?= base_url(). 'product'.$id; ?>"><?= $name ?></a></li>
            <?php endforeach; ?>
        </ul>
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
            <?php $i=0; foreach($getListInfo as $row): $i++;
                $id = $row['id'];
                $name = $row['name'];
                $code = $row['code'];
                ?>
                <li><a href="<?= base_url(). $code; ?>"><?= $name ?></a></li>
            <?php endforeach; ?>
        </ul>
    </li>
    <li>
        <a
                href="<?= base_url(). 'contact'; ?>"
                class="<?php
    if(isset($activeUrl)){
        if($activeUrl.'/contact' == (string) current_url()) echo 'active';
    }else{
        echo '';
    }?>"
        >Kontak Kami</a>
    </li>
    <li>
        <a
                href="<?= base_url(). 'faq'; ?>"
                class="<?php
                if(isset($activeUrl)){
                    if($activeUrl.'/faq' == (string) current_url()) echo 'active';
                }else{
                    echo '';
                }?>"
        >FAQ</a>
    </li>
</ul>
<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>