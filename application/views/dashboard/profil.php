<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- COPAS DRI View->produk->list -->

<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <?php include('menu.php') ?>


                </div>
            </div>

            <div class="col-sm-6 col-md-9 col-lg-9 p-b-50">

                <h2><?= $title ?></h2>
                <hr>
                <?php
                //Notifikasi 
                if ($this->session->flashdata('sukses')) {
                    echo '<div class="alert alert-warning">';
                    echo $this->session->flashdata('sukses');
                    echo '</div>';
                }
                // Display Error
                echo validation_errors('<div class="alert alert-warning">', '</div>');
                // Form Open
                echo form_open(base_url('dashboard/profil'), 'class="leave-comment"'); ?>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap"
                                    value="<?= $pelanggan->nama_pelanggan ?>" required>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" name="email" class="form-control" placeholder="Email"
                                    value="<?= $pelanggan->email ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password" class="form-control" placeholder="Password"
                                    value="<?= set_value('password') ?>">
                                <span class="text-danger">Ketik minimal 6 Karakter untuk mengganti password baru atau
                                    biarkan kosong</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td><input type="telepon" name="telpon" class="form-control" placeholder="Telepon"
                                    value="<?= $pelanggan->telpon ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><textarea name="alamat" class="form-control"
                                    placeholder="Alamat"><?= $pelanggan->alamat ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-success btn-lg" type="submit"><i class="fa fa-save"></i>
                                    Update Profile</button>
                                <button class="btn btn-default btn-lg" type="reset"><i class="fa fa-times"></i>
                                    Reset</button>
                            </td>
                        </tr>
                    </tbody>

                </table>

                <?= form_close(); ?>

            </div>
        </div>
    </div>
</section>