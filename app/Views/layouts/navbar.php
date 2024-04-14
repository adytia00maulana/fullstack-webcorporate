<ul>
    <li><a class="nav-link scrollto<?= $activeUrl.'/' == (string) current_url()? ' '.'active': '' ?>" href="/">Home</a></li>
    <li><a class="nav-link scrollto<?= $activeUrl.'/about' == (string) current_url()? ' '.'active': '' ?>" href="<?= base_url(); ?>about">About Us</a></li>
    <li class="dropdown"><a class="nav-link scrollto<?= (strpos((string) current_url(), $activeUrl.'/product') !== false) ? ' active' : '' ?>" href="#"><span>Products</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
            <?php $i=0; foreach($getListProduct as $row): $i++;
                $id = $row['id'];
                $name = $row['name'];
            ?>
            <li>
                <a href="<?= base_url(). 'product/'.$id; ?>"><?= $name ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </li>
    <li class="dropdown"><a class="nav-link scrollto<?= $activeUrl.'/brand' == (string) current_url() || $activeUrl.'/info' == (string) current_url() ? ' active' : '' ?>" href="#"><span>News</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
            <?php $i=0; foreach($getListInfo as $row): $i++;
                $id = $row['id'];
                $name = $row['name'];
                $link = $row['link'];
            ?>
                <li><a href="<?= base_url(). $link; ?>"><?= $name ?></a></li>
            <?php endforeach; ?>
        </ul>
    </li>
    <li class="dropdown"><a href="#"><span>Gallery</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
            <?php $i=0; foreach($getListProduct as $row): $i++;
                $id = $row['id'];
                $name = $row['name'];
            ?>
            <li>
                <a href="<?= base_url(). 'gallery/'.$id; ?>"><?= $name ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </li>
    <li class="dropdown"><a href="#"><span>Stores</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
            <?php $i=0; foreach($getListStores as $row): $i++;
                $id = $row['id'];
                $name = $row['name'];
                ?>
                <li><a href="<?= base_url(). 'store/'.$id; ?>"><?= $name ?></a></li>
            <?php endforeach; ?>
        </ul>
    </li>
    <li><a class="nav-link scrollto<?= $activeUrl.'/contact' == (string) current_url()? ' '.'active': '' ?>" href="<?= base_url(); ?>footer">Contact Us</a></li>
    <li><a class="nav-link scrollto<?= $activeUrl.'/faq' == (string) current_url()? ' '.'active': '' ?>" href="<?= base_url(); ?>faq">FAQ</a></li>
</ul>
<i class="bi bi-list mobile-nav-toggle"></i>