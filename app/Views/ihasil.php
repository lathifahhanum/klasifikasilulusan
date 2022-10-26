<?php echo view('backlayout/header') ?>
<?php echo view('backlayout/sidebar') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) 
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
     /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Hasil Klasifikasi Profil Lulusan</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-3">
                <a href="hasil/printpdf" type="button" class="btn btn-success">
                    <i class="fa fa-print"></i> Cetak Hasil
                </a>
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
                                Kelompok Profil
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
                                <td>
                                    <?= $row->prediksi_k13; ?>
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

<?php echo view('backlayout/footer') ?>