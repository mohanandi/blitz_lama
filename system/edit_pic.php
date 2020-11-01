<?php
include('connect.php');

if (isset($_GET['m'])) {
    $id = $_GET['m'];
    $query = "DELETE FROM pic WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die(mysqli_connect_error());
        echo "you cannot input the data";
    } else {
        header("location:../man?page=pic");
    }
} else {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $ubah = "UPDATE pic SET nama = '$nama' WHERE id='$id' ";
    $hasil = mysqli_query($connection, $ubah);


    if (!$hasil) {
        die(mysqli_connect_error());
        echo "you cannot input the data";
    } else {
        header("location:../man?page=pic");
    }
}
