<?php

    include ('connect.php') ;

    if (isset($_POST['submit'])) {
        
        $nama_pt = $_POST ['nama_pt'] ;
        $passport = $_POST ['passport'] ;
        $visa = $_POST ['jenis_proses'] ;
        $start_visa = $_POST ['start_visa'] ;
        $expired = $_POST ['expired'] ;
        $ket = $_POST ['ket'] ;
        $tgl_input = $_POST ['tgl_input'] ;
        $input_by = $_POST ['input_by'] ;
        
        

        $query = "INSERT INTO visa_lain VALUE ('id','$nama_pt', '$passport','$visa', '$start_visa', '$expired', '$ket', '$tgl_input', '$input_by')" ;
        
        $result = mysqli_query($connection, $query);
        
        if (! $result) {
            die(mysqli_connect_error());
            echo "you cannot input the data" ;
        }else {
            
           header("location:../beranda/data?page=visalain_jadi&passport=$passport") ;     
        }
        
    }

?>