<?php

    include ('connect.php') ;

    if (isset($_POST['submit'])) {
        
        
        $nama_pt = $_POST ['nama_pt'] ;
        $pic = $_POST ['pic'] ;
        $ket = $_POST ['ket'] ;
        $nama_client = $_POST ['nama_client'] ;
        $alamat = $_POST ['alamat'] ;
        
        
        $query = "INSERT INTO perusahaan VALUE ('id','$nama_pt', '$pic', '$nama_client', '$alamat', '$ket')" ;
        
        $result = mysqli_query($connection, $query) ;
        
        if (! $result) {
            echo "you cannot input the data" ;
        }else {
            
           header('location:../beranda/perusahaan') ;
        }
        
    }

?>