<p>
    <a href="<?= base_url('admin/user/tambah') ?>" class="btn btn-success btn-lg"> <i class="fa fa-plus"></i>Tambah
        Data

    </a>
</p>
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
            <th>NAMA</th>
            <th>EMAIL</th>
            <th>USERNAME</th>
            <th>LEVEL</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($user as $user) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $user->nama ?></td>
            <td><?= $user->email ?></td>
            <td><?= $user->username ?></td>
            <td><?= $user->akses_level ?></td>
            <td>
                <!-- <a href="<?= base_url('admin/user/edit' . $user->id_user) ?>" class="btn btn-primary btn-sm"> <i
                        class="fa fa-edit"></i>Edit </a> -->
                <a onclick="return confirm('Anda yakin ingin menghapus') "
                    <?= anchor('admin/user/edit/' . $user->id_user, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> edit</div>') ?>
                    </a>

                    <a onclick="return confirm('Anda yakin ingin menghapus') "
                        <?= anchor('admin/user/delete/' . $user->id_user, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</div>') ?>
                        </a>






            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>