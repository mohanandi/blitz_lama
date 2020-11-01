<!DOCTYPE html>
<html>

<?php include("../system/connect.php");
session_start();

if (!isset($_SESSION['user'])) {
  echo '<script language="javascript">alert("Anda harus Login!"); document.location="../";</script>';
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

<head><meta charset="gb18030">
  

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
  <link rel="stylesheet" href="assets/css/button.css">
  <link rel="stylesheet" href="assets/css/HeaderUsery.css">
  <link rel="stylesheet" href="assets/css/navbar.css">
  <link rel="stylesheet" href="assets/css/Pretty-Footer1.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/tables.css">
  <link rel="stylesheet" href="assets/css/Team.css">
  <link rel="stylesheet" href="assets/css/Usery.css">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/atas.png">
</head>


<body>
  <div class="container" style="margin-top:-49px; margin-left: 105px">
    <nav id="navbar" class="">
      <div class="nav-wrapper">
        <!-- Navbar Logo -->
        <div class="logo">
          <!-- Logo Placeholder for Inlustration -->
          <a href="#home"><img src="assets/img/blitzland.jpg" style="width:145px;height:57px;"></a>
        </div>

        <!-- Navbar Links -->
        <ul id="menu">
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li> <a href="#team">To Menu</a></li>
          <li><a href=" javascript:void(0);" style="color:blue;" data-toggle="pop" data-content='<a href="profile" align="center"><i class="fa fa-edit" style="margin-right:10px;"></i>Edit Profile</a><br> <hr> <a href="../system/logout.php" align="center" style="color:red;"><i class="fa fa-sign-out" style="margin-right:10px;"></i>Logout</a> '><i class="fa fa-user" style="margin-right:10px;"></i>Profile</a></li>
        </ul>

      </div>
    </nav>


  </div>


  <div class="header" id="top">
    <h1 class="main-heading" style="margin-top:40px;">
      <span class="main-heading-primary" style="margin-left:100px;">BLITZ</span>
      <span class="main-heading-secondary" style="margin-left:40px;">SELAMAT DATANG</span>
      <span class="main-heading-quotes" style="text-align:center;"><?php echo $nama_user; ?></span>
    </h1>

    <div class="main">




    </div>






  </div>

  <section class="content">
    <h4> EXPIRED SCHEDULE (1 MONTH) </h4>
    <br>

    <div id="show">



    </div>

  </section>









  </div>
  <div class="headery">
    <h1 class="main-headingy">

      <span class="main-heading-secondary" style="font-size:20px; margin-bottom:350px; letter-spacing:30px;"> "Keep Smiling, because life is a beautiful thing and there's so much to smile about" </span>
      <span class="main-heading-secondary" style="font-size:20px; margin-bottom:500px; letter-spacing:5px;"> "Keep Smiling, because life is a beautiful thing and there's so much to smile about"</span>

    </h1>







  </div>


  <div class="container-fluid" style="margin-top:-80px;background-color:rgba(255,255,255,0.14);width:100%;height:379px;">
    <section id="team" class="bg-light-gray">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Menu</h2>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-6">
            <div class="team-member"><a href="data"><img class="rounded-circle img-fluid" src="assets/img/id.png" /></a>
              <h4>Visa Kerja</h4>
              <p href="#" data-toggle="popover" title="Buat Voucher" data-content="Buat visa disini, semua jenis visa anda bisa buat disini">Info</p>

            </div>
          </div>
          <div class="col-sm-6">
            <div class="team-member"><a href="perusahaan"><img class="rounded-circle img-fluid" src="assets/img/comp.png" /></a>
              <h4>Data Perusahaan</h4>
              <p href="#" data-toggle="popover" title="Data Perusahaan" data-content="Disini kalian dapat menemukan data dari perusahaan">Info</p>

            </div>
          </div>
          <div class="col-sm-6">
            <div class="team-member"><a href="voucher"><img class="rounded-circle img-fluid" src="assets/img/vouc.png" /></a>
              <h4>Buat Voucher</h4>
              <p href="#" data-toggle="popover" title="Buat Voucher" data-content="Ini adalah tempat kalian membuat voucher">Info</p>

            </div>

          </div>
          <div class="col-sm-6">
            <div class="team-member"><a href="sheet"><img class="rounded-circle img-fluid" src="assets/img/b.png" /></a>
              <h4>Data Dari Google Sheet</h4>
              <p href="#" data-toggle="popover" title="Buat Voucher" data-content="Ini adalah tempat kalian membuat voucher">Info</p>

            </div>

          </div>

        </div>
        <div class="row">
          <div class="col-lg-8 offset-lg-2 text-center">

          </div>
        </div>
      </div>
    </section>
    <footer>
      <div class="row">
        <div class="col-sm-6 col-md-4 footer-navigation">
          <a href="#home"><img src="assets/img/bwblitz.jpg" style="width:190px;height:145px;margin-top:-50px;"></a>
          <p class="links"><a href="#">Home</a><strong>·</strong><a href="#">About</a><strong>·</strong><a href="#top">Back To Top</a></p>
          <p class="company-name">Company Name © 2019</p>
        </div>
        <div class="col-sm-6 col-md-4 footer-contacts">
          <div><span class="fa fa-map-marker footer-contacts-icon"></span>
            <p><span class="new-line-span">LOCATION</span>LOCATION, LOCATION</p>
          </div>
          <div><i class="fa fa-phone footer-contacts-icon"></i>
            <p class="footer-center-info email text-left">082828282018282</p>
          </div>
          <div><i class="fa fa-envelope footer-contacts-icon"></i>
            <p><a href="#" target="_blank">email@company.com</a></p>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-4 footer-about">
          <h4>About the company</h4>
          <p>Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.</p>
          <div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-github"></i></a></div>
        </div>
      </div>
    </footer>
  </div>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.6/angular.min.js"></script>
  <script src="assets/js/scroll.js"></script>
  <script src="assets/js/tables.js"></script>
  <script>
    $(document).ready(function() {

      $("a").on('click', function(event) {


        if (this.hash !== "") {

          event.preventDefault();


          var hash = this.hash;


          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function() {


            window.location.hash = hash;
          });
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('[data-toggle="popover"]').popover({
        placement: 'top',
        trigger: 'hover'
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('[data-toggle="pop"]').popover({
        html: true,
        placement: 'top',
        trigger: 'click'
      });
      $('#show').load('tgl_expire.php');
    });
  </script>
</body>

</html>