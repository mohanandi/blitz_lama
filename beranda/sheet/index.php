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
    <title>Report Google Sheets</title>
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
    <nav id="navbar" class="">
        <div class="nav-wrapper">
            <!-- Navbar Logo -->
            <div class="logo">
                <!-- Logo Placeholder for Inlustration -->
                <a href="#home"><img src="assets/img/blitzland.jpg" style="width:145px;height:55px;margin-top:-5px;"></a>
            </div>

            <!-- Navbar Links -->
            <ul id="menu">
                <li><a href="../">Home</a></li>


                <li><a href="../data">Input Data TKA & Visa</a></li>
                <li><a href="../perusahaan">Data Perusahaan</a></li>
                <li><a href="../voucher">Input Voucher</a></li>


            </ul>

        </div>

    </nav>

    <div class="container">
        <div class="row">
            <iframe width="1200" height="800" src="https://datastudio.google.com/embed/reporting/914d9e95-a28c-40fc-8a03-ac101de9292a/page/i5BcB" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <br>
        <br> <br>
        <div class="row">
            <iframe width="1200" height="800" src="https://datastudio.google.com/embed/reporting/e534ad56-51a3-49c3-9cb0-972225d996b4/page/OiCcB" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
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