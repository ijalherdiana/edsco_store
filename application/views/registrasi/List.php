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

                <p class="alert alert-success"> Sudah memiliki akun? Silahkan <a href="<?= base_url('masuk') ?>"
                        class="butn btn-info btn-sm">
                        Login disini
                    </a>
                </p>

                <div class="col-md-12">
                    <?php
                    // Display Error
                    echo validation_errors('<div class="alert alert-warning">', '</div>');
                    // Form Open
                    echo form_open(base_url('registrasi'), 'class="leave-comment"'); ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th><input type="text" name="nama_pelanggan" class="form-control"
                                        placeholder="Nama Lengkap" value="<?= set_value('nama_pelanggan') ?>" required>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" name="email" class="form-control" placeholder="Email"
                                        value="<?= set_value('email') ?>" required></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="password" class="form-control" placeholder="Password"
                                        value="<?= set_value('password') ?>" required></td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td><input type="telepon" name="telpon" class="form-control" placeholder="Telepon"
                                        value="<?= set_value('telepon') ?>" required></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><textarea name="alamat" class="form-control" placeholder="Alamat"
                                        <?= set_value('alamat') ?>></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button class="btn btn-success btn-lg" type="submit"><i class="fa fa-save"></i>
                                        Submit</button>
                                    <button class="btn btn-default btn-lg" type="reset"><i class="fa fa-times"></i>
                                        Reset</button>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                    <small>
                        Note * <br>
                        <span> Aplikasi ini dibuat untuk memenuhi Tugas Akhir SIB PT. ARKATAMA</span><br>
                        <span> Untuk bisa melakukan checkuot maka silahkan Registrasi dan Logi terlebih
                            dahulu.</span><br>
                        <span> Untuk bisa mengakses halaman Manager/Staff kunjungi halaman berikut</span><br>
                        <a href="http://rijalherd.contohdomain.com/login">
                            http://rijalherd.contohdomain.com/login</a><br>

                        <span>
                            <strong>Manager :</strong> <br>
                            Username : ijalher <br>
                            Password : ijal1234
                        </span> <br>
                        <span>
                            <strong>Staff :</strong> <br>
                            Username : asepsaepul <br>
                            Password : asep1234
                        </span> <br>

                    </small>

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