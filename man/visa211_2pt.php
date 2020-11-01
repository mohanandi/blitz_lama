<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="m-0 font-weight-bold text-primary">
            <a href="index.php?page=visa211_2">DATA VISA 211-2</a> /
            <a href="index.php?page=visa211_2pt&pt=<?= $pt; ?>"><?= $pt; ?></a>
        </h5>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA AKTIF VISA 211-2 <?= $pt; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>AKSI</th>
                            <th>NAMA MANDARIN</th>
                            <th>NAMA LATIN</th>
                            <th>PASSPORT</th>
                            <th>JENIS PROSES VISA</th>
                            <th>TANGGAL AWAL VISA</th>
                            <th>TANGGAL AKHIR VISA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM visa211_2 WHERE nama_pt = '$pt'";
                        $result = mysqli_query($connection, $query);

                        if (!$result) {
                            die("gak bisa");
                        }
                        $no = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $passport = $row['passport'];
                            $query_data = "SELECT * FROM data WHERE passport = '$passport'";
                            $result_data = mysqli_query($connection, $query_data);
                            $row_data = mysqli_fetch_array($result_data);
                            $no++; ?>
                            <tr>
                                <td width="10%"><?= $no ?></td>
                                <td></td>
                                <td><?php echo $row_data['nama_mandarin']; ?> </td>
                                <td><?php echo $row_data['nama_latin']; ?></td>
                                <td><?php echo $row_data['passport']; ?></td>
                                <td><?php echo $row['visa']; ?></td>
                                <td><?php echo $row['start_visa']; ?></td>
                                <td><?php echo $row['expired']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA NON-AKTIF VISA 211-2 <?= $pt; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>AKSI</th>
                            <th>NAMA MANDARIN</th>
                            <th>NAMA LATIN</th>
                            <th>PASSPORT</th>
                            <th>JENIS PROSES VISA</th>
                            <th>TANGGAL AWAL VISA</th>
                            <th>TANGGAL AKHIR VISA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM riwayat_visa211_2 WHERE nama_pt = '$pt'";
                        $result = mysqli_query($connection, $query);

                        if (!$result) {
                            die("gak bisa");
                        }
                        $no = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $passport = $row['passport'];
                            $query_data = "SELECT * FROM riwayat_data WHERE passport = '$passport'";
                            $result_data = mysqli_query($connection, $query_data);
                            $row_data = mysqli_fetch_array($result_data);
                            $no++; ?>
                            <tr>
                                <td width="10%"><?= $no ?></td>
                                <td></td>
                                <td><?php echo $row_data['nama_mandarin']; ?> </td>
                                <td><?php echo $row_data['nama_latin']; ?></td>
                                <td><?php echo $row_data['passport']; ?></td>
                                <td><?php echo $row['visa']; ?></td>
                                <td><?php echo $row['start_visa']; ?></td>
                                <td><?php echo $row['expired']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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