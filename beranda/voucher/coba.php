<?php
include("../../system/connect.php");
$query_data = "SELECT * FROM data_voucherother WHERE no_voucher= 1 ";
$sql_data = mysqli_query($connection, $query_data);
while ($data_pengguna = mysqli_fetch_array($sql_data)) {
    echo $data_pengguna['nama_latin'];
    echo $data_pengguna['passport'];
}
