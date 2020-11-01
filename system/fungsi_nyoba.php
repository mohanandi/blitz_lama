<?php
include ('connect.php') ;
$id = "";
$nama_pt = $_POST ['nama_pt'] ;
$id_rptka = $_POST ['id'] ;
$nama_jabatan = $_POST ['nama_jabatan'] ;
$nama_jabatan_lama = $_POST ['njabatan_lama'] ;
$jumlah_jabatan = $_POST ['jumlah_jabatan'] ;
$jumlah_jabatan_lama = $_POST ['jjabatan_lama'] ;
$no_rptka = $_POST ['no_rptka'] ;
$tgl_terbit = $_POST ['tgl_terbit'] ;
$tgl_habis = $_POST ['tgl_habis'] ;
$jumlah_rptka = $_POST ['jumlah_rptka'] ;
$ket = $_POST['ket'] ;
$tgl_input = $_POST ['tgl_input'] ;
$input_by = $_POST ['input_by'] ;
$u_dipakai = 0 ;

// Mengambil data awal RPTKA
$rptka = "SELECT * FROM rptka WHERE id ='$id_rptka' " ;
$query_rptka = mysqli_query ($connection, $rptka) ;

$row_rptka = mysqli_fetch_array($query_rptka) ;
$rptka_lama = $row_rptka['no_rptka'] ;
$rptka_pakai = $row_rptka['rptka_pakai'] ;

$perbandingan_jabatan = 0 ;
$id_jabatan = [] ;
$array_nama_jabatan = [] ;
$jabatan = "SELECT * FROM jabatan_rptka WHERE nama_pt ='$nama_pt' && no_rptka = '$rptka_lama' " ;
$query_jabatan = mysqli_query ($connection, $jabatan) ;
while ($row_jabatan = mysqli_fetch_array($query_jabatan)) {
    $perbandingan_jabatan++ ;
    array_push($id_jabatan, $row_jabatan['id']) ;
    array_push($array_nama_jabatan, $row_jabatan['jabatan']) ;
}


$hapus = array_diff($array_nama_jabatan, $nama_jabatan_lama) ;
$a = array_values($hapus) ;
var_dump($nama_jabatan) ;
echo "<br>";
var_dump($nama_jabatan_lama) ;
echo "<br>";
var_dump($jumlah_jabatan) ;
echo "<br>";
var_dump($jumlah_jabatan_lama) ;
echo "<br>";
var_dump($hapus) ;
echo "<br>";
var_dump($hapus) ;
echo "<br>";
var_dump($a) ;
echo "<br>";
for ($j=0; $j<count($nama_jabatan); $j++){

    echo $j ;
    echo $hapus[$j] ;
}