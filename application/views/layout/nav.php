<?php
// AMBIL DATA MENU DARI KONFIGURASI
$nav_produk            = $this->konfigurasi_model->nav_produk();
$nav_produk_mobile     = $this->konfigurasi_model->nav_produk();
?>

<div class="wrap_header">
    <!-- Logo -->
    <a href="">
        <img href="" src="<?= base_url('assets/upload/image/' . $site->logo) ?>" class=" logo"
            alt=" <?= $site->namaweb ?> | <?= $site->tagline ?>" width="150">
    </a>

    <!-- Menu -->
    <div class="wrap_menu">
        <nav class="menu">
            <!-- HOME -->
            <ul class="main_menu">
                <li>
                    <a href="<?= base_url() ?>">Beranda</a>
                </li>
                <!-- MENU PRODUK -->
                <li>
                    <a href="<?= base_url('produk') ?>">Produk &amp; Belanja</a>
                    <ul class="sub_menu">
                        <!-- Tampilkan Sesuai Data Kategori Produk -->
                        <?php foreach ($nav_produk as $nav_produk) : ?>
                        <li><a href="<?= base_url('produk/kategori/' . $nav_produk->slug_kategori) ?>">
                                <?= $nav_produk->nama_kategori ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('kontak') ?>">Contact</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Header Icon -->
    <div class="header-icons">
        <a href="#" class="header-wrapicon1 dis-block">
            <img src="<?= base_url() ?>assets/frontend/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
        </a>

        <span class="linedivide1"></span>

        <div class="header-wrapicon2">
            <img src="<?= base_url() ?>assets/frontend/images/icons/icon-header-02.png"
                class="header-icon1 js-show-header-dropdown" alt="ICON">
            <span class="header-icons-noti">0</span>

            <!-- Header cart noti -->
            <div class="header-cart header-dropdown">
                <ul class="header-cart-wrapitem">
                    <li class="header-cart-item">
                        <div class="header-cart-item-img">
                            <img src="images/item-cart-01.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt">
                            <a href="#" class="header-cart-item-name">
                                White Shirt With Pleat Detail Back
                            </a>

                            <span class="header-cart-item-info">
                                1 x $19.00
                            </span>
                        </div>
                    </li>

                    <li class="header-cart-item">
                        <div class="header-cart-item-img">
                            <img src="<?= base_url() ?>assets/frontend/images/item-cart-02.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt">
                            <a href="#" class="header-cart-item-name">
                                Converse All Star Hi Black Canvas
                            </a>

                            <span class="header-cart-item-info">
                                1 x $39.00
                            </span>
                        </div>
                    </li>

                    <li class="header-cart-item">
                        <div class="header-cart-item-img">
                            <img src="<?= base_url() ?>assets/frontend/images/item-cart-03.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt">
                            <a href="#" class="header-cart-item-name">
                                Nixon Porter Leather Watch In Tan
                            </a>

                            <span class="header-cart-item-info">
                                1 x $17.00
                            </span>
                        </div>
                    </li>
                </ul>

                <div class="header-cart-total">
                    Total: $75.00
                </div>

                <div class="header-cart-buttons">
                    <div class="header-cart-wrapbtn">
                        <!-- Button -->
                        <a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                            View Cart
                        </a>
                    </div>

                    <div class="header-cart-wrapbtn">
                        <!-- Button -->
                        <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Header Mobile -->
