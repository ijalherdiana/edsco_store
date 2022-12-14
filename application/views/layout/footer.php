<?php
// LOAD DATA KONFIGURASI WEBSITE
$site                = $this->konfigurasi_model->listing();
$nav_produk_footer   = $this->konfigurasi_model->nav_produk();
?>

<!-- Footer -->
<footer class=" p-t-45 p-b-43  ">
    <div class="flex-w p-b-90">
        <div class="w-size8 p-t-30 p-l-30 p-r-15 respon3">
            <h4 class="s-text12 p-b-30 text-white">
                KONTAK KAMI
            </h4>

            <div>
                <p class="s-text7 w-size27">
                    <?= nl2br($site->alamat) ?>
                    <br><i class="fa fa-envelope"></i><?= $site->email ?>
                    <br><i class="fa fa-phone"></i><?= $site->telepon ?>
                </p>

                <div class="flex-m p-t-30">
                    <a href="<?= $site->facebook ?>" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
                    <a href="<?= $site->instagram ?>" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
                </div>
            </div>
        </div>

        <div class="w-size8 p-t-30  p-l-30 p-r-15 respon3">
            <h4 class="s-text12 p-b-30 text-white">
                Kategori Produk
            </h4>

            <ul>
                <?php foreach ($nav_produk_footer as $nav_produk_footer) : ?>
                <li class="p-b-9">
                    <a href="<?= base_url('produk/kategori/' . $nav_produk_footer->slug_kategori) ?>" class="s-text7">
                        <?= $nav_produk_footer->nama_kategori ?>
                    </a>
                </li>
                <?php endforeach; ?>

            </ul>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4 ">
            <h4 class="s-text12 p-b-30 text-white">
                Links
            </h4>

            <ul>
                <li class="p-b-9">
                    <a href="#" class="s-text7 ">
                        Search
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        About Us
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Contact Us
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Returns
                    </a>
                </li>
            </ul>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30 text-white">
                Help
            </h4>

            <ul>
                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Track Order
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Returns
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Shipping
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        FAQs
                    </a>
                </li>
            </ul>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon3">
            <a class="s-text12 p-b-30">
                <img src="<?= base_url('assets/upload/image/' . $site->logo) ?> " width="200">
            </a><br>
            <a href="#" class="s-text7">
                <?= $site->namaweb ?> | <?= $site->tagline ?>
            </a>

        </div>

    </div>

    <div class="t-center p-l-15 p-r-15">

        <div class="t-center s-text8 p-t-20">
            Copyright ?? 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o"
                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
        </div>
    </div>
</footer>



<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url() ?>assets/frontend/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url() ?>assets/frontend/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url() ?>assets/frontend/vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url() ?>assets/frontend/vendor/select2/select2.min.js"></script>
<script type="text/javascript">
$(".selection-1").select2({
    minimumResultsForSearch: 20,
    dropdownParent: $('#dropDownSelect1')
});
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url() ?>assets/frontend/vendor/slick/slick.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/frontend/js/slick-custom.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url() ?>assets/frontend/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url() ?>assets/frontend/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url() ?>assets/frontend/vendor/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
$('.block2-btn-addcart').each(function() {
    var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
    $(this).on('click', function() {
        swal(nameProduct, "is added to cart !", "success");
    });
});

$('.block2-btn-addwishlist').each(function() {
    var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
    $(this).on('click', function() {
        swal(nameProduct, "is added to wishlist !", "success");
    });
});
</script>

<!--===============================================================================================-->
<script src="<?= base_url() ?>assets/frontend/js/main.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/administrator/bower_components/datatables.net/js/jquery.dataTables.min.js">
</script>
<script src="<?= base_url() ?>assets/administrator/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js">
</script>
<script>
$(function() {
    $('#example1').DataTable()
    $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
    })
})
</script>

</body>

</html>