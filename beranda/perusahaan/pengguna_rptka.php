<div class="container" style="margin-top:101px;">
  <center>
    <h2> Detail Pengguna RPTKA </h2>
    <br>
    <h2><?php echo $nama_pt; ?></h2>
  </center>
  <br>
  <?php
  $no_rptka = $_GET['no_rptka'];
  $jumlah_rptka = $_GET['jumlah_rptka'];
  $array_passport = [];
  $cek = "SELECT * FROM visa312 WHERE no_rptka = '$no_rptka' && nama_pt = '$nama_pt' ";
  $hasil = mysqli_query($connection, $cek);
  if (!$hasil) {
    die("gak bisa");
  }
  while ($row = mysqli_fetch_array($hasil)) {
    array_push($array_passport, $row['passport']);
  }
  $hitung = count($array_passport);
  ?>
  <table id="tab" class="table table-hover table-bordered" style="width:20%; margin-left: 6%;">
    <thead class="thead-dark">
      <tr>
        <th> Nama Perusahaan </th>
        <td><?php echo $nama_pt; ?></td>
      </tr>
    </thead>



  </table>
  <div class="form-group pull-right" style="width:35%;">
    <input type="text" class="search form-control" placeholder="What you looking for?">
  </div>

  <span class="counter pull-right"></span>
  <div class="scrollable-table col-md-11" style="margin-left: 5%; background-color: #f5f5f5;">

    <table class="table table-hover table-bordered results" style="margin-right: 20%;">
      <thead class="thead-dark">
        <tr>
          <th style="text-align:center;">NO</th>
          <th style="text-align:center;">STATUS</th>
          <th style="text-align:center;">NAMA MANDARIN</th>
          <th style="text-align:center;">NAMA LATIN</th>
          <th style="text-align:center;">KEWARGANEGARAAN</th>
          <th style="text-align:center;">NO PASSPORT</th>
          <th style="text-align:center;">EXPIRED PASSPORT</th>
          <th style="text-align:center;">JENIS VISA</th>
          <th style="text-align:center;">JABATAN</th>
          <th style="text-align:center;">JANGKA WAKTU (BULAN)</th>
          <th style="text-align:center;">TANGGAL TERBIT VISA</th>
          <th style="text-align:center;">NO KITAS</th>
          <th style="text-align:center;">EXPIRED KITAS</th>
          <th style="text-align:center;">NO NOTIFIKASI</th>
          <th style="text-align:center;">KETERANGAN</th>

        </tr>

      </thead>
      <tbody>
        <?php

        //untuk status aktif

        $array_jabatan = [];
        $no = 0;
        for ($x = 0; $x < $hitung; $x++) {
          $no++;
          $cek = "SELECT * FROM data WHERE passport = '$array_passport[$x]' ";
          $hasil = mysqli_query($connection, $cek);
          $row_data = mysqli_fetch_array($hasil);
          $cek_imta = "SELECT * FROM visa312 WHERE passport = '$array_passport[$x]' AND nama_pt = '$nama_pt' ";
          $hasil_imta = mysqli_query($connection, $cek_imta);
          $row_imta = mysqli_fetch_array($hasil_imta);
          array_push($array_jabatan, $row_imta['jabatan']);
        ?>
          <tr>
            <td style="background-color: white;"><?php echo $no; ?></td>
            <td style="background-color: white; text-align: center;">
              <span class="badge badge-pill badge-primary">Aktif</span>
            </td>
            <td style="background-color: white; text-align: center;"><?php echo $row_data['nama_mandarin']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_data['nama_latin']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_data['kewarganegaraan']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_data['passport']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_data['expired_passport']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_imta['visa']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_imta['jabatan']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_imta['jangka_visa']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_imta['tgl_terbit']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_imta['no_imta']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_imta['exp_kitas']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_imta['notif']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_imta['ket']; ?></td>


          </tr>
        <?php
        }
        ?>

        <!-- UNTUK NON-AKTIF -->
        <?php
        $array_passport_non = [];
        $cek = "SELECT * FROM riwayat_visa312 WHERE no_rptka = '$no_rptka' && nama_pt = '$nama_pt' ";
        $hasil = mysqli_query($connection, $cek);
        if (!$hasil) {
          die("gak bisa");
        }
        while ($row = mysqli_fetch_array($hasil)) {
          array_push($array_passport_non, $row['passport']);
        }
        $hitung = count($array_passport_non);


        for ($x = 0; $x < $hitung; $x++) {
          $no++;
          $cek = "SELECT * FROM riwayat_data WHERE passport = '$array_passport_non[$x]' ";
          $hasil = mysqli_query($connection, $cek);
          $row_data = mysqli_fetch_array($hasil);
          $cek_imta = "SELECT * FROM riwayat_visa312 WHERE passport = '$array_passport_non[$x]' AND nama_pt = '$nama_pt' ";
          $hasil_imta = mysqli_query($connection, $cek_imta);
          $row_imta = mysqli_fetch_array($hasil_imta);
          array_push($array_jabatan, $row_imta['jabatan']);
        ?>
          <tr>
            <td style="background-color: white;"><?php echo $no; ?></td>
            <td>
              <p class="badge badge-pill badge-danger">NON-Aktif</p>
            </td>
            <td style="background-color: white; text-align: center;"><?php echo $row_data['nama_mandarin']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_data['nama_latin']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_data['kewarganegaraan']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_data['passport']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_data['expired_passport']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_imta['visa']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_imta['jabatan']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_imta['jangka_visa']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_imta['tgl_terbit']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_imta['no_imta']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_imta['exp_kitas']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_imta['notif']; ?></td>
            <td style="background-color: white; text-align: center;"><?php echo $row_imta['ket']; ?></td>


          </tr>
        <?php
        }
        ?>

      </tbody>

    </table>
  </div>

  <table id="tab" class="table table-hover table-bordered" style="width:30%;margin-top:50px; margin-left: 7%;">
    <thead class="thead-dark">
      <tr style="text-align:center;">
        <th style="text-align:center;">Jabatan</th>
        <th style="text-align:center;">Jumlah</th>
        <th style="text-align:center;">Terpakai</th>
        <th style="text-align:center;">Sisa</th>

      </tr>

    </thead>

    <tbody>
      <?php
      $trpki = 0;
      $jbt = "SELECT * FROM jabatan_rptka WHERE nama_pt = '$nama_pt' && no_rptka = '$no_rptka' ";
      $hasil = mysqli_query($connection, $jbt);
      while ($row = mysqli_fetch_array($hasil)) {

      ?>
        <tr>
          <th text-align: center;><?php echo $row['jabatan']; ?></th>
          <td text-align: center;><?php echo $row['jumlah']; ?></td>
          <td text-align: center;><?php echo $row['terpakai'];
                                  $trpki += $row['terpakai']; ?></td>
          <td text-align: center;><?php echo $row['jumlah'] - $row['terpakai']; ?></td>
        </tr>
      <?php
      } ?>
    </tbody>
    <table id="tab" class="table table-hover table-bordered" style=" margin-left: 7%;width:30%;margin-top:50px;">
      <thead class="thead-dark">
        <tr>
          <th style="width: 40% !important; text-align: center;"> Total </th>
          <td style="width: 20% !important; text-align: center;"><?php echo "$jumlah_rptka"; ?></td>
          <td style="width: 20% !important; text-align: center;"><?php echo "$trpki"; ?></td>
          <td style="width: 20% !important; text-align: center;"><?php echo $jumlah_rptka - $trpki; ?></td>
        </tr>
        <tr>
          <th>Export Excel</th>
          <td colspan="3"><button><a href="export_rptka.php?no_rptka=<?php echo $no_rptka; ?>&nama_pt=<?php echo $nama_pt; ?>&jumlah_rptka=<?php echo $jumlah_rptka; ?>">Export</a></button></td>
        </tr>
      </thead>
    </table>

  </table>
</div>