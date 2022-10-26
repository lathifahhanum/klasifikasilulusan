<?php echo view('backlayout/header') ?>
<?php echo view('backlayout/sidebar') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Nilai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Nilai Mahasiswa</li>
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
                <h3 class="card-title">Mahasiswa</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 10%">NIM</td>
                            <td>: <?= $mhs[0]['nim'] ?></td>
                        </tr>
                        <tr>
                            <td style="width: 10%">Nama</td>
                            <td>: <?= $mhs[0]['nama_mahasiswa'] ?></td>
                        </tr>
                        <tr>
                            <td style="width: 10%">Prodi</td>
                            <td>: <?= $mhs[0]['prodi'] ?></td>
                        </tr>
                        <tr>
                            <td style="width: 10%">Angkatan</td>
                            <td>: <?= $mhs[0]['tahun_angkatan'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Nilai Mahasiswa</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                </div>

            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 1%">No</th>
                            <th style="width: 20%">Mata Kuliah</th>
                            <th style="width: 10%">Nilai</th>
                            <th style="width: 10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($nilai as $row) :
                            $no++;
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row->matakuliah ?></td>
                                <td><?= $row->nilai ?></td>
                                <td>
                                    <a class="btn btn-warning btn-edit" data-nim="<?= $mhs[0]['nim'] ?>" data-id="<?= $row->id_nilai ?>" data-nilai="<?= $row->nilai ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                    </a>
                                    <a class="btn btn-danger btn-delete" href="#" data-nim="<?= $mhs[0]['nim'] ?>" data-id="<?= $row->id_nilai; ?>">
                                        <i class="fas fa-trash">
                                        </i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.Main content -->
    <!-- Modal Edit Data -->
    <form action="<?= base_url('updatedNilaiMhs') ?>" method="post">
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
                            <label class="col-sm-2 col-form-label">Nilai</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control nilai" name="nilai" placeholder="Masukkan Nilai">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="hidden" name="id_nilai" class="id_nilai">
                        <input type="hidden" name="nim" class="nilai_nim">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- /.Modal Edit Data -->

    <!-- Modal Delete Data -->
    <form action="<?= base_url('deleteNilai') ?>" method="post">
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
                        <input type="text" class="id_nilai" name="id_nilai">
                        <input type="text" class="nilai_nim" name="nim">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- /.Modal Delete Data -->
</div>
<!-- /.Page content -->

<?php echo view('backlayout/footer') ?>


<script>
    $(document).ready(function() {
        //Modal edit
        $('.btn-edit').on('click', function() {
            const id = $(this).data('id');
            const nim = $(this).data('nim');
            const mk = $(this).data('matakuliah');
            const nilai = $(this).data('nilai');

            $('.id_nilai').val(id);
            $('.nilai_nim').val(nim);
            $('.nilai_kode_matakuliah').val(mk);
            $('.nilai').val(nilai);
            $('#editModal').modal('show');
        })

        //Modal delete
        $('.btn-delete').on('click', function() {
            const id = $(this).data('id');
            const nim = $(this).data('nim');

            $('.nilai_nim').val(nim);
            $('.id_nilai').val(id);
            $('#deleteModal').modal('show');
        })
    })
</script>