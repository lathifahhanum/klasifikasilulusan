<?php echo view('backlayout/header') ?>
<?php echo view('backlayout/sidebar') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Prodi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Prodi</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Data Prodi</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                    + Tambah Data
                </button>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                No
                            </th>
                            <th style="width: 20%">
                                Kode Prodi
                            </th>
                            <th style="width: 20%">
                                Nama Prodi
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prodi as $key => $row) { ?>
                            <tr>
                                <td>
                                    <?= $key + 1; ?>
                                </td>
                                <td>
                                    <?= $row->kode_prodi; ?>
                                </td>
                                <td>
                                    <?= $row->prodi; ?>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm btn-edit" href="#" data-kode="<?= $row->kode_prodi; ?>" data-nama="<?= $row->prodi; ?>" ?>
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm btn-delete" href="#" data-kode="<?= $row->kode_prodi; ?>">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.Main content -->
</div>
<!-- /.Page content -->

<!-- Modal Tambah Data -->
<form action="prodi/create" method="post">
    <div class="modal fade" id="tambahModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kode Prodi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kode_prodi" placeholder="Masukkan Kode Prodi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Prodi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="prodi" placeholder="Masukkan Nama Prodi">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- /.Modal Tambah Data -->

<!-- Modal Edit Data -->
<form action="prodi/update" method="post">
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kode Prodi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control kode_prodi" name="kode_prodi" placeholder="Masukkan Kode Prodi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Prodi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control prodi" name="prodi" placeholder="Masukkan Nama Prodi">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" class="kode_prodi" name="kode_prodi">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- /.Modal Edit Data -->

<!-- Modal Delete Data -->
<form action="prodi/delete" method="post">
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Delete Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="kode_prodi" name="kode_prodi">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- /.Modal Delete Data -->

<?php echo view('backlayout/footer') ?>

<script>
    $(document).ready(function() {
        //Modal edit
        $('.btn-edit').on('click', function() {
            const kode = $(this).data('kode');
            const nama = $(this).data('nama');

            $('.kode_prodi').val(kode);
            $('.prodi').val(nama);
            $('#editModal').modal('show');
        })

        //Modal delete
        $('.btn-delete').on('click', function() {
            const kode = $(this).data('kode');

            $('.kode_prodi').val(kode);
            $('#deleteModal').modal('show');
        })
    })
</script>