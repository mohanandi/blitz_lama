<?php

include('connect.php');

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $hp = $_POST['hp'];
    $password = $_POST['password'];
    $kode = $_POST['username'];
    $no = "";
    $image = "";
    $level = $_POST['level'];
    if ($level == "Operator") {
        $leveling = 3;
    } else {
        $leveling = 2;
    }

    $query = "INSERT INTO user VALUE ('$no','$kode', '$nama','$image', '$email', '$hp', '$password', '$leveling')";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die(mysqli_connect_error());
        echo "you cannot input the data";
    } else {
        header("location:../man?page=akun");
    }
}
