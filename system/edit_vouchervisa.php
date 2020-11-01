<?php

include('connect.php');

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $nama_pt = $_POST['nama_pt'];
    $mata_uang = $_POST['mata_uang'];
    $total_harga = $_POST['total_harga'];
    $jumlah_pengguna = $_POST['jumlah_pengguna'];
    $tgl_input = $_POST['tgl_input'];
    $input_by = $_POST['input_by'];
    $ket = $_POST['ket'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $officer = $_POST['officer'];

    $jenis_visa = $_POST['jenis_visa'];
    $harga = $_POST['harga'];
    $data = $_POST['data'];
    $nama_mandarin = $_POST['nama_mandarin'];
    $nama_latin = $_POST['nama_latin'];
    $visa = $_POST['visa'];
    $lokasi = $_POST['lokasi'];


    $id_data = [];
    $query_data = "SELECT * FROM data_vouchervisa WHERE no_voucher = $id";
    $sql_data = mysqli_query($connection, $query_data);
    while ($row_data = mysqli_fetch_array($sql_data)) {
        array_push($id_data, $row_data['id']);
    }

    for ($i = 0; $i < count($id_data); $i++) {
        $queri_ubah = "UPDATE data_vouchervisa SET jenis_proses = '$jenis_visa[$i]', harga = '$harga[$i]' WHERE id = '$id_data[$i]'";
        $sql_ubah = mysqli_query($connection, $queri_ubah);
    }

    $queri_ubah = "UPDATE voucher_visa SET mata_uang = '$mata_uang', total_harga = '$total_harga', nama_pengguna = '$nama_pengguna', ket = '$ket', officer = '$officer', lokasi = '$lokasi' WHERE id = '$id' ";
    $sql_ubah = mysqli_query($connection, $queri_ubah);

    header("location:../beranda/voucher?page=riwayat_vouchervisa&id=$id");
}
