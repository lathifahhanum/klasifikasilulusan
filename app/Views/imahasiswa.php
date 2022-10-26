<?php echo view('backlayout/header') ?>
<?php echo view('backlayout/sidebar') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Mahasiswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Mahasiswa</li>
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
                <h3 class="card-title">List Data Mahasiswa</h3>

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
                                NIM
                            </th>
                            <th style="width: 20%">
                                Nama Mahasiswa
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mahasiswa2 as $key => $row) { ?>
                            <tr>
                                <td>
                                    <?= $key + 1; ?>
                                </td>
                                <td>
                                    <?= $row->nim; ?>
                                </td>
                                <td>
                                    <?= $row->nama_mahasiswa; ?>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm btn-edit" href="#" data-id="<?= $row->nim; ?>" data-nama="<?= $row->nama_mahasiswa; ?>" data-prodi="<?= $row->mahasiswa_kode_prodi; ?>" data-angkatan="<?= $row->mahasiswa_id_angkatan; ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm btn-delete" href="#" data-id="<?= $row->nim; ?>">
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
<form action="mahasiswa/create" method="post">
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
                        <label class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <select name="mahasiswa_kode_prodi" class="form-control">
                                <option value="">Pilih Prodi</option>
                                <?php foreach ($prodi as $row) : ?>
                                    <option value="<?= $row->kode_prodi; ?>"><?= $row->prodi; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Angkatan</label>
                        <div class="col-sm-10">
                            <select name="mahasiswa_id_angkatan" class="form-control">
                                <option value="">Pilih Angkatan</option>
                                <?php foreach ($angkatan as $row) : ?>
                                    <option value="<?= $row->id_angkatan; ?>"><?= $row->tahun_angkatan; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM Mahasiswa">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_mahasiswa" placeholder="Masukkan Nama Mahasiswa">
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
<form action="mahasiswa/update" method="post">
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
                        <label class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <select name="mahasiswa_kode_prodi" class="form-control mahasiswa_kode_prodi">
                                <option value="">Pilih Prodi</option>
                                <?php foreach ($prodi as $row) : ?>
                                    <option value="<?= $row->kode_prodi; ?>"><?= $row->prodi; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Angkatan</label>
                        <div class="col-sm-10">
                            <select name="mahasiswa_id_angkatan" class="form-control mahasiswa_id_angkatan">
                                <option value="">Pilih Angkatan</option>
                                <?php foreach ($angkatan as $row) : ?>
                                    <option value="<?= $row->id_angkatan; ?>"><?= $row->tahun_angkatan; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control nim" name="nim" placeholder="Masukkan NIM Mahasiswa">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control nama_mahasiswa" name="nama_mahasiswa" placeholder="Masukkan Nama Mahasiswa">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="nim" class="nim">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- /.Modal Edit Data -->

<!-- Modal Delete Data -->
<form action="mahasiswa/delete" method="post">
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
                    <input type="hidden" class="nim" name="nim">
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
            const nama = $(this).data('nama');
            const prodi = $(this).data('prodi');
            const akt = $(this).data('angkatan');

            $('.nim').val(id);
            $('.nama_mahasiswa').val(nama);
            $('.mahasiswa_kode_prodi').val(prodi);
            $('.mahasiswa_id_angkatan').val(akt);
            $('#editModal').modal('show');
        })

        //Modal delete
        $('.btn-delete').on('click', function() {
            const id = $(this).data('id');

            $('.nim').val(id);
            $('#deleteModal').modal('show');
        })
    })
</script>