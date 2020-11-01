<!DOCTYPE html>
<html>
<?php include("../../system/connect.php");
session_start();

if (!isset($_SESSION['user'])) {
  echo '<script language="javascript">alert("Anda harus Login!"); document.location="../../";</script>';
}

$kode = $_SESSION['user'];

$query = "SELECT * FROM user WHERE kode = '$kode' ";
$result = mysqli_query($connection, $query);

if (!$result) {
  die("gak bisa");
}

$row = mysqli_fetch_array($result);

$nama_user = $row['nama']
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Voucher</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
  <link rel="stylesheet" href="assets/css/navbar.css">
  <link rel="stylesheet" href="assets/css/sidebar.css">
  <link rel="stylesheet" href="assets/css/sigup.css">
  <link rel="stylesheet" href="assets/css/style2.css">
  <link rel="stylesheet" href="assets/css/colorgraph.css">
  <link rel="stylesheet" href="assets/css/Table-with-search1.css">
  <link rel="stylesheet" href="assets/css/Pretty-Footery.css">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/atas.png">
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">




</head>

<body>
  <div class="container">

    <?php

    include "head.php";
    include "nav.php";

    if (isset($_GET['page'])) {
      $page = $_GET['page'];

      switch ($page) {

        case 'input_voucher':
          include "input_voucher.php";
          break;
        case 'verif_voucher':
          include "verif_voucher.php";
          break;
        case 'riwayat_vouchervisa':
          include "riwayat_vouchervisa.php";
          break;
        case 'data_voucher':
          include "data_voucher.php";
          break;
        case 'edit_vouchervisa':
          include "edit_vouchervisa.php";
          break;
        case 'editjadi_vouchervisa':
          include "editjadi_vouchervisa.php";
          break;
        case 'data_voucherother':
          include "data_voucherother.php";
          break;
        case 'edit_voucherother':
          include "edit_voucherother.php";
          break;
        case 'editjadi_voucherother':
          include "editjadi_voucherother.php";
          break;
        case 'input_invoice':
          include "input_invoice.php";
          break;
        case 'input_invoice_other':
          include "input_invoice_other.php";
          break;
        case 'input_voucherother':
          include "input_voucherother.php";
          break;
        case 'verif_voucherother':
          include "verif_voucherother.php";
          break;
        case 'riwayat_voucherother':
          include "riwayat_voucherother.php";
          break;
        case 'report_voucher':
          include "report_voucher.php";
          break;
      }
    } else {
      include "voucher.php";
    }


    ?>

  </div>


  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/dataTables.bootstrap.min.js"></script>
  <script src="assets/js/Table-with-search.js"></script>
  <script src="assets/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/tableo.js"></script>
  <script src="assets/js/tamba.js"></script>
</body>

</html>