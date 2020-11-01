<?php

    include ('connect.php') ;

    if (isset($_POST['submit'])) {
        
        $nama_pt = $_POST ['nama_pt'] ;
        $exp_kitas = $_POST ['exp_kitas'] ;
        $ket = $_POST ['ket'] ;
        $jabatan = $_POST ['jabatan'] ;
        $passport = $_POST ['passport'] ;
        $notif = $_POST ['notif'] ;
        $visa = $_POST ['visa'] ;
        $rptka_lama = $_POST ['rptka_lama'] ;
        $rptka_baru = $_POST ['rptka_baru'] ;

        if ($rptka_lama == $rptka_baru) {

        // Awal Fungsi untuk mengubah jabatan lama

        // Mengambil data jabatan lama
        
        $data_visa = "SELECT * FROM visa312 WHERE nama_pt ='$nama_pt' && passport ='$passport' " ;
        $dat_visa = mysqli_query ($connection, $data_visa) ;

        $row_visa = mysqli_fetch_array($dat_visa) ;
        $jabatan_lama = $row_visa['jabatan'] ;

        // Mengubah terpakai di rptka lama

        $jab = "SELECT * FROM jabatan_rptka WHERE nama_pt ='$nama_pt' && no_rptka = '$rptka_lama' && jabatan ='$jabatan_lama' " ;
        $query_jab = mysqli_query ($connection, $jab) ;

        $row_jab = mysqli_fetch_array($query_jab) ;

        $singgah = $row_jab['terpakai'] - 1 ;
        $id_singgah = $row_jab['id'] ;

        $ubah = "UPDATE jabatan_rptka SET terpakai = '$singgah' WHERE id ='$id_singgah' " ;
        $hasil = mysqli_query($connection, $ubah);

        // Akhir Fungsi untuk mengubah jabatan lama

        // Menambahkan jabatan terpakai di RPTKA Baru
        $jab = "SELECT * FROM jabatan_rptka WHERE nama_pt ='$nama_pt' && no_rptka = '$rptka_baru' && jabatan ='$jabatan' " ;
        $query_jab = mysqli_query ($connection, $jab) ;
                
        $row_jab = mysqli_fetch_array($query_jab) ;
        $singgah = $row_jab['terpakai'] + 1 ;
        $id_singgah = $row_jab['id'] ;
                
        $ubah = "UPDATE jabatan_rptka SET terpakai = '$singgah' WHERE id ='$id_singgah' " ;
        $hasil = mysqli_query($connection, $ubah);
        
        } else {

        // Awal Fungsi Merubah Jumlah RPTKA
        $rp_baru = "SELECT * FROM rptka WHERE nama_pt = '$nama_pt' && no_rptka ='$rptka_baru' " ;
        $tka_baru = mysqli_query ($connection, $rp_baru) ;
                    
        $baru = mysqli_fetch_array($tka_baru) ;

        $rptkabaru_pakai = $baru['rptka_pakai'] ;
        $jumlah_rptkabaru = $baru['jumlah_rptka'] ;
        $rptkabaru_sisa = $baru['rptka_sisa'] ;
        $rptkabaru_pakai = $rptkabaru_pakai + 1 ;
        $rptkabaru_sisa = $jumlah_rptkabaru - $rptkabaru_pakai ;

        

        $ubah_rptkabaru = "UPDATE rptka SET rptka_pakai = '$rptkabaru_pakai', rptka_sisa = '$rptkabaru_sisa' WHERE nama_pt ='$nama_pt' && no_rptka ='$rptka_baru' " ;
        $hasil_rptkabaru = mysqli_query($connection, $ubah_rptkabaru);

        $rp_lama = "SELECT * FROM rptka WHERE nama_pt ='$nama_pt' && no_rptka ='$rptka_lama' " ;
        $tka_lama = mysqli_query ($connection, $rp_lama) ;
                    
        
        $row = mysqli_fetch_array($tka_lama) ;

        $rptka_pakai = $row['rptka_pakai'] ;
        $jumlah_rptka = $row['jumlah_rptka'] ;
        $rptka_sisa = $row['rptka_sisa'] ;
        $rptka_pakai = $rptka_pakai - 1 ;
        $rptka_sisa = $jumlah_rptka - $rptka_pakai ;

        

        $ubah_rptkalama = "UPDATE rptka SET rptka_pakai = '$rptka_pakai', rptka_sisa = '$rptka_sisa' WHERE nama_pt ='$nama_pt' && no_rptka ='$rptka_lama' " ;
        $hasil_rptkalama = mysqli_query($connection, $ubah_rptkalama);
        //Akhir Fungsi Merubah Jumlah RPTKA



         // Awal Fungsi untuk mengubah jabatan lama

        // Mengambil data jabatan lama
        
        $data_visa = "SELECT * FROM visa312 WHERE nama_pt ='$nama_pt' && passport ='$passport' " ;
        $dat_visa = mysqli_query ($connection, $data_visa) ;

        $row_visa = mysqli_fetch_array($dat_visa) ;
        $jabatan_lama = $row_visa['jabatan'] ;

        // Mengubah terpakai di rptka lama

        $jab = "SELECT * FROM jabatan_rptka WHERE nama_pt ='$nama_pt' && no_rptka = '$rptka_lama' && jabatan ='$jabatan_lama' " ;
        $query_jab = mysqli_query ($connection, $jab) ;

        $row_jab = mysqli_fetch_array($query_jab) ;

        $singgah = $row_jab['terpakai'] - 1 ;
        $id_singgah = $row_jab['id'] ;

        $ubah = "UPDATE jabatan_rptka SET terpakai = '$singgah' WHERE id ='$id_singgah' " ;
        $hasil = mysqli_query($connection, $ubah);

        // Akhir Fungsi untuk mengubah jabatan lama

        // Menambahkan jabatan terpakai di RPTKA Baru
        $jab = "SELECT * FROM jabatan_rptka WHERE nama_pt ='$nama_pt' && no_rptka = '$rptka_baru' && jabatan ='$jabatan' " ;
        $query_jab = mysqli_query ($connection, $jab) ;
        
        $row_jab = mysqli_fetch_array($query_jab) ;
        $singgah = $row_jab['terpakai'] + 1 ;
        $id_singgah = $row_jab['id'] ;
        
        $ubah = "UPDATE jabatan_rptka SET terpakai = '$singgah' WHERE id ='$id_singgah' " ;
        $hasil = mysqli_query($connection, $ubah);
        }

        $tgl_terbit = $_POST ['tgl_terbit'] ;
        $jangka_visa = $_POST ['jangka_visa'] ;
        $no_imta = $_POST ['no_imta'] ;
        $tgl_input = $_POST ['tgl_input'] ;
        
        
       




        $ubah = "UPDATE visa312 SET visa = '$visa', no_rptka = '$rptka_baru', jabatan = '$jabatan', tgl_terbit = '$tgl_terbit', jangka_visa = '$jangka_visa', no_imta = '$no_imta', tgl_input = '$tgl_input', exp_kitas = '$exp_kitas', notif = '$notif', ket = '$ket' WHERE passport ='$passport' " ;
        $hasil = mysqli_query($connection, $ubah);
        
        if (! $ubah) {
            die(mysqli_connect_error());
            echo "you cannot input the data" ;
        }else {
            
           header("location:../beranda/data?page=visa312_jadi&passport=$passport") ;     
        }
        
    }

?>