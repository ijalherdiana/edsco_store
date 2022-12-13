<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard text-aqua"></i>
                    <span>Dashboard</span></a></li>

            <!-- Menu Produk -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sitemap"></i> <span>Produk</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('admin/produk') ?>"><i class="fa fa-table"></i>
                            Data Produk</a></li>
                    <li><a href="<?= base_url('admin/produk/tambah') ?>"><i class="fa fa-plus"></i>
                            Tambah Data Produk</a></li>
                    <li><a href="<?= base_url('admin/kategori') ?>"><i class="fa fa-tags"></i>
                            Kategori Produk</a></li>
                </ul>
            </li>

            <!-- Menu Rekening -->
            <li><a href="<?= base_url('admin/rekening') ?>"><i class="fa fa-dollar text-aqua"></i>
                    <span>DATA REKENING</span></a></li>

            <!-- Menu Pengguna -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lock"></i> <span>Pengguna</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('admin/user') ?>"><i class="fa fa-table"></i>
                            Data Pengguna</a></li>
                    <li><a href="<?= base_url('admin/user/tambah') ?>"><i class="fa fa-plus"></i>
                            Tambah Data Pengguna</a></li>
                </ul>
            </li>

            <!-- Menu konfigurasi -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-wrench"></i> <span>Konfigurasi</span>
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