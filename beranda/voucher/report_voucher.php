<div class="container" style="margin-top:101px;">
    <h2>
        <center>REPORT VOUCHER </center>
    </h2>
    <div class="form-group pull-right">
        <input type="text" class="search form-control" placeholder="What you looking for?">
    </div>
    <div class="row">
        <div class="btn-group dropright pull-right">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filter">
                Filter
            </button>
        </div>

    </div>

    <span class="counter pull-right"></span>
    <div class="scrollable-table col-md-11" style="background-color: #f5f5f5; margin-left: 55px;">

        <table class="table table-hover table-bordered results" id="example">

            <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;">NO</th>
                    <th style="text-align:center;">AKSI</th>
                    <th style="text-align:center;">NO VOUCHER</th>
                    <th style="text-align:center;">NAMA PT</th>
                    <th style="text-align:center;">JUMLAH PENGGUNA</th>
                    <th style="text-align:center;">TOTAL HARGA</th>
                    <th style="text-align:center;">TANGGAL INPUT VOUCHER</th>
                    <th style="text-align:center;">INPUT VOUCHER BY</th>
                    <th style="text-align:center;">INVOICE</th>
                    <th style="text-align:center;">TANGGAL INPUT INVOICE</th>
                    <th style="text-align:center;">INPUT INVOICE BY</th>
                </tr>
                <tr class="warning no-result">
                    <td colspan="10"><i class="fa fa-warning"></i> Tidak Ditemukan</td>
                </tr>
            </thead>

            <?php




            ?>

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
                        <td style="text-align: center;">
                            <?php echo $no;
                            ?>
                        </td>
                        <td style="text-align: center;"><a href="../voucher?page=data_vouchervisa&id=<?php echo $hasil['id']; ?>" class="badge badge-primary">Detail</a></td>
                        <td style="text-align: center;"><?= $hasil['kode']; ?></td>
                        <td style="text-align: center;"><?php echo $hasil['nama_pt']; ?></td>
                        <td><?php echo $hasil['jumlah_pengguna']; ?></td>

                        <?php

                        if ($hasil['mata_uang'] == "Rupiah") {
                            $result = "Rp " . number_format($hasil['total_harga'], 2, ',', '.');
                        ?>
                            <td style="text-align: center;"><?php echo $result; ?></td>
                        <?php } else {
                            $result = "$ " . number_format($hasil['total_harga'], 2, '.', ',');
                        ?>
                            <td style="text-align: center;"><?php echo $result ?></td>
                        <?php }
                        ?>

                        <td style="text-align: center;"><?php echo $hasil['tgl_input']; ?></td>
                        <td style="text-align: center;"><?php echo $hasil['input_by']; ?></td>

                        <?php
                        if ($hasil['ket_invoice'] == 0) {

                        ?>
                            <td style="text-align: center;"><a href="../voucher?page=input_invoicevisa&id=<?php echo $hasil['id']; ?>"><?php echo "Belum Ada Invoice"; ?></td>
                            <td style="text-align: center;">-</td>
                            <td style="text-align: center;">-</td>
                        <?php } else {
                            $id = $hasil['id'];
                            $data_invoice = "SELECT * FROM invoice_vouchervisa WHERE id=$id ";
                            $sql_invoice = mysqli_query($connection, $data_invoice);
                            $hasil_invoice = mysqli_fetch_assoc($sql_invoice);
                        ?>
                            <td style="text-align: center;"><?php echo $hasil_invoice['invoice']; ?></td>
                            <td style="text-align: center;"><?php echo $hasil_invoice['tgl_input']; ?></td>
                            <td style="text-align: center;"><?php echo $hasil_invoice['input_by']; ?></td>
                        <?php } ?>
                    </tr>
                <?php
                    $no++;
                }
                for ($i = 0; $i < count($export_other); $i++) {
                    $query_voucher = "SELECT * FROM voucher_other WHERE id = '$export_other[$i]'";
                    $sql_voucher = mysqli_query($connection, $query_voucher);
                    $hasil = mysqli_fetch_array($sql_voucher);
                ?>
                    <tr>
                        <td style="text-align: center;">
                            <?php echo $no;
                            ?>
                        </td>
                        <td style="text-align: center;"><a href="../voucher?page=data_voucherother&id=<?php echo $hasil['id']; ?>" class="badge badge-primary">Detail</a></td>
                        <td style="text-align: center;"><?= $hasil['kode']; ?></td>
                        <td style="text-align: center;"><?php echo $hasil['nama_pt']; ?></td>
                        <td><?php echo $hasil['jumlah_pengguna']; ?></td>

                        <?php

                        if ($hasil['mata_uang'] == "Rupiah") {
                            $result = "Rp " . number_format($hasil['total_harga'], 2, ',', '.');
                        ?>
                            <td style="text-align: center;"><?php echo $result; ?></td>
                        <?php } else {
                            $result = "$ " . number_format($hasil['total_harga'], 2, '.', ',');
                        ?>
                            <td style="text-align: center;"><?php echo $result ?></td>
                        <?php }
                        ?>

                        <td style="text-align: center;"><?php echo $hasil['tgl_input']; ?></td>
                        <td style="text-align: center;"><?php echo $hasil['input_by']; ?></td>

                        <?php
                        if ($hasil['ket_invoice'] == 0) {

                        ?>
                            <td style="text-align: center;"><a href="../voucher?page=input_invoice_other&id=<?php echo $hasil['id']; ?>"><?php echo "Belum Ada Invoice"; ?></td>
                            <td style="text-align: center;">-</td>
                            <td style="text-align: center;">-</td>
                        <?php } else {
                            $id = $hasil['id'];
                            $data_invoice = "SELECT * FROM invoice_voucherother WHERE id=$id ";
                            $sql_invoice = mysqli_query($connection, $data_invoice);
                            $hasil_invoice = mysqli_fetch_assoc($sql_invoice);
                        ?>
                            <td style="text-align: center;"><?php echo $hasil_invoice['invoice']; ?></td>
                            <td style="text-align: center;"><?php echo $hasil_invoice['tgl_input']; ?></td>
                            <td style="text-align: center;"><?php echo $hasil_invoice['input_by']; ?></td>
                        <?php } ?>
                    </tr>
                <?php
                    $no++;
                }

                ?>




            </tbody>

        </table>
        <div class="row">
            <div class="btn-group dropright pull-right">
                <!-- Button trigger modal -->
                <form action="export_report_voucherother.php" action="POST">
                    <?php
                    $jml_other = count($export_other);
                    $jml_visa = count($export);
                    if (count($array_key) == 0) {
                    ?>
                        <input type="hidden" name="array_key" value="<?= $jml_other ?>">
                        <input type="hidden" name="array_key2" value="<?= $jml_visa ?>">
                        <?php
                    } else {
                        for ($i = 0; $i < count($array_key); $i++) {
                        ?>
                            <input type="hidden" name="array_key[]" value="<?= $array_key[$i]; ?>">
                            <input type="hidden" name="array_value[]" value="<?= $array_value[$i]; ?>">
                    <?php
                        }
                    }
                    ?>

                    <input type="submit" name="export" value="Export" class="btn btn-primary">
                </form>
            </div>

        </div>
    </div>
</div>





<!-- Modal -->
<div class=" modal fade" id="filter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">FILTER</h5>



                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form style="width:490px; margin-left:5px; margin-top:-50px;" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>NAMA PERUSAHAAN</label>
                        <input list="pt_list" type="text" name="nama_pt" id="nama_pt" autocomplete="off">
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
                        <label>TANGGAL INPUT VOUCHER</label>
                        <input type="date" data-date="" data-date-format="DD MMMM YYYY" value="20-02-2020" name="tgl_input" id="tgl_input">
                    </div>
                    <div class="form-group">
                        <label>INPUT BY</label>
                        <input list="by_list" type="text" name="input_by" id="input_by" autocomplete="off">
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
    include("../../system/connect.php");
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
    include("../../system/connect.php");
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
