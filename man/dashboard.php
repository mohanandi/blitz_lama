<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Perusahaan <br><a href="index.php?page=pt">(Detail) </a>
                            </div>
                            <?php
                            $query_pt = "SELECT * FROM perusahaan  ";
                            $sql_pt = mysqli_query($connection, $query_pt);
                            $jumlah_data = mysqli_num_rows($sql_pt);
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_data; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Data TKA <br><a href="index.php?page=tka">(Detail) </a>
                            </div>
                            <?php
                            $query_pt = "SELECT * FROM data  ";
                            $sql_pt = mysqli_query($connection, $query_pt);
                            $jumlah_data = mysqli_num_rows($sql_pt);
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_data; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Jumlah RPTKA <br><a href="index.php?page=rptka">(Detail) </a>
                            </div>
                            <?php
                            $query_pt = "SELECT * FROM rptka  ";
                            $sql_pt = mysqli_query($connection, $query_pt);
                            $jumlah_data = mysqli_num_rows($sql_pt);
                            ?>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jumlah_data; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Voucher <br><a href="index.php?page=voucher">(Detail) </a>
                            </div>
                            <?php
                            $query_pt = "SELECT * FROM voucher_other  ";
                            $sql_pt = mysqli_query($connection, $query_pt);
                            $jumlah_other = mysqli_num_rows($sql_pt);
                            $query_pt = "SELECT * FROM voucher_visa  ";
                            $sql_pt = mysqli_query($connection, $query_pt);
                            $jumlah_visa = mysqli_num_rows($sql_pt);
                            $total_voucher = $jumlah_other + $jumlah_visa;
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_voucher; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">DATA</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $angka_pt = [];
        $jumlah_tka = [];
        $query_pt = "SELECT nama_pt FROM perusahaan";
        $sql_pt = mysqli_query($connection, $query_pt);
        ?>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($sql_pt)) {
            array_push($angka_pt, $no);
            $nama_pt = $row['nama_pt'];
            $query_jumlah = "SELECT * FROM data WHERE nama_pt='$nama_pt' ";
            $sql_jumlah = mysqli_query($connection, $query_jumlah);
            $jumlah_data = mysqli_num_rows($sql_jumlah);
            array_push($jumlah_tka, $jumlah_data);
        ?>
        <?php
            $no++;
        }
        ?>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">TABLE DATA PERUSAHAAN</h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA PT</th>
                                    <th>VISA 211</th>
                                    <th>VISA 211-1</th>
                                    <th>VISA 211-2</th>
                                    <th>VISA 211-3</th>
                                    <th>VISA 211-4</th>
                                    <th>VISA 312</th>
                                    <th>VOA</th>
                                    <th>VISA LAIN</th>
                                    <th>RPTKA</th>
                                    <th>VOUCHER</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM perusahaan";
                                $result = mysqli_query($connection, $query);

                                if (!$result) {
                                    die("gak bisa");
                                }
                                $no = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $nama_pt = $row['nama_pt'];
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $nama_pt; ?></td>
                                        <?php
                                        $query_pt = "SELECT * FROM visa211 WHERE nama_pt = '$nama_pt'  ";
                                        $sql_pt = mysqli_query($connection, $query_pt);
                                        $jumlah_data = mysqli_num_rows($sql_pt);
                                        ?>
                                        <td><?= $jumlah_data; ?></td>
                                        <?php
                                        $query_pt = "SELECT * FROM visa211_1 WHERE nama_pt = '$nama_pt'  ";
                                        $sql_pt = mysqli_query($connection, $query_pt);
                                        $jumlah_data = mysqli_num_rows($sql_pt);
                                        ?>
                                        <td><?= $jumlah_data; ?></td>
                                        <?php
                                        $query_pt = "SELECT * FROM visa211_2 WHERE nama_pt = '$nama_pt'  ";
                                        $sql_pt = mysqli_query($connection, $query_pt);
                                        $jumlah_data = mysqli_num_rows($sql_pt);
                                        ?>
                                        <td><?= $jumlah_data; ?></td>
                                        <?php
                                        $query_pt = "SELECT * FROM visa211_3 WHERE nama_pt = '$nama_pt'  ";
                                        $sql_pt = mysqli_query($connection, $query_pt);
                                        $jumlah_data = mysqli_num_rows($sql_pt);
                                        ?>
                                        <td><?= $jumlah_data; ?></td>
                                        <?php
                                        $query_pt = "SELECT * FROM visa211_4 WHERE nama_pt = '$nama_pt'  ";
                                        $sql_pt = mysqli_query($connection, $query_pt);
                                        $jumlah_data = mysqli_num_rows($sql_pt);
                                        ?>
                                        <td><?= $jumlah_data; ?></td>
                                        <?php
                                        $query_pt = "SELECT * FROM visa312 WHERE nama_pt = '$nama_pt'  ";
                                        $sql_pt = mysqli_query($connection, $query_pt);
                                        $jumlah_data = mysqli_num_rows($sql_pt);
                                        ?>
                                        <td><?= $jumlah_data; ?></td>
                                        <?php
                                        $query_pt = "SELECT * FROM voa WHERE nama_pt = '$nama_pt'  ";
                                        $sql_pt = mysqli_query($connection, $query_pt);
                                        $jumlah_data = mysqli_num_rows($sql_pt);
                                        ?>
                                        <td><?= $jumlah_data; ?></td>
                                        <?php
                                        $query_pt = "SELECT * FROM visa_lain WHERE nama_pt = '$nama_pt'  ";
                                        $sql_pt = mysqli_query($connection, $query_pt);
                                        $jumlah_data = mysqli_num_rows($sql_pt);
                                        ?>
                                        <td><?= $jumlah_data; ?></td>
                                        <?php
                                        $query_pt = "SELECT * FROM rptka WHERE nama_pt = '$nama_pt'  ";
                                        $sql_pt = mysqli_query($connection, $query_pt);
                                        $jumlah_data = mysqli_num_rows($sql_pt);
                                        ?>
                                        <td><?= $jumlah_data; ?></td>
                                        <?php
                                        $query_pt = "SELECT * FROM voucher_other WHERE nama_pt = '$nama_pt'  ";
                                        $sql_pt = mysqli_query($connection, $query_pt);
                                        $jumlah_other = mysqli_num_rows($sql_pt);
                                        $query_pt = "SELECT * FROM voucher_visa WHERE nama_pt = '$nama_pt'  ";
                                        $sql_pt = mysqli_query($connection, $query_pt);
                                        $jumlah_visa = mysqli_num_rows($sql_pt);
                                        $total = $jumlah_other + $jumlah_visa;
                                        ?>
                                        <td><?= $total; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="assets/vendor/chart.js/Chart.min.js"></script>
