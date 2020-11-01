
<?php
include("../system/connect.php");

session_start();

if (!isset($_SESSION['user'])) {
    echo '<script language="javascript">alert("Anda harus Login!"); document.location="../";</script>';
} else {
}


if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {

        case 'akun':
            $judul = "Kelola Akun";
            include "head.php";
            include "akun.php";
            include "foot.php";
            break;
        case 'pt':
            $judul = "Kelola PT";
            include "head.php";
            include "pt.php";
            include "foot.php";
            break;
        case 'detailpt':
            $judul = "Kelola PT";
            $id = $_GET['id'];
            include "head.php";
            include "detailpt.php";
            include "foot.php";
            break;
        case 'pic':
            $judul = "Kelola PIC";
            include "head.php";
            include "pic.php";
            include "foot.php";
            break;
        case 'tka':
            $judul = "Kelola TKA";
            include "head.php";
            include "tka.php";
            include "foot.php";
            break;
        case 'tkapt':
            $pt = $_GET['pt'];
            $judul = "Kelola TKA";
            include "head.php";
            include "tkapt.php";
            include "foot.php";
            break;
        case 'voucher':
            $judul = "Kelola Voucher";
            include "head.php";
            include "voucher.php";
            include "foot.php";
            break;
        case 'voucher_detail':
            $judul = "Kelola Voucher";
            $n = $pt = $_GET['n'];
            $id = $pt = $_GET['id'];
            include "head.php";
            include "voucher_detail.php";
            include "foot.php";
            break;
        case 'rptka':
            $judul = "Kelola RPTKA";
            include "head.php";
            include "rptka.php";
            include "foot.php";
            break;
        case 'rptkapt':
            $pt = $_GET['pt'];
            $judul = "Kelola RPTKA";
            include "head.php";
            include "rptkapt.php";
            include "foot.php";
            break;
        case 'rptkadetail':
            $id = $_GET['id'];
            $judul = "Kelola RPTKA";
            include "head.php";
            include "rptkadetail.php";
            include "foot.php";
            break;
        case 'visa211':
            $judul = "Kelola Visa 211";
            include "head.php";
            include "visa211.php";
            include "foot.php";
            break;
        case 'visa211pt':
            $judul = "Kelola Visa 211";
            $pt = $_GET['pt'];
            include "head.php";
            include "visa211pt.php";
            include "foot.php";
            break;
        case 'visa211_1':
            $judul = "Kelola Visa 211";
            include "head.php";
            include "visa211_1.php";
            include "foot.php";
            break;
        case 'visa211_1pt':
            $judul = "Kelola Visa 211";
            $pt = $_GET['pt'];
            include "head.php";
            include "visa211_1pt.php";
            include "foot.php";
            break;
        case 'visa211_2':
            $judul = "Kelola Visa 211";
            include "head.php";
            include "visa211_2.php";
            include "foot.php";
            break;
        case 'visa211_2pt':
            $judul = "Kelola Visa 211";
            $pt = $_GET['pt'];
            include "head.php";
            include "visa211_2pt.php";
            include "foot.php";
            break;
        case 'visa211_3':
            $judul = "Kelola Visa 211";
            include "head.php";
            include "visa211_3.php";
            include "foot.php";
            break;
        case 'visa211_3pt':
            $judul = "Kelola Visa 211";
            $pt = $_GET['pt'];
            include "head.php";
            include "visa211_3pt.php";
            include "foot.php";
            break;
        case 'visa211_4':
            $judul = "Kelola Visa 211";
            include "head.php";
            include "visa211_4.php";
            include "foot.php";
            break;
        case 'visa211_4pt':
            $judul = "Kelola Visa 211";
            $pt = $_GET['pt'];
            include "head.php";
            include "visa211_4pt.php";
            include "foot.php";
            break;
        case 'voa':
            $judul = "Kelola VOA";
            include "head.php";
            include "voa.php";
            include "foot.php";
            break;
        case 'voapt':
            $judul = "Kelola VOA";
            $pt = $_GET['pt'];
            include "head.php";
            include "voapt.php";
            include "foot.php";
            break;
        case 'visa312':
            $judul = "Kelola Visa 312";
            include "head.php";
            include "visa312.php";
            include "foot.php";
            break;
        case 'visa312pt':
            $judul = "Kelola Visa 312";
            $pt = $_GET['pt'];
            include "head.php";
            include "visa312pt.php";
            include "foot.php";
            break;
        case 'visa_lain':
            $judul = "Kelola Visa Lain";
            include "head.php";
            include "visa_lain.php";
            include "foot.php";
            break;
        case 'visa_lainpt':
            $judul = "Kelola Visa 312";
            $pt = $_GET['pt'];
            include "head.php";
            include "visa_lainpt.php";
            include "foot.php";
            break;
    }
} else {
    $judul = "Dashboard";
    include "head.php";
    include "dashboard.php";
    include "foot.php";
}


?>
