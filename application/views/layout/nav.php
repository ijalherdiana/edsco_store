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
        <?php if ($this->session->userdata('email')) { ?>
        <a href="<?= base_url('dashboard') ?>" class="header-wrapicon1 dis-block">
            <img src="<?= base_url() ?>assets/frontend/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
            <?= $this->session->userdata('nama_pelanggan'); ?>
        </a> &nbsp;

        <a href="<?= base_url('masuk/logout') ?>" class="header-wrapicon1 dis-block">
            <i class="fa fa-sign-out"></i> Logot
        </a>

        <?php } else { ?>
        <a href="<?= base_url('registrasi') ?>" class="header-wrapicon1 dis-block">
            <img src="<?= base_url() ?>assets/frontend/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
        </a>
        <?php } ?>

        <span class="linedivide1"></span>

        <div class="header-wrapicon2">
            <?php
            //check data belanjaan ada atau tidak
            $keranjang = $this->cart->contents();
            ?>
            <img src="<?= base_url() ?>assets/frontend/images/icons/icon-header-02.png"
                class="header-icon1 js-show-header-dropdown" alt="ICON">
            <span class="header-icons-noti"><?= count($keranjang) ?></span>

            <!-- Header cart noti -->
            <div class="header-cart header-dropdown">
                <ul class="header-cart-wrapitem">

                    <?php
                    // Jika tidak ada data belanjaan
                    if (empty($keranjang)) {
                    ?>

                    <li class="header-cart-item">
                        <p class="alert alert-success">Keranjang belanja kosong</p>
                    </li>
                    <?php
                        //jika ada
                    } else {
                        //Total belanjaan
                        $total_belanja = 'Rp. ' . number_format($this->cart->total(), '0', ',', '.');
                        // Tampilkan data belanja
                        foreach ($keranjang as $keranjang) {
                            $id_produk = $keranjang['id'];
                            //Ambil Data Produk
                            $produknya  = $this->produk_model->detail($id_produk);

                        ?>

                    <li class="header-cart-item">
                        <div class="header-cart-item-img">
                            <img src="<?= base_url('assets/upload/image/thumbs/' . $produknya->gambar) ?>"
                                alt="<?= $keranjang['name'] ?>">
                        </div>

                        <div class="header-cart-item-txt">
                            <a href="<?= base_url('produk/detail' . $produknya->slug_produk) ?>"
                                class="header-cart-item-name">
                                <?= $keranjang['name'] ?> </a>

                            <span class="header-cart-item-info">
                                <?= $keranjang['qty'] ?> x Rp. <?= number_format($keranjang['price'], '0', ',', '.') ?>
                                : Rp. <?= number_format($keranjang['subtotal'], '0', ',', '.') ?>
                            </span>
                        </div>
                    </li>
                    <?php } //tutup foreach
                    } ?>

                </ul>

                <div class="header-cart-total">
                    Total: <?= $total_belanja   = 'Rp. ' . number_format($this->cart->total(), '0', ',', '.');
                            ?>
                </div>

                <div class="header-cart-buttons">
                    <div class="header-cart-wrapbtn">
                        <!-- Button -->
                        <a href="<?= base_url('belanja') ?>"
                            class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                            View Cart
                        </a>
                    </div>

                    <div class="header-cart-wrapbtn">
                        <!-- Button -->
                        <a href="<?= base_url('belanja/checkout') ?>"
                            class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
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
                <?php
                //check data belanjaan ada atau tidak
                $keranjang_mobile = $this->cart->contents();
                ?>
                <img src="<?= base_url() ?>assets/frontend/images/icons/icon-header-02.png"
                    class="header-icon1 js-show-header-dropdown" alt="ICON">
                <span class="header-icons-noti"><?= count($keranjang_mobile) ?></span>

                <!-- Header cart noti -->
                <div class="header-cart header-dropdown">
                    <ul class="header-cart-wrapitem">

                        <?php
                        // Jika tidak ada data belanjaan
                        if (empty($keranjang_mobile)) {
                        ?>

                        <li class="header-cart-item">
                            <p class="alert alert-success">Keranjang belanja kosong</p>
                        </li>
                        <?php
                            //jika ada
                        } else {
                            //Total belanjaan
                            $total_belanja = 'Rp. ' . number_format($this->cart->total(), '0', ',', '.');
                            // Tampilkan data belanja
                            foreach ($keranjang_mobile as $keranjang_mobile) {
                                $id_produk_mobile = $keranjang_mobile['id'];
                                //Ambil Data Produk
                                $produknya_mobile  = $this->produk_model->detail($id_produk_mobile);

                            ?>

                        <li class="header-cart-item">
                            <div class="header-cart-item-img">
                                <img src="<?= base_url('assets/upload/image/thumbs/' . $produknya_mobile->gambar) ?>"
                                    alt=" <?= $keranjang_mobile['name'] ?>">
                            </div>

                            <div class="header-cart-item-txt">
                                <a href="<?= base_url('produk/detail' . $produknya_mobile->slug_produk) ?>"
                                    class="header-cart-item-name">
                                    <?= $keranjang_mobile['name'] ?> </a>
                                </a>

                                <span class="header-cart-item-info">
                                    <?= $keranjang_mobile['qty'] ?> x Rp.
                                    <?= number_format($keranjang_mobile['price'], '0', ',', '.') ?>
                                    : Rp. <?= number_format($keranjang_mobile['subtotal'], '0', ',', '.') ?>
                                </span>
                            </div>
                        </li>

                        <?php } //tutup foreach
                        } ?>
                    </ul>

                    <div class="header-cart-total">
                        Total: <?= $total_belanja ?>
                    </div>

                    <div class="header-cart-buttons">
                        <div class="header-cart-wrapbtn">
                            <!-- Button -->
                            <a href="<?= base_url('belanja') ?>"
                                class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                View Cart
                            </a>
                        </div>

                        <div class="header-cart-wrapbtn">
                            <!-- Button -->
                            <a href="<?= base_url('belanja/checkout') ?>"
                                class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
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