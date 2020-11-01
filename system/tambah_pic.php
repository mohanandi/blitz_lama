<?php
include('connect.php');

if (isset($_POST['tambah'])) {

    $nama = $_POST['nama'];

    $query = "INSERT INTO pic VALUE ('', '$nama')";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die(mysqli_connect_error());
        echo "you cannot input the data";
    } else {
        header("location:../man?page=pic");
    }
}
