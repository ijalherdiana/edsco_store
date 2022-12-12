<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- COPAS DRI View->produk->list -->

<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <h4 class="m-text14 p-b-7">
                        Menu Pelanggan
                    </h4>

                    <ul class="p-b-54">

                        <li class="p-t-4">
                            <a href="<?= base_url('dashboard') ?>" class="s-text13 active1">
                                <i class="fa fa-dashboard"> Dashboard</i>
                            </a>
                        </li>
                        <li class="p-t-4">
                            <a href="<?= base_url('dashboard/keranjang') ?>" class="s-text13 active1">
                                <i class="fa fa-shopping-cart"> Keranjang Belanja</i>
                            </a>
                        </li>
                        <li class="p-t-4">
                            <a href="<?= base_url('dashboard/belanja') ?>" class="s-text13 active1">
                                <i class="fa fa-check"> Riwayat Belanja</i>
                            </a>
                        </li>
                        <li class="p-t-4">
                            <a href="<?= base_url('masuk/logout') ?>" class="s-text13 active1">
                                <i class="fa fa-sign-out"> Logout</i>
                            </a>
                        </li>
                    </ul>


                </div>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                <!-- Product -->
                <div class="row">
                    <div class="alert alert-success">
                        <h1>Selamat Datang <i><strong><?= $this->session->userdata('nama_pelanggan'); ?></strong></i>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>