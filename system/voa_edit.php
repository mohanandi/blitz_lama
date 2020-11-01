<?php

    include ('connect.php') ;

    if (isset($_POST['submit'])) {
        
        $passport = $_POST ['passport'] ;
        $visa = $_POST ['visa'] ;
        $start_visa = $_POST ['start_visa'] ;
        $expired = $_POST ['expired'] ;
        $ket = $_POST ['ket'] ;
        $tgl_input = $_POST ['tgl_input'] ;
        $input_by = $_POST ['input_by'] ;
        
        
        $ubah = "UPDATE voa SET visa = '$visa', start_visa = '$start_visa', expired = '$expired', ket = '$ket', tgl_input = '$tgl_input' where passport='$passport' " ;
        $hasil = mysqli_query($connection, $ubah);
        
        if (! $ubah) {
            die(mysqli_connect_error());
            echo "you cannot input the data" ;
        }else {
            
           header("location:../beranda/data?page=voa_jadi&passport=$passport") ;     
        }
        
    }

?>

