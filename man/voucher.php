<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="m-0 font-weight-bold text-primary">
            <a href="index.php?page=voucher"> DATA VOUCHER</a>
        </h5>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                FILTER
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>AKSI</th>
                            <th>NO VOUCHER</th>
                            <th>NAMA PT</th>
                            <th>JUMLAH PENGGUNA</th>
                            <th>TOTAL HARGA</th>
                            <th>TANGGAL INPUT VOUCHER</th>
                            <th>INVOICE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $array_key = [];
                        $array_value = [];
                        if (isset($_POST['filter'])) {
                            $nama_pt = $_POST['nama_pt'];
                            $tgl_input = $_POST['tgl_input'];
                            $input_by = $_POST['input_by'];

                            if (strlen($nama_pt) == 0) {
                            } else {
                                array_push($array_value, $nama_pt);
                                array_push($array_key, "nama_pt");
                            }

                            if ($tgl_input == null) {
                            } else {
                                array_push($array_value, $tgl_input);
                                array_push($array_key, "tgl_input");
                            }

                            if (strlen($input_by) == 0) {
                            } else {
                                array_push($array_value, $input_by);
                                array_push($array_key, "input_by");
                            }

                            $export = seluruh($array_key, $array_value);
                            $export_other = seluruh_other($array_key, $array_value);
                        } else {

                            $export = seluruh($array_key, $array_value);
                            $export_other = seluruh_other($array_key, $array_value);
                        }
                        $no = 1;
                        $query_other = "SELECT * FROM voucher_other";
                        $sql_other = mysqli_query($connection, $query_other);
                        $export_all = [];
                        array_push($export_all, $export);
                        array_push($export_all, $export_other);

                        $no = 1;
                        for ($i = 0; $i < count($export); $i++) {
                            $query_voucher = "SELECT * FROM voucher_visa WHERE id = '$export[$i]'";
                            $sql_voucher = mysqli_query($connection, $query_voucher);
                            $hasil = mysqli_fetch_array($sql_voucher);
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no;
                                    ?>
                                </td>
                                <td><a href="index.php?page=voucher_detail&n=visa&id=<?php echo $hasil['id']; ?>" class="badge badge-primary">Detail</a></td>
                                <td><?= $hasil['kode']; ?></td>
                                <td><?php echo $hasil['nama_pt']; ?></td>
                                <td><?php echo $hasil['jumlah_pengguna']; ?></td>

                                <?php

                                if ($hasil['mata_uang'] == "Rupiah") {
                                    $result = "Rp " . number_format($hasil['total_harga'], 2, ',', '.');
                                ?>
                                    <td><?php echo $result; ?></td>
                                <?php } else {
                                    $result = "$ " . number_format($hasil['total_harga'], 2, '.', ',');
                                ?>
                                    <td><?php echo $result ?></td>
                                <?php }
                                ?>

                                <td><?php echo $hasil['tgl_input']; ?></td>
                                <?php
                                if ($hasil['ket_invoice'] == 0) {

                                ?>
                                    <td><span class="badge badge-danger">BELUM ADA</span></td>
                                <?php } else {
                                    $id = $hasil['id'];
                                    $data_invoice = "SELECT * FROM invoice_vouchervisa WHERE id=$id ";
                                    $sql_invoice = mysqli_query($connection, $data_invoice);
                                    $hasil_invoice = mysqli_fetch_assoc($sql_invoice);
                                ?>
                                    <td><?php echo $hasil_invoice['invoice']; ?></td>
                                <?php } ?>
                            </tr>

                        <?php $no++;
                        }
                        for ($i = 0; $i < count($export_other); $i++) {
                            $query_voucher = "SELECT * FROM voucher_other WHERE id = '$export_other[$i]'";
                            $sql_voucher = mysqli_query($connection, $query_voucher);
                            $row = mysqli_fetch_array($sql_voucher);
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no;
                                    ?>
                                </td>
                                <td><a href="index.php?page=voucher_detail&n=other&id=<?php echo $row['id']; ?>" class="badge badge-primary">Detail</a></td>
                                <td><?= $row['kode']; ?></td>
                                <td><?php echo $row['nama_pt']; ?></td>
                                <td><?php echo $row['jumlah_pengguna']; ?></td>

                                <?php

                                if ($row['mata_uang'] == "Rupiah") {
                                    $result = "Rp " . number_format($row['total_harga'], 2, ',', '.');
                                ?>
                                    <td><?php echo $result; ?></td>
                                <?php } else {
                                    $result = "$ " . number_format($row['total_harga'], 2, '.', ',');
                                ?>
                                    <td><?php echo $result ?></td>
                                <?php }
                                ?>

                                <td><?php echo $row['tgl_input']; ?></td>
                                <?php
                                if ($row['ket_invoice'] == 0) {

                                ?>
                                    <td><span class="badge badge-danger">BELUM ADA</span></td>
                                <?php } else {
                                    $id = $row['id'];
                                    $data_invoice = "SELECT * FROM invoice_voucherother WHERE id=$id ";
                                    $sql_invoice = mysqli_query($connection, $data_invoice);
                                    $row_invoice = mysqli_fetch_assoc($sql_invoice);
                                ?>
                                    <td><?php echo $row_invoice['invoice']; ?></td>
                                <?php } ?>
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input list="pt_list" class="form-control" type="text" name="nama_pt" id="nama_pt" autocomplete="off">
                        <datalist id="pt_list">
                            <?php
                            $query = "SELECT nama_pt FROM perusahaan";
                            $sql = mysqli_query($connection, $query);
                            while ($row_pt = mysqli_fetch_array($sql)) {
                            ?>
                                <option><?= $row_pt['nama_pt']; ?></option>
                            <?php
                            }
                            ?>
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Input Voucher</label>
                        <input type="date" data-date="" data-date-format="DD MMMM YYYY" class="form-control" value="20-02-2020" name="tgl_input" id="tgl_input">
                    </div>
                    <div class="form-group">
                        <label>Input By</label>
                        <input list="by_list" type="text" class="form-control" name="input_by" id="input_by" autocomplete="off">
                        <datalist id="by_list">
                            <?php
                            $query = "SELECT nama FROM user";
                            $sql = mysqli_query($connection, $query);
                            while ($row_user = mysqli_fetch_array($sql)) {
                            ?>
                                <option><?= $row_user['nama']; ?></option>
                            <?php
                            }
                            ?>
                        </datalist>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="filter" id="filter" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php
// Awal fungsi untuk keseluruhan
function seluruh($array_key, $array_value)
{
    include("../system/connect.php");
    $export = [];
    if (count($array_value) == 0) {
        $data_voucher = "SELECT * FROM voucher_visa ";
        $data = mysqli_query($connection, $data_voucher);
    } else if (count($array_value) == 1) {
        $tanda1 = $array_key[0];
        $isi = $array_value[0];
        $data_voucher = "SELECT * FROM voucher_visa WHERE $tanda1 = '$isi' ";
        $data = mysqli_query($connection, $data_voucher);
    } else if (count($array_value) == 2) {
        $tanda1 = $array_key[0];
        $isi = $array_value[0];
        $tanda2 = $array_key[1];
        $isi2 = $array_value[1];
        $data_voucher = "SELECT * FROM voucher_visa WHERE $tanda1 = '$isi' AND $tanda2 = '$isi2' ";
        $data = mysqli_query($connection, $data_voucher);
    } else if (count($array_value) == 3) {
        $tanda1 = $array_key[0];
        $isi = $array_value[0];
        $tanda2 = $array_key[1];
        $isi2 = $array_value[1];
        $tanda3 = $array_key[2];
        $isi3 = $array_value[2];
        $data_voucher = "SELECT * FROM voucher_visa WHERE $tanda1 = '$isi' AND $tanda2 = '$isi2' AND $tanda3 = '$isi3' ";
        $data = mysqli_query($connection, $data_voucher);
    }

    while ($hasil = mysqli_fetch_array($data)) {
        array_push($export, $hasil['id']);
    }
    return $export;
}

function seluruh_other($array_key, $array_value)
{
    include("../system/connect.php");
    $export_other = [];
    if (count($array_value) == 0) {
        $data_voucher = "SELECT * FROM voucher_other ";
        $data = mysqli_query($connection, $data_voucher);
    } else if (count($array_value) == 1) {
        $tanda1 = $array_key[0];
        $isi = $array_value[0];
        $data_voucher = "SELECT * FROM voucher_other WHERE $tanda1 = '$isi' ";
        $data = mysqli_query($connection, $data_voucher);
    } else if (count($array_value) == 2) {
        $tanda1 = $array_key[0];
        $isi = $array_value[0];
        $tanda2 = $array_key[1];
        $isi2 = $array_value[1];
        $data_voucher = "SELECT * FROM voucher_other WHERE $tanda1 = '$isi' AND $tanda2 = '$isi2' ";
        $data = mysqli_query($connection, $data_voucher);
    } else if (count($array_value) == 3) {
        $tanda1 = $array_key[0];
        $isi = $array_value[0];
        $tanda2 = $array_key[1];
        $isi2 = $array_value[1];
        $tanda3 = $array_key[2];
        $isi3 = $array_value[2];
        $data_voucher = "SELECT * FROM voucher_other WHERE $tanda1 = '$isi' AND $tanda2 = '$isi2' AND $tanda3 = '$isi3' ";
        $data = mysqli_query($connection, $data_voucher);
    }

    while ($hasil = mysqli_fetch_array($data)) {
        array_push($export_other, $hasil['id']);
    }
    return $export_other;
}
?>

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