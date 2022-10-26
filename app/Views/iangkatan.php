<?php echo view('backlayout/header') ?>
<?php echo view('backlayout/sidebar') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Angkatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Angkatan</li>
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
                <h3 class="card-title">List Data Tahun Angkatan</h3>
                <?php
                if (session()->getFlashdata('message')) {
                    ?>
                    <div class="alert alert-info">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php
                }
                ?>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                    + Tambah Data
                </button>

                <!--<div class="card-tools">
                    <form method="post" action="/angkatan/prosesExcel" enctype="multipart/form-data" class="d-flex justify-content-center align-items-center">
                        <div class="form-group mr-2 d-flex justify-content-center align-items-center">
                            !-- <label>File Excel</label> 
                            <input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Import Excel</button>
                        </div>
                    </form>
                </div>-->
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                No
                            </th>
                            <th style="width: 20%">
                                Tahun Angkatan
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($angkatan as $key => $row) { ?>
                            <tr>
                                <td>
                                    <?= $key + 1; ?>
                                </td>
                                <td>
                                    <?= $row->tahun_angkatan; ?>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm btn-edit" href="#" data-id="<?= $row->id_angkatan; ?>" data-name="<?= $row->tahun_angkatan; ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm btn-delete" href="#" data-id="<?= $row->id_angkatan; ?>">
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
<form action="angkatan/create" method="post">
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
                        <label class="col-sm-2 col-form-label">Tahun Angkatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tahun_angkatan" placeholder="Masukkan Tahun">
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
<form action="angkatan/update" method="post">
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
                        <label class="col-sm-2 col-form-label">Tahun Angkatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control tahun_angkatan" name="tahun_angkatan" placeholder="Masukkan Tahun">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="id_angkatan" class="id_angkatan">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- /.Modal Edit Data -->

<!-- Modal Delete Data -->
<form action="angkatan/delete" method="post">
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
                    <input type="hidden" class="id_angkatan" name="id_angkatan">
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
            const id = $(this).data('id');
            const name = $(this).data('name');

            $('.id_angkatan').val(id);
            $('.tahun_angkatan').val(name);
            $('#editModal').modal('show');
        })

        //Modal delete
        $('.btn-delete').on('click', function() {
            const id = $(this).data('id');

            $('.id_angkatan').val(id);
            $('#deleteModal').modal('show');
        })
    })
</script>