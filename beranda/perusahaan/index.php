<!DOCTYPE html>
<html>
<?php
include("../../system/connect.php");

session_start();

if (!isset($_SESSION['user'])) {
  echo '<script language="javascript">alert("Anda harus Login!"); document.location="../../index.php";</script>';
} else {

  $kode = $_SESSION['user'];
  $query = "SELECT * FROM user WHERE kode = '$kode' ";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die("gak bisa");
  }

  $row = mysqli_fetch_array($result);

  $nama_user = $row['nama'];
}


if (isset($_GET['nama_pt'])) {
  $nama_pt = $_GET['nama_pt'];
} else {
}

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Perusahaan</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
  <link rel="stylesheet" href="assets/css/navbar.css">
  <link rel="stylesheet" href="assets/css/sidebar.css">
  <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/Tab.css">
  <link rel="stylesheet" href="assets/css/sigup.css">
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/atas.png">
</head>

<body>

  <?php

  include "head.php";


  if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {

      case 'home':
        include "table.php";
        break;
      case 'pt':
        include "nav.php";
        include "pt.php";
        break;
      case 'isi':
        include "nav.php";
        include "isi.php";
        break;
      case 'rptka':
        include "nav.php";
        include "rptka.php";
        break;
      case 'tambah_rptka':
        include "nav.php";
        include "tambah_rptka.php";
        break;
      case 'rptka_edit':
        include "nav.php";
        include "rptka_edit.php";
        break;
      case 'pengguna_rptka':
        include "nav.php";
        include "pengguna_rptka.php";
        break;
      case 'data_tka':
        include "nav.php";
        include "data_tka.php";
        break;

      case 'visa211':
        include "nav.php";
        include "visa211.php";
        break;
      case 'visa312':
        include "nav.php";
        include "visa312.php";
        break;
      case 'tambah_pt':
        include "tambah_pt.php";
        break;
      case 'edit_pt':
        include "nav.php";
        include "edit_pt.php";
        break;
      case 'riwayat_voucher':
        include "nav.php";
        include "riwayat_voucher.php";
        break;
      case 'riwayat_voucher_other':
        include "nav.php";
        include "riwayat_voucher_other.php";
        break;
      case 'voa':
        include "nav.php";
        include "voa.php";
        break;
      case 'visalain':
        include "nav.php";
        include "visalain.php";
        break;
      case 'visa211_non':
        include "nav.php";
        include "visa211_non.php";
        break;
      case 'data_tka_non':
        include "nav.php";
        include "data_tka_non.php";
        break;
      case 'voa_non':
        include "nav.php";
        include "voa_non.php";
        break;
      case 'visa312_non':
        include "nav.php";
        include "visa312_non.php";
        break;
      case 'visalain_non':
        include "nav.php";
        include "visalain_non.php";
        break;
      case 'data_voucher':
        include "nav.php";
        include "data_voucher.php";
        break;
      case 'data_voucherother':
        include "nav.php";
        include "data_voucherother.php";
        break;
    }
  } else {
    include "data_pt.php";
  }


  ?>



  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/Table-with-search.js"></script>
  <script src="assets/js/dataTables.bootstrap.min.js"></script>
  <script src="assets/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/tableo.js"></script>
  <script src="assets/js/tambah.js"></script>

</body>

</html>