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
  <title>Input Data TKA & Visa</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
  <link rel="stylesheet" href="assets/css/navbar1.css">
  <link rel="stylesheet" href="assets/css/sidebar.css">
  <link rel="stylesheet" href="assets/css/sigup.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/Tab.css">
  <link rel="stylesheet" href="assets/css/colorgraph.css">
  <link rel="stylesheet" href="assets/css/Table-with-search.css">
  <link rel="stylesheet" href="assets/css/Pretty-Footery.css">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/atas.png">


</head>

<body>
  <div class="container">

    <?php

    include "head.php";
    include "nav.php";

    if (isset($_GET['page'])) {
      $page = $_GET['page'];

      switch ($page) {

        case 'riwayat':
          include "riwayat.php";
          break;
        case 'data_edit':
          include "data_edit.php";
          break;

        case 'visa211':
          include "visa211.php";
          break;
        case 'visa211_jadi':
          include "visa211_jadi.php";
          break;
        case 'visa211_edit':
          include "visa211_edit.php";
          break;
        case 'tambah_visa211':
          include "tambah_visa211.php";
          break;

        case 'visa211_1':
          include "visa211_1.php";
          break;
        case 'tambah_visa211_1':
          include "tambah_visa211_1.php";
          break;
        case 'visa211_1_edit':
          include "visa211_1_edit.php";
          break;
        case 'visa211_1_jadi':
          include "visa211_1_jadi.php";
          break;

        case 'visa211_2':
          include "visa211_2.php";
          break;
        case 'tambah_visa211_2':
          include "tambah_visa211_2.php";
          break;
        case 'visa211_2_edit':
          include "visa211_2_edit.php";
          break;
        case 'visa211_2_jadi':
          include "visa211_2_jadi.php";
          break;

        case 'visa211_3':
          include "visa211_3.php";
          break;
        case 'tambah_visa211_3':
          include "tambah_visa211_3.php";
          break;
        case 'visa211_3_edit':
          include "visa211_3_edit.php";
          break;
        case 'visa211_3_jadi':
          include "visa211_3_jadi.php";
          break;

        case 'visa211_4':
          include "visa211_4.php";
          break;
        case 'tambah_visa211_4':
          include "tambah_visa211_4.php";
          break;
        case 'visa211_4_edit':
          include "visa211_4_edit.php";
          break;
        case 'visa211_4_jadi':
          include "visa211_4_jadi.php";
          break;

        case 'tambah_visa312':
          include "tambah_visa312.php";
          break;
        case 'tambah_visa312_edit':
          include "tambah_visa312_edit.php";
          break;
        case 'visa312':
          include "visa312.php";
          break;
        case 'visa312_jadi':
          include "visa312_jadi.php";
          break;
        case 'visa312_edit':
          include "visa312_edit.php";
          break;

        case 'data_visa':
          include "data_visa.php";
          break;
        case 'riwayat_visa':
          include "riwayat_visa.php";
          break;
        case 'validasi312':
          include "validasi312.php";
          break;
        case 'validasi312_edit':
          include "validasi312_edit.php";
          break;
        case 'tambah_voa':
          include "tambah_voa.php";
          break;
        case 'voa_jadi':
          include "voa_jadi.php";
          break;
        case 'voa_edit':
          include "voa_edit.php";
          break;
        case 'tambah_visalain':
          include "tambah_visalain.php";
          break;
        case 'visalain_jadi':
          include "visalain_jadi.php";
          break;
        case 'visalain_edit':
          include "visalain_edit.php";
          break;
        case 'track':
          include "track.php";
          break;
      }
    } else {
      include "data.php";
    }


    ?>

  </div>
  <!-- Modal -->

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <script src="assets/js/Table-with-search.js"></script>
  <script src="assets/js/dataTables.bootstrap.min.js"></script>
  <script src="assets/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/tableo.js"></script>
</body>

</html>