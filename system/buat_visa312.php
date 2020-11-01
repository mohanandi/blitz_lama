<?php

    include ('connect.php') ;

    if (isset($_POST['submit'])) {
        
        $nama_pt = $_POST ['nama_pt'] ;
        $passport = $_POST ['passport'] ;
        $visa = $_POST ['visa'] ;
        $no_rptka = $_POST ['no_rptka'] ;
        $exp_kitas = $_POST ['exp_kitas'] ;
        $notif = $_POST ['notif'] ;
        $ket = $_POST ['ket'] ;

        $rp = "SELECT * FROM rptka WHERE nama_pt = '$nama_pt' && no_rptka ='$no_rptka' " ;
        $tka = mysqli_query ($connection, $rp) ;

        if ($tka) {
                    
        $row = mysqli_fetch_array($tka) ;

        $rptka_pakai = $row['rptka_pakai'] ;
        $jumlah_rptka = $row['jumlah_rptka'] ;
        $rptka_sisa = $row['rptka_sisa'] ;
        $rptka_pakai = $rptka_pakai + 1 ;
        $rptka_sisa = $jumlah_rptka - $rptka_pakai ;

        

        $ubah_rptka = "UPDATE rptka SET rptka_pakai = '$rptka_pakai', rptka_sisa = '$rptka_sisa' WHERE nama_pt = '$nama_pt' && no_rptka ='$no_rptka' " ;
        $hasil_rptka = mysqli_query($connection, $ubah_rptka);
        }else {
            die(mysqli_connect_error($tka));
        }

        $jabatan = $_POST ['jabatan'] ;
        $tgl_terbit = $_POST ['tgl_terbit'] ;
        $jangka_visa = $_POST ['jangka_visa'] ;
        $no_imta = $_POST ['no_imta'] ;
        $tgl_input = $_POST ['tgl_input'] ;
        $input_by = $_POST ['input_by'] ;

        $query = "INSERT INTO visa312 VALUE ('','$nama_pt', '$passport','$visa', '$no_rptka', '$jabatan', '$tgl_terbit', '$jangka_visa', '$no_imta', '$exp_kitas', '$notif', '$ket', '$tgl_input', '$input_by' )" ;
        
        $result = mysqli_query($connection, $query);

        $jab = "SELECT * FROM jabatan_rptka WHERE nama_pt = '$nama_pt' && no_rptka ='$no_rptka' && jabatan = '$jabatan' " ;
        $jabs = mysqli_query ($connection, $jab) ;

        if ($jabs) {
                    
        while ($job = mysqli_fetch_array($jabs)) {
        
            $tambah = $job['terpakai'] ;
            $tanda = $job['id'];
            $tambah += 1 ;
        

        } }

        $ubah = "UPDATE jabatan_rptka SET terpakai = '$tambah' WHERE id='$tanda' " ;
        $hasil = mysqli_query($connection, $ubah);

        if (! $hasil) {
            die(mysqli_connect_error());
            echo "you cannot input the data" ;
        }else {
            
           header("location:../beranda/data?page=visa312_jadi&passport=$passport") ;     
        }
        
    }

?>