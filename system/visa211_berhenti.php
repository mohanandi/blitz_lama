<?php

include ('connect.php') ;

if (isset($_GET['m'])) {
    $id = $_GET['m'] ;
    $stop_by = $_GET['input'] ;
    $tgl_stop = date('Y-m-d');

    $data = "SELECT * FROM visa211 WHERE id ='$id' " ;
    $hasil_data = mysqli_query($connection, $data) ;
    $row_data = mysqli_fetch_assoc($hasil_data) ;

    $nama_pt = $row_data['nama_pt'] ;
    $passport = $row_data['passport'] ;
    $visa = $row_data['visa'] ;
    $start_visa = $row_data['start_visa'] ;
    $expired = $row_data['expired'] ;
    $ket = $row_data['ket'] ;
    $tgl_input = $row_data['tgl_input'] ;
    $input_by = $row_data['input_by'] ;


    $query = "INSERT INTO riwayat_visa211 VALUE ('id','$nama_pt', '$passport','$visa', '$start_visa', '$expired', '$ket', '$tgl_input', '$input_by', '$tgl_stop', '$stop_by')" ;
    $result = mysqli_query($connection, $query);

    $hapus = "DELETE FROM visa211 WHERE id = '$id' " ;
    $query_hapus = mysqli_query($connection, $hapus) ;
    
    //----------------------------------------------------------------------------------
    $cek = "SELECT * FROM riwayat_data WHERE passport = '$passport' AND nama_pt = '$nama_pt' " ;
    $hasil_cek = mysqli_query($connection, $cek) ;
    if(mysqli_num_rows($hasil_cek) == 0){
        $dat = "SELECT * FROM data WHERE passport = '$passport' " ;
        $hasil_dat = mysqli_query($connection, $dat) ;
        $row_visa = mysqli_fetch_assoc($hasil_dat) ;
        
        $nama_pt = $row_visa['nama_pt'] ;
        $nama_mandarin = $row_visa['nama_mandarin'] ;
        $nama_latin = $row_visa['nama_latin'] ;
        $kewarganegaraan = $row_visa['kewarganegaraan'] ;
        $expired_passport = $row_visa['expired_passport'] ;
        $tgl_lahir = $row_visa['tgl_lahir'] ;
        $tgl_input = $row_visa['tgl_input'] ;
        $input_by = $row_visa['input_by'] ;
        $ket = $row_visa['ket'] ;
        $verif_data = $row_visa['verif_data'] ;
        $visa211 = $row_visa['visa211'] ;
        $visa211_1 = $row_visa['visa211_1'] ;
        $visa211_3 = $row_visa['visa211_3'] ;
        $visa211_4 = $row_visa['visa211_4'] ;
        $visa211_2 = $row_visa['visa211_2'] ;
        $visa312 = $row_visa['visa312'] ;
        $voa = $row_visa['voa'] ;
        $visa_lain = $row_visa['visa_lain'] ;

        $query = "INSERT INTO riwayat_data VALUE ('id','$nama_pt', '$nama_mandarin', '$nama_latin', '$kewarganegaraan', '$passport', '$expired_passport', '$tgl_lahir', '$tgl_input', '$input_by', '$ket', '$verif_data', '$visa211', '$visa211_1', '$visa211_2', '$visa211_3', '$visa211_4', '$visa312', '$voa', '$visa_lain')" ;
            
        $result = mysqli_query($connection, $query);

        $query = "DELETE FROM data WHERE passport = '$passport'" ;
        $result = mysqli_query($connection, $query);
    } else {

    }

        
    header("location:../beranda/report?page=visa211") ;     
}