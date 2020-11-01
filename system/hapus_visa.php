<?php

include('connect.php');

if (isset($_GET['visa']) == 'visa211_4') {
    $visa = $_GET['visa'];
    $id = $_GET['id'];

    $query_delete = "DELETE FROM visa211_4 WHERE id = '$id'";
    $sql_delete = mysqli_query($connection, $query_delete);

    if (!$sql_delete) {
        die(mysqli_connect_error());
        echo "you cannot input the data";
    } else {

        header("location:../beranda/data?page=riwayat_visa&warning=Hapus");
    }
}
