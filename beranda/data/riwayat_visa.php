<div class="container" style="margin-top:101px;">
  <center>
    <h2> RIWAYAT INPUT VISA </h2>
  </center>
  <?php
  if (isset($_GET['warning'])) {
  ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      Data Visa Berhasil <strong><?= $_GET['warning']; ?></strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php
    unset($_GET['warning']);
  }
  ?>
  <div class="box-tools pull-left">
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#filter">Filter</a>
  </div>
  <div class="form-group pull-right">

    <input type="text" class="search form-control" placeholder="What you looking for?">
  </div>
  <span class="counter pull-right"></span>
  <div class="scrollable-table">

    <table class="table table-hover table-bordered results">



      <thead class="thead-dark">
        <tr>
          <th style="text-align:center;">NO</th>
          <th style="text-align:center;">Aksi</th>
          <th style="text-align:center;">Nama PT</th>
          <th style="text-align:center;">Nama Mandarin</th>
          <th style="text-align:center;">Nama Latin</th>
          <th style="text-align:center;">Kewarganegaraan</th>
          <th style="text-align:center;">Passport</th>
          <th style="text-align:center;">Expired Passport</th>
          <th style="text-align:center;">Tanggal Lahir</th>
          <th style="text-align:center;">Jenis Proses(Visa)</th>
          <th style="text-align:center;">Tanggal Awal Visa</th>
          <th style="text-align:center;">Tanggal Akhir Visa</th>
        </tr>
        <tr class="warning no-result">
          <td colspan="10"><i class="fa fa-warning"></i> Tidak Ditemukan</td>
        </tr>
      </thead>
      <tbody>


        <!-- Awal Filter -->
        <?php
        if (isset($_POST['submit_filter'])) {
          $filter_by = $_POST['filter'];
          if ($filter_by == "voa") {
        ?>
            <tr>
              <td colspan=10 style="text-align : center">Riwayat VOA</td>
            </tr>
            <?php
            $query = "SELECT * FROM voa";
            $result = mysqli_query($connection, $query);

            if (!$result) {
              die("gak bisa");
            }
            $no = 0;
            while ($row = mysqli_fetch_array($result)) {
              $no++;
              $passport = $row['passport'];

              $data_tka = "SELECT * FROM data WHERE passport = '$passport'";
              $hasil = mysqli_query($connection, $data_tka);
              while ($data_tka = mysqli_fetch_array($hasil)) {
            ?>

                <tr>
                  <td><?php echo $no;  ?></td>
                  <td><a href="../data?page=voa_edit&passport=<?php echo $data_tka['passport']; ?>">Edit</a></td>
                  <td><?php echo $data_tka['nama_pt'];  ?></td>
                  <td><?php echo $data_tka['nama_mandarin'];  ?></td>
                  <td><?php echo $data_tka['nama_latin'];  ?> </td>
                  <td><?php echo $data_tka['kewarganegaraan'];  ?></td>
                  <td><?php echo $data_tka['passport'];  ?></td>
                  <td><?php echo $data_tka['expired_passport'];  ?></td>
                  <td><?php echo $data_tka['tgl_lahir'];  ?></td>
                  <td><?php echo $row['visa'];  ?></td>
                  <td><?php echo $row['start_visa'];  ?></td>
                  <td><?php echo $row['expired'];  ?></td>
                </tr>
            <?php }
            }
          } else if ($filter_by == "visa211") {
            ?>
            <tr>
              <td colspan=10 style="text-align : center">Riwayat Visa 211</td>
            </tr>
            <?php
            $query = "SELECT * FROM visa211";
            $result = mysqli_query($connection, $query);

            if (!$result) {
              die("gak bisa");
            }
            $no = 0;
            while ($row = mysqli_fetch_array($result)) {
              $no++;
              $passport = $row['passport'];

              $data_tka = "SELECT * FROM data WHERE passport = '$passport'";
              $hasil = mysqli_query($connection, $data_tka);
              while ($data_tka = mysqli_fetch_array($hasil)) {
            ?>

                <tr>
                  <td><?php echo $no;  ?></td>
                  <td><a href="../data?page=visa211_edit&passport=<?php echo $data_tka['passport']; ?>">Edit</a></td>
                  <td><?php echo $data_tka['nama_pt'];  ?></td>
                  <td><?php echo $data_tka['nama_mandarin'];  ?></td>
                  <td><?php echo $data_tka['nama_latin'];  ?></td>
                  <td><?php echo $data_tka['kewarganegaraan'];  ?></td>
                  <td><?php echo $data_tka['passport'];  ?></td>
                  <td><?php echo $data_tka['expired_passport'];  ?></td>
                  <td><?php echo $data_tka['tgl_lahir'];  ?></td>
                  <td><?php echo $row['visa'];  ?></td>
                  <td><?php echo $row['start_visa'];  ?></td>
                  <td><?php echo $row['expired'];  ?></td>
                </tr>
            <?php }
            }
          } else if ($filter_by == "visa211_1") {
            ?>
            <tr>
              <td colspan=10 style="text-align : center">Riwayat Visa 211-1</td>
            </tr>
            <?php
            $query = "SELECT * FROM visa211_1 ";
            $result = mysqli_query($connection, $query);

            if (!$result) {
              die("gak bisa");
            }
            $no = 0;
            while ($row = mysqli_fetch_array($result)) {
              $no++;
              $passport = $row['passport'];

              $data_tka = "SELECT * FROM data WHERE passport = '$passport'";
              $hasil = mysqli_query($connection, $data_tka);
              while ($data_tka = mysqli_fetch_array($hasil)) {
            ?>

                <tr>
                  <td><?php echo $no;  ?></td>
                  <td><a href="../data?page=visa211_1_edit&passport=<?php echo $data_tka['passport']; ?>">Edit</a></td>
                  <td><?php echo $data_tka['nama_pt'];  ?></td>
                  <td><?php echo $data_tka['nama_mandarin'];  ?></td>
                  <td><?php echo $data_tka['nama_latin'];  ?></td>
                  <td><?php echo $data_tka['kewarganegaraan'];  ?></td>
                  <td><?php echo $data_tka['passport'];  ?></td>
                  <td><?php echo $data_tka['expired_passport'];  ?></td>
                  <td><?php echo $data_tka['tgl_lahir'];  ?></td>
                  <td><?php echo $row['visa'];  ?></td>
                  <td><?php echo $row['start_visa'];  ?></td>
                  <td><?php echo $row['expired'];  ?></td>
                </tr>
            <?php }
            }
          } else if ($filter_by == "visa211_2") {
            ?>
            <tr>
              <td colspan=10 style="text-align : center">Riwayat Visa 211-2</td>
            </tr>
            <?php

            $query = "SELECT * FROM visa211_2 ";
            $result = mysqli_query($connection, $query);

            if (!$result) {
              die("gak bisa");
            }
            $no = 0;
            while ($row = mysqli_fetch_array($result)) {
              $no++;
              $passport = $row['passport'];

              $data_tka = "SELECT * FROM data WHERE passport = '$passport'";
              $hasil = mysqli_query($connection, $data_tka);
              while ($data_tka = mysqli_fetch_array($hasil)) {
            ?>

                <tr>
                  <td><?php echo $no;  ?></td>
                  <td><a href="../data?page=visa211_2_edit&passport=<?php echo $data_tka['passport']; ?>">Edit</a></td>
                  <td><?php echo $data_tka['nama_pt'];  ?></td>
                  <td><?php echo $data_tka['nama_mandarin'];  ?></td>
                  <td><?php echo $data_tka['nama_latin'];  ?> </td>
                  <td><?php echo $data_tka['kewarganegaraan'];  ?></td>
                  <td><?php echo $data_tka['passport'];  ?></td>
                  <td><?php echo $data_tka['expired_passport'];  ?></td>
                  <td><?php echo $data_tka['tgl_lahir'];  ?></td>
                  <td><?php echo $row['visa'];  ?></td>
                  <td><?php echo $row['start_visa'];  ?></td>
                  <td><?php echo $row['expired'];  ?></td>
                </tr>
            <?php }
            }
          } else if ($filter_by == "visa211_3") {
            ?>
            <tr>
              <td colspan=10 style="text-align : center">Riwayat Visa 211-3</td>
            </tr>
            <?php
            $query = "SELECT * FROM visa211_3 ";
            $result = mysqli_query($connection, $query);

            if (!$result) {
              die("gak bisa");
            }
            $no = 0;
            while ($row = mysqli_fetch_array($result)) {
              $no++;
              $passport = $row['passport'];

              $data_tka = "SELECT * FROM data WHERE passport = '$passport'";
              $hasil = mysqli_query($connection, $data_tka);
              while ($data_tka = mysqli_fetch_array($hasil)) {
            ?>

                <tr>
                  <td><?php echo $no;  ?></td>
                  <td>
                    <a href="../data?page=visa211_3_edit&passport=<?php echo $data_tka['passport']; ?>">Edit</a></td>
                  <td><?php echo $data_tka['nama_pt'];  ?></td>
                  <td><?php echo $data_tka['nama_mandarin'];  ?></td>
                  <td><?php echo $data_tka['nama_latin'];  ?></td>
                  <td><?php echo $data_tka['kewarganegaraan'];  ?></td>
                  <td><?php echo $data_tka['passport'];  ?></td>
                  <td><?php echo $data_tka['expired_passport'];  ?></td>
                  <td><?php echo $data_tka['tgl_lahir'];  ?></td>
                  <td><?php echo $row['visa'];  ?></td>
                  <td><?php echo $row['start_visa'];  ?></td>
                  <td><?php echo $row['expired'];  ?></td>
                </tr>
            <?php }
            }
          } else if ($filter_by == "visa211_4") {
            ?>
            <tr>
              <td colspan=10 style="text-align : center">Riwayat Visa 211-4</td>
            </tr>
            <?php
            $query = "SELECT * FROM visa211_4 ";
            $result = mysqli_query($connection, $query);

            if (!$result) {
              die("gak bisa");
            }
            $no = 0;
            while ($row = mysqli_fetch_array($result)) {
              $no++;
              $passport = $row['passport'];

              $data_tka = "SELECT * FROM data WHERE passport = '$passport'";
              $hasil = mysqli_query($connection, $data_tka);
              while ($data_tka = mysqli_fetch_array($hasil)) {
            ?>

                <tr>
                  <td><?php echo $no;  ?></td>
                  <td>
                    <a href="../../system/hapus_visa.php?visa=visa211_4&id=<?php echo $row['id']; ?>" class="badge badge-danger" confirm=("Apakah Anda Yakin Akan Menghapus Data Visa211-4 Ini ?")>Hapus</a>
                    <a href="../data?page=visa211_4_edit&passport=<?php echo $data_tka['passport']; ?>" class="badge badge-warning">Edit</a>
                  </td>
                  <td><?php echo $data_tka['nama_pt'];  ?></td>
                  <td><?php echo $data_tka['nama_mandarin'];  ?></td>
                  <td><?php echo $data_tka['nama_latin'];  ?></td>
                  <td><?php echo $data_tka['kewarganegaraan'];  ?></td>
                  <td><?php echo $data_tka['passport'];  ?></td>
                  <td><?php echo $data_tka['expired_passport'];  ?></td>
                  <td><?php echo $data_tka['tgl_lahir'];  ?></td>
                  <td><?php echo $row['visa'];  ?></td>
                  <td><?php echo $row['start_visa'];  ?></td>
                  <td><?php echo $row['expired'];  ?></td>
                </tr>
            <?php }
            }
          } else if ($filter_by == "visa312") {
            ?>
            <tr>
              <td colspan=10 style="text-align : center">Riwayat Visa 312</td>
            </tr>
            <?php

            $query = "SELECT * FROM visa312 ";
            $result = mysqli_query($connection, $query);

            if (!$result) {
              die("gak bisa");
            }
            $no = 0;
            while ($row = mysqli_fetch_array($result)) {
              $no++;
              $passport = $row['passport'];

              $data_tka = "SELECT * FROM data WHERE passport = '$passport'";
              $hasil = mysqli_query($connection, $data_tka);
              while ($data_tka = mysqli_fetch_array($hasil)) {
            ?>

                <tr>
                  <td><?php echo $no;  ?></td>
                  <td><a href="../data?page=visa312_edit&passport=<?php echo $data_tka['passport']; ?>">Edit</a></td>
                  <td><?php echo $data_tka['nama_pt'];  ?></td>
                  <td><?php echo $data_tka['nama_mandarin'];  ?></td>
                  <td><?php echo $data_tka['nama_latin'];  ?></td>
                  <td><?php echo $data_tka['kewarganegaraan'];  ?></td>
                  <td><?php echo $data_tka['passport'];  ?></td>
                  <td><?php echo $data_tka['expired_passport'];  ?></td>
                  <td><?php echo $data_tka['tgl_lahir'];  ?></td>
                  <td><?php echo $row['visa'];  ?></td>
                  <td><?php echo $row['tgl_terbit'];  ?></td>
                  <?php
                  $jangka_visa = $row['jangka_visa'];
                  $tgl_awal = $row['tgl_terbit'];
                  switch ($jangka_visa) {

                    case 1:
                      $expired = date('Y-m-d', strtotime('+1 month', strtotime($tgl_awal)));
                      break;
                    case 2:
                      $expired = date('Y-m-d', strtotime('+2 month', strtotime($tgl_awal)));
                      break;
                    case 3:
                      $expired = date('Y-m-d', strtotime('+3 month', strtotime($tgl_awal)));
                      break;
                    case 4:
                      $expired = date('Y-m-d', strtotime('+4 month', strtotime($tgl_awal)));
                      break;
                    case 5:
                      $expired = date('Y-m-d', strtotime('+5 month', strtotime($tgl_awal)));
                      break;
                    case 6:
                      $expired = date('Y-m-d', strtotime('+6 month', strtotime($tgl_awal)));
                      break;
                    case 7:
                      $expired = date('Y-m-d', strtotime('+7 month', strtotime($tgl_awal)));
                      break;
                    case 8:
                      $expired = date('Y-m-d', strtotime('+8 month', strtotime($tgl_awal)));
                      break;
                    case 9:
                      $expired = date('Y-m-d', strtotime('+9 month', strtotime($tgl_awal)));
                      break;
                    case 10:
                      $expired = date('Y-m-d', strtotime('+10 month', strtotime($tgl_awal)));
                      break;
                    case 11:
                      $expired = date('Y-m-d', strtotime('+11 month', strtotime($tgl_awal)));
                      break;
                    case 12:
                      $expired = date('Y-m-d', strtotime('+12 month', strtotime($tgl_awal)));
                      break;
                  }

                  ?>
                  <td><?php echo $expired;  ?></td>
                </tr>
            <?php }
            }
          } else if ($filter_by == "visalain") {
            ?>
            <tr>
              <td colspan=10 style="text-align : center">Riwayat Visa Lain</td>
            </tr>
            <?php
            $query = "SELECT * FROM visa_lain";
            $result = mysqli_query($connection, $query);

            if (!$result) {
              die("gak bisa");
            }
            $no = 0;
            while ($row = mysqli_fetch_array($result)) {
              $no++;
              $passport = $row['passport'];

              $data_tka = "SELECT * FROM data WHERE passport = '$passport'";
              $hasil = mysqli_query($connection, $data_tka);
              while ($data_tka = mysqli_fetch_array($hasil)) {
            ?>

                <tr>
                  <td><?php echo $no;  ?></td>
                  <td><a href="../data?page=visalain_edit&passport=<?php echo $data_tka['passport']; ?>">Edit</a></td>
                  <td><?php echo $data_tka['nama_pt'];  ?></td>
                  <td><?php echo $data_tka['nama_mandarin'];  ?></td>
                  <td><?php echo $data_tka['nama_latin'];  ?></td>
                  <td><?php echo $data_tka['kewarganegaraan'];  ?></td>
                  <td><?php echo $data_tka['passport'];  ?></td>
                  <td><?php echo $data_tka['expired_passport'];  ?></td>
                  <td><?php echo $data_tka['tgl_lahir'];  ?></td>
                  <td><?php echo $row['visa'];  ?></td>
                  <td><?php echo $row['start_visa'];  ?></td>
                  <td><?php echo $row['expired'];  ?></td>
                </tr>
            <?php }
            }
          } else {
            ?>
            <tr>
              <td colspan=11 style="text-align : center">Pilih Jenis visa</td>
            </tr>
          <?php
          }
        } else {
          ?>
          <tr>
            <td colspan=11 style="text-align : center">Pilih Jenis visa</td>
          </tr>
        <?php
        }
        ?>
        <!-- Filter by user/input_by -->
        <div class="modal fade" id="filter" role="dialog" style="width:100%">
          <div class="modal-dialog">


            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" style="text-align: center;">Cari Berdasarkan</h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>
              <form style="width:490px; margin-left:5px; margin-top:-50px;" method="POST">
                <div class="modal-body">
                  <div class="form-group">
                    <div class="row">
                      <label style="margin-top:-60px; margin-left: 20px;">Filter By </label>
                      <div><select name="filter" class="form-control" style="margin-top: -60px; margin-left: 20px; width: 370px;">


                          <option selected></option>
                          <option value="voa">VOA</option>
                          <option value="visa211">Visa 211</option>
                          <option value="visa211_1">Extend Visa 211-1</option>
                          <option value="visa211_2">Extend Visa 211-2</option>
                          <option value="visa211_3">Extend Visa 211-3</option>
                          <option value="visa211_4">Extend Visa 211-4</option>
                          <option value="visa312">Visa 312</option>
                          <option value="visalain">Visa Lain</option>


                        </select>
                      </div>
                    </div>
                    <br>



                    <div class="modal-footer">
                      <input type="submit" name="submit_filter" class="btn btn-primary btn-md" value="Cari" style="margin-left: -75px;"></div>
                  </div>

              </form>
            </div>
          </div>
        </div>
  </div>