<div class="container" style="margin-top:101px;">
  <!-- <div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="What you looking for?">
  </div> -->

  <center>
    <h2> Report RPTKA</h2>
  </center>

  <div class="row">
    <div class="btn-group dropright pull-right">
      <input type="text" class="search form-control" placeholder="What you looking for?">
      <button type="button" data-toggle="modal" data-target="#filter_pt" aria-haspopup="true" aria-expanded="false" style="margin-left: 15px;">
        Filter
      </button>

      <div class="col-xs-12 col-md-12"><input type="submit" value="" class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#filter_pt"></div>


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

    $query = "SELECT * FROM rptka";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {

      $obj = new DateTime($row['tgl_habis']);
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
    ?>

    <span class="counter pull-right"></span>
    <br>
    <div class="scrollable-table" style="margin-top:19px;">


      <table class="table table-hover table-bordered results">



        <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Name PT</th>
            <th>No RPTKA</th>
            <th>Tanggal Habis</th>
            <th>Jumlah RPTKA</th>
            <th>RPTKA Pakai</th>
            <th>RPTKA Sisa</th>
            <th>Keterangan</th>

          </tr>

        </thead>
        <tbody id="myTable">
          <?php
          if (isset($_POST['filter_pt'])) {
            $skala = $_POST['skala'];
            if (strlen($skala) == 0) {
              seluruh($hari_ini);
              seluruh($satu_minggu);
              seluruh($dua_minggu);
              seluruh($tiga_minggu);
              seluruh($satu_bulan);
              seluruh($expired);
            } else if ($skala == "hari_ini") {
              seluruh($hari_ini);
            } else if ($skala == "satu_minggu") {
              seluruh($satu_minggu);
            } else if ($skala == "dua_minggu") {
              seluruh($dua_minggu);
            } else if ($skala == "tiga_minggu") {
              seluruh($tiga_minggu);
            } else if ($skala == "satu_bulan") {
              seluruh($satu_bulan);
            } else if ($skala == "expired") {
              seluruh($expired);
            }
          } else {
            seluruh($hari_ini);
            seluruh($satu_minggu);
            seluruh($dua_minggu);
            seluruh($tiga_minggu);
            seluruh($satu_bulan);
            seluruh($expired);
          }
          ?>
        </tbody>

      </table>
    </div>
  </div>

  <!-- fungsi untuk menampilkan seluruh data -->
  <?php
  function seluruh($tanda)
  {
    include("../../system/connect.php");
    for ($i = 0; $i < count($tanda); $i++) {
      $query = "SELECT * FROM rptka where id = $tanda[$i]";
      $result = mysqli_query($connection, $query);

      if (!$result) {
        die("gak bisa");
      }

      $row = mysqli_fetch_array($result);
  ?>

      <tr>
        <td><?php echo $i + 1;  ?></td>
        <td>
          <a href="../../system/rptka_berhenti.php?m=<?php echo $row['id']; ?>&input=<?php echo $row['input_by']; ?>" class="badge badge-danger float-left ml-1" onclick="return confirm('Apakah Anda Yakin Akan Memberhentikan User Ini?');">Berhentikan</a>
        </td>
        <td><?php echo $row['nama_pt'];  ?></td>
        <td><?php echo $row['no_rptka'];  ?></td>
        <td><?php echo $row['tgl_habis']; ?></td>
        <td><?php echo $row['jumlah_rptka'];  ?></td>
        <td><?php echo $row['rptka_pakai'];  ?></td>
        <td><?php echo $row['rptka_sisa'];  ?></td>
        <td><?php echo $row['ket'];  ?></td>
      </tr>
  <?php }
  } ?>

  <!-- fungsi untuk menampilkan seluruh data -->
  <?php
  function filtering($point, $filter)
  {
    include("../../system/connect.php");
    $query = "SELECT * FROM data WHERE $point='$filter' ";
    $result = mysqli_query($connection, $query);

    if (!$result) {
      die("gak bisa");
    }
    $no = 0;
    while ($row = mysqli_fetch_array($result)) {;
      $no++;
  ?>

      <tr>
        <td><?php echo $no;  ?></td>
        <td><?php echo $row['nama_pt'];  ?></td>
        <td><?php echo $row['nama_mandarin'];  ?></td>
        <td><a href="../data?page=data_edit&passport=<?php echo $row['passport']; ?>"><?php echo $row['nama_latin'];  ?></a></td>
        <td><?php echo $row['kewarganegaraan'];  ?></td>
        <td><?php echo $row['passport'];  ?></td>
        <td><?php echo $row['expired_passport'];  ?></td>
        <td><?php echo $row['tgl_lahir'];  ?></td>
        <td><?php echo $row['ket'];  ?></td>
      </tr>
  <?php }
  } ?>



  <!-- Filter by perusahaan -->
  <div class="modal fade" id="filter_pt" role="dialog" style="width:100%">
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