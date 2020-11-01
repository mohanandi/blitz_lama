<?php

include('connect.php');

if (isset($_POST['submit'])) {

    $nama_pt = $_POST['nama_pt'];
    $mata_uang = $_POST['mata_uang'];
    $total_harga = $_POST['total_harga'];
    $jumlah_pengguna = $_POST['jumlah_pengguna'];
    $tgl_input = $_POST['tgl_input'];
    $input_by = $_POST['input_by'];
    $officer = $_POST['officer'];
    $ket = $_POST['ket'];
    $lokasi = $_POST['lokasi'];

    $jenis_proses = $_POST['jenis_proses'];
    $harga = $_POST['harga'];
    $passport = $_POST['passport'];
    $nama_mandarin = $_POST['nama_mandarin'];
    $nama_latin = $_POST['nama_latin'];
    $jenis_visa = $_POST['jenis_visa'];
    $nama_pengguna = $_POST['nama_pengguna'];

    $ket_voucher = 1;
    $ket_invoice = 0;

    //Awal fungsi kode

    $hari_ini =  time();
    echo $hari_ini;

    $query = "SELECT MAX(id) as id FROM voucher_other";
    $sql = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($sql);
    $id = $row['id'];
    $query = "SELECT kode FROM voucher_other WHERE id = '$id'";
    $sql = mysqli_query($connection, $query);
    if (mysqli_num_rows($sql) == 0) {
        $no = 1;
        $tambah = 'VCR/OTR/' . date('dmy', $hari_ini) . '/' . $no;
    } else {
        $row = mysqli_fetch_array($sql);
        $tanda_tgl = substr($row['kode'], 8, 6);
        if ($tanda_tgl == date('dmy', $hari_ini)) {
            $no = substr($row['kode'], 15);
            echo "$no<br>";
            $no++;
            $tambah = 'VCR/OTR/' . date('dmy', $hari_ini) . '/' . $no;
            // array_push($array_waktu, $tambah);
        } else {
            $no = 1;
            $tambah = 'VCR/OTR/' . date('dmy', $hari_ini) . '/' . $no;
        }
    }
    //Akhir fungsi kode








    $query = "INSERT INTO voucher_other VALUE ('id', '$tambah', '$nama_pt','$mata_uang', '$jumlah_pengguna', '$total_harga', '$tgl_input', '$input_by', '$ket_invoice', '$nama_pengguna', '$ket', '$officer', '$lokasi')";

    $result = mysqli_query($connection, $query);

    //awal fungsi ambil id voucher 
    $query = "SELECT MAX(id) as id FROM voucher_other";
    $sql = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($sql);
    $id = $row['id'];
    //akhir fungsi ambil id voucher 

    $query = "INSERT INTO invoice_voucherother VALUE ('$id', 'invoice','tgl_input', 'input_by')";

    $result = mysqli_query($connection, $query);

    for ($x = 0; $x < count($passport); $x++) {
        $query = "INSERT INTO data_voucherother VALUE ('id', '$nama_mandarin[$x]', '$nama_latin[$x]', '$passport[$x]', '$id', '$jenis_proses[$x]', '$harga[$x]')";
        $result = mysqli_query($connection, $query);
    }



    header("location:../beranda/voucher?page=data_voucherother&id=$id");
}
