<?php
include('connect.php');
if(isset($_POST['login'])){
	$kode = mysqli_real_escape_string($connection, htmlentities($_POST['username']));
	$password = mysqli_real_escape_string($connection, htmlentities($_POST['password']));
    
    $query = "SELECT * FROM user WHERE kode='$kode' AND password='$password'" ;
	$sql = mysqli_query($connection, $query);
	if(mysqli_num_rows($sql) == 0){
		echo '<script language="javascript">alert("Login Salah!"); document.location="../";</script>';
	}else{
		$row = mysqli_fetch_assoc($sql);
		if ($row['level'] == 3){
            session_start();
			$_SESSION['user']= $kode;
			echo '<script language="javascript"> document.location="../beranda";</script>';
		} else if ($row['level'] == 2) {
            session_start();
			$_SESSION['user']= $kode;
			echo '<script language="javascript"> document.location="../man/";</script>';
		} else if ($row['level'] == 1) {
            session_start();
            $provinsi = $row['provinsi'] ;
            
			$_SESSION['provinsi']= $provinsi;
			echo '<script language="javascript"> document.location="../dashboard/provinsi";</script>';
		} else {
			session_start();
            $pusat = $row['nama'] ;
            
			$_SESSION['pusat']= $pusat;
			echo '<script language="javascript"> document.location="../dashboard/pusat";</script>';
		}
	}
}
?>

    
