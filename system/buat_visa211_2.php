<?php

    include ('connect.php') ;

    if (isset($_POST['submit'])) {
        
        $nama_pt = $_POST ['nama_pt'] ;
        $passport = $_POST ['passport'] ;
        $visa = $_POST ['jenis_proses'] ;
        $start_visa = $_POST ['start_visa'] ;
        $expired = $_POST ['expired'] ;
        $tgl_input = $_POST ['tgl_input'] ;
        $input_by = $_POST ['input_by'] ;
        $ket = $_POST ['ket'] ;


        $query = "INSERT INTO visa211_2 VALUE ('id','$nama_pt', '$passport','$visa', '$start_visa', '$expired', '$ket', '$tgl_input', '$input_by' )" ;
        
        $result = mysqli_query($connection, $query);
        
        if (! $result) {
            die(mysqli_connect_error());
            echo "you cannot input the data" ;
        }else {
            
           header("location:../beranda/data?page=visa211_2_jadi&passport=$passport") ;     
        }
        
    }

?>