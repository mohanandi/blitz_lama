<div class="row">
  <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <form role="form" method="post">
      <h2>Data TKA</h2>
      <hr class="colorgraph">



      <div class="row">

        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
            <label><strong> Nama Perusahaan </strong> </label>

            <input list="pt_list" name="nama_pt" class="form-control" placeholder="Pilih Nama PT" required>
            <?php


            $query = "SELECT * FROM perusahaan";
            $result = mysqli_query($connection, $query);

            if (!$result) {
              die("gak bisa");
            }

            ?>

            <datalist id="pt_list">
              <?php while ($row = mysqli_fetch_array($result)) {; ?>
                <option><?php echo $row['nama_pt']; ?></option>
              <?php } ?>
            </datalist>



          </div>

        </div>

      </div>




      <div class="row">
        <div class="btn-group dropright">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 15px;">
            Pilih Jenis Visa
          </button>
          <div class="dropdown-menu">

            <div class="col-xs-12 col-md-12"><input type="submit" value="Visa Kerja" name="visa_kerja" class="btn btn-link" tabindex="7" style="color: black;"></div>
            <div class="col-xs-12 col-md-12"><input type="submit" value="Visa 211" name="visa_kunjungan" class="btn btn-link" tabindex="7" style="color: black;"></div>
            <div class="col-xs-12 col-md-12"><input type="submit" value="Perpanjang Visa 211 Pertama" name="visa_pertama" class="btn btn-link" tabindex="7" style="color: black;"></div>
            <div class="col-xs-12 col-md-12"><input type="submit" value="Perpanjang Visa 211 Kedua" name="visa_kedua" class="btn btn-link" tabindex="7" style="color: black;"></div>
            <div class="col-xs-12 col-md-12"><input type="submit" value="Perpanjang Visa 211 Ketiga" name="visa_ketiga" class="btn btn-link" tabindex="7" style="color: black;"></div>
            <div class="col-xs-12 col-md-12"><input type="submit" value="Perpanjang Visa 211 Keempat" name="visa_keempat" class="btn btn-link" tabindex="7" style="color: black;"></div>
            <div class="col-xs-12 col-md-12"><input type="submit" value="Voa" name="voa" class="btn btn-link" tabindex="7" style="color: black;"></div>
            <div class="col-xs-12 col-md-12"><input type="submit" value="Visa Lain" name="visa_lain" class="btn btn-link" tabindex="7" style="color: black;"></div>

          </div>
        </div>

    </form>
  </div>
</div>
<br><br>

