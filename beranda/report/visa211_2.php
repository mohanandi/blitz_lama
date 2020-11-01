<div class="container" style="margin-top:101px;">
  <!-- <div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="What you looking for?">
  </div> -->

  <center>
    <h2> REPORT EXTEND VISA211-2 </h2>
  </center>

  <div class="row">
    <div class="btn-group dropright pull-right">
      <input type="text" class="search form-control" placeholder="What you looking for?">
      <button type="button" data-toggle="modal" data-target="#filter_visa211" aria-haspopup="true" aria-expanded="false" style="margin-left: 15px;">
        Filter
      </button>

    </div>

    <?php

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

    $query = "SELECT * FROM visa211_2";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
      $singgah_passport = $row['passport'];
      $visa_lanjut = "SELECT * FROM visa211_3 WHERE passport = '$singgah_passport'";
      $query_lanjut = mysqli_query($connection, $visa_lanjut);
      if (mysqli_num_rows($query_lanjut) == 0) {
        $obj = new DateTime($row['expired']);
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

    ?>

    <span class="counter pull-right"></span>
    <br>
    <div class="scrollable-table" style="margin-top:19px;">


      <table class="table table-hover table-bordered results">



        <thead class="thead-dark">
          <tr>
            <th width="50px">NO</th>
            <th>AKSI</th>
            <th>NAMA PT</th>
            <th colspan="2">NAMA</th>
            <th>PASSPORT</th>
            <th>VISA</th>
            <th>AWAL VISA</th>
            <th>EXPIRED</th>

          </tr>

        </thead>
        <tbody id="myTable">
          <?php
          if (isset($_POST['filter_pt'])) {
            $skala = $_POST['skala'];
            if (strlen($skala) == 0) {
              seluruh($total, $nama_user);
            } else if ($skala == "hari_ini") {
              seluruh($hari_ini, $nama_user);
            } else if ($skala == "satu_minggu") {
              seluruh($satu_minggu, $nama_user);
            } else if ($skala == "dua_minggu") {
              seluruh($dua_minggu, $nama_user);
            } else if ($skala == "tiga_minggu") {
              seluruh($tiga_minggu, $nama_user);
            } else if ($skala == "satu_bulan") {
              seluruh($satu_bulan, $nama_user);
            } else if ($skala == "expired") {
              seluruh($expired, $nama_user);
            }
          } else {
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
      $query = "SELECT * FROM visa211_2 WHERE id = $tanda[$i]";
      $result = mysqli_query($connection, $query);

      if (!$result) {
        die("gak bisa");
      }

      $row = mysqli_fetch_array($result);
      $passport = $row['passport'];
      $pt_singgah = $row['nama_pt'];
      $query_person = "SELECT * FROM data WHERE nama_pt='$pt_singgah' AND passport='$passport' ";
      $sql_person = mysqli_query($connection, $query_person);
      $row_person = mysqli_fetch_array($sql_person);
  ?>

      <tr>
        <td><?php echo $nomor;  ?></td>
        <?php
        $visa211_1 = "SELECT * FROM visa211_3 WHERE passport = '$passport' ";
        $query_visa211_1 = mysqli_query($connection, $visa211_1);
        $row_visa211_1 = mysqli_fetch_array($query_visa211_1);
        if (mysqli_num_rows($query_visa211_1) == 0) {
        ?>
          <td>
            <a href="../../system/visa211_2_berhenti.php?m=<?php echo $row['id']; ?>&input=<?php echo $nama_user; ?>" class="badge badge-danger float-left ml-1" onclick="return confirm('Apakah Anda Yakin Akan Memberhentikan User Ini?');">Berhentikan</a>
            <a href="../data?passport=<?php echo $row['passport']; ?>&page=tambah_visa211_3" class="badge badge-danger float-left ml-1" onclick="return confirm('Apakah Anda Yakin Akan Extend Visa 211-3 TKA Ini?');">Perpanjang Visa211-3</a>
          </td>
          <td><?php echo $row['nama_pt'];  ?></td>
          <td><?php echo $row_person['nama_mandarin'];  ?></td>
          <td><?php echo $row_person['nama_latin'];  ?></td>
          <td><?php echo $row['passport'];  ?></td>
          <td><?php echo $row['visa']; ?></td>
          <td><?php echo $row['start_visa'];  ?></td>
          <td><?php echo $row['expired'];  ?></td>
        <?php
        } else {
        }
        $nomor++;
        ?>


      </tr>
  <?php }
  } ?>

  <!-- Filter by perusahaan -->
  <div class="modal fade" id="filter_visa211" role="dialog" style="width:100%">
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