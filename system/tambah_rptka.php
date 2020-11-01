<?php

    include ('connect.php') ;

    if (isset($_POST['submit'])) {
        
        $id = "";
        $nama_pt = $_POST ['nama_pt'] ;
        $nama_jabatan = $_POST ['nama_jabatan'] ;
        $jumlah_jabatan = $_POST ['jumlah_jabatan'] ;
        $no_rptka = $_POST ['no_rptka'] ;
        $tgl_terbit = $_POST ['tgl_terbit'] ;
        $tgl_habis = $_POST ['tgl_habis'] ;
        $jumlah_rptka = $_POST ['jumlah_rptka'] ;
        $rptka_pakai = 0 ;
        $rptka_sisa = $jumlah_rptka - $rptka_pakai ;
        $ket = $_POST['ket'] ;
        $tgl_input = $_POST ['tgl_input'] ;
        $input_by = $_POST ['input_by'] ;
        
        
        
        $query = "INSERT INTO rptka VALUE ( '$id','$nama_pt', '$no_rptka', '$tgl_terbit', '$tgl_habis', '$jumlah_rptka', '$rptka_pakai', '$rptka_sisa', '$ket','$tgl_input', '$input_by')" ;
        
        $result = mysqli_query($connection, $query) ;
        
        if (! $result) {
            echo "you cannot input the data" ;
        }

        $jml = count($nama_jabatan);

        for ($i=0; $i<$jml; $i++){
        
        $query = "INSERT INTO jabatan_rptka VALUE ( '$id','$nama_pt', '$no_rptka', '$nama_jabatan[$i]', '$jumlah_jabatan[$i]', '$rptka_pakai')" ;
        $result = mysqli_query($connection, $query) ;
        }
        if (! $result) {
            echo "you cannot input the data" ;
        }
        else {
            
           header("location:../beranda/perusahaan?nama_pt=$nama_pt&page=rptka") ;
        }
        
    }

?>

