<?php
// AMBIL DATA MENU DARI KONFIGURASI
$hero = $this->hero_model->home();
$i = 1;
?>
<!-- Slide1 -->
<section class="slide1 " style="background-image: url(assets/frontend/images/back.png);">
    <div class="wrap-slick1">
        <div class="slick1" style="background-image: url(assets/frontend/images/master-slide.png);">
            <?php foreach ($hero as $hero) { ?>
            <div class="item-slick1 item<?= $i++ ?>-slick1 ">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8  wrap-content-slide1 sizefull flex-col-l-m p-l-15 p-r-15 p-t-100 p-b-170">
                            <span class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37"
                                data-appear="fadeInUp">
                                <?= $hero->judul ?>
                            </span>
                            <h2 class="caption2-slide1 m-text1 animated visible-false m-b-37" data-appear="fadeInUp">
                                <?= $hero->deskripsi ?>
                            </h2>
                            <div class="wrap-btn-slide1  w-size1 animated visible-false" data-appear="zoomIn">
                                <!-- Button -->
                                <a href="<?= base_url('produk') ?>"
                                    class="flex-c-m  size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 flex-col-r-m p-l-15 p-r-15 p-t-100 p-b-170">
                            <div class=" hov-img-zoom ">
                                <img src=" <?= base_url('assets/upload/image/thumbs/' . $hero->gambar) ?>"
                                    data-appear="fadeInDown">
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    </div>
</section>