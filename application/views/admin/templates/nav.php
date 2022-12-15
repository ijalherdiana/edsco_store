<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <!-- Menu Dashboard -->
            <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard text-aqua"></i>
                    <span>DASHBOARD</span></a></li>

            <!-- Menu Transaksi -->
            <li><a href="<?= base_url('admin/transaksi') ?>"><i class="fa fa-check text-aqua"></i>
                    <span>TRANSAKSI</span></a></li>

            <!-- Menu Produk -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sitemap"></i> <span>PRODUK</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('admin/produk') ?>"><i class="fa fa-table"></i>
                            Data Produk</a></li>


                    <li><a href="<?= base_url('admin/kategori') ?>"><i class="fa fa-tags"></i>
                            Kategori Produk</a></li>
                </ul>
            </li>

            <!-- Menu Rekening -->
            <li><a href="<?= base_url('admin/rekening') ?>"><i class="fa fa-dollar text-aqua"></i>
                    <span>DATA REKENING</span></a></li>

            <!-- Menu Pengguna -->
            <li><a href="<?= base_url('admin/user') ?>"><i class="fa fa-lock text-aqua"></i>
                    <span>PENGGUNA</span></a></li>


            <!-- Menu konfigurasi -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-wrench"></i> <span>KONFIGURASI</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('admin/konfigurasi') ?>"><i class="fa fa-home"></i>
                            Konfigurasi Umum</a></li>
                    <li><a href="<?= base_url('admin/konfigurasi/logo') ?>"><i class="fa fa-image"></i>
                            Konfigurasi Logo</a></li>
                    <li><a href="<?= base_url('admin/konfigurasi/icon') ?>"><i class="fa fa-home"></i>
                            Konfigurasi Icon</a></li>
                </ul>
            </li>
            <!-- Menu Hero -->
            <li><a href="<?= base_url('admin/hero') ?>"><i class="fa fa-image text-aqua"></i>
                    <span>HERO</span></a></li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box">

            <!-- /.box-header -->
            <div class="box-body">