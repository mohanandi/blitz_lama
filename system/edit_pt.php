<?php

    include ('connect.php') ;

    if (isset($_POST['submit'])) {
        
        $id =$_POST['id'] ;
        $nama_pt = $_POST ['nama_pt'] ;
        $pic = $_POST ['pic'] ;
        $ket = $_POST ['ket'] ;
        $nama_client = $_POST ['nama_client'] ;
        $alamat = $_POST ['alamat'] ;
        
        
        $ubah = "UPDATE perusahaan SET nama_pt = '$nama_pt', pic = '$pic', ket = '$ket', nama_client = '$nama_client', alamat='$alamat' where id='$id' " ;
        $hasil = mysqli_query($connection, $ubah);
        
        if (! $ubah) {
            die(mysqli_connect_error());
            echo "you cannot input the data" ;
        }else {
            
           header("location:../beranda/perusahaan?page=pt&nama_pt=$nama_pt") ;     
        }
        
    }

?>