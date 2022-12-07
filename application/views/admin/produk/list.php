<p>
    <a href="<?= base_url('admin/produk/tambah') ?>" class="btn btn-success btn-lg"> <i class="fa fa-plus"></i>Tambah
        Data

    </a>
</p>
<?php
if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo "</div>";
}
?>
<table class="table table-bordered text-center" id="example1">
    <thead>
        <tr>
            <th>NO</th>
            <th>GAMBAR</th>
            <th>NAMA</th>
            <th>KATEGORI</th>
            <th>HARGA</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($produk as $produk) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>
                <img src="<?= base_url('assets/upload/image/thumbs/' . $produk->gambar) ?>"
                    class="img img-resposive img-thumbnail" width="60" alt="">
            </td>
            <td><?= $produk->nama_produk ?></td>
            <td><?= $produk->nama_kategori ?></td>
            <td><?= number_format($produk->harga, '0', ',', '.') ?></td>
            <td><?= $produk->status_produk ?></td>
            <td>
                <a <?= anchor('admin/produk/gambar/' . $produk->id_produk, '<div class="btn btn-success btn-sm"><i class="fa fa-image"></i> Gambar </div>') ?>
                    </a>
                    <!-- <a href="<?= base_url('admin/produk/edit' . $produk->id_produk) ?>" class="btn btn-primary btn-sm"> <i
                        class="fa fa-edit"></i>Edit </a> -->
                    <a <?= anchor('admin/produk/edit/' . $produk->id_produk, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> edit</div>') ?>
                        </a>

                        <?php include('delete.php') ?>

            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>