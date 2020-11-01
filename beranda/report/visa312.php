<div class="container" style="margin-top:101px;">
  <!-- <div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="What you looking for?">
  </div> -->

  <center>
    <h2> REPORT VISA 312 </h2>
  </center>

  <div class="row">
    <div class="btn-group dropright pull-right">
      <input type="text" class="search form-control" placeholder="What you looking for?">
      <button type="button" data-toggle="modal" data-target="#filter_visa312" aria-haspopup="true" aria-expanded="false" style="margin-left: 15px;">
        Filter
      </button>

    </div>

    <?php

    $hariini_var = 0;
    $satuminggu_var = 0;
    $duaminggu_var = 0;
    $tigaminggu_var = 0;
    $satubulan_var = 0;
    $expired_var = 0;

    $hari_ini = array();
    $satu_minggu = array();
    $dua_minggu = array();
    $tiga_minggu  = array();
    $satu_bulan = array();
    $expired = array();

    $today = new DateTime(date('y-m-d'));
    $today_hari = $today->format('d');
    $today_bulan = $today->format('m');
    $today_tahun = $today->format('y');

    $query = "SELECT * FROM visa312";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {

      $obj = new DateTime($row['exp_kitas']);
      $obj_tahun = $obj->format('y');
      $obj_bulan = $obj->format('m');
      $obj_hari = $obj->format('d');

      $selisih = $today->diff($obj);
      $selisih_tahun = $selisih->format('%y');
      $selisih_bulan = $selisih->format('%m');
      $selisih_hari = $selisih->format('%d');


      if ($today_tahun > $obj_tahun) {
        array_push($expired, $row['id']);
      } else if ($today_tahun == $obj_tahun) {
        if ($today_bulan > $obj_bulan) {
          array_push($expired, $row['id']);
        } else if ($today_bulan == $obj_bulan) {
          if ($today_hari > $obj_hari) {
            array_push($expired, $row['id']);
          } else if ($selisih_hari == 0) {
            array_push($hari_ini, $row['id']);
          } else if (($selisih_bulan == 0) && ($selisih_tahun == 0)) {
            if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
              array_push($satu_minggu, $row['id']);
            } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
              array_push($dua_minggu, $row['id']);
            } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
              array_push($tiga_minggu, $row['id']);
            }
          }
        } else if ($today_bulan < $obj_bulan) {
          if ($selisih_bulan == 1) {
            array_push($satu_bulan, $row['id']);
          } else if ($selisih_bulan == 0) {
            if (($selisih_hari > 0) && ($selisih_hari <= 7)) {
              array_push($satu_minggu, $row['id']);
            } else if (($selisih_hari > 7) && ($selisih_hari <= 14)) {
              array_push($dua_minggu, $row['id']);
            } else if (($selisih_hari > 14) && ($selisih_hari <= 30)) {
              array_push($tiga_minggu, $row['id']);
            }
          }
        }
      } else {
      }
    }

    $total = [];
    for ($l = 0; $l < count($hari_ini); $l++) {
      array_push($total, $hari_ini[$l]);
    }
    for ($l = 0; $l < count($satu_minggu); $l++) {
      array_push($total, $satu_minggu[$l]);
    }
    for ($l = 0; $l < count($dua_minggu); $l++) {
      array_push($total, $dua_minggu[$l]);
    }
    for ($l = 0; $l < count($tiga_minggu); $l++) {
      array_push($total, $tiga_minggu[$l]);
    }
    for ($l = 0; $l < count($satu_bulan); $l++) {
      array_push($total, $satu_bulan[$l]);
    }
    for ($l = 0; $l < count($expired); $l++) {
      array_push($total, $expired[$l]);
    }

    $jml_hariini = count($hari_ini);
    $jml_satuminggu = count($satu_minggu);
    $jml_duaminggu = count($dua_minggu);
    $jml_tigaminggu = count($tiga_minggu);
    $jml_satubulan = count($satu_bulan);
    $jml_expired = count($expired);
    $jml_total = $jml_hariini + $jml_satuminggu + $jml_duaminggu + $jml_tigaminggu + $jml_satubulan + $jml_expired;

    ?>

    <span class="counter pull-right"></span>
    <br>
    <div class="scrollable-table" style="margin-top:19px;">


      <table class="table table-hover table-bordered results">



        <thead class="thead-dark">
          <tr>
            <th>NO</th>
            <th>AKSI</th>
            <th>NAMA PT</th>
            <th colspan="2">NAMA</th>
            <th>NO PASSPORT</th>
            <th>JENIS VISA</th>
            <th>NO RPTKA</th>
            <th>JABATAN</th>
            <th>TANGGAL TERBIT VISA</th>
            <th>JANGKA WAKTU VISA (BULAN)</th>
            <th>NO KITAS</th>
            <th>EXPIRED KITAS</th>
            <th>NO NOTIFIKASI</th>
            <th>KETERANGAN</th>
          </tr>

        </thead>
        <tbody id="myTable">
          <?php
          if (isset($_POST['filter_pt'])) {
            $skala = $_POST['skala'];
            if (strlen($skala) == 0) {
          ?>
              <tr>
                <td colspan="14">total <?= $jml_total; ?> </td>
              </tr>
            <?php
              seluruh($total, $nama_user);
            } else if ($skala == "hari_ini") {
            ?>
              <tr>
                <td colspan="14">filter (hari ini) total <?= $jml_hariini; ?> </td>
              </tr>
            <?php
              seluruh($hari_ini, $nama_user);
            } else if ($skala == "satu_minggu") {
            ?>
              <tr>
                <td colspan="14">filter (satu minggu) total <?= $jml_satuminggu; ?> </td>
              </tr>
            <?php
              seluruh($satu_minggu, $nama_user);
            } else if ($skala == "dua_minggu") {
            ?>
              <tr>
                <td colspan="14">filter (dua minggu) total <?= $jml_duaminggu; ?> </td>
              </tr>
            <?php
              seluruh($dua_minggu, $nama_user);
            } else if ($skala == "tiga_minggu") {
            ?>
              <tr>
                <td colspan="14">filter (tiga minggu) total <?= $jml_tigaminggu; ?> </td>
              </tr>
            <?php
              seluruh($tiga_minggu, $nama_user);
            } else if ($skala == "satu_bulan") {
            ?>
              <tr>
                <td colspan="14">filter (satu bulan) total <?= $jml_satubulan; ?> </td>
              </tr>
            <?php
              seluruh($satu_bulan, $nama_user);
            } else if ($skala == "expired") {
            ?>
              <tr>
                <td colspan="14">filter (expired) total <?= $jml_expired; ?> </td>
              </tr>
            <?php
              seluruh($expired, $nama_user);
            }
          } else {
            ?>
            <tr>
              <td colspan="14">total <?= $jml_total; ?> </td>
            </tr>
          <?php
            seluruh($total, $nama_user);
          }
          ?>
        </tbody>

      </table>
    </div>
  </div>

  <!-- fungsi untuk menampilkan seluruh data -->
  <?php
  function seluruh($tanda, $nama_user)
  {
    include("../../system/connect.php");
    $nomor = 1;
    for ($i = 0; $i < count($tanda); $i++) {
      $query = "SELECT * FROM visa312 WHERE id = $tanda[$i]";
      $result = mysqli_query($connection, $query);
      while ($row_visa = mysqli_fetch_assoc($result)) {
        $passport_singgah = $row_visa['passport'];
        $query_data = "SELECT * FROM data WHERE passport = '$passport_singgah' ";
        $result_data = mysqli_query($connection, $query_data);
        while ($row_data = mysqli_fetch_assoc($result_data)) {
  ?>

          <tr>
            <td><?php echo $nomor;  ?></td>
            <td>
              <a href="../../system/visa312_berhenti.php?m=<?php echo $row_visa['id']; ?>&input=<?php echo $nama_user; ?>" class="badge badge-danger float-left ml-1" onclick="return confirm('Apakah Anda Yakin Akan Memberhentikan User Ini?');">Berhentikan</a>
            </td>
            <td><?php echo $row_data['nama_pt'];  ?></td>
            <td><?php echo $row_data['nama_mandarin'];  ?></td>
            <td><?php echo $row_data['nama_latin'];  ?></td>
            <td><?php echo $row_data['passport'];  ?></td>
            <td><?php echo $row_visa['visa']; ?></td>
            <td><?php echo $row_visa['no_rptka']; ?></td>
            <td><?php echo $row_visa['jabatan']; ?></td>
            <td><?php echo $row_visa['tgl_terbit']; ?></td>
            <td><?php echo $row_visa['jangka_visa']; ?></td>
            <td><?php echo $row_visa['no_imta']; ?></td>
            <td><?php echo $row_visa['exp_kitas']; ?></td>
            <td><?php echo $row_visa['notif']; ?></td>
            <td><?php echo $row_visa['ket']; ?></td>
            <?php
            $nomor++;
            ?>


          </tr>
  <?php }
      }
    }
  } ?>

  <!-- Filter by perusahaan -->
  <div class="modal fade" id="filter_visa312" role="dialog" style="width:100%">
    <div class="modal-dialog">


      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Cari Berdasarkan</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <form style="width:490px; margin-left:5px; margin-top:-50px;" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <div class="row">
                <label>Skala </label>
                <div><select name="skala" class="form-control" style="width:100%;">

                    <option selected></option>
                    <option value="hari_ini">Hari Ini</option>
                    <option value="satu_minggu">Satu Minggu</option>
                    <option value="dua_minggu">Dua Minggu</option>
                    <option value="tiga_minggu">Tiga Minggu</option>
                    <option value="satu_bulan">Satu Bulan</option>
                    <option value="expired">Expired</option>
                  </select>
                </div>
              </div>
              <br>



              <div class="modal-footer">
                <input type="submit" name="filter_pt" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;"> </div>
            </div>

        </form>
      </div>
    </div>
  </div>
</div>