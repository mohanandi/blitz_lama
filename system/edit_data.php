<?php

include('connect.php');

if (isset($_POST['edit'])) {


    $nama_pt = $_POST['nama_pt'];
    $nama_mandarin = $_POST['nama_mandarin'];
    $nama_latin = $_POST['nama_latin'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $passport_lama = $_POST['passport_lama'];
    $passport_baru = $_POST['passport_baru'];
    $expired_passport = $_POST['expired_passport'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $tgl = $_POST['tanggal'];
    $input_by = $_POST['input_by'];
    $verif_data = $_POST['verif_data'];
    $ket = $_POST['ket'];
    $visa211 = 0;
    $visa211_1 = 0;
    $visa211_2 = 0;
    $visa211_3 = 0;
    $visa211_4 = 0;
    $visa312 = 0;
    $voa = 0;
    $visa_lain = 0;

    if ($passport_lama != $passport_baru) {

        $sql = "DELETE FROM data WHERE passport='$passport_lama'";
        $hapus = mysqli_query($connection, $sql);

        $query = "INSERT INTO data VALUE ('id','$nama_pt', '$nama_mandarin', '$nama_latin', '$kewarganegaraan', '$passport_baru', '$expired_passport', '$tgl_lahir', '$tgl', '$input_by', '$ket', '$verif_data', '$visa211', '$visa211_1', '$visa211_2', '$visa211_3', '$visa211_4', '$visa312', '$voa', '$visa_lain')";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die(mysqli_connect_error());
            echo "you cannot input the data";
        } else {

            header("location:../beranda/data?page=riwayat&passport=$passport_baru");
        }
    } else {

        $query_data = "SELECT id FROM data WHERE passport = '$passport_lama' ";
        $sql_data = mysqli_query($connection, $query_data);
        $row_singgah = mysqli_fetch_array($sql_data);
        $singgah_id = $row_singgah['id'];
        $visa211 = 0;
        $visa211_1 = 0;
        $visa211_2 = 0;
        $visa211_3 = 0;
        $visa211_4 = 0;
        $visa312 = 0;
        $voa = 0;
        $visa_lain = 0;

        if ($verif_data == "Baru") {
            $ubah = "UPDATE data SET visa211 = '$visa211', visa211_1 = '$visa211_1', visa211_2 = '$visa211_2', visa211_3 = '$visa211_3', visa211_4 = '$visa211_4', visa312 = '$visa312' where passport='$passport' ";
            $hasil = mysqli_query($connection, $ubah);
        }

        $ubah = "UPDATE data SET nama_pt = '$nama_pt', nama_mandarin = '$nama_mandarin', nama_latin = '$nama_latin', kewarganegaraan = '$kewarganegaraan', passport = '$passport_baru',expired_passport = '$expired_passport', tgl_lahir = '$tgl_lahir', input_by = '$input_by', ket = '$ket', verif_data = '$verif_data' WHERE id='$singgah_id' ";

        $hasil = mysqli_query($connection, $ubah);

        if (!$hasil) {
            die(mysqli_connect_error());
            echo "you cannot input the data";
        } else {

            header("location:../beranda/data?page=riwayat&passport=$passport_baru");
        }
    }
}