<?php
if (isset($_POST['visa_lain'])) {
  $tgl_input = date('Y-m-d');
  $nama_pt = $_POST['nama_pt'];
  $no = 0;


?>


  <div class="container" style="margin-top:101px; margin-left: 20px;">
    <center>
      <h2 style="text-align: center;"> Data Untuk Visa Lain <br> <?php echo $nama_pt; ?> </h2>
    </center>

    <br>

    <div class="form-group ">
      <div class="input-group">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit" style="margin-right:10px;">Masukan</button>
        </span>
        <br>
        <input type="text" class="search form-control" style="width: 50%;" placeholder="What you looking for?">
      </div>
      <br>
      <span class="counter"></span>
      <div class="scrollable-table">

        <table id="example" class="table table-hover table-bordered results row-border order-column display">
          <form method="post" action="index.php?page=input_voucher" onsubmit="return empty()">
            <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
            <input type="hidden" class="form-control" name="visa" value="visa_lain">
            <input type="hidden" class="form-control" name="visa_pilih" value="Visa Lain">
            <thead class="thead-dark">

              <tr>
                <th style="max-width: 20px; text-align: center;">Pilih</th>
                <th style="text-align: center;">Nama Latin</th>
                <th style="text-align: center;">Nomor Paspor</th>
                <th style="text-align: center;">Nama Mandarin</th>
              </tr>

            </thead>

            <tbody>
              <?php

              $data_tka = "SELECT * FROM data WHERE nama_pt='$nama_pt' AND visa_lain=0";
              $sql = mysqli_query($connection, $data_tka);
              while ($dat = mysqli_fetch_assoc($sql)) {

                $passport = $dat['passport'];

                $sql_verif = "SELECT * FROM visa_lain WHERE passport='$passport'";
                $hasil = mysqli_query($connection, $sql_verif);

                if (mysqli_num_rows($hasil) == 0) {
                  $no++;


              ?>
                  <tr>
                    <td style="text-align: center;">
                      <input type="checkbox" name="data[]" id="data[]" value="<?php echo $dat['passport']; ?>">
                    </td>
                    <td style="text-align: center;">
                      <?php echo $dat['nama_latin']; ?>
                    </td>

                    <td style="text-align: center;">
                      <?php echo $dat['passport']; ?>
                    </td>
                    <td style="text-align: center;">
                      <?php echo $dat['nama_mandarin']; ?>
                    </td>



                  </tr>
                <?php } else {
                }
              }

              if ($no == 0) {
              } else {
                ?>
                <td>
                  <input type="submit" value="Masukan" name="submit" class="btn btn-primary btn-block btn-lg" style="height:40px;">
                </td>
              <?php }
              ?>
            </tbody>

          </form>
        </table>
      </div>
    </div>
  <?php } else if (isset($_POST['voa'])) {
  $tgl_input = date('Y-m-d');
  $nama_pt = $_POST['nama_pt'];
  $no = 0;


  ?>


    <div class="container" style="margin-top:101px; margin-left: 20px;">
      <h2 style="text-align: center;"> Data Untuk VOA <br> <?php echo $nama_pt; ?> </h2>

      <br>

      <div class="form-group ">
        <div class="input-group">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit" style="margin-right:10px;">Masukan</button>
          </span>
          <br>
          <input type="text" class="search form-control" style="width: 50%;" placeholder="What you looking for?">
        </div>
        <br>
        <span class="counter"></span>
        <div class="scrollable-table">

          <table id="example" class="table table-hover table-bordered results row-border order-column display">
            <form method="post" action="index.php?page=input_voucher">
              <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
              <input type="hidden" class="form-control" name="visa" value="voa">
              <input type="hidden" class="form-control" name="visa_pilih" value="VOA">
              <thead class="thead-dark">

                <tr>
                  <th style="max-width: 20px; text-align: center;">Pilih</th>
                  <th style="text-align: center;">Nama Latin</th>
                  <th style="text-align: center;">Nomor Paspor</th>
                  <th style="text-align: center;">Nama Mandarin</th>
                </tr>

              </thead>

              <tbody>
                <?php

                $data_tka = "SELECT * FROM data WHERE nama_pt='$nama_pt' AND voa=0";
                $sql = mysqli_query($connection, $data_tka);
                while ($dat = mysqli_fetch_assoc($sql)) {

                  $passport = $dat['passport'];

                  $sql_verif = "SELECT * FROM voa WHERE passport='$passport'";
                  $hasil = mysqli_query($connection, $sql_verif);

                  if (mysqli_num_rows($hasil) == 0) {
                    $no++;


                ?>
                    <tr>
                      <td style="text-align: center;">
                        <input type="checkbox" name="data[]" value="<?php echo $dat['passport']; ?>">
                      </td>
                      <td style="text-align: center;">
                        <?php echo $dat['nama_latin']; ?>
                      </td>

                      <td style="text-align: center;">
                        <?php echo $dat['passport']; ?>
                      </td>
                      <td style="text-align: center;">
                        <?php echo $dat['nama_mandarin']; ?>
                      </td>



                    </tr>
                  <?php } else {
                  }
                }

                if ($no == 0) {
                } else {
                  ?>
                  <td>
                    <input type="submit" value="Masukan" name="submit" class="btn btn-primary btn-block btn-lg" style="height:40px;">
                  </td>
                <?php }
                ?>
              </tbody>

            </form>
          </table>
        </div>
      </div>
    <?php } else if (isset($_POST['visa_kerja'])) {
    $tgl_input = date('Y-m-d');
    $nama_pt = $_POST['nama_pt'];
    $no = 0;


    ?>


      <div class="container" style="margin-top:101px; margin-left: 20px;">
        <h2 style="text-align: center;"> Data Visa 312 <br> <?php echo $nama_pt; ?> </h2>

        <br>

        <div class="form-group ">
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit" style="margin-right:10px;">Masukan</button>
            </span>
            <br>
            <input type="text" class="search form-control" style="width: 50%;" placeholder="What you looking for?">
          </div>
          <br>
          <span class="counter"></span>
          <div class="scrollable-table">

            <table id="example" class="table table-hover table-bordered results row-border order-column display">
              <form method="post" action="index.php?page=input_voucher">
                <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
                <input type="hidden" class="form-control" name="visa" value="visa312">
                <input type="hidden" class="form-control" name="visa_pilih" value="Visa 312">
                <thead class="thead-dark">

                  <tr>
                    <th style="max-width: 20px; text-align: center;">Pilih</th>
                    <th style="text-align: center;">Nama Latin</th>
                    <th style="text-align: center;">Nomor Paspor</th>
                    <th style="text-align: center;">Nama Mandarin</th>
                  </tr>

                </thead>

                <tbody>
                  <?php

                  $data_tka = "SELECT * FROM data WHERE nama_pt='$nama_pt' AND visa312=0";
                  $sql = mysqli_query($connection, $data_tka);
                  while ($dat = mysqli_fetch_assoc($sql)) {

                    $passport = $dat['passport'];

                    $sql_verif = "SELECT * FROM visa312 WHERE passport='$passport'";
                    $hasil = mysqli_query($connection, $sql_verif);

                    if (mysqli_num_rows($hasil) == 0) {
                      $no++;


                  ?>
                      <tr>
                        <td style="text-align: center;">
                          <input type="checkbox" name="data[]" value="<?php echo $dat['passport']; ?>">
                        </td>
                        <td style="text-align: center;">
                          <?php echo $dat['nama_latin']; ?>
                        </td>

                        <td style="text-align: center;">
                          <?php echo $dat['passport']; ?>
                        </td>
                        <td style="text-align: center;">
                          <?php echo $dat['nama_mandarin']; ?>
                        </td>



                      </tr>
                    <?php } else {
                    }
                  }

                  if ($no == 0) {
                  } else {
                    ?>
                    <td>
                      <input type="submit" value="Masukan" name="submit" class="btn btn-primary btn-block btn-lg" style="height:40px;">
                    </td>
                  <?php }
                  ?>
                </tbody>

              </form>
            </table>
          </div>
        </div>
      <?php } elseif (isset($_POST['visa_kunjungan'])) {
      $tgl_input = date('Y-m-d');
      $nama_pt = $_POST['nama_pt'];
      $no = 0;


      ?>


        <div class="container" style="margin-top:101px;">
          <center>
            <h2> Data Untuk Visa 211 <br> <?php echo $nama_pt; ?> </h2>
          </center>

          <div class="form-group ">
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit" style="margin-right:10px;">Masukan</button>
              </span>
              <br>
              <input type="text" class="search form-control" placeholder="What you looking for?">
            </div>
            <br>
            <span class="counter" </span> </span> <div class="scrollable-table">

              <table class="table table-hover table-bordered results">
                <form method="post" action="index.php?page=input_voucher">
                  <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
                  <input type="hidden" class="form-control" name="visa" value="visa211">
                  <input type="hidden" class="form-control" name="visa_pilih" value="Visa 211">
                  <thead>
                    <tr>
                      <th>Pilih</th>
                      <th>Nama Latin</th>
                      <th>Nomor Paspor</th>
                      <th>Nama Mandarin</th>
                    </tr>

                  </thead>

                  <tbody>
                    <?php

                    $data_tka = "SELECT * FROM data WHERE nama_pt='$nama_pt' AND visa211=0";

                    $sql = mysqli_query($connection, $data_tka);
                    while ($dat = mysqli_fetch_assoc($sql)) {

                      $passport = $dat['passport'];

                      $sql_verif = "SELECT * FROM visa211 WHERE passport='$passport'";
                      $hasil = mysqli_query($connection, $sql_verif);
                      if (mysqli_num_rows($hasil) == 0) {
                        $no++;


                    ?>
                        <tr>

                          <td>
                            <input type="checkbox" name="data[]" value="<?php echo $dat['passport']; ?>">
                          </td>

                          <td>
                            <?php echo $dat['nama_latin']; ?>
                          </td>

                          <td>
                            <?php echo $dat['passport']; ?>
                          </td>
                          <td>
                            <?php echo $dat['nama_mandarin']; ?>
                          </td>

                        </tr>
                      <?php } else {
                      }
                    }
                    if ($no == 0) {
                    } else {
                      ?>
                      <td>
                        <input type="submit" value="Masukan" name="submit" class="btn btn-primary btn-block btn-lg" style="height:40px;">
                      </td>
                    <?php }
                    ?>
                  </tbody>

                </form>
              </table>
          </div>
        </div>
      <?php } elseif (isset($_POST['visa_pertama'])) {
      $tgl_input = date('Y-m-d');
      $nama_pt = $_POST['nama_pt'];
      $no = 0;


      ?>


        <div class="container" style="margin-top:101px;">
          <center>
            <h2> Data Untuk Visa 211-1 <br> <?php echo $nama_pt; ?> </h2>
          </center>

          <div class="form-group ">
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit" style="margin-right:10px;">Masukan</button>
              </span>
              <br>
              <input type="text" class="search form-control" placeholder="What you looking for?">
            </div>
            <br>
            <span class="counter" </span> </span> <div class="scrollable-table">

              <table class="table table-hover table-bordered results">
                <form method="post" action="index.php?page=input_voucher">
                  <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
                  <input type="hidden" class="form-control" name="visa" value="visa211_1">
                  <input type="hidden" class="form-control" name="visa_pilih" value="Visa 211-1">
                  <thead>
                    <tr>
                      <th>Pilih</th>
                      <th>Nama Latin</th>
                      <th>Nomor Paspor</th>
                      <th>Nama Mandarin</th>
                    </tr>

                  </thead>

                  <tbody>
                    <?php

                    $data_tka = "SELECT * FROM data WHERE nama_pt='$nama_pt' AND visa211_1=0";
                    $sql = mysqli_query($connection, $data_tka);
                    while ($dat = mysqli_fetch_assoc($sql)) {

                      $passport = $dat['passport'];

                      $sql_verif = "SELECT * FROM visa211 WHERE passport='$passport'";
                      $hasil = mysqli_query($connection, $sql_verif);
                      if (mysqli_num_rows($hasil) == 0) {
                      } else {
                        $sql_verif = "SELECT * FROM visa211_1 WHERE passport='$passport'";
                        $hasil = mysqli_query($connection, $sql_verif);
                        if (mysqli_num_rows($hasil) == 0) {
                          $no++;


                    ?>
                          <tr>
                            <td>
                              <input type="checkbox" name="data[]" value="<?php echo $dat['passport']; ?>">
                            </td>
                            <td>
                              <?php echo $dat['nama_latin']; ?>
                            </td>

                            <td>
                              <?php echo $dat['passport']; ?>
                            </td>
                            <td>
                              <?php echo $dat['nama_mandarin']; ?>
                            </td>

                          </tr>
                      <?php
                        } else {
                        }
                      }
                    }
                    if ($no == 0) {
                    } else {
                      ?>
                      <td>
                        <input type="submit" value="Masukan" name="submit" class="btn btn-primary btn-block btn-lg" style="height:40px;">
                      </td>
                    <?php }
                    ?>

                  </tbody>

                </form>
              </table>
          </div>
        </div>
      <?php } elseif (isset($_POST['visa_kedua'])) {
      $tgl_input = date('Y-m-d');
      $nama_pt = $_POST['nama_pt'];
      $no = 0;


      ?>


        <div class="container" style="margin-top:101px;">
          <center>
            <h2> Data Untuk Visa 211-2 <br> <?php echo $nama_pt; ?> </h2>
          </center>

          <div class="form-group ">
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit" style="margin-right:10px;">Masukan</button>
              </span>
              <br>
              <input type="text" class="search form-control" placeholder="What you looking for?">
            </div>
            <br>
            <span class="counter" </span> </span> <div class="scrollable-table">

              <table class="table table-hover table-bordered results">
                <form method="post" action="index.php?page=input_voucher">
                  <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
                  <input type="hidden" class="form-control" name="visa" value="visa211_2">
                  <input type="hidden" class="form-control" name="visa_pilih" value="Visa 211-2">
                  <thead>
                    <tr>
                      <th>Pilih</th>
                      <th>Nama Latin</th>
                      <th>Nomor Paspor</th>
                      <th>Nama Mandarin</th>
                    </tr>

                  </thead>

                  <tbody>
                    <?php

                    $data_tka = "SELECT * FROM data WHERE nama_pt='$nama_pt' AND visa211_2=0";
                    $sql = mysqli_query($connection, $data_tka);
                    while ($dat = mysqli_fetch_assoc($sql)) {
                      $passport = $dat['passport'];

                      $sql_verif = "SELECT * FROM visa211_1 WHERE passport='$passport'";
                      $hasil = mysqli_query($connection, $sql_verif);
                      if (mysqli_num_rows($hasil) == 0) {
                      } else {
                        $sql_verif = "SELECT * FROM visa211_2 WHERE passport='$passport'";
                        $hasil = mysqli_query($connection, $sql_verif);
                        if (mysqli_num_rows($hasil) == 0) {
                          $no++;


                    ?>
                          <tr>
                            <td>
                              <input type="checkbox" name="data[]" value="<?php echo $dat['passport']; ?>">
                            </td>
                            <td>
                              <?php echo $dat['nama_latin']; ?>
                            </td>

                            <td>
                              <?php echo $dat['passport']; ?>
                            </td>
                            <td>
                              <?php echo $dat['nama_mandarin']; ?>
                            </td>

                          </tr>
                      <?php } else {
                        }
                      }
                    }
                    if ($no == 0) {
                    } else {
                      ?>
                      <td>
                        <input type="submit" value="Masukan" name="submit" class="btn btn-primary btn-block btn-lg" style="height:40px;">
                      </td>
                    <?php }
                    ?>

                  </tbody>

                </form>
              </table>
          </div>
        </div>
      <?php } elseif (isset($_POST['visa_ketiga'])) {
      $tgl_input = date('Y-m-d');
      $nama_pt = $_POST['nama_pt'];
      $no = 0;



      ?>


        <div class="container" style="margin-top:101px;">
          <center>
            <h2> Data Untuk Visa 211-3 <br> <?php echo $nama_pt; ?> </h2>
          </center>

          <div class="form-group ">
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit" style="margin-right:10px;">Masukan</button>
              </span>
              <br>
              <input type="text" class="search form-control" placeholder="What you looking for?">
            </div>
            <br>
            <span class="counter" </span> </span> <div class="scrollable-table">

              <table class="table table-hover table-bordered results">
                <form method="post" action="index.php?page=input_voucher">
                  <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
                  <input type="hidden" class="form-control" name="visa" value="visa211_3">
                  <input type="hidden" class="form-control" name="visa_pilih" value="Visa 211-3">
                  <thead>
                    <tr>
                      <th>Pilih</th>
                      <th>Nama Latin</th>
                      <th>Nomor Paspor</th>
                      <th>Nama Mandarin</th>
                    </tr>

                  </thead>

                  <tbody>
                    <?php


                    $data_tka = "SELECT * FROM data WHERE nama_pt='$nama_pt' AND visa211_3=0";
                    $sql = mysqli_query($connection, $data_tka);
                    while ($dat = mysqli_fetch_assoc($sql)) {
                      $passport = $dat['passport'];

                      $sql_verif = "SELECT * FROM visa211_2 WHERE passport='$passport'";
                      $hasil = mysqli_query($connection, $sql_verif);
                      if (mysqli_num_rows($hasil) == 0) {
                      } else {
                        $sql_verif = "SELECT * FROM visa211_3 WHERE passport='$passport'";
                        $hasil = mysqli_query($connection, $sql_verif);
                        if (mysqli_num_rows($hasil) == 0) {
                          $no++;
                    ?>
                          <tr>
                            <td>
                              <input type="checkbox" name="data[]" value="<?php echo $dat['passport']; ?>">
                            </td>
                            <td>
                              <?php echo $dat['nama_latin']; ?>
                            </td>

                            <td>
                              <?php echo $dat['passport']; ?>
                            </td>
                            <td>
                              <?php echo $dat['nama_mandarin']; ?>
                            </td>

                          </tr>
                      <?php } else {
                        }
                      }
                    }
                    if ($no == 0) {
                    } else {
                      ?>
                      <td>
                        <input type="submit" value="Masukan" name="submit" class="btn btn-primary btn-block btn-lg" style="height:40px;">
                      </td>
                    <?php }
                    ?>

                  </tbody>

                </form>
              </table>
          </div>
        </div>
      <?php } elseif (isset($_POST['visa_keempat'])) {
      $tgl_input = date('Y-m-d');
      $nama_pt = $_POST['nama_pt'];
      $no = 0;



      ?>


        <div class="container" style="margin-top:101px;">
          <center>
            <h2> Data Untuk Visa 211-4 <br> <?php echo $nama_pt; ?> </h2>
          </center>

          <div class="form-group ">
            <div class="input-group">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit" style="margin-right:10px;">Masukan</button>
              </span>
              <br>
              <input type="text" class="search form-control" placeholder="What you looking for?">
            </div>
            <br>
            <span class="counter" </span> </span> <div class="scrollable-table">

              <table class="table table-hover table-bordered results">
                <form method="post" action="index.php?page=input_voucher">
                  <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
                  <input type="hidden" class="form-control" name="visa" value="visa211_4">
                  <input type="hidden" class="form-control" name="visa_pilih" value="Visa 211-4">
                  <thead>
                    <tr>
                      <th>Pilih</th>
                      <th>Nama Latin</th>
                      <th>Nomor Paspor</th>
                      <th>Nama Mandarin</th>

                    </tr>

                  </thead>

                  <tbody>
                    <?php

                    $data_tka = "SELECT * FROM data WHERE nama_pt='$nama_pt' AND visa211_4=0";
                    $sql = mysqli_query($connection, $data_tka);
                    while ($dat = mysqli_fetch_assoc($sql)) {
                      $passport = $dat['passport'];

                      $sql_verif = "SELECT * FROM visa211_3 WHERE passport='$passport'";
                      $hasil = mysqli_query($connection, $sql_verif);
                      if (mysqli_num_rows($hasil) == 0) {
                      } else {
                        $sql_verif = "SELECT * FROM visa211_4 WHERE passport='$passport'";
                        $hasil = mysqli_query($connection, $sql_verif);
                        if (mysqli_num_rows($hasil) == 0) {
                          $no++;
                    ?>
                          <tr>
                            <td>
                              <input type="checkbox" name="data[]" value="<?php echo $dat['passport']; ?>">
                            </td>
                            <td>
                              <?php echo $dat['nama_latin']; ?>
                            </td>
                            <td>
                              <?php echo $dat['passport']; ?>
                            </td>
                            <td>
                              <?php echo $dat['nama_mandarin']; ?>
                            </td>

                          </tr>
                      <?php } else {
                        }
                      }
                    }
                    if ($no == 0) {
                    } else {
                      ?>
                      <td>
                        <input type="submit" value="Masukan" name="submit" class="btn btn-primary btn-block btn-lg" style="height:40px;">
                      </td>
                    <?php }
                    ?>

                  </tbody>



                </form>
              </table>
          </div>
        </div>
      <?php }

      ?>

      <br><br>

      <script type="text/javascript">
        function empty() {
          var data = [];
          data = document.getElementById("data").value;
          if (count(data) > 15) {
            alert("Data Terlalu banyak, Maksimal Data 15");
            return false;
          };
        }
      </script>