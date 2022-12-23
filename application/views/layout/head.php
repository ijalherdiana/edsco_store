<?php
//Loading Konfigurasi website
$site   = $this->konfigurasi_model->listing();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ICON DIAMBIL DARI KONFIGURASI WEBSITE -->
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url('assets/upload/image/' . $site->icon) ?>" />
    <!-- SEO Google -->
    <meta name="keywords" content="<?= $site->keywords ?>">
    <meta name="description" content="<?= $title ?>,<?= $site->deskripsi ?>">

    <!--===============================================================================================-->
    <link rel="stylesheet"
        href="<?= base_url() ?>assets/administrator/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets/frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/fonts/themify/themify-icons.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets/frontend/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets/frontend/fonts/elegant-font/html-css/style.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets/frontend/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets/frontend/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets/frontend/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets/frontend/vendor/lightbox2/css/lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/css/main.css">
    <!--===============================================================================================-->
    <style type="text/css" media="screen">
    ul.pagination {
        padding: 0 10px;
        background-color: goldenrod;
        text-align: center !important;
    }

    footer {
        background-color: #f7b05d;
    }

    .pagination a,
    .pagination b {
        padding: 10px 20px;

        text-decoration: none;
        float: left;
    }

    .pagination a {
        background-color: goldenrod;
        color: white;
    }

    .pagination b {
        background-color: black;
        color: white;
    }

    .pagination a:hover {
        background-color: black;
    }
    </style>
</head>