<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Copas dari list registrasi -->
<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="pos-relative">
            <div class="bgwhite">
                <h1><?= $title ?></h1>
                <hr>
                <div class="clearfix"></div><br><br>
                <?php
                if ($this->session->flashdata('sukses')) {
                    echo '<div class="alert alert-warning">';
                    echo $this->session->flashdata('sukses');
                    echo '</div>';
                }
                ?>

                <p class="alert alert-success"> Belum memiliki akun ? Silahkan <a href="<?= base_url('registrasi') ?>"
                        class="butn btn-info btn-sm">
                        Registrasi disini
                    </a>
                </p>

                <div class="col-md-12">
                    <?php
                    // Display Error
                    echo validation_errors('<div class="alert alert-warning">', '</div>');
                    // Display notifikasi (tampilkan pesan error)
                    // Tarik session flash data adri simple pelanggan
                    if ($this->session->flashdata('warning')) {
                        echo '<div class="alert alert-warning">';
                        echo $this->session->flashdata('warning');
                        echo '</div>';
                    }

                    // Display notifikasi sukses logout (tampilkan pesan sukses)
                    // Tarik session flash data adri simple pelanggan
                    if ($this->session->flashdata('sukses')) {
                        echo '<div class="alert alert-success">';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                    }

                    // Form Open
                    echo form_open(base_url('masuk'), 'class="leave-comment"'); ?>

                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="20%">Email (Username)</td>
                                <td><input type="email" name="email" class="form-control" placeholder="Email"
                                        value="<?= set_value('email') ?>" required></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="password" class="form-control" placeholder="Password"
                                        value="<?= set_value('password') ?>" required></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button class="btn btn-success btn-lg" type="submit"><i class="fa fa-save"></i>
                                        Login</button>
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

        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
            <div class="flex-w flex-m w-full-sm">

            </div>

            <div class="size10 trans-0-4 m-t-10 m-b-10">
                <!-- Button -->

            </div>
        </div>


    </div>
</section>