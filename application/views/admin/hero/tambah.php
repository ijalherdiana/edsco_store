<?php
//Error Upload
if (isset($error)) {
    echo '<p class="alert alert-warning" >';
    echo $error;
    echo '</p>';
}

//Notifikasi Erorr
echo validation_errors('<div class="alert alert-warning">', '</div>');

//form open
echo form_open_multipart(base_url('admin/hero/tambah'), ' class="form-horizontal"'); ?>

<div class="form-group">
    <label class="col-md-2 control-label">Judul</label>

    <div class="col-md-5">
        <input type="text" name="judul" class="form-control" placeholder="Header Hero" value="<?= set_value('judul') ?>"
            required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Deskripsi </label>

    <div class="col-md-10">
        <textarea name="deskripsi" class="form-control" placeholder="Deskripsi" id="editor">
            <?= set_value('deskripsi') ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Upload Gambar Hero</label>

    <div class="col-md-10">
        <input type="file" name="gambar" class="form-control" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Status Publikasi</label>

    <div class="col-md-10">
        <select name="status_hero" class="form-control">
            <option value="Draft">Simpan Sebagai Draft</option>


        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label"></label>

    <div class="col-md-5">
        <button class="btn btn-primary btn-lg" name="submit" type="submit"><i class="fa fa-save"></i> Simpan</button>
        <button class="btn btn-danger btn-lg" name="reset" type="reset"><i class="fa fa-times"></i> Reset</button>
    </div>


    <?= form_close(); ?>