<?php
//Notifikasi
if ($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo "</div>";
}
?>

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
echo form_open_multipart(base_url('admin/konfigurasi/'), ' class="form-horizontal"'); ?>

<div class="form-group form-group-lg">
    <label class="col-md-3 control-label">Nama Website</label>

    <div class="col-md-8">
        <input type="text" name="namaweb" class="form-control" placeholder="Nama Website"
            value="<?= $konfigurasi->namaweb ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Tagline / Moto </label>

    <div class="col-md-8">
        <input type="text" name="tagline" class="form-control" placeholder="Tagline / Moto"
            value="<?= $konfigurasi->tagline ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Email </label>

    <div class="col-md-8">
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $konfigurasi->email ?>"
            required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Website</label>

    <div class="col-md-8">
        <input type="text" name="website" class="form-control" placeholder="Website"
            value="<?= $konfigurasi->website ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Alamat Facebook</label>

    <div class="col-md-8">
        <input type="text" name="facebook" class="form-control" placeholder="facebook"
            value="<?= $konfigurasi->facebook ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Alamat Instagram</label>

    <div class="col-md-8">
        <input type="text" name="instagram" class="form-control" placeholder="instagram"
            value="<?= $konfigurasi->instagram ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Telepon / HP</label>

    <div class="col-md-8">
        <input type="text" name="telepon" class="form-control" placeholder="Telepon / HP"
            value="<?= $konfigurasi->telepon ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Alamat Kantor</label>

    <div class="col-md-9">
        <textarea name="alamat" class="form-control" placeholder="Alamat Kantor)">
            <?= $konfigurasi->alamat ?></textarea>
    </div>
</div>


<div class="form-group">
    <label class="col-md-3 control-label">Keyword (Untuk SEO Google)</label>

    <div class="col-md-9">
        <textarea name="keywords" class="form-control" placeholder="Keyword (Untuk SEO Google)">
            <?= $konfigurasi->keywords ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Metatext</label>

    <div class="col-md-9">
        <textarea name="metatext" class="form-control" placeholder="Metatext">
            <?= $konfigurasi->metatext ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Deskripsi</label>

    <div class="col-md-9">
        <textarea name="deskripsi" class="form-control" placeholder="Deskripsi">
            <?= $konfigurasi->deskripsi ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Rekening Pembayaran</label>

    <div class="col-md-9">
        <textarea name="rekening_pembayaran" class="form-control" placeholder="Rekening Pembayaran">
            <?= $konfigurasi->rekening_pembayaran ?></textarea>
    </div>
</div>


<div class="form-group">
    <label class="col-md-3 control-label"></label>

    <div class="col-md-5">
        <button class="btn btn-primary btn-lg" name="submit" type="submit"><i class="fa fa-save"></i>Simpan</button>
        <button class="btn btn-danger btn-lg" name="reset" type="reset"><i class="fa fa-times"></i>Reset</button>
    </div>


    <?= form_close(); ?>