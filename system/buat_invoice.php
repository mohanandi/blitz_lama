<?php

    include ('connect.php') ;

    if (isset($_POST['submit'])) {
        
        $id = $_POST ['id'] ;
        $invoice = $_POST ['invoice'] ;
        $tgl_input = $_POST ['tgl_input'] ;
        $input_by = $_POST ['nama_user'] ;


        $ket_invoice = 1 ;
        
        
        

        
        $ubah = "UPDATE voucher_visa SET ket_invoice = '$ket_invoice' WHERE  id='$id' " ;
        $hasil = mysqli_query($connection, $ubah);
        
        
        

        
        $ubah = "UPDATE invoice_vouchervisa SET invoice = '$invoice', tgl_input = '$tgl_input', input_by = '$input_by' WHERE  id='$id' " ;
        $hasil = mysqli_query($connection, $ubah);
        
        
            
        header("location:../beranda/voucher?page=riwayat_vouchervisa&id=$id") ;     
        
        
    }

?>