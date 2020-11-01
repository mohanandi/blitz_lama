<?php

    include ('connect.php') ;

    if (isset($_POST['submit'])) {
        
        
        $nama_pt = $_POST ['nama_pt'] ;
        $nama_mandarin = $_POST ['nama_mandarin'] ;
        $nama_latin = $_POST ['nama_latin'] ;
        $kewarganegaraan = $_POST ['kewarganegaraan'] ;
        $passport = $_POST ['passport'] ;
        $ket = $_POST ['ket'] ;

        $query = "SELECT * FROM data WHERE passport='$passport'" ;
        $result = mysqli_query ($connection, $query) ;
        if(mysqli_num_rows($result) != 0){
		echo '<script language="javascript">alert("No Passport sudah ada"); document.location="../beranda/data";</script>';
	   }else {}
 
        $expired_passport = $_POST ['expired_passport'] ;
        $tgl_lahir = $_POST ['tgl_lahir'] ;
        $tgl = $_POST ['tanggal'] ;
        $input_by = $_POST ['input_by'] ;
        $verif_data = $_POST ['verif_data'] ;
        $visa211 = 0 ;
        $visa211_1 = 0 ;
        $visa211_2 = 0 ;
        $visa211_3 = 0 ;
        $visa211_4 = 0 ;
        $visa312 = 0 ;
        $voa = 0 ;
        $visa_lain = 0 ;
        
        $query = "INSERT INTO data VALUE ('','$nama_pt', '$nama_mandarin', '$nama_latin', '$kewarganegaraan', '$passport', '$expired_passport', '$tgl_lahir', '$tgl', '$input_by', '$ket', '$verif_data', '$visa211', '$visa211_1', '$visa211_2', '$visa211_3', '$visa211_4', '$visa312', '$voa', '$visa_lain')" ;
        
        $result = mysqli_query($connection, $query);
        
        if (! $result) {
            die(mysqli_connect_error());
            echo "you cannot input the data" ;
        }else {
            
           header("location:../beranda/data?page=riwayat&passport=$passport") ;     
        }
        
    }
