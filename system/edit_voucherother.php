<?php

include('connect.php');

if (isset($_POST['simpan_edit'])) {
    $nama_pt = $_POST['nama_pt'];
    $mata_uang = $_POST['mata_uang'];
    $total_harga = $_POST['total_harga'];
    $jumlah_pengguna = $_POST['jumlah_pengguna'];
    $tgl_input = $_POST['tgl_input'];
    $input_by = $_POST['input_by'];
    $officer = $_POST['officer'];
    $ket = $_POST['ket'];
    $lokasi = $_POST['lokasi'];
    $id = $_POST['id'];

    $jenis_proses = $_POST['jenis_proses'];
    $harga = $_POST['harga'];
    $passport = $_POST['passport'];
    $nama_mandarin = $_POST['nama_mandarin'];
    $nama_latin = $_POST['nama_latin'];
    $nama_pengguna = $_POST['nama_pengguna'];


    $query = "SELECT * FROM voucher_other WHERE id=$id";
    $hasil = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($hasil);
    $id_data = [];
    $mandarin_data = [];
    $nama_data = [];
    $passport_data = [];
    $jenis_proses_data = [];
    $harga_data = [];
    $query_data = "SELECT * FROM data_voucherother WHERE no_voucher=$id";
    $hasil_data = mysqli_query($connection, $query_data);
    while ($row_data = mysqli_fetch_array($hasil_data)) {
        array_push($id_data, $row_data['id']);
        array_push($mandarin_data, $row_data['nama_mandarin']);
        array_push($nama_data, $row_data['nama_latin']);
        array_push($passport_data, $row_data['passport']);
        array_push($jenis_proses_data, $row_data['jenis_proses']);
        array_push($harga_data, $row_data['harga']);
    }
    $jumlah_input = count($passport);
    $jumlah_data = count($passport_data);

    if ($jumlah_input > $jumlah_data) {
        for ($i = 0; $i < count($id_data); $i++) {
            $query_ubah = "UPDATE data_voucherother SET nama_mandarin = '$nama_mandarin[$i]', nama_latin = '$nama_latin[$i]', passport = '$passport[$i]', jenis_proses = '$jenis_proses[$i]', harga = '$harga[$i]' WHERE id='$id_data[$i]'";
            $sql_ubah = mysqli_query($connection, $query_ubah);
        }
        $sisa = $jumlah_input - $jumlah_data;
        $mulai = $jumlah_input - $sisa;
        for ($mulai; $mulai < $jumlah_input; $mulai++) {
            $query_tambah = "INSERT INTO data_voucherother VALUE ('id', '$nama_mandarin[$mulai]', '$nama_latin[$mulai]', '$passport[$mulai]', '$id', '$jenis_proses[$mulai]', '$harga[$mulai]')";
            $sql_tambah = mysqli_query($connection, $query_tambah);
        }
    } else if ($jumlah_input == $jumlah_data) {
        for ($i = 0; $i < count($id_data); $i++) {
            $query_ubah = "UPDATE data_voucherother SET nama_mandarin = '$nama_mandarin[$i]', nama_latin = '$nama_latin[$i]', passport = '$passport[$i]', jenis_proses = '$jenis_proses[$i]', harga = '$harga[$i]' WHERE id='$id_data[$i]'";
            $sql_ubah = mysqli_query($connection, $query_ubah);
        }
    } else if ($jumlah_input < $jumlah_data) {
        for ($i = 0; $i < count($passport); $i++) {
            $query_ubah = "UPDATE data_voucherother SET nama_mandarin = '$nama_mandarin[$i]', nama_latin = '$nama_latin[$i]', passport = '$passport[$i]', jenis_proses = '$jenis_proses[$i]', harga = '$harga[$i]' WHERE id='$id_data[$i]'";
            $sql_ubah = mysqli_query($connection, $query_ubah);
        }
        $sisa = $jumlah_data - $jumlah_input;
        $mulai = $jumlah_data - $sisa;
        for ($mulai; $mulai < $jumlah_data; $mulai++) {
            $query_hapus = "DELETE FROM data_voucherother WHERE id='$id_data[$mulai]' ";
            $sql_hapus = mysqli_query($connection, $query_hapus);
        }
    }

    $query_ubah = "UPDATE voucher_other SET nama_pt = '$nama_pt', mata_uang = '$mata_uang', jumlah_pengguna = '$jumlah_pengguna', total_harga = '$total_harga', nama_pengguna = '$nama_pengguna', ket='$ket', officer='$officer', lokasi = '$lokasi' WHERE id='$id' ";
    $sql_ubah = mysqli_query($connection, $query_ubah);

    header("location:../beranda/voucher?page=riwayat_voucherother&warning=success");
}
