<?php

include('connect.php');

if (isset($_POST['submit'])) {

    $id = "";
    $nama_pt = $_POST['nama_pt'];
    $id_rptka = $_POST['id'];
    $nama_jabatan = $_POST['nama_jabatan'];
    $nama_jabatan_lama = $_POST['njabatan_lama'];
    $jumlah_jabatan = $_POST['jumlah_jabatan'];
    $jumlah_jabatan_lama = $_POST['jjabatan_lama'];
    $no_rptka = $_POST['no_rptka'];
    $tgl_terbit = $_POST['tgl_terbit'];
    $tgl_habis = $_POST['tgl_habis'];
    $jumlah_rptka = $_POST['jumlah_rptka'];
    $ket = $_POST['ket'];
    $tgl_input = $_POST['tgl_input'];
    $input_by = $_POST['input_by'];
    $u_dipakai = 0;

    // Mengambil data awal RPTKA
    $rptka = "SELECT * FROM rptka WHERE id ='$id_rptka' ";
    $query_rptka = mysqli_query($connection, $rptka);

    $row_rptka = mysqli_fetch_array($query_rptka);
    $rptka_lama = $row_rptka['no_rptka'];
    $rptka_pakai = $row_rptka['rptka_pakai'];

    //Mengambil Data Jabatan RPTKA
    $jabatan = "SELECT * FROM jabatan_rptka WHERE nama_pt ='$nama_pt' && no_rptka = '$rptka_lama' ";
    $query_jabatan = mysqli_query($connection, $jabatan);

    $perbandingan_jabatan = 0;
    $id_jabatan = [];
    $array_nama_jabatan = [];
    while ($row_jabatan = mysqli_fetch_array($query_jabatan)) {
        $perbandingan_jabatan++;
        array_push($id_jabatan, $row_jabatan['id']);
        array_push($array_nama_jabatan, $row_jabatan['jabatan']);
    }

    if (count($nama_jabatan) == $perbandingan_jabatan) {
        for ($i = 0; $i < count($nama_jabatan_lama); $i++) {

            $jabs = "SELECT * FROM jabatan_rptka WHERE nama_pt ='$nama_pt' && no_rptka = '$rptka_lama' && jabatan = '$nama_jabatan_lama[$i]' ";
            $query_jabs = mysqli_query($connection, $jabs);
            $row_jabs = mysqli_fetch_array($query_jabs);
            $id_jabs = $row_jabs['id'];

            $ubah = "UPDATE jabatan_rptka SET no_rptka = '$no_rptka', jabatan = '$nama_jabatan[$i]', jumlah = '$jumlah_jabatan[$i]' where id = '$id_jabs' ";
            $hasil = mysqli_query($connection, $ubah);
        }
    } else if (count($nama_jabatan) < $perbandingan_jabatan) {

        $akan_hapus = array_diff($array_nama_jabatan, $nama_jabatan_lama);
        $hapus = array_values($akan_hapus);
        for ($j = 0; $j < count($hapus); $j++) {
            $jabs = "SELECT * FROM jabatan_rptka WHERE nama_pt ='$nama_pt' && no_rptka = '$rptka_lama' && jabatan = '$hapus[$j]' ";
            $query_jabs = mysqli_query($connection, $jabs);
            $row_jabs = mysqli_fetch_array($query_jabs);
            $id_jabs = $row_jabs['id'];
            $ubah = "DELETE FROM jabatan_rptka where id ='$id_jabs' ";
            $hasil = mysqli_query($connection, $ubah);
        }

        for ($i = 0; $i < count($nama_jabatan_lama); $i++) {

            $jabs = "SELECT * FROM jabatan_rptka WHERE nama_pt ='$nama_pt' && no_rptka = '$rptka_lama' && jabatan = '$nama_jabatan_lama[$i]' ";
            $query_jabs = mysqli_query($connection, $jabs);
            $row_jabs = mysqli_fetch_array($query_jabs);
            $id_jabs = $row_jabs['id'];

            $ubah = "UPDATE jabatan_rptka SET no_rptka = '$no_rptka', jabatan = '$nama_jabatan[$i]', jumlah = '$jumlah_jabatan[$i]' where id = '$id_jabs' ";
            $hasil = mysqli_query($connection, $ubah);
        }
    } else if (count($nama_jabatan) > $perbandingan_jabatan) {
        $batas1 = count($nama_jabatan_lama);
        $batas2 = count($nama_jabatan);
        $masuk = array_slice($nama_jabatan, $batas1, $batas2);
        $masuk_jumlah = array_slice($jumlah_jabatan, $batas1, $batas2);
        $ganti = array_slice($nama_jabatan, 0, $batas1);
        $ganti_jumlah = array_slice($jumlah_jabatan, 0, $batas1);

        for ($i = 0; $i < count($masuk); $i++) {
            $query = "INSERT INTO jabatan_rptka VALUE ( '$id','$nama_pt', '$no_rptka', '$masuk[$i]', '$masuk_jumlah[$i]', '$u_dipakai')";
            $result = mysqli_query($connection, $query);
        }
        for ($i = 0; $i < count($ganti); $i++) {
            for ($j = 0; $j < count($ganti); $j++) {
                if ($ganti[$i] == $nama_jabatan_lama[$j]) {

                    $jabs = "SELECT * FROM jabatan_rptka WHERE nama_pt ='$nama_pt' && no_rptka = '$rptka_lama' && jabatan = '$nama_jabatan_lama[$j]' ";
                    $query_jabs = mysqli_query($connection, $jabs);
                    $row_jabs = mysqli_fetch_array($query_jabs);
                    $id_jabs = $row_jabs['id'];

                    $ubah = "UPDATE jabatan_rptka SET no_rptka = '$no_rptka', jabatan = '$ganti[$j]', jumlah = '$ganti_jumlah[$j]' where id = '$id_jabs' ";
                    $hasil = mysqli_query($connection, $ubah);
                }
            }
        }
    }

    //Mengganti Nama Jabatan 
    $visa = "SELECT * FROM visa312 WHERE nama_pt ='$nama_pt' && no_rptka = '$rptka_lama' ";
    $query_visa = mysqli_query($connection, $visa);

    while ($row_visa = mysqli_fetch_array($query_visa)) {
        $passport = $row_visa['passport'];
        $singgah_jabatan = $row_visa['jabatan'];

        for ($i = 0; $i < count($nama_jabatan_lama); $i++) {

            if ($singgah_jabatan == $nama_jabatan_lama[$i]) {
                $ubah = "UPDATE visa312 SET no_rptka = '$no_rptka', jabatan = '$nama_jabatan[$i]' where passport='$passport' ";
                $hasil = mysqli_query($connection, $ubah);
            } else {
            }
        }
    }

    //Mengganti No RPTKA di Visa 312
    $visa = "SELECT * FROM visa312 WHERE nama_pt ='$nama_pt' && no_rptka = '$rptka_lama' ";
    $query_visa = mysqli_query($connection, $visa);

    while ($row_visa = mysqli_fetch_array($query_visa)) {
        $passport = $row_visa['passport'];
        $ubah = "UPDATE visa312 SET no_rptka = '$no_rptka' where passport='$passport' ";
        $hasil = mysqli_query($connection, $ubah);
    }


    //Mengganti Data RPTKA
    $total_jabatan = 0;
    for ($i = 0; $i < count($jumlah_jabatan); $i++) {
        $total_jabatan += $jumlah_jabatan[$i];
    }
    $sisa_jabatan = $total_jabatan - $rptka_pakai;
    $ubah = "UPDATE rptka SET no_rptka = '$no_rptka', tgl_terbit = '$tgl_terbit', tgl_habis = '$tgl_habis', jumlah_rptka = '$total_jabatan', rptka_sisa = '$sisa_jabatan', ket = '$ket' where id='$id_rptka' ";
    $hasil = mysqli_query($connection, $ubah);
    if (!$hasil) {
        echo "you cannot input the data";
    } else {

        header("location:../beranda/perusahaan?nama_pt=$nama_pt&page=rptka");
    }
}
