<?php if ($this->session->userdata('akses_level') != 'Manager') : ?>
<p>
    <a href="<?= base_url('admin/rekening/tambah') ?>" class="btn btn-success btn-lg"> <i class="fa fa-plus"></i>Tambah
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
<table class="table table-bordered " id="example1">
    <thead>
        <tr>
            <th>NO</th>
            <th>NAMA BANK</th>
            <th>NOMOR REKENING</th>
            <th>PEMILIK</th>
            <?php if ($this->session->userdata('akses_level') != 'Manager') : ?>
            <th>ACTION</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($rekening as $rekening) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $rekening->nama_bank ?></td>
            <td><?= $rekening->nomor_rekening ?></td>
            <td><?= $rekening->nama_pemilik ?></td>
            <?php if ($this->session->userdata('akses_level') != 'Manager') : ?>
            <td>
                <a <?= anchor('admin/rekening/edit/' . $rekening->id_rekening, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> edit</div>') ?>
                    </a>

                    <a onclick="return confirm('Anda yakin ingin menghapus') "
                        <?= anchor('admin/rekening/delete/' . $rekening->id_rekening, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</div>') ?>
                        </a>
            </td>
            <?php endif; ?>
        </tr>
        <?php } ?>
    </tbody>
</table>