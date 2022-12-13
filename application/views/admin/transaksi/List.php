<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- COPAS DARI DASHBOARD/LIST -->
<table class="table table-bordered " width="100%">
    <thead>
        <tr class="bg-success">
            <th>NO</th>
            <th>PELANGGAN</th>
            <th>KODE</th>
            <th>TANGGAL</th>
            <th>JUMLAH TOTAL</th>
            <th>JUMLAH ITEM</th>
            <th>STATUS BAYAR</th>
            <th width="25%">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($header_transaksi as $header_transaksi) { ?>
        <tr>
            <td><?= $i ?></td>
            <td><strong><?= $header_transaksi->nama_pelanggan ?></strong>
                <br><small>
                    Telpon: <?= $header_transaksi->telpon ?>
                    <br>Email: <?= $header_transaksi->email ?>
                    <br>Alamat Pengiriman: <br><?= nl2br($header_transaksi->alamat) ?>
                </small>
            </td>
            <td><?= $header_transaksi->kode_transaksi ?></td>
            <td><?= date('d-m-Y', strtotime($header_transaksi->tanggal_transaksi)) ?></td>
            <td><?= number_format($header_transaksi->jumlah_transaksi) ?></td>
            <td><?= $header_transaksi->total_item ?></td>
            <td><?= $header_transaksi->status_bayar ?></td>
            <td>
                <div class="btn-group">
                    <a href="<?= base_url('admin/transaksi/detail/' . $header_transaksi->kode_transaksi) ?>"
                        class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>
                    <a href="<?= base_url('admin/transaksi/cetak/' . $header_transaksi->kode_transaksi) ?>"
                        target="_blank" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Cetak</a>
                    <a href="<?= base_url('admin/transaksi/status/' . $header_transaksi->kode_transaksi) ?>"
                        class="btn btn-warning btn-sm"><i class="fa fa-check"></i> Update Status</a>
                </div>
            </td>
        </tr>
        <?php $i++;
        } ?>
    </tbody>
</table>