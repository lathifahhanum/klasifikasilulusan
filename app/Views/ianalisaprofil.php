<?php echo view('backlayout/header') ?>
<?php echo view('backlayout/sidebar') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Analisa Profil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Analisa Profil</li>
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
                <h3 class="card-title">Klasifikasi Profil</h3>
                <?php
                if (session()->getFlashdata('message')) {
                    ?>
                    <div class="alert alert-danger">
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
                <h4 class="card-title">
                    <div class="form-group">
                        <div class="col-sm-12 d-flex">
                            <form method='get' action="analisaProfil" id="searchForm" class="d-flex">
                                <select name='search' class="form-control">
                                    <option value="">--Pilih Angkatan--</option>
                                    <?php foreach ($angkatan as $row) : ?>
                                        <option value="<?= $row->tahun_angkatan; ?>"><?= $row->tahun_angkatan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <input class="btn btn-outline-secondary" type='button' id='btnsearch' value='Submit' onclick='document.getElementById("searchForm").submit();'>
                            </form>
                        </div>
                    </div>
                </h4>

                <div class="card-tools">
                    <div class="form-group">
                        <div class="col-sm-12 d-flex flex-column justify-content-center">
                            <form action="updatePrediksiK3" method="post">
                                <?php
                                $no = 1;
                                foreach ($newData as $key => $rows) :
                                    ?>
                                    <input type="checkbox" name="nim[]" value="<?= $rows['nim'] ?>" checked hidden>
                                    <input type="checkbox" name="k13[]" value="<?= $rows['k13'] ?>" checked hidden>
                                <?php endforeach; ?>

                                <button type="submit" class="btn btn-success float-right">Simpan Hasil Analisa</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 2%">
                                No
                            </th>

                            <th style="width: 2%">
                                NIM
                            </th>
                            <th style="width: 2%">
                                Nama
                            </th>
                            <th style="width: 2%">
                                Angkatan
                            </th>
                            <th style="width: 2%">
                                Kelompok Profil
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($newData as $key => $rows) :
                            ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <?php foreach ($rows as $cols) : ?>
                                    <td><?= $cols ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.Main content -->
</div>
<!-- /.Page content -->

<?php echo view('backlayout/footer') ?>