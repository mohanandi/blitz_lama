<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <form role="form" method="post">
            <h2>Track Data TKA dan Visa</h2>
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label><strong> NO PASSPORT </strong> </label>
                        <input name="passport" class="form-control" placeholder="MASUKKAN NO PASSPORT TKA" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="btn-group dropright">
                    <input type="submit" name="track" value="Track" class="btn btn-primary" aria-haspopup="true" aria-expanded="false" style="margin-left: 15px;">
                    <div class="dropdown-menu">
                    </div>
                </div>
        </form>
    </div>
</div>

<!-- untuk search -->
<?php

if (isset($_POST['track'])) {
    $passport = $_POST['passport'];


   $query = "SELECT * FROM data WHERE passport = '$passport' ";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    if ($row ==NULL) {
        $query = "SELECT * FROM riwayat_data WHERE passport = '$passport' ";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);
    }
    if (!$result) {
        die("gak bisa");
    }

    

?>



    <div class="scrollable-table mt-3">
        <h3>
            <center>DATA TKA</center>
        </h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align:center;">NAMA PT</th>
                    <th style="text-align:center;" colspan="2">NAMA</th>
                    <th style="text-align:center;">PASSPORT</th>
                    <th style="text-align:center;">KEWARGANEGARAAN</th>
                    <th style="text-align:center;">EXPIRED PASSPORT</th>
                    <th style="text-align:center;">TANGGAL LAHIR</th>
                    <th style="text-align:center;">KETERANGAN</th>
                    <th style="text-align:center;">DATA LAMA/BARU</th>
                    <th style="text-align:center;">TANGGAL INPUT</th>
                    <th style="text-align:center;">INPUT BY</th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td><?php echo $row['nama_pt'];  ?></td>
                    <td style="text-align:center;"><?php echo $row['nama_mandarin'];  ?></td>
                    <td><?php echo $row['nama_latin'];  ?></td>
                    <td><?php echo $row['passport'];  ?></td>
                    <td><?php echo $row['kewarganegaraan'];  ?></td>
                    <td><?php echo $row['expired_passport'];  ?></td>
                    <td><?php echo $row['tgl_lahir'];  ?></td>
                    <td><?php echo $row['ket'];  ?></td>
                    <td><?php echo $row['verif_data'];  ?></td>
                    <td><?php echo $row['tgl_input'];  ?></td>
                    <td><?php echo $row['input_by'];  ?></td>
                </tr>

            </tbody>

        </table>
    </div>


    <?php
    $sql = "SELECT * FROM visa312 WHERE passport = '$passport' ";
    $hasil = mysqli_query($connection, $sql);
    if (mysqli_num_rows($hasil) == 0) {
    ?>
        <div class="scrollable-table mt-3">
            <h3>
                <center>NO DATA VISA 312</center>
            </h3>
        </div>
    <?php
    } else {
        $visa = mysqli_fetch_array($hasil);
    ?>
        <div class="scrollable-table mt-3">
            <h3>
                <center>DATA VISA 312</center>
            </h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;">VISA</th>
                        <th style="text-align:center;">NO RPTKA</th>
                        <th style="text-align:center;">JABATAN</th>
                        <th style="text-align:center;">TANGGAL TERBIT VISA</th>
                        <th style="text-align:center;">JANGKA WAKTU VISA(BULAN)</th>
                        <th style="text-align:center;">NO KITAS</th>
                        <th style="text-align:center;">EXPIRED KITAS</th>
                        <th style="text-align:center;">NO NOTIFIKASI</th>
                        <th style="text-align:center;">KETERANGAN</th>
                        <th style="text-align:center;">NO VOUCHER</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $visa['visa']; ?></td>
                        <td><?php echo $visa['no_rptka']; ?></td>
                        <td><?php echo $visa['jabatan'] ?></td>
                        <td><?php echo $visa['tgl_terbit'] ?></td>
                        <td><?php echo $visa['jangka_visa'] ?></td>
                        <td><?php echo $visa['no_imta'] ?></td>
                        <td><?php echo $visa['exp_kitas'] ?></td>
                        <td><?php echo $visa['notif'] ?></td>
                        <td><?php echo $visa['ket'] ?></td>
                        <?php
                        $vou = $row['visa312'];
                        if ($vou == 0) {
                        ?>
                            <td>-</td>
                        <?php
                        } else {
                            $query_vou = "SELECT kode FROM voucher_visa WHERE id = '$vou'";
                            $sql_vou = mysqli_query($connection, $query_vou);
                            $row_vou  = mysqli_fetch_array($sql_vou);
                        ?>
                            <td><a href="../voucher?page=data_voucher&id=<?php echo $vou; ?>"><?php echo $row_vou['kode'] ?></a></td>
                        <?php
                        }
                        ?>
                    </tr>

                </tbody>

            </table>
        </div>
    <?php
    }
    $sql = "SELECT * FROM visa211 WHERE passport = '$passport' ";
    $hasil = mysqli_query($connection, $sql);
    if (mysqli_num_rows($hasil) == 0) {
    ?>
        <div class="scrollable-table mt-3">
            <h3>
                <center>NO DATA VISA 211</center>
            </h3>
        </div>
    <?php
    } else {
        $visa = mysqli_fetch_array($hasil);
    ?>
        <div class="scrollable-table mt-3">
            <h3>
                <center>DATA VISA 211</center>
            </h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;">VISA</th>
                        <th style="text-align:center;">STATUS</th>
                        <th style="text-align:center;">AWAL VISA</th>
                        <th style="text-align:center;">AKHIR VISA</th>
                        <th style="text-align:center;">KETERANGAN</th>
                        <th style="text-align:center;">TANGGAL INPUT</th>
                        <th style="text-align:center;">INPUT BY</th>
                        <th style="text-align:center;">NO VOUCHER</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $visa['visa']; ?></td>
                        <td>AKTIF</td>
                        <td><?php echo $visa['start_visa']; ?></td>
                        <td><?php echo $visa['expired'] ?></td>
                        <td><?php echo $visa['ket'] ?></td>
                        <td><?php echo $visa['tgl_input'] ?></td>
                        <td><?php echo $visa['input_by'] ?></td>
                        <?php
                        $vou = $row['visa211'];
                        if ($vou == 0) {
                        ?>
                            <td>-</td>
                        <?php
                        } else {
                            $query_vou = "SELECT kode FROM voucher_visa WHERE id = '$vou'";
                            $sql_vou = mysqli_query($connection, $query_vou);
                            $row_vou  = mysqli_fetch_array($sql_vou);
                        ?>
                            <td><a href="../voucher?page=data_voucher&id=<?php echo $vou; ?>"><?php echo $row_vou['kode'] ?></a></td>
                        <?php
                        }
                        ?>
                    </tr>

                </tbody>

            </table>
        </div>
    <?php
    }
    ?>

    <?php
    $sql = "SELECT * FROM visa211_1 WHERE passport = '$passport' ";
    $hasil = mysqli_query($connection, $sql);
    if (mysqli_num_rows($hasil) == 0) {
    ?>
        <div class="scrollable-table mt-3">
            <h3>
                <center>NO DATA VISA 211-1</center>
            </h3>
        </div>
    <?php
    } else {
        $visa = mysqli_fetch_array($hasil);
    ?>
        <div class="scrollable-table mt-3">
            <h3>
                <center>DATA VISA 211-1</center>
            </h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;">VISA</th>
                        <th style="text-align:center;">STATUS</th>
                        <th style="text-align:center;">AWAL VISA</th>
                        <th style="text-align:center;">AKHIR VISA</th>
                        <th style="text-align:center;">KETERANGAN</th>
                        <th style="text-align:center;">TANGGAL INPUT</th>
                        <th style="text-align:center;">INPUT BY</th>
                        <th style="text-align:center;">NO VOUCHER</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $visa['visa']; ?></td>
                        <td>AKTIF</td>
                        <td><?php echo $visa['start_visa']; ?></td>
                        <td><?php echo $visa['expired'] ?></td>
                        <td><?php echo $visa['ket'] ?></td>
                        <td><?php echo $visa['tgl_input'] ?></td>
                        <td><?php echo $visa['input_by'] ?></td>
                        <?php
                        $vou = $row['visa211_1'];
                        if ($vou == 0) {
                        ?>
                            <td>-</td>
                        <?php
                        } else {
                            $query_vou = "SELECT kode FROM voucher_visa WHERE id = '$vou'";
                            $sql_vou = mysqli_query($connection, $query_vou);
                            $row_vou  = mysqli_fetch_array($sql_vou);
                        ?>
                            <td><a href="../voucher?page=data_voucher&id=<?php echo $vou; ?>"><?php echo $row_vou['kode'] ?></a></td>
                        <?php
                        }
                        ?>
                    </tr>

                </tbody>

            </table>
        </div>
    <?php
    }

    $sql = "SELECT * FROM visa211_2 WHERE passport = '$passport' ";
    $hasil = mysqli_query($connection, $sql);
    if (mysqli_num_rows($hasil) == 0) {
    ?>
        <div class="scrollable-table mt-3">
            <h3>
                <center>NO DATA VISA 211-2</center>
            </h3>
        </div>
    <?php
    } else {
        $visa = mysqli_fetch_array($hasil);
    ?>
        <div class="scrollable-table mt-3">
            <h3>
                <center>DATA VISA 211-2</center>
            </h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;">VISA</th>
                        <th style="text-align:center;">STATUS</th>
                        <th style="text-align:center;">AWAL VISA</th>
                        <th style="text-align:center;">AKHIR VISA</th>
                        <th style="text-align:center;">KETERANGAN</th>
                        <th style="text-align:center;">TANGGAL INPUT</th>
                        <th style="text-align:center;">INPUT BY</th>
                        <th style="text-align:center;">NO VOUCHER</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $visa['visa']; ?></td>
                        <td>AKTIF</td>
                        <td><?php echo $visa['start_visa']; ?></td>
                        <td><?php echo $visa['expired'] ?></td>
                        <td><?php echo $visa['ket'] ?></td>
                        <td><?php echo $visa['tgl_input'] ?></td>
                        <td><?php echo $visa['input_by'] ?></td>
                        <?php
                        $vou = $row['visa211_2'];
                        if ($vou == 0) {
                        ?>
                            <td>-</td>
                        <?php
                        } else {
                            $query_vou = "SELECT kode FROM voucher_visa WHERE id = '$vou'";
                            $sql_vou = mysqli_query($connection, $query_vou);
                            $row_vou  = mysqli_fetch_array($sql_vou);
                        ?>
                            <td><a href="../voucher?page=data_voucher&id=<?php echo $vou; ?>"><?php echo $row_vou['kode'] ?></a></td>
                        <?php
                        }
                        ?>
                    </tr>

                </tbody>

            </table>
        </div>
    <?php
    }
    $sql = "SELECT * FROM visa211_3 WHERE passport = '$passport' ";
    $hasil = mysqli_query($connection, $sql);
    if (mysqli_num_rows($hasil) == 0) {
    ?>
        <div class="scrollable-table mt-3">
            <h3>
                <center>NO DATA VISA 211-3</center>
            </h3>
        </div>
    <?php
    } else {
        $visa = mysqli_fetch_array($hasil);
    ?>
        <div class="scrollable-table mt-3">
            <h3>
                <center>DATA VISA 211-3</center>
            </h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;">VISA</th>
                        <th style="text-align:center;">STATUS</th>
                        <th style="text-align:center;">AWAL VISA</th>
                        <th style="text-align:center;">AKHIR VISA</th>
                        <th style="text-align:center;">KETERANGAN</th>
                        <th style="text-align:center;">TANGGAL INPUT</th>
                        <th style="text-align:center;">INPUT BY</th>
                        <th style="text-align:center;">NO VOUCHER</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $visa['visa']; ?></td>
                        <td>AKTIF</td>
                        <td><?php echo $visa['start_visa']; ?></td>
                        <td><?php echo $visa['expired'] ?></td>
                        <td><?php echo $visa['ket'] ?></td>
                        <td><?php echo $visa['tgl_input'] ?></td>
                        <td><?php echo $visa['input_by'] ?></td>
                        <?php
                        $vou = $row['visa211_3'];
                        if ($vou == 0) {
                        ?>
                            <td>-</td>
                        <?php
                        } else {
                            $query_vou = "SELECT kode FROM voucher_visa WHERE id = '$vou'";
                            $sql_vou = mysqli_query($connection, $query_vou);
                            $row_vou  = mysqli_fetch_array($sql_vou);
                        ?>
                            <td><a href="../voucher?page=data_voucher&id=<?php echo $vou; ?>"><?php echo $row_vou['kode'] ?></a></td>
                        <?php
                        }
                        ?>
                    </tr>

                </tbody>

            </table>
        </div>
    <?php
    }
    $sql = "SELECT * FROM visa211_4 WHERE passport = '$passport' ";
    $hasil = mysqli_query($connection, $sql);
    if (mysqli_num_rows($hasil) == 0) {
    ?>
        <div class="scrollable-table mt-3">
            <h3>
                <center>NO DATA VISA 211-4</center>
            </h3>
        </div>
    <?php
    } else {
        $visa = mysqli_fetch_array($hasil);
    ?>
        <div class="scrollable-table mt-3">
            <h3>
                <center>DATA VISA 211-4</center>
            </h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;">VISA</th>
                        <th style="text-align:center;">STATUS</th>
                        <th style="text-align:center;">AWAL VISA</th>
                        <th style="text-align:center;">AKHIR VISA</th>
                        <th style="text-align:center;">KETERANGAN</th>
                        <th style="text-align:center;">TANGGAL INPUT</th>
                        <th style="text-align:center;">INPUT BY</th>
                        <th style="text-align:center;">NO VOUCHER</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $visa['visa']; ?></td>
                        <td>AKTIF</td>
                        <td><?php echo $visa['start_visa']; ?></td>
                        <td><?php echo $visa['expired'] ?></td>
                        <td><?php echo $visa['ket'] ?></td>
                        <td><?php echo $visa['tgl_input'] ?></td>
                        <td><?php echo $visa['input_by'] ?></td>
                        <?php
                        $vou = $row['visa211_4'];
                        if ($vou == 0) {
                        ?>
                            <td>-</td>
                        <?php
                        } else {
                            $query_vou = "SELECT kode FROM voucher_visa WHERE id = '$vou'";
                            $sql_vou = mysqli_query($connection, $query_vou);
                            $row_vou  = mysqli_fetch_array($sql_vou);
                        ?>
                            <td><a href="../voucher?page=data_voucher&id=<?php echo $vou; ?>"><?php echo $row_vou['kode'] ?></a></td>
                        <?php
                        }
                        ?>
                    </tr>

                </tbody>

            </table>
        </div>
    <?php
    }

    $sql = "SELECT * FROM voa WHERE passport = '$passport' ";
    $hasil = mysqli_query($connection, $sql);
    if (mysqli_num_rows($hasil) == 0) {
    ?>
        <div class="scrollable-table mt-3">
            <h3>
                <center>NO DATA VOA</center>
            </h3>
        </div>
    <?php
    } else {
        $visa = mysqli_fetch_array($hasil);
    ?>
        <div class="scrollable-table mt-3">
            <h3>
                <center>DATA VOA</center>
            </h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;">VISA</th>
                        <th style="text-align:center;">AWAL VISA</th>
                        <th style="text-align:center;">AKHIR VISA</th>
                        <th style="text-align:center;">KETERANGAN</th>
                        <th style="text-align:center;">TANGGAL INPUT</th>
                        <th style="text-align:center;">INPUT BY</th>
                        <th style="text-align:center;">NO VOUCHER</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $visa['visa']; ?></td>
                        <td><?php echo $visa['start_visa']; ?></td>
                        <td><?php echo $visa['expired'] ?></td>
                        <td><?php echo $visa['ket'] ?></td>
                        <td><?php echo $visa['tgl_input'] ?></td>
                        <td><?php echo $visa['input_by'] ?></td>
                        <?php
                        $vou = $row['voa'];
                        if ($vou == 0) {
                        ?>
                            <td><?php echo $visa['input_by'] ?></td>
                        <?php
                        } else {
                            $query_vou = "SELECT kode FROM voucher_visa WHERE id = '$vou'";
                            $sql_vou = mysqli_query($connection, $query_vou);
                            $row_vou  = mysqli_fetch_array($sql_vou);
                        ?>
                            <td><a href="../voucher?page=data_voucher&id=<?php echo $vou; ?>"><?php echo $row_vou['kode'] ?></a></td>
                        <?php
                        }
                        ?>

                    </tr>

                </tbody>

            </table>
        </div>
    <?php
    }

    $sql = "SELECT * FROM visa_lain WHERE passport = '$passport' ";
    $hasil = mysqli_query($connection, $sql);
    if (mysqli_num_rows($hasil) == 0) {
    ?>
        <div class="scrollable-table mt-3">
            <h3>
                <center>NO DATA VISA LAIN</center>
            </h3>
        </div>
    <?php
    } else {
        $visa = mysqli_fetch_array($hasil);
    ?>
        <div class="scrollable-table mt-3">
            <h3>
                <center>DATA VISA LAIN</center>
            </h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;">VISA</th>
                        <th style="text-align:center;">AWAL VISA</th>
                        <th style="text-align:center;">AKHIR VISA</th>
                        <th style="text-align:center;">KETERANGAN</th>
                        <th style="text-align:center;">TANGGAL INPUT</th>
                        <th style="text-align:center;">INPUT BY</th>
                        <th style="text-align:center;">NO VOUCHER</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $visa['visa']; ?></td>
                        <td><?php echo $visa['start_visa']; ?></td>
                        <td><?php echo $visa['expired'] ?></td>
                        <td><?php echo $visa['ket'] ?></td>
                        <td><?php echo $visa['tgl_input'] ?></td>
                        <td><?php echo $visa['input_by'] ?></td>
                        <?php
                        $vou = $row['visa_lain'];
                        if ($vou == 0) {
                        ?>
                            <td><?php echo $visa['input_by'] ?></td>
                        <?php
                        } else {
                            $query_vou = "SELECT kode FROM voucher_visa WHERE id = '$vou'";
                            $sql_vou = mysqli_query($connection, $query_vou);
                            $row_vou  = mysqli_fetch_array($sql_vou);
                        ?>
                            <td><a href="../voucher?page=data_voucher&id=<?php echo $vou; ?>"><?php echo $row_vou['kode'] ?></a></td>
                        <?php
                        }
                        ?>

                    </tr>

                </tbody>

            </table>
        </div>
        <br>
<?php
    }
}
