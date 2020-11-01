<?php

    include ('connect.php') ;

    if (isset($_POST['submit'])) {
        
        $id =$_POST['id'] ;
        $nama =$_POST['nama'] ;
        $email = $_POST ['email'] ;
        $username = $_POST ['username'] ;
        $hp = $_POST ['hp'] ;
        $password = $_POST ['password'] ;
        
        
        $ubah = "UPDATE user SET nama = '$nama', email = '$email', hp = '$hp', kode = '$username', password='$password' where no='$id' " ;
        $hasil = mysqli_query($connection, $ubah);
        
        if (! $hasil) {
            die(mysqli_connect_error());
            echo "you cannot input the data".mysqli_error() ;
        }else {
            
           header("location:../beranda/profile") ;     
        }
        
    }

?>