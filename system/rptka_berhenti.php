<?php

include ('connect.php') ;

if (isset($_GET['m'])) {
    $id = $_GET['m'] ;
    $input = $_GET['input'] ;
    $tgl_input = date('Y-m-d');

    $jabs = "SELECT * FROM rptka WHERE id = '$id' " ;
    $query_jabs = mysqli_query ($connection, $jabs) ;
    $row_jabs = mysqli_fetch_array($query_jabs) ;

    $id = "";
    $nama_pt = $row_jabs ['nama_pt'] ;
    $no_rptka = $row_jabs ['no_rptka'] ;
    $tgl_terbit = $row_jabs ['tgl_terbit'] ;
    $tgl_habis = $row_jabs ['tgl_habis'] ;
    $jumlah_rptka = $row_jabs ['jumlah_rptka'] ;
    $rptka_pakai = $row_jabs ['jumlah_rptka'] ;
    $rptka_sisa = $row_jabs ['jumlah_rptka'] ;
    $ket = $row_jabs ['ket'] ;
    $tgl_input = $row_jabs ['tgl_input'] ;
    $input_by = $row_jabs ['input_by'] ;
    
    $jabatan = "SELECT * FROM jabatan_rptka WHERE nama_pt ='$nama_pt' && no_rptka = '$no_rptka' " ;
    $query_jabatan = mysqli_query ($connection, $jabatan) ;
    $id_jabs = [] ;
    $nama_jabatan = [] ;
    $jumlah_jabatan = [] ;
    $terpakai = [] ;
    while {$row_jabs = mysqli_fetch_array($query_jabatan)} {

    }

    $query = "INSERT INTO jabatan_rptka VALUE ( '$id','$nama_pt', '$no_rptka', '$masuk[$i]', '$masuk_jumlah[$i]', '$u_dipakai')" ;
    $result = mysqli_query($connection, $query) ;

    
    $query = "INSERT INTO rptka VALUE ( '$id','$nama_pt', '$no_rptka', '$tgl_terbit', '$tgl_habis', '$jumlah_rptka', '$rptka_pakai', '$rptka_sisa', '$ket','$tgl_input', '$input_by', '$stop_by')" ;
    
    $result = mysqli_query($connection, $query) ;
}