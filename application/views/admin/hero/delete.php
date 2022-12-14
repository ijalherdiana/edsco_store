<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#delete-<?= $hero->id_hero ?>">
    <i class="fa fa-trash"> Hapus</i>
</button>

<div class="modal fade" id="delete-<?= $hero->id_hero ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Hapus data Hero</h4>
            </div>
            <div class="modal-body">
                <div class="callout callout-warning">
                    <h4>Peringatan!</h4>
                    Yakin ingin menghapus data ini ? Data yang sudah dihapus tidak dapat dikembalikan</a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success " data-dismiss="modal"><i
                        class="fa fa-times"></i>close</button>
                <a href="<?= base_url('admin/hero/delete/' . $hero->id_hero) ?>" class="btn btn-danger"><i
                        class="fa fa-trash-o"></i> Ya, Hapus Data Ini</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->