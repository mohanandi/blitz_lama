<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $tgl_input = date('Y-m-d');
    $data_voucher = "SELECT * FROM voucher_other WHERE id=$id ";
    $sql_voucher = mysqli_query($connection, $data_voucher);
    $hasil = mysqli_fetch_assoc($sql_voucher);
    $mata_uang = $hasil['mata_uang'];
    $total = $hasil['total_harga'];
    $nama_pt = $hasil['nama_pt'];
?>


    <div class="container" style="margin-top:101px;">
        <center>
            <h2> INPUT INVOICE VOUCHER OTHER </h2>
        </center>
        <hr class="colorgraph">

        <table id="tab" class="table table-hover table-bordered" style="width:50%;">
            <tr>
                <th> Nama Client </th>
                <td><?php echo $hasil['nama_pt']; ?></td>
            </tr>



        </table>


        <span class="counter pull-right"></span>
        <div class="scrollable-table">

            <table class="table table-hover table-bordered results">
                <thead>
                    <tr>
                        <th style="text-align:center;">No</th>
                        <th colspan="2" style="text-align:center;">Nama</th>
                        <th style="text-align:center;">No Paspor</th>
                        <th style="text-align:center;">Jenis Proses</th>
                        <th style="text-align:center;">Harga</th>
                    </tr>
                    <tr class="warning no-result">
                        <td colspan="10"><i class="fa fa-warning"></i> Tidak Ditemukan</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $x = 1;
                    $data_voucher = "SELECT * FROM data_voucherother WHERE no_voucher=$id ";
                    $sql_voucher = mysqli_query($connection, $data_voucher);
                    while ($hasil = mysqli_fetch_assoc($sql_voucher)) {

                    ?>
                        <tr>
                            <th><?php echo $x++; ?></th>

                            <td><?php echo $hasil['nama_mandarin']; ?></td>
                            <td><?php echo $hasil['nama_latin']; ?></td>

                            <td><?php echo $hasil['passport']; ?></td>
                            <td><?php echo $hasil['jenis_proses']; ?></td>
                            <?php

                            if ($mata_uang == "Rupiah") {
                                $result = "Rp " . number_format($hasil['harga'], 2, ',', '.');
                            ?>
                                <td><?php echo $result; ?></td>
                            <?php } else {
                                $result = "$ " . number_format($hasil['harga'], 2, '.', ',');
                            ?>
                                <td><?php echo $result ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>


            </table>
        </div>
        <table id="tab" class="table table-hover table-bordered" style="width:100%;margin-top:50px;">

            <tr>
                <th colspan="6"> Total </th>
                <?php
                if ($mata_uang == "Rupiah") {
                    $result = "Rp " . number_format($total, 2, ',', '.');
                ?>
                    <td><?php echo $result; ?></td>
                <?php } else {
                    $result = "$ " . number_format($total, 2, '.', ',');
                ?>
                    <td><?php echo $result ?></td>
                <?php } ?>

            </tr>
        </table>
    </div>


<?php } ?>
<table id="tab" class="table table-hover table-bordered" style="width:60%;margin-top:50px;">
    <form method="post" action="../../system/buat_invoice_other.php">
        <tr>
            <th> No Invoice </th>
            <td><input id="fc1" type="text" name="invoice" class="form-control" placeholder="No Invoice" /></td>

            <input type="hidden" class="form-control" name="nama_user" value="<?php echo $nama_user; ?>">
            <input type="hidden" class="form-control" name="tgl_input" value="<?php echo $tgl_input; ?>">
            <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
        </tr>
        <tr>
            <th></th>
            <td>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                </div>
            </td>

        </tr>

        <tr>
            <th colspan="2"><input type="submit" name="submit" value="Masukan" class="btn btn-primary btn-block btn-lg" style="height:40px;"></th>
        </tr>
    </form>
</table>
</div>