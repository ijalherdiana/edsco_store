<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m">
    <h2 class=" xl-text3 t-center">
        <?= $title ?>
    </h2>
    <p class="m-text14 t-center ">
        <?= $site->namaweb ?> | <?= $site->tagline ?>
    </p>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <h4 class="m-text14 p-b-7">
                        Kategori Produk
                    </h4>

                    <ul class="p-b-54">
                        <?php foreach ($listing_kategori as $listing_kategori) { ?>
                        <li class="p-t-4">
                            <a href="<?= base_url('produk/kategori/' . $listing_kategori->slug_kategori) ?>"
                                class="s-text13 active1">
                                <?= $listing_kategori->nama_kategori; ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>


                </div>
                <!-- <h4 class="m-text14 p-b-32">
                    Search
                </h4>

                <div class="search-product pos-relative bo4 of-hidden" id="example1">
                    <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="keyword"
                        placeholder="               Search Products...">

                    <button type="submit" class="btn btn-warning flex-c-m size5 ab-l-m color2 color0-hov trans-0-4">
                        <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                    </button>
                </div> -->

            </div>


            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                <!-- Product -->
                <div class="row">
                    <?php foreach ($produk as $produk) { ?>
                    <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                        <?php
                            //Form untuk memproses belanjaan 
                            echo form_open(base_url('belanja/add'));
                            //Elemen yang dibawa
                            echo form_hidden('id',  $produk->id_produk);
                            echo form_hidden('qty', 1);
                            echo form_hidden('price', $produk->harga);
                            echo form_hidden('name', $produk->nama_produk);
                            //Elemen redirect
                            echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                            ?>

                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                <img src="<?= base_url('assets/upload/image/thumbs/' . $produk->gambar) ?>"
                                    alt="<?= $produk->nama_produk; ?>">

                                <div class="block2-overlay trans-0-4">
                                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <i class="fa fa-eye dis-none" aria-hidden="true"></i>
                                    </a>

                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <button type="submit" value="submit"
                                            class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="<?= base_url('produk/detail/' . $produk->slug_produk) ?>"
                                    class="block2-name dis-block s-text3 p-b-5">
                                    <?= $produk->nama_produk ?>
                                </a>

                                <span class="block2-price m-text6 p-r-5">
                                    IDR <?= number_format($produk->harga, '0', ',', '.') ?>
                                </span>
                            </div>
                        </div>
                        <?php
                            //Closing form
                            echo form_close(); ?>

                    </div>
                    <?php } ?>

                </div>

                <!-- Pagination -->
                <div class="pagination flex-m flex-w p-t-26 text-center">
                    <?= $pagin; ?>
                </div>
            </div>
        </div>
    </div>
</section>