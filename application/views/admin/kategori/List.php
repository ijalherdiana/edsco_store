<?php if ($this->session->userdata('akses_level') != 'Manager') : ?>
<p>
    <a href="<?= base_url('admin/kategori/tambah') ?>" class="btn btn-success btn-lg"> <i class="fa fa-plus"></i>Tambah
        Data

    </a>
</p>
<?php endif; ?>
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
            <th>SLUG</th>
            <th>URUTAN</th>
            <?php if ($this->session->userdata('akses_level') != 'Manager') : ?>
            <th>ACTION</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($kategori as $kategori) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $kategori->nama_kategori ?></td>
            <td><?= $kategori->slug_kategori ?></td>
            <td><?= $kategori->urutan ?></td>
            <td>
                <?php if ($this->session->userdata('akses_level') != 'Manager') : ?>
                <a <?= anchor('admin/kategori/edit/' . $kategori->id_kategori, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> edit</div>') ?>
                    </a>

                    <a onclick="return confirm('Anda yakin ingin menghapus') "
                        <?= anchor('admin/kategori/delete/' . $kategori->id_kategori, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</div>') ?>
                        </a>
                        <?php endif; ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>