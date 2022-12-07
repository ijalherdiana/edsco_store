<?php
//Proteksi halaman login dengan fungsi cek login yang ada di library simple_login
$this->simple_login->cek_login();
//Menggabungkan semua halaman website
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');