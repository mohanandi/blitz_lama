<?php

include('connect.php');

if (isset($_POST['submit'])) {

    $nama_pt = $_POST['nama_pt'];
    $mata_uang = $_POST['mata_uang'];
    $total_harga = $_POST['total_harga'];
    $jumlah_pengguna = $_POST['jumlah_pengguna'];
    $tgl_input = $_POST['tgl_input'];
    $input_by = $_POST['input_by'];
    $ket = $_POST['ket'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $officer = $_POST['officer'];
    $lokasi = $_POST['lokasi'];

    $jenis_visa = $_POST['jenis_visa'];
    $harga = $_POST['harga'];
    $data = $_POST['data'];
    $nama_mandarin = $_POST['nama_mandarin'];
    $nama_latin = $_POST['nama_latin'];
    $jenis_visa = $_POST['jenis_visa'];
    $visa = $_POST['visa'];

    $ket_voucher = 1;
    $ket_invoice = 0;

    //fungsi awal kode
    if ($visa == 'visa211') {
        $u_kode = 'V-211';
    } else if ($visa == 'visa211_1') {
        $u_kode = '211-1';
    } else if ($visa == 'visa211_2') {
        $u_kode = '211-2';
    } else if ($visa == 'visa211_3') {
        $u_kode = '211-3';
    } else if ($visa == 'visa211_4') {
        $u_kode = '211-4';
    } else if ($visa == 'voa') {
        $u_kode = 'V-VOA';
    } else if ($visa == 'visa312') {
        $u_kode = 'V-312';
    } else if ($visa == 'visa_lain') {
        $u_kode = 'VLAIN';
    }

    $hari_ini =  time();

    $query = "SELECT MAX(id) as id FROM voucher_visa";
    $sql = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($sql);
    $id = $row['id'];
    $query = "SELECT kode FROM voucher_visa WHERE id = '$id'";
    $sql = mysqli_query($connection, $query);
    if (mysqli_num_rows($sql) == 0) {
        $no = 1;
        $tambah = 'VCR/' . $u_kode . '/' . date('dmy', $hari_ini) . '/' . $no;
    } else {
        $row = mysqli_fetch_array($sql);
        $tanda_tgl = substr($row['kode'], 10, 6);
        if ($tanda_tgl == date('dmy', $hari_ini)) {
            $no = substr($row['kode'], 17);
            $no++;
            $tambah = 'VCR/' . $u_kode . '/' . date('dmy', $hari_ini) . '/' . $no;
            // array_push($array_waktu, $tambah);
        } else {
            $no = 1;
            $tambah = 'VCR/' . $u_kode . '/' . date('dmy', $hari_ini) . '/' . $no;
        }
    }

    //fungsi akhir kode




    $query = "INSERT INTO voucher_visa VALUE ('id', '$tambah','$nama_pt','$mata_uang', '$jumlah_pengguna', '$total_harga', '$tgl_input', '$input_by', '$ket_invoice', '$nama_pengguna', '$ket', '$officer', '$lokasi')";

    $result = mysqli_query($connection, $query);

    $query = "SELECT MAX(id) as id FROM voucher_visa";
    $sql = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($sql);
    $id = $row['id'];

    $query = "INSERT INTO invoice_vouchervisa VALUE ('$id', 'invoice','tgl_input', 'input_by')";

    $result = mysqli_query($connection, $query);

    for ($x = 0; $x < count($data); $x++) {
        $query = "INSERT INTO data_vouchervisa VALUE ('id', '$nama_mandarin[$x]', '$nama_latin[$x]', '$data[$x]', '$id', '$jenis_visa[$x]', '$harga[$x]')";
        $result = mysqli_query($connection, $query);
    }

    for ($x = 0; $x < count($data); $x++) {
        $ubah = "UPDATE data SET $visa = '$id' WHERE passport='$data[$x]' AND nama_pt='$nama_pt' ";
        $hasil = mysqli_query($connection, $ubah);
    }



    header("location:../beranda/voucher?page=data_voucher&id=$id");
}
