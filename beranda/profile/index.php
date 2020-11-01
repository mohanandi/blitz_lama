<!DOCTYPE html>
<html>
<?php  include("../../system/connect.php");
session_start();

if(!isset($_SESSION['user'])){
  echo '<script language="javascript">alert("Anda harus Login!"); document.location="../../";</script>';
}

      $kode = $_SESSION['user'] ;

      $query = "SELECT * FROM user WHERE kode = '$kode' " ;
      $result = mysqli_query ($connection, $query) ;
    
      if (!$result) {
        die ("gak bisa") ;
        } 
                    
      $row = mysqli_fetch_array($result) ;

      $nama_user = $row['nama'] ;
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="assets/css/Hero-Technology.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/side.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
<nav id="navbar" class="" style="margin-left:-130px;">
  <div class="nav-wrapper">
    <!-- Navbar Logo -->
    <div class="logo">
      <!-- Logo Placeholder for Inlustration -->
      <a href="#home"><img src="assets/img/blitzland.jpg" style="width:145px;height:55px;margin-top:-5px;"></a>
    </div>

    <!-- Navbar Links -->
    <ul id="menu">
      <li><a href="../">Home</a></li><!--<!--
   --><li><a href="../data">Input Data TKA & Visa</a></li>
        <li><a href="../perusahaan">Data Perusahaan</a></li>
        <li><a href="../voucher">Input Voucher</a></li>
        
        
    </ul>
    
  </div>
  
</nav>


    <div class="container" style="height:320px;width:980px;margin-top:80px;"><div class="jumbotron hero-technology" id="user">
    <div class="avatar-wrapper">
	<img class="profile-pic" src="" />
	
	<input class="file-upload" type="file" accept="image/*"/>
</div>
   <h4 class="pull-left"><?php echo $nama_user ; ?></h4>

 
</div></div><div class="row">
  <div class="column">
<div class="container pull-left" id="tab" >
    <table class="table borderless" >
        <thead align="left">
            <tr>
                <td style="border-top-left-radius: 5px;
border-bottom-left-radius: 5px;"><strong>Nama</strong></td>
                <td style="border-top-right-radius: 5px;
border-bottom-right-radius: 5px; color:#515050;"><?php echo $nama_user ; ?></td>
              
            </tr>
             <tr>
                <td style="border-top-left-radius: 5px;
border-bottom-left-radius: 5px;"><strong>Email</strong></td>
                <td style="border-top-right-radius: 5px;
border-bottom-right-radius: 5px; color:#515050;"><?php echo $row['email'] ; ?></td>
              
            </tr>
             <tr>
                <td style="border-top-left-radius: 5px;
border-bottom-left-radius: 5px;"><strong>No Handphone</strong></td>
                <td style="border-top-right-radius: 5px;
border-bottom-right-radius: 5px; color:#515050;"><?php echo $row['hp'] ; ?></td>
              
            </tr>
             <tr>
                <td style="border-top-left-radius: 5px;
border-bottom-left-radius: 5px;"><strong>Username</strong></td>
                <td style="border-top-right-radius: 5px;
border-bottom-right-radius: 5px; color:#515050;"><?php echo $row['kode'] ; ?></td>
              
            </tr>
             <tr>
                <td style="border-top-left-radius: 5px;
border-bottom-left-radius: 5px;"><strong>Password</strong></td>
                <td style="border-top-right-radius: 5px;
border-bottom-right-radius: 5px; color:#515050;"><?php echo $row['password'] ; ?></td>
              
            </tr>

        </thead>
    </table>
    <a href="edit.php" class="pull-center arial" style="font-family:roboto; color:white;"><button type="button" class="btn btn-primary" style="width:100%;margin-left:-20px;"><i class="fa fa-gear" style="margin-right:5px; color:white;"></i>Edit Profile</button></a>
  
</div>
    </div>
    

      

 
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/test.js"></script>
</body>

</html>