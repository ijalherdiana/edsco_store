<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- COPAS DRI View->produk->list -->

<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <?php include('menu.php') ?>


                </div>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

                <div class="alert alert-success">
                    <h1>Selamat Datang <i><strong><?= $this->session->userdata('nama_pelanggan'); ?></strong></i>
                    </h1>
                </div>
                <?php
                // Jika Ada transaksi Tampilkan tabelnya
                if ($header_transaksi) { ?>
                    <table class="table table-bordered " width="100%">
                        <thead>
                            <tr class="bg-success">
                                <th>NO</th>
                                <th>KODE</th>
                                <th>TANGGAL</th>
                                <th>JUMLAH TOTAL</th>
                                <th>JUMLAH ITEM</th>
                                <th>STATUS BAYAR</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($header_transaksi as $header_transaksi) { ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $header_transaksi->kode_transaksi ?></td>
                                    <td><?= date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                                    <td><?= number_format($header_transaksi->jumlah_transaksi) ?></td>
                                    <td><?= $header_transaksi->total_item ?></td>
                                    <td><?= $header_transaksi->status_bayar ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= base_url('dashboard/detail/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail
                                            </a>
                                            <a href="<?= base_url('dashboard/konfirmasi/' . $header_transaksi->kode_transaksi) ?>" class="btn btn-info btn-sm"><i class="fa fa-upload"></i> Konfirmasi bayar
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>

                <?php
                    // Jika tidak ada Tampilkan notifikasi
                } else { ?>

                    <p class="alert alert-success">
                        <i class="fa fa_warning"></i> Belum ada data transaksi
                    </p>

                <?php } ?>
            </div>
        </div>
    </div>
</section>