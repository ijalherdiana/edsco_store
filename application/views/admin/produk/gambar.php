<?php
//Error Upload
if (isset($error)) {
    echo '<p class="alert alert-warning" >';
    echo $error;
    echo '</p>';
}

//Notifikasi Eror
echo validation_errors('<div class="alert alert-warning">', '</div>');

//form open
echo form_open_multipart(base_url('admin/produk/gambar/' . $produk->id_produk), ' class="form-horizontal"'); ?>

<div class="form-group form-group-lg">
    <label class="col-md-2 control-label">Judul Gambar</label>

    <div class="col-md-8">
        <input type="text" name="judul_gambar" class="form-control" placeholder="judul gambar produk"
            value="<?= set_value('judul_gambar') ?>" required>
    </div>
</div>

<div class="form-group form-group-lg">
    <label class="col-md-2 control-label">Unggah Gambar</label>

    <div class="col-md-3">
        <input type="file" name="gambar" class="form-control" placeholder="gambar" value="<?= set_value('gambar') ?>"
            required>
    </div>
    <div class="col-md-5">
        <button class="btn btn-success btn-lg" name="submit" type="submit"><i class="fa fa-save"></i>Simpan dan
            unggah Gambar</button>
        <button class="btn btn-danger btn-lg" name="reset" type="reset"><i class="fa fa-times"></i>Reset</button>
    </div>
</div>

<?= form_close() ?>

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
            <th>JUDUL</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>
                <img src="<?= base_url('assets/upload/image/thumbs/' . $produk->gambar) ?>"
                    class="img img-resposive img-thumbnail" width="60" alt="">
            </td>
            <td><?= $produk->nama_produk ?></td>
            <td>
            </td>
        </tr>

        <?php $no = 2;
        foreach ($gambar as $gambar) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>
                <img src="<?= base_url('assets/upload/image/thumbs/' . $gambar->gambar) ?>"
                    class="img img-resposive img-thumbnail" width="60" alt="">
            </td>
            <td><?= $gambar->judul_gambar ?></td>
            <td>
                <a href="<?= base_url('admin/produk/delete_gambar/' . $produk->id_produk . '/' . $gambar->id_gambar) ?>"
                    class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus gambar ini? ')"> <i
                        class="fa fa-trash-o"></i>Hapus </a>
            </td>

        </tr>
        <?php } ?>
    </tbody>
</table>