<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/chart-area-demo.js"></script>
<script src="assets/js/demo/datatables-demo.js"></script>
<?php
$array_value = [];
$query_visa211 = "SELECT * FROM visa211";
$sql_visa211 = mysqli_query($connection, $query_visa211);
array_push($array_value, mysqli_num_rows($sql_visa211));
$query_visa211 = "SELECT * FROM visa211_1";
$sql_visa211 = mysqli_query($connection, $query_visa211);
array_push($array_value, mysqli_num_rows($sql_visa211));
$query_visa211 = "SELECT * FROM visa211_2";
$sql_visa211 = mysqli_query($connection, $query_visa211);
array_push($array_value, mysqli_num_rows($sql_visa211));
$query_visa211 = "SELECT * FROM visa211_3";
$sql_visa211 = mysqli_query($connection, $query_visa211);
array_push($array_value, mysqli_num_rows($sql_visa211));
$query_visa211 = "SELECT * FROM visa211_4";
$sql_visa211 = mysqli_query($connection, $query_visa211);
array_push($array_value, mysqli_num_rows($sql_visa211));
$query_visa211 = "SELECT * FROM visa312";
$sql_visa211 = mysqli_query($connection, $query_visa211);
array_push($array_value, mysqli_num_rows($sql_visa211));
$query_visa211 = "SELECT * FROM voa";
$sql_visa211 = mysqli_query($connection, $query_visa211);
array_push($array_value, mysqli_num_rows($sql_visa211));
$query_visa211 = "SELECT * FROM visa_lain";
$sql_visa211 = mysqli_query($connection, $query_visa211);
array_push($array_value, mysqli_num_rows($sql_visa211));

$query_visa211 = "SELECT * FROM voucher_visa";
$sql_visa211 = mysqli_query($connection, $query_visa211);
$voucher_visa = mysqli_num_rows($sql_visa211);
$query_visa211 = "SELECT * FROM voucher_other";
$sql_visa211 = mysqli_query($connection, $query_visa211);
$voucher_other = mysqli_num_rows($sql_visa211);
$total_voucher = $voucher_other + $voucher_visa;
array_push($array_value, $total_voucher);
?>
<script>
    var ctx = document.getElementById("myAreaChart");
    var angka = [<?php foreach ($angka_pt as $a) {
                        echo "'$a',";
                    } ?>];
    var array_value = [<?php foreach ($array_value as $i) {
                            echo "'$i',";
                        } ?>];
    var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["VISA 211", "VISA 211-1", "VISA 211-2", "VISA 211-3", "VISA 211-4", "VISA 312", "VOA", "VISA LAIN", "VOUCHER"],
            datasets: [{
                label: "Jumlah ",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, .255)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: array_value,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: <?= count($angka_pt); ?>
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
</script>