<div class="wrap_header_mobile">
    <!-- Logo moblie -->
    <!-- <a href="index.html" class="logo-mobile"> -->
    <img src="<?= base_url() ?>assets/frontend/images/icons/eds.png" width="120px" alt="IMG-LOGO">
    <!-- </a> -->

    <!-- Button show menu -->
    <div class="btn-show-menu">
        <!-- Header Icon mobile -->
        <div class="header-icons-mobile">
            <a href="#" class="header-wrapicon1 dis-block">
                <img src="<?= base_url() ?>assets/frontend/images/icons/icon-header-01.png" class="header-icon1"
                    alt="ICON">
            </a>

            <span class="linedivide2"></span>

            <div class="header-wrapicon2">
                <img src="<?= base_url() ?>assets/frontend/images/icons/icon-header-02.png"
                    class="header-icon1 js-show-header-dropdown" alt="ICON">
                <span class="header-icons-noti">0</span>

                <!-- Header cart noti -->
                <div class="header-cart header-dropdown">
                    <ul class="header-cart-wrapitem">
                        <li class="header-cart-item">
                            <div class="header-cart-item-img">
                                <img src="<?= base_url() ?>assets/frontend/images/item-cart-01.jpg" alt="IMG">
                            </div>

                            <div class="header-cart-item-txt">
                                <a href="#" class="header-cart-item-name">
                                    White Shirt With Pleat Detail Back
                                </a>

                                <span class="header-cart-item-info">
                                    1 x $19.00
                                </span>
                            </div>
                        </li>

                        <li class="header-cart-item">
                            <div class="header-cart-item-img">
                                <img src="<?= base_url() ?>assets/frontend/images/item-cart-02.jpg" alt="IMG">
                            </div>

                            <div class="header-cart-item-txt">
                                <a href="#" class="header-cart-item-name">
                                    Converse All Star Hi Black Canvas
                                </a>

                                <span class="header-cart-item-info">
                                    1 x $39.00
                                </span>
                            </div>
                        </li>

                        <li class="header-cart-item">
                            <div class="header-cart-item-img">
                                <img src="<?= base_url() ?>assets/frontend/images/item-cart-03.jpg" alt="IMG">
                            </div>

                            <div class="header-cart-item-txt">
                                <a href="#" class="header-cart-item-name">
                                    Nixon Porter Leather Watch In Tan
                                </a>

                                <span class="header-cart-item-info">
                                    1 x $17.00
                                </span>
                            </div>
                        </li>
                    </ul>

                    <div class="header-cart-total">
                        Total: $75.00
                    </div>

                    <div class="header-cart-buttons">
                        <div class="header-cart-wrapbtn">
                            <!-- Button -->
                            <a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                View Cart
                            </a>
                        </div>

                        <div class="header-cart-wrapbtn">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                Check Out
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>
</div>

<!-- Menu Mobile -->
<div class="wrap-side-menu">
    <nav class="side-menu">
        <ul class="main-menu">
            <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                <span class="topbar-child1">
                    <?= $site->alamat ?>
                </span>
            </li>

            <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                <div class="topbar-child2-mobile">
                    <span class="topbar-email">
                        <?= $site->email ?>
                    </span>

                    <div class="topbar-language rs1-select2">
                        <select class="selection-1" name="time">
                            <option><?= $site->telepon ?></option>
                            <option><?= $site->email ?></option>
                        </select>
                    </div>
                </div>
            </li>

            <li class="item-topbar-mobile p-l-10">
                <div class="topbar-social-mobile">
                    <a href="<?= $site->facebook ?>" class="topbar-social-item fa fa-facebook"></a>
                    <a href="<?= $site->instagram ?>" class="topbar-social-item fa fa-instagram"></a>

                </div>
            </li>
            <!-- Menu monile homepage -->
            <li class="item-menu-mobile">
                <a href="<?= base_url() ?>">Beranda</a>
            </li>

            <!-- Menu mobile produk -->
            <li class="item-menu-mobile">
                <a href="index.html">Produk &amp; Belanja </a>
                <ul class="sub-menu">
                    <?php foreach ($nav_produk_mobile as $nav_produk_mobile) : ?>
                    <li><a href="<?= base_url('produk/kategori/' . $nav_produk_mobile->slug_kategori) ?>">
                            <?= $nav_produk_mobile->nama_kategori ?></a></li>
                    <?php endforeach ?>
                </ul>
                <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
            </li>
            <!-- Menu kontak mobile -->
            <li class="item-menu-mobile">
                <a href="<?= base_url('kontak') ?>">Contact</a>
            </li>
        </ul>
    </nav>
</div>
</header>