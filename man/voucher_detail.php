<div class="container-fluid">
    <?php
    if ($n == "other") {
        $data_voucher = "SELECT * FROM voucher_other WHERE id=$id ";
        $sql_voucher = mysqli_query($connection, $data_voucher);
    } else if ($n == "visa") {
        $data_voucher = "SELECT * FROM voucher_visa WHERE id=$id ";
        $sql_voucher = mysqli_query($connection, $data_voucher);
    }
    $hasil = mysqli_fetch_assoc($sql_voucher);
    $mata_uang = $hasil['mata_uang'];
    $total = $hasil['total_harga'];
    if ($mata_uang == "Rupiah") {
        $total_harga = "Rp " . number_format($total, 2, ',', '.');
    } else {
        $total_harga = "$ " . number_format($total, 2, '.', ',');
    }
    $nama_pt = $hasil['nama_pt'];
    $lokasi = $hasil['lokasi'];
    $officer = $hasil['officer'];
    $tgl_input = $hasil['tgl_input'];
    $no_voucher = $hasil['kode'];
    $nama_pengguna = $hasil['nama_pengguna'];
    $nama_pt = $hasil['nama_pt'];
    $ket = $hasil['ket'];
    $input_by = $hasil['input_by'];
    ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="m-0 font-weight-bold text-primary">
            <a href="index.php?page=voucher"> DATA VOUCHER</a> /
            <a href="index.php?page=voucher_detail&n=<?= $n; ?>&id=<?= $id; ?>"><?= $no_voucher; ?></a>
        </h5>
        <?php
        if ($n == "other") {
        ?>
            <a href="../beranda/voucher/cetak_voucherother.php?id=<?php echo $id; ?>" class=" d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Download Report
            </a>

        <?php
        } else if ($n == "visa") {
        ?>
            <a href="../beranda/voucher/cetak_vouchervisa.php?id=<?php echo $id; ?>" class=" d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Download Report
            </a>
        <?php
        }
        ?>
    </div>
    <div class="row">
        <!-- Card Nama Perusahaan -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h6 class="m-0 font-weight-bold text-primary mx-auto">NAMA PERUSAHAAN</h6>
                            <hr>
                            <div class="h6 mb-0 font-weight-bold text-gray-800"><?= $nama_pt; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Nama Client -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h6 class="m-0 font-weight-bold text-primary mx-auto">NAMA CLIENT</h6>
                            <hr>
                            <div class="h6 mb-0 font-weight-bold text-gray-800"><?= $nama_pengguna; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-id-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Lokasi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h6 class="m-0 font-weight-bold text-primary mx-auto">LOKASI</h6>
                            <hr>
                            <div class="h6 mb-0 font-weight-bold text-gray-800"><?= $lokasi; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-map fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Tanggal Input -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h6 class="m-0 font-weight-bold text-primary mx-auto">TANGGAL INPUT</h6>
                            <hr>
                            <div class="h6 mb-0 font-weight-bold text-gray-800"><?= $tgl_input; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Staff OP -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h6 class="m-0 font-weight-bold text-primary mx-auto">STAFF OP</h6>
                            <hr>
                            <div class="h6 mb-0 font-weight-bold text-gray-800"><?= $officer; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Total -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h6 class="m-0 font-weight-bold text-primary mx-auto">TOTAL</h6>
                            <hr>
                            <div class="h6 mb-0 font-weight-bold text-gray-800"><?= $total_harga; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA PENGGUNA VOUCHER</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA MANDARIN</th>
                            <th>NAMA LATIN</th>
                            <th>PASSPORT</th>
                            <th>JENIS PROSES</th>
                            <th>HARGA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x = 1;
                        if ($n == "other") {
                            $data_voucher = "SELECT * FROM data_voucherother WHERE no_voucher=$id ";
                            $sql_voucher = mysqli_query($connection, $data_voucher);
                        } else if ($n == "visa") {
                            $data_voucher = "SELECT * FROM data_vouchervisa WHERE no_voucher=$id ";
                            $sql_voucher = mysqli_query($connection, $data_voucher);
                        }
                        while ($data = mysqli_fetch_assoc($sql_voucher)) {

                        ?>
                            <tr>
                                <th style="text-align: center;"><?php echo $x++; ?></th>

                                <td style="text-align: center;"><?php echo $data['nama_mandarin']; ?></td>
                                <td style="text-align: center;"><?php echo $data['nama_latin']; ?></td>

                                <td style="text-align: center;"><?php echo $data['passport']; ?></td>
                                <td style="text-align: center;"><?php echo $data['jenis_proses']; ?></td>
                                <?php

                                if ($mata_uang == "Rupiah") {
                                    $result = "Rp " . number_format($data['harga'], 2, ',', '.');
                                ?>
                                    <td style="text-align: center;"><?php echo $result; ?></td>
                                <?php } else {
                                    $result = "$ " . number_format($data['harga'], 2, '.', ',');
                                ?>
                                    <td style="text-align: center;"><?php echo $result ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Card Aplly By -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h6 class="m-0 font-weight-bold text-primary mx-auto">APPLY BY</h6>
                            <hr>
                            <div class="h6 mb-0 font-weight-bold text-gray-800"><?= $input_by; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Note -->
        <div class="col-xl-9 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h6 class="m-0 font-weight-bold text-primary mx-auto">NOTE</h6>
                            <hr>
                            <div class="h6 mb-0 font-weight-bold text-gray-800"><?= $ket; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
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
<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/datatables-demo.js"></script>