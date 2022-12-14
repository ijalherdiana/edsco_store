<p>
    <a href="<?= base_url('admin/hero/tambah') ?>" class="btn btn-success btn-lg"> <i class="fa fa-plus"></i>Tambah
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
            <th>JUDUL</th>
            <th>DESKRIPSI</th>
            <th>GAMBAR</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($hero as $hero) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $hero->judul ?></td>
            <td><?= $hero->deskripsi ?></td>
            <td>
                <img src="<?= base_url('assets/upload/image/thumbs/' . $hero->gambar) ?>"
                    class="img img-resposive img-thumbnail" width="60" alt="">
            </td>
            <td>
                <!-- <a>
                    <?= anchor('admin/hero/edit/' . $hero->id_hero, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> edit</div>') ?>
                </a> -->
                <a href="<?= base_url('admin/hero/edit/' . $hero->id_hero) ?>" class="btn btn-primary btn-sm"><i
                        class="fa fa-edit"></i> Edit</a>

                <?php include('delete.php') ?>



            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>