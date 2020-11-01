<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data_voucher = "SELECT * FROM voucher_visa WHERE id=$id ";
    $sql_voucher = mysqli_query($connection, $data_voucher);
    $hasil = mysqli_fetch_assoc($sql_voucher);
?>


    <div class="container" style="margin-top:101px;">
        <center>
            <h2> Riwayat Voucher </h2>
        </center>
        <br>


        <span class="counter pull-right"></span>
        <div class="scrollable-table">

            <table class="table table-hover table-bordered results">
                <thead class="thead-dark">
                    <tr>
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

                </thead>
                <tbody>
                    <tr>
                        <th><a href="../voucher?page=data_voucher&id=<?php echo $id; ?>" class="badge badge-primary">Detail</a></th>
                        <th><?php echo $hasil['kode']; ?></th>
                        <th><?php echo $hasil['nama_pt']; ?></th>
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
                        <td><?php echo $hasil['input_by']; ?></td>

                        <?php
                        if ($hasil['ket_invoice'] == 0) {

                        ?>
                            <td><a href="../voucher?page=input_invoice&id=<?php echo $id; ?>"><?php echo "Belum Ada Invoice"; ?></a></td>
                            <td>-</td>
                            <td>-</td>
                        <?php } else {
                            $data_invoice = "SELECT * FROM invoice_vouchervisa WHERE id=$id ";
                            $sql_invoice = mysqli_query($connection, $data_invoice);
                            $hasil_invoice = mysqli_fetch_assoc($sql_invoice);
                        ?>
                            <td><?php echo $hasil_invoice['invoice']; ?></td>
                            <td><?php echo $hasil_invoice['tgl_input']; ?></td>
                            <td><?php echo $hasil_invoice['input_by']; ?></td>
                        <?php } ?>





                    </tr>

                </tbody>


            </table>
        </div>

    </div>
<?php } else {
    $data_voucher = "SELECT * FROM voucher_visa ";
    $sql_voucher = mysqli_query($connection, $data_voucher);

?>
    <div class="container" style="margin-top:101px;">
        <center>
            <h2> Riwayat Voucher </h2>
        </center>
        <hr class="colorgraph">


        <span class="counter pull-right"></span>
        <div class="scrollable-table">

            <table class="table table-hover table-bordered results">
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

                </thead>
                <tbody>
                    <?php
                    $x = 1;
                    while ($hasil = mysqli_fetch_assoc($sql_voucher)) {
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $x;
                                                            $x++; ?></td>
                            <td style="text-align: center;"><a href="../voucher?page=data_voucher&id=<?php echo $hasil['id']; ?>" class="badge badge-primary">Detail</a></td>
                            <td style="text-align: center;"><?php echo $hasil['kode']; ?></td>
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
                                <td style="text-align: center;"><a href="../voucher?page=input_invoice&id=<?php echo $hasil['id']; ?>"><?php echo "Belum Ada Invoice"; ?></td>
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
                    <?php } ?>
                </tbody>


            </table>
        </div>

    <?php
}
    ?>