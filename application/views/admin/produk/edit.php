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
echo form_open_multipart(base_url('admin/produk/edit/' . $produk->id_produk), ' class="form-horizontal"'); ?>
<?php if ($this->session->userdata('akses_level') != 'Manager') { ?>
<div class="form-group form-group-lg">
    <label class="col-md-2 control-label">Nama Produk</label>

    <div class="col-md-5">
        <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk"
            value="<?= $produk->nama_produk ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kode Produk </label>

    <div class="col-md-5">
        <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk"
            value="<?= $produk->kode_produk ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kategori Produk </label>

    <div class="col-md-5">
        <select name="id_kategori" class="form-control">
            <?php foreach ($kategori as $kategori) { ?>
            <option value="<?= $kategori->id_kategori ?>" <?php if ($produk->id_kategori == $kategori->id_kategori) {
                                                                        echo "selected";
                                                                    } ?>>
                <?= $kategori->nama_kategori ?></option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Harga Produk </label>

    <div class="col-md-5">
        <input type="number" name="harga" class="form-control" placeholder="Harga Produk" value="<?= $produk->harga ?>"
            required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Stok Produk </label>

    <div class="col-md-5">
        <input type="number" name="stok" class="form-control" placeholder="Stok Produk" value="<?= $produk->stok ?>"
            required>
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label">Berat Produk </label>

    <div class="col-md-5">
        <input type="number" name="berat" class="form-control" placeholder="Berat Produk" value="<?= $produk->berat ?>"
            required>
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label">Ukuran Produk </label>

    <div class="col-md-5">
        <input type="text" name="ukuran" class="form-control" placeholder="Ukuran Produk" value="<?= $produk->ukuran ?>"
            required>
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label">Keterangan Produk </label>

    <div class="col-md-10">
        <textarea name="keterangan" class="form-control" placeholder="Keterangan Produk" id="editor">
            <?= $produk->keterangan ?></textarea>
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label">Keyword (Untuk SEO Google)</label>

    <div class="col-md-10">
        <textarea name="keywords" class="form-control" placeholder="Keyword (Untuk SEO Google)">
            <?= $produk->keywords ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Upload Gambar Produk</label>

    <div class="col-md-10">
        <input type="file" name="gambar" class="form-control">
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Rating Produk </label>

    <div class="col-md-5">
        <input type="number" min="1" max="10" name="rating" class="form-control" placeholder="Rating Produk"
            value="<?= $produk->rating ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Status Produk</label>

    <div class="col-md-10">
        <select name="status_produk" class="form-control">
            <option value="Draft" <?php if ($produk->status_produk == "Draft") {
                                            echo "selected";
                                        } ?>>Simpan Sebagai Draft</option>
        </select>
    </div>
</div>
<?php } else { ?>

<div class="form-group form-group-lg">
    <label class="col-md-2 control-label">Nama Produk</label>

    <div class="col-md-5">
        <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk"
            value="<?= $produk->nama_produk ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kode Produk </label>

    <div class="col-md-5">
        <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk"
            value="<?= $produk->kode_produk ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kategori Produk </label>

    <div class="col-md-5">
        <select name="id_kategori" class="form-control" readonly>
            <?php foreach ($kategori as $kategori) { ?>
            <option value="<?= $kategori->id_kategori ?>" <?php if ($produk->id_kategori == $kategori->id_kategori) {
                                                                        echo "selected";
                                                                    } ?>>
                <?= $kategori->nama_kategori ?></option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Harga Produk </label>

    <div class="col-md-5">
        <input type="number" name="harga" class="form-control" placeholder="Harga Produk" value="<?= $produk->harga ?>"
            readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Stok Produk </label>

    <div class="col-md-5">
        <input type="number" name="stok" class="form-control" placeholder="Stok Produk" value="<?= $produk->stok ?>"
            readonly>
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label">Berat Produk </label>

    <div class="col-md-5">
        <input type="number" name="berat" class="form-control" placeholder="Berat Produk" value="<?= $produk->berat ?>"
            readonly>
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label">Ukuran Produk </label>

    <div class="col-md-5">
        <input type="text" name="ukuran" class="form-control" placeholder="Ukuran Produk" value="<?= $produk->ukuran ?>"
            readonly>
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label">Keterangan Produk </label>

    <div class="col-md-10">
        <textarea name="keterangan" class="form-control" placeholder="Keterangan Produk" id="editor" readonly>
            <?= $produk->keterangan ?></textarea>
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label">Keyword (Untuk SEO Google)</label>

    <div class="col-md-10">
        <textarea name="keywords" class="form-control" placeholder="Keyword (Untuk SEO Google)" readonly>
            <?= $produk->keywords ?></textarea>
    </div>
</div>

<!-- <div class="form-group">
    <label class="col-md-2 control-label">Upload Gambar Produk</label>

    <div class="col-md-10">
        <input type="file" name="gambar" class="form-control" readonly>
    </div>
</div> -->
<div class="form-group">
    <label class="col-md-2 control-label">Rating Produk </label>

    <div class="col-md-5">
        <input type="number" min="1" max="10" name="rating" class="form-control" placeholder="Rating Produk"
            value="<?= $produk->rating ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Status Produk</label>

    <div class="col-md-10">
        <select name="status_produk" class="form-control">
            <option value="Publish">Publikasikan</option>
            <option value="Draft" <?php if ($produk->status_produk == "Draft") {
                                            echo "selected";
                                        } ?>>Simpan Sebagai Draft</option>
        </select>
    </div>
</div>

<?php } ?>




<div class="form-group">
    <label class="col-md-2 control-label"></label>

    <div class="col-md-5">
        <button class="btn btn-primary btn-lg" name="submit" type="submit"><i class="fa fa-save"></i>Simpan</button>
        <button class="btn btn-danger btn-lg" name="reset" type="reset"><i class="fa fa-times"></i>Reset</button>
    </div>


    <?= form_close(); ?>