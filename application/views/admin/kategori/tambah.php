<?php
//Notifikasi Eroro
echo validation_errors('<div class="alert alert-warning">', '</div>');

//form open
echo form_open(base_url('admin/kategori/tambah'), ' class="form-horizontal"'); ?>

<div class="form-group">
    <label class="col-md-2 control-label">Nama Kategori</label>

    <div class="col-md-5">
        <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori"
            value="<?= set_value('nama') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Urutan </label>

    <div class="col-md-5">
        <input type="number" name="urutan" class="form-control" placeholder="Urtan Kategori"
            value="<?= set_value('email') ?>" required>
    </div>
</div>



<div class="form-group">
    <label class="col-md-2 control-label"></label>

    <div class="col-md-5">
        <button class="btn btn-primary btn-lg" name="submit" type="submit"><i class="fa fa-save"></i>Simpan</button>
        <button class="btn btn-danger btn-lg" name="reset" type="reset"><i class="fa fa-times"></i>Reset</button>
    </div>


    <?= form_close(); ?>