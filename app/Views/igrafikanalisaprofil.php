<?php echo view('backlayout/header') ?>
<?php echo view('backlayout/sidebar') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Grafik Analisa Profil</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <a href="<?= base_url('grafikanalisaprofil/printpdf') ?>" class="btn btn-primary">Print Hasil</a>
            <!-- Main row -->
            <div class="row">
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-12 connectedSortable">

                    <div class="card bg-gradient-white">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="fas fa-th mr-1"></i>
                                Grafik Analisa Profil
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn bg-outline-info btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-outline-info btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                            <?php
                            $labels = "";
                            $data = null;
                            foreach ($grafikChart as $chart) :
                                $labels .= "'" . $chart['prediksi_k13'] . "', ";
                                $data .= $chart['qty'] . ", ";
                            endforeach;
                            ?>

                        </div>
                    </div>
                    <!-- /.card-footer -->
            </div>
    </section>
    <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<?php echo view('backlayout/footer') ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
    const chartSiswa = document.getElementById('myChart').getContext('2d');
    const chart = new Chart(chartSiswa, {
        type: 'pie',
        data: {
            labels: [<?= $labels ?>], // data profil sebagai label dari chart
            datasets: [{
                label: 'Jumlah Prediksi',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?= $data ?>] //data jumlah profil sebagai data dari chart
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>