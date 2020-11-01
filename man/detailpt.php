<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
    $query_pt = "SELECT * FROM perusahaan WHERE id='$id' ";
    $sql_pt = mysqli_query($connection, $query_pt);
    $row = mysqli_fetch_array($sql_pt);
    $nama_pt = $row['nama_pt'];
    $data = ['DATA TKA', 'DATA VISA 211', 'DATA VISA 211-1', 'DATA VISA 211-2', 'DATA VISA 211-3', 'DATA VISA 211-4', 'VISA 312', 'VOA', 'VISA LAIN', 'DATA RPTKA'];
    $array_value = [];
    $query_visa211 = "SELECT * FROM data WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM visa211 WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM visa211_1 WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM visa211_2 WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM visa211_3 WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM visa211_4 WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM visa312 WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM voa WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM visa_lain WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM rptka WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value, mysqli_num_rows($sql_visa211));

    $array_value_non = [];
    $query_visa211 = "SELECT * FROM riwayat_data WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value_non, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM riwayat_visa211 WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value_non, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM riwayat_visa211_1 WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value_non, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM riwayat_visa211_2 WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value_non, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM riwayat_visa211_3 WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value_non, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM riwayat_visa211_4 WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value_non, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM riwayat_visa312 WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value_non, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM riwayat_voa WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value_non, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM riwayat_visa_lain WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value_non, mysqli_num_rows($sql_visa211));
    $query_visa211 = "SELECT * FROM riwayat_rptka WHERE nama_pt = '$nama_pt'";
    $sql_visa211 = mysqli_query($connection, $query_visa211);
    array_push($array_value_non, mysqli_num_rows($sql_visa211));
    ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="m-0 font-weight-bold text-primary">
            <a href="index.php?page=pt"> DATA PERUSAHAAN</a> /
            <a href="index.php?page=detailpt&id=<?= $row['id']; ?>"><?= $row['nama_pt']; ?></a>
        </h5>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">PROFILE PERUSAHAAN</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th>NAMA PT</th>
                                    <th>PIC</th>
                                    <th>NAMA CLIENT</th>
                                    <th>ALAMAT</th>
                                    <th>KETERANGAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $row['nama_pt']; ?></td>
                                    <td><?= $row['pic']; ?></td>
                                    <td><?= $row['nama_client']; ?></td>
                                    <td><?= $row['alamat']; ?></td>
                                    <td><?= $row['ket']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DATA PERUSAHAAN</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th>JENIS DATA</th>
                                    <th>JUMLAH AKTIF</th>
                                    <th>JUNLAH NON-AKTIF</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($x = 0; $x < count($data); $x++) {
                                ?>
                                    <tr>
                                        <td><?= $data[$x]; ?></td>
                                        <td><?= $array_value[$x]; ?></td>
                                        <td><?= $array_value_non[$x]; ?></td>
                                        <td><a href="">detail</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php
        $query_voucher = "SELECT * FROM voucher_visa WHERE nama_pt = '$nama_pt'";
        $sql_voucher = mysqli_query($connection, $query_voucher);
        $jumlah_voucher_visa = mysqli_num_rows($sql_voucher);
        $query_voucher_other = "SELECT * FROM voucher_other WHERE nama_pt = '$nama_pt'";
        $sql_voucher_other = mysqli_query($connection, $query_voucher_other);
        $jumlah_voucher_other = mysqli_num_rows($sql_voucher_other);
        $total_voucher = $jumlah_voucher_other + $jumlah_voucher_visa;
        ?>
        <!-- Card Nama Perusahaan -->
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h6 class="m-0 font-weight-bold text-primary mx-auto">JUMLAH VOUCHER</h6>
                            <hr>
                            <div class="h6 mb-0 font-weight-bold text-gray-800"><?= $total_voucher; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
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