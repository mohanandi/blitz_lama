<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
    $query = "SELECT * FROM rptka WHERE id = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("gak bisa");
    }
    $row = mysqli_fetch_array($result);
    $nama_pt = $row['nama_pt'];
    $no_rptka = $row['no_rptka'];
    $jumlah_rptka = $row['jumlah_rptka'];
    ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="m-0 font-weight-bold text-primary">
            <a href="index.php?page=rptka"> DATA RPTKA</a> /
            <a href="index.php?page=rptkapt&pt=<?= $row['nama_pt']; ?>"><?= $row['nama_pt']; ?></a>
            / <a href="index.php?page=rptkadetail&id=<?= $row['id']; ?>"> <?= $row['no_rptka'] ?></a>
        </h5>
        <a href="../beranda/perusahaan/export_rptka.php?no_rptka=<?php echo $no_rptka; ?>&nama_pt=<?php echo $nama_pt; ?>&jumlah_rptka=<?php echo $jumlah_rptka; ?>"" class=" d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Download Report
        </a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DATA JABATAN RPTKA <?= $row['no_rptka']; ?></h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>JABATAN</th>
                            <th>JUMLAH</th>
                            <th>TERPAKAI</th>
                            <th>SISA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $terpakai = 0;
                        $jbt = "SELECT * FROM jabatan_rptka WHERE nama_pt = '$nama_pt' && no_rptka = '$no_rptka' ";
                        $hasil = mysqli_query($connection, $jbt);
                        while ($data = mysqli_fetch_array($hasil)) {

                        ?>
                            <tr>
                                <th><?php echo $data['jabatan']; ?></th>
                                <td><?php echo $data['jumlah']; ?></td>
                                <td><?php echo $data['terpakai'];
                                    $terpakai += $data['terpakai']; ?></td>
                                <td><?php echo $data['jumlah'] - $data['terpakai']; ?></td>
                            </tr>
                        <?php
                        } ?>
                        <tr class="table-light">
                            <td>TOTAL</td>
                            <td><?= $row['jumlah_rptka'] ?></td>
                            <td><?= $terpakai ?></td>
                            <td><?= $row['jumlah_rptka'] - $terpakai; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="index.php?page=rptka"> PENGGUNA RPTKA <?= $row['no_rptka']; ?></a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>AKSI</th>
                            <th>STATUS VISA</th>
                            <th>NAMA MANDARIN</th>
                            <th>NAMA LATIN</th>
                            <th>NO PASSPORT</th>
                            <th>JENIS VISA</th>
                            <th>JABATAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $jbt = "SELECT * FROM visa312 WHERE nama_pt = '$nama_pt' && no_rptka = '$no_rptka' ";
                        $hasil = mysqli_query($connection, $jbt);
                        $no = 1;
                        while ($data_visa = mysqli_fetch_array($hasil)) {
                            $passport = $data_visa['passport'];
                            $query_data = "SELECT * FROM data WHERE passport = '$passport'";
                            $hasil_data = mysqli_query($connection, $query_data);
                            $data = mysqli_fetch_array($hasil_data);
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><a href="" class="badge badge-primary">DETAIL</a></td>
                                <td>
                                    <h6 class="m-0 font-weight-bold text-primary">AKTIF</h6>
                                </td>
                                <td><?= $data['nama_mandarin']; ?></td>
                                <td><?= $data['nama_latin']; ?></td>
                                <td><?= $data['passport']; ?></td>
                                <td><?= $data_visa['visa']; ?></td>
                                <td><?= $data_visa['jabatan']; ?></td>
                            </tr>
                        <?php $no++;
                        } ?>
                        <?php
                        $jbt = "SELECT * FROM riwayat_visa312 WHERE nama_pt = '$nama_pt' && no_rptka = '$no_rptka' ";
                        $hasil = mysqli_query($connection, $jbt);
                        $no = 1;
                        while ($data_visa = mysqli_fetch_array($hasil)) {
                            $passport = $data_visa['passport'];
                            $query_data = "SELECT * FROM riwayat_data WHERE passport = '$passport'";
                            $hasil_data = mysqli_query($connection, $query_data);
                            $data = mysqli_fetch_array($hasil_data);
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><a href="" class="badge badge-primary"> DETAIL</a></td>
                                <td>
                                    <h6 class="m-0 font-weight-bold text-primary">NON-AKTIF</h6>
                                </td>
                                <td><?= $data['nama_mandarin']; ?></td>
                                <td><?= $data['nama_latin']; ?></td>
                                <td><?= $data['passport']; ?></td>
                                <td><?= $data_visa['visa']; ?></td>
                                <td><?= $data_visa['jabatan']; ?></td>
                            </tr>
                        <?php $no++;
                        } ?>
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