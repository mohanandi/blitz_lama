<?php
include('connect.php');
if (isset($_GET['m'])) {
    $no = $_GET['m'];
    $hapus = "DELETE FROM user where id='$no' ";
    $hasil = mysqli_query($connection, $hapus);


    if (!$hasil) {
        die(mysqli_connect_error());
        echo "you cannot input the data";
    } else {
        header("location:../man?page=akun");
    }
} else {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $kode = $_POST['username'];
    $no = $_POST['id'];
    $level = $_POST['level'];
    if ($level == "Operator") {
        $leveling = 3;
    } else {
        $leveling = 2;
    }

    $ubah = "UPDATE user SET kode = '$kode', nama = '$nama', email = '$email', password = '$password', level = '$leveling' where id='$no' ";
    $hasil = mysqli_query($connection, $ubah);


    if (!$hasil) {
        die(mysqli_connect_error());
        echo "you cannot input the data";
    } else {
        header("location:../man?page=akun");
    }
}
