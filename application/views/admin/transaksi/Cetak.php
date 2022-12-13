<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style type="text/css" media="print">
    body {
        font-family: arial;
        font-size: 12px;
    }

    .cetak {
        width: 19cm;
        height: 27cm;
        padding: 1cm;
    }

    table {
        border: solid thin #000;
        border-collapse: collapse;
    }

    td,
    th {
        padding: 3mm 6mm;
        text-align: left;
        vertical-align: top;
    }

    th {
        background-color: #f5f5f5ff;
        font-weight: bold;
    }

    h1 {
        text-align: center;
        font-size: 18px;
        text-transform: uppercase;
    }
    </style>
    <style type="text/css" media="screen">
    body {
        font-family: arial;
        font-size: 12px;
    }

    .cetak {
        width: 19cm;
        height: 27cm;
        padding: 1cm;
    }

    table {
        border: solid thin #000;
        border-collapse: collapse;
    }

    td,
    th {
        padding: 3mm 6mm;
        text-align: left;
        vertical-align: top;
    }

    th {
        background-color: #f5f5f5ff;
        font-weight: bold;
    }

    h1 {
        text-align: center;
        font-size: 18px;
        text-transform: uppercase;
    }
    </style>
</head>

<body onload="print()">
    <div class="cetak">
        <h1> DETAIL TRANSAKSI <?= $site->namaweb ?> </h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="20%">Nama Pelanggan</th>
                    <th>: <?= $header_transaksi->nama_pelanggan ?></th>
                </tr>
                <tr>
                    <th width="20%">KODE TRANSAKSI</th>
                    <th>: <?= $header_transaksi->kode_transaksi ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tanggal</td>
                    <td>: <?= date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
                </tr>
                <tr>
                    <td>Jumlah total</td>
                    <td>: <?= number_format($header_transaksi->jumlah_transaksi) ?></td>
                </tr>
                <tr>
                    <td>Status Bayar</td>
                    <td>: <?= $header_transaksi->status_bayar ?></td>
                </tr>
                <tr>
                    <td>Bukti Bayar</td>
                    <td>: <?php if ($header_transaksi->bukti_bayar == "") {
                                echo "Belum ada";
                            } else { ?>
                        <img src="<?= base_url('assets/upload/image/' . $header_transaksi->bukti_bayar) ?>"
                            class="img img-thumbnail" width="200">
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Bayar</td>
                    <td>: <?= date('d-m-Y', strtotime($header_transaksi->status_bayar)) ?></td>
                </tr>
                <tr>
                    <td>Jumlah Bayar</td>
                    <td>: Rp. <?= number_format($header_transaksi->jumlah_bayar, '0', ',', '.') ?></td>
                </tr>
                <tr>
                    <td>Pembayaran dari</td>
                    <td>: <?= $header_transaksi->nama_bank ?> No. Rekening <?= $header_transaksi->rekening_pembayaran ?>
                        a.n
                        <?= $header_transaksi->rekening_pelanggan  ?> </td>
                </tr>
                <tr>
                    <td>Pembayaran ke rekening</td>
                    <td>: <?= $header_transaksi->bank ?> No. Rekening <?= $header_transaksi->nomor_rekening ?> a.n
                        <?= $header_transaksi->nama_pemilik  ?></td>
                </tr>
            </tbody>
        </table>
        <hr>

        <table class="table table-bordered " width="100%">
            <thead>
                <tr class="bg-success">
                    <th>NO</th>
                    <th>KODE</th>
                    <th>NAMA PRODUK</th>
                    <th>JUMLAH</th>
                    <th>HARGA</th>
                    <th>SUB TOTAL</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($transaksi as $transaksi) { ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $transaksi->kode_produk ?></td>
                    <td><?= $transaksi->nama_produk ?></td>
                    <td><?= number_format($transaksi->jumlah) ?></td>
                    <td><?= number_format($transaksi->harga) ?></td>
                    <td><?= number_format($transaksi->total_harga) ?></td>
                </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>