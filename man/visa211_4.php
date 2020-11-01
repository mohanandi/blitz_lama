<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="m-0 font-weight-bold text-primary"><a href="../man/?page=visa211_4"> DATA VISA 211-4</a></h5>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA VISA 211-4 PER PERUSAHAAN</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>AKSI</th>
                            <th>NAMA PT</th>
                            <th>JUMLAH VISA 211-4 AKTIF</th>
                            <th>JUMLAH VISA 211-4 NON-AKTIF</th>
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
                                <td><a href="../man/?page=visa211_4pt&pt=<?= $nama_pt; ?>" class="badge badge-primary">Detail</a></td>
                                <td><?php echo $nama_pt; ?></td>
                                <?php
                                $query_pt = "SELECT * FROM visa211_4 WHERE nama_pt = '$nama_pt'  ";
                                $sql_pt = mysqli_query($connection, $query_pt);
                                $jumlah_data = mysqli_num_rows($sql_pt);
                                ?>
                                <td><?= $jumlah_data; ?></td>
                                <?php
                                $query_pt = "SELECT * FROM riwayat_visa211_4 WHERE nama_pt = '$nama_pt'  ";
                                $sql_pt = mysqli_query($connection, $query_pt);
                                $jumlah_data = mysqli_num_rows($sql_pt);
                                ?>
                                <td><?= $jumlah_data; ?></td>
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