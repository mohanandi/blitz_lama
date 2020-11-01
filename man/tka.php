<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="m-0 font-weight-bold text-primary">
            <a href="index.php?page=tka"> DATA TKA</a>
        </h5>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data TKA per PT</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>AKSI</th>
                            <th>NAMA PT</th>
                            <th>JUMLAH TKA AKTIF</th>
                            <th>JUMLAH TKA NON-AKTIF</th>
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
                            $no++; ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td>
                                    <a class="badge badge-primary" href="index.php?page=tkapt&pt=<?= $nama_pt; ?>">Detail</a>
                                </td>
                                <td><?php echo $row['nama_pt']; ?></td>
                                <?php
                                $nama_pt = $row['nama_pt'];
                                $query_data = "SELECT * FROM data WHERE nama_pt = '$nama_pt'";
                                $query_data = mysqli_query($connection, $query_data);
                                $jumlah_data = mysqli_num_rows($query_data);
                                ?>
                                <td><?php echo $jumlah_data; ?></td>
                                <?php
                                $query_data = "SELECT * FROM riwayat_data WHERE nama_pt = '$nama_pt'";
                                $query_data = mysqli_query($connection, $query_data);
                                $jumlah_rwt_data = mysqli_num_rows($query_data);
                                ?>
                                <td><?php echo $jumlah_rwt_data; ?></td>
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