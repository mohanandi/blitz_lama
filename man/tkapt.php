<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="m-0 font-weight-bold text-primary">
            <a href="index.php?page=tka"> DATA TKA</a> /
            <a href="index.php?page=tkapt&pt=<?= $pt; ?>"><?= $pt; ?></a>
        </h5>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA TKA AKTIF</h6>
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
                            <th>Kewarganegaraan</th>
                            <th>Passport</th>
                            <th>Keterangan</th>
                            <th>Data Lama/Baru</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM data WHERE nama_pt='$pt'";
                        $result = mysqli_query($connection, $query);

                        if (!$result) {
                            die("gak bisa");
                        }
                        $no = 0;
                        while ($row_data = mysqli_fetch_array($result)) {;
                            $no++; ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td>
                                    <a class="badge badge-primary" href="">Detail</a>
                                </td>
                                <td><?php echo $row_data['nama_mandarin'];  ?></td>
                                <td><?php echo $row_data['nama_latin'];  ?></td>
                                <td><?php echo $row_data['kewarganegaraan'];  ?></td>
                                <td><?php echo $row_data['passport'];  ?></td>
                                <td><?php echo $row_data['ket'];  ?></td>
                                <td><?php echo $row_data['verif_data'];  ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA TKA NON-AKTIF</h6>
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
                            <th>Kewarganegaraan</th>
                            <th>Passport</th>
                            <th>Keterangan</th>
                            <th>Data Lama/Baru</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM riwayat_data WHERE nama_pt='$pt'";
                        $result = mysqli_query($connection, $query);

                        if (!$result) {
                            die("gak bisa");
                        }
                        $no = 0;
                        while ($row_data = mysqli_fetch_array($result)) {;
                            $no++; ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td>
                                    <a class="badge badge-primary" href="">Detail</a>
                                </td>
                                <td><?php echo $row_data['nama_mandarin'];  ?></td>
                                <td><?php echo $row_data['nama_latin'];  ?></td>
                                <td><?php echo $row_data['kewarganegaraan'];  ?></td>
                                <td><?php echo $row_data['passport'];  ?></td>
                                <td><?php echo $row_data['ket'];  ?></td>
                                <td><?php echo $row_data['verif_data'];  ?></td>
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