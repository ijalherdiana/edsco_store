<?php
//Notifikasi Eroro
echo validation_errors('<div class="alert alert-warning">', '</div>');

//form open
echo form_open(base_url('admin/user/tambah'), ' class="form-horizontal"'); ?>

<div class="form-group">
    <label class="col-md-2 control-label">Nama Pengguna</label>

    <div class="col-md-5">
        <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" value="<?= set_value('nama') ?>"
            required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Email </label>

    <div class="col-md-5">
        <input type="email" name="email" class="form-control" placeholder="Email Pengguna"
            value="<?= set_value('email') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Username </label>

    <div class="col-md-5">
        <input type="text" name="username" class="form-control" placeholder="Username"
            value="<?= set_value('username') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Password </label>

    <div class="col-md-5">
        <input type="password" name="password" class="form-control" placeholder="password"
            value="<?= set_value('password') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Level Hak Akses </label>

    <div class="col-md-5">
        <select name="akses_level" class="form-control">
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"></label>

    <div class="col-md-5">
        <button class="btn btn-primary btn-lg" name="submit" type="submit"><i class="fa fa-save"></i>Simpan</button>
        <button class="btn btn-danger btn-lg" name="reset" type="reset"><i class="fa fa-times"></i>Reset</button>
    </div>


    <?= form_close(); ?>