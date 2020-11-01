<?php

$passport = $_GET['passport'];


$query = "SELECT * FROM data WHERE passport = '$passport' ";
$result = mysqli_query($connection, $query);

if (!$result) {
  die("gak bisa");
}

$row = mysqli_fetch_array($result);
$nama_pt = $row['nama_pt'];
$query = "SELECT * FROM perusahaan WHERE nama_pt = '$nama_pt' ";
$result = mysqli_query($connection, $query);

if (!$result) {
  die("gak bisa");
}
$s = mysqli_fetch_array($result);
?>

<div class="container" style="margin-top:101px;">
  <center>
    <h2> Record VISA 312 <?php echo $row['nama_latin']; ?> </h2>
  </center>
  <hr class="colorgraph">

  <center>
    <table id="tab" class="table table-hover table-bordered" style="width:50%;">
      <tr>
        <th> Nama Perusahaan </th>
        <td> <?php echo $s['nama_pt']; ?> </td>
      </tr>
      <tr>
        <th> Nama Client </th>
        <td><?php echo $s['nama_client']; ?></td>
      </tr>

    </table>
  </center>
  <h3>
    <center>Data TKA</center>
  </h3>
  <span class="counter pull-right"></span>
  <div class="scrollable-table">

    <table class="table table-hover table-bordered results">
      <thead>
        <tr>
          <th style="text-align:center;">Nama Mandarin</th>
          <th style="text-align:center;">Nama Latin</th>
          <th style="text-align:center;">Kewarganegaraan</th>
          <th style="text-align:center;">Passport</th>
          <th style="text-align:center;">Expired Passport</th>
          <th style="text-align:center;">Tanggal Lahir</th>
        </tr>

      </thead>
      <tbody>
        <tr>
          <td><?php echo $row['nama_mandarin'];  ?></td>
          <td><?php echo $row['nama_latin'];  ?></td>
          <td><?php echo $row['kewarganegaraan'];  ?></td>
          <td><?php echo $row['passport'];  ?></td>
          <td><?php echo $row['expired_passport'];  ?></td>
          <td><?php echo $row['tgl_lahir'];  ?></td>



        </tr>

      </tbody>

    </table>
  </div>


  <h3>
    <center>Data Visa312</center>
  </h3>
  <?php
  $sql = "SELECT * FROM visa312 WHERE passport = '$passport' ";
  $hasil = mysqli_query($connection, $sql);
  $visa = mysqli_fetch_array($hasil);
  ?>
  <div class="scrollable-table">

    <table class="table table-hover table-bordered results">
      <thead>
        <tr>
          <th style="text-align:center;">Jenis Visa</th>
          <th style="text-align:center;">No RPTKA</th>
          <th style="text-align:center;">Jabatan</th>
          <th style="text-align:center;">Tanggal Terbit Visa</th>
          <th style="text-align:center;">Jangka Waktu Visa(Bulan)</th>
          <th style="text-align:center;">No KITAS</th>
          <th style="text-align:center;">EXPIRED KITAS</th>
          <th style="text-align:center;">No Notifikasi</th>
          <th style="text-align:center;">Keterangan</th>
        </tr>

      </thead>
      <tbody>
        <tr>
          <td><?php echo $visa['visa']; ?></td>
          <td><?php echo $visa['no_rptka']; ?></td>
          <td><?php echo $visa['jabatan'] ?></td>
          <td><?php echo $visa['tgl_terbit'] ?></td>
          <td><?php echo $visa['jangka_visa'] ?></td>
          <td><?php echo $visa['no_imta'] ?></td>
          <td><?php echo $visa['exp_kitas'] ?></td>
          <td><?php echo $visa['notif'] ?></td>
          <td><?php echo $visa['ket'] ?></td>



        </tr>

      </tbody>

    </table>
  </div>



  <table class="table table-hover table-bordered results">
    <thead>
      <tr>
        <th style="text-align:center;"><a href="../data?page=visa312_edit&passport=<?php echo $passport; ?>">Edit</a></th>

      </tr>

    </thead>
    <tbody>

    </tbody>

  </table>

</div>