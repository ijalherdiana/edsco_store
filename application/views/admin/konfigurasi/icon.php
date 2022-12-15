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
echo form_open_multipart(base_url('admin/konfigurasi/icon'), ' class="form-horizontal"'); ?>

<?php if ($this->session->userdata('akses_level') != 'Manager') { ?>
<div class="form-group form-group-lg">
    <label class="col-md-3 control-label">Nama Website</label>

    <div class="col-md-8">
        <input type="text" name="namaweb" class="form-control" placeholder="Nama Website"
            value="<?= $konfigurasi->namaweb ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Upload Icon Baru</label>

    <div class="col-md-8">
        <input type="file" name="icon" class="form-control" placeholder="Upload Icon Baru"
            value="<?= $konfigurasi->icon ?>" required>
        Icon lama: <br>
        <img src="<?= base_url('assets/upload/image/' . $konfigurasi->icon) ?>" class="img img-responsive img-thumbnail"
            width="200">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label"></label>

    <div class="col-md-5">
        <button class="btn btn-primary btn-lg" name="submit" type="submit"><i class="fa fa-save"></i>Simpan</button>
        <button class="btn btn-danger btn-lg" name="reset" type="reset"><i class="fa fa-times"></i>Reset</button>
    </div>

    <?php } else { ?>

    <div class="form-group form-group-lg">
        <label class="col-md-3 control-label">Nama Website</label>

        <div class="col-md-8">
            <input type="text" name="namaweb" class="form-control" placeholder="Nama Website"
                value="<?= $konfigurasi->namaweb ?>" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label"> Icon </label>

        <div class="col-md-8">
            <!-- <input type="file" name="icon" class="form-control" placeholder="Upload Icon Baru"
                value="<?= $konfigurasi->icon ?>" readonly> -->
            Tampilan : <br>
            <img src="<?= base_url('assets/upload/image/' . $konfigurasi->icon) ?>"
                class="img img-responsive img-thumbnail" width="200">
        </div>
    </div>

    <!-- <div class="form-group">
        <label class="col-md-3 control-label"></label>

        <div class="col-md-5">
            <button class="btn btn-primary btn-lg" name="submit" type="submit"><i class="fa fa-save"></i>Simpan</button>
            <button class="btn btn-danger btn-lg" name="reset" type="reset"><i class="fa fa-times"></i>Reset</button>
        </div> -->
    <?php } ?>


    <?= form_close(); ?>