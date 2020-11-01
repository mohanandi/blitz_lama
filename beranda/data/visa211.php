<center>
  <h2>KATEGORI</h2>
</center>
<br>

<div class="row">
  <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">


    <div class="row">
      <div class="btn-group dropright pull-right">
        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-center: 15px; margin-left: 20px;">
          Filter
        </button>
        <div class="dropdown-menu">

          <div class="col-xs-12 col-md-12"><input type="submit" value="VOA" class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#voa"></div>

          <div class="col-xs-12 col-md-12"><input type="submit" value="Visa 211" class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#visa211"></div>

          <div class="col-xs-12 col-md-12"><input type="submit" value="Extend Visa 211-1" class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#visa_pertama"></div>

          <div class="col-xs-12 col-md-12"><input type="submit" value="Extend Visa 211-2" class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#visa_kedua"></div>

          <div class="col-xs-12 col-md-12"><input type="submit" value="Extend Visa 211-3" class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#visa_ketiga"></div>

          <div class="col-xs-12 col-md-12"><input type="submit" value="Extend Visa 211-4" class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#visa_keempat"></div>

          <div class="col-xs-12 col-md-12"><input type="submit" value="Visa 312" class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#visa_kerja"></div>

          <div class="col-xs-12 col-md-12"><input type="submit" value="Visa Lain" class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#visa_lain"></div>


        </div>
      </div>

    </div>
  </div>
</div>

<span class="counter pull-right"></span>
<br>
<input type="text" style="margin-top:-60px;" class="pull-right search form-control" placeholder="What you looking for?">
<div class="scrollable-table" style="margin-top:10px;">


  <table class="table table-hover table-bordered results">



    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>Name PT</th>
        <th>Nama Mandarin</th>
        <th>Nama Latin</th>
        <th>Kewarganegaraan</th>
        <th>Passport</th>
        <th>Expired Passport</th>
        <th>Tanggal Lahir</th>
        <th>Keterangan</th>

      </tr>

    </thead>
    <tbody id="myTable">

      <!-- Awal Fungsi Tambah  Visa 211 -->
      <?php
      if (isset($_POST['visa211'])) {
      ?>
        <tr>
          <td colspan=10 style="text-align : center">Data TKA Untuk Katgori Visa211</td>
        </tr>
        <?php
        $nama_pt = $_POST['nama_pt'];

        $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' AND verif_data = 'Lama' ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("gak bisa");
        }
        $no = 0;


        while ($row = mysqli_fetch_array($result)) {

          $passport = $row['passport'];

          $sql = "SELECT * FROM visa211 WHERE nama_pt = '$nama_pt' && passport ='$passport' ";
          $hasil = mysqli_query($connection, $sql);
          if (mysqli_num_rows($hasil) == 0) {
            $no++;
        ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><a href="../data?page=tambah_visa211&passport=<?php echo $row['passport']; ?>">Pilih</a></td>
              <td><?php echo $row['nama_pt']; ?></td>
              <td><?php echo $row['nama_mandarin']; ?></td>
              <td><?php echo $row['nama_latin']; ?></td>
              <td><?php echo $row['kewarganegaraan']; ?></td>
              <td><?php echo $row['passport']; ?></td>
              <td><?php echo $row['expired_passport']; ?></td>
              <td><?php echo $row['tgl_lahir']; ?></td>
              <td><?php echo $row['ket']; ?></td>
            </tr>
          <?php
          } else {
          }
        }


        $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' AND verif_data = 'Baru' AND visa211 != 0 ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("gak bisa");
        }


        while ($row = mysqli_fetch_array($result)) {

          $passport = $row['passport'];

          $sql = "SELECT * FROM visa211 WHERE nama_pt = '$nama_pt' && passport ='$passport' ";
          $hasil = mysqli_query($connection, $sql);
          if (mysqli_num_rows($hasil) == 0) {
            $no++;
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><a href="../data?page=tambah_visa211&passport=<?php echo $row['passport']; ?>">Pilih</a></td>
              <td><?php echo $row['nama_pt']; ?></td>
              <td><?php echo $row['nama_mandarin']; ?></td>
              <td><?php echo $row['nama_latin']; ?></td>
              <td><?php echo $row['kewarganegaraan']; ?></td>
              <td><?php echo $row['passport']; ?></td>
              <td><?php echo $row['expired_passport']; ?></td>
              <td><?php echo $row['tgl_lahir']; ?></td>
              <td><?php echo $row['ket']; ?></td>

            </tr>
        <?php
          } else {
          }
        }
        // Akhir fungsi tambah visa211

        // Awal Fungsi Perpanjang visa Pertama
      } elseif (isset($_POST['visa_pertama'])) {
        ?>
        <tr>
          <td colspan=10 style="text-align: left;">Data TKA Untuk Katgori Visa211-1</td>
        </tr>
        <?php
        $nama_pt = $_POST['nama_pt'];
        $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' AND verif_data = 'Lama' ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("gak bisa");
        }
        $no = 0;


        while ($row = mysqli_fetch_array($result)) {

          $passport = $row['passport'];
          $sql_verif = "SELECT * FROM visa211 WHERE passport='$passport'";
          $hasil = mysqli_query($connection, $sql_verif);
          if (mysqli_num_rows($hasil) == 0) {
          } else {

            $sql = "SELECT * FROM visa211_1 WHERE nama_pt = '$nama_pt' && passport ='$passport' ";
            $hasil = mysqli_query($connection, $sql);
            if (mysqli_num_rows($hasil) == 0) {
              $no++;
        ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><a href="../data?page=tambah_visa211_1&passport=<?php echo $row['passport']; ?>">Pilih</a></td>
                <td><?php echo $row['nama_pt']; ?></td>
                <td><?php echo $row['nama_mandarin']; ?></td>
                <td><?php echo $row['nama_latin']; ?></td>
                <td><?php echo $row['kewarganegaraan']; ?></td>
                <td><?php echo $row['passport']; ?></td>
                <td><?php echo $row['expired_passport']; ?></td>
                <td><?php echo $row['tgl_lahir']; ?></td>
                <td><?php echo $row['ket']; ?></td>
              </tr>
            <?php
            } else {
            }
          }
        }


        $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' AND verif_data = 'Baru' AND visa211_1 != 0 ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("gak bisa");
        }


        while ($row = mysqli_fetch_array($result)) {

          $passport = $row['passport'];

          $sql = "SELECT * FROM visa211_1 WHERE nama_pt = '$nama_pt' && passport ='$passport' ";
          $hasil = mysqli_query($connection, $sql);
          if (mysqli_num_rows($hasil) == 0) {
            $no++;
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><a href="../data?page=tambah_visa211_1&passport=<?php echo $row['passport']; ?>">Pilih</a></td>
              <td><?php echo $row['nama_pt']; ?></td>
              <td><?php echo $row['nama_mandarin']; ?></td>
              <td><?php echo $row['nama_latin']; ?></td>
              <td><?php echo $row['kewarganegaraan']; ?></td>
              <td><?php echo $row['passport']; ?></td>
              <td><?php echo $row['expired_passport']; ?></td>
              <td><?php echo $row['tgl_lahir']; ?></td>
              <td><?php echo $row['ket']; ?></td>
            </tr>
        <?php
          } else {
          }
        }
        // Akhir Fungsi Perpanjang visa Pertama


        // Awal Fungsi Perpanjang visa Kedua
      } elseif (isset($_POST['visa_kedua'])) {

        ?>
        <tr>
          <td colspan=10 style="text-align : center">Data TKA Untuk Katgori Visa211-2</td>
        </tr>
        <?php

        $nama_pt = $_POST['nama_pt'];
        $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' AND verif_data = 'Lama' ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("gak bisa");
        }
        $no = 0;


        while ($row = mysqli_fetch_array($result)) {

          $passport = $row['passport'];
          $sql_verif = "SELECT * FROM visa211_1 WHERE passport='$passport'";
          $hasil = mysqli_query($connection, $sql_verif);
          if (mysqli_num_rows($hasil) == 0) {
          } else {

            $sql = "SELECT * FROM visa211_2 WHERE nama_pt = '$nama_pt' && passport ='$passport' ";
            $hasil = mysqli_query($connection, $sql);
            if (mysqli_num_rows($hasil) == 0) {
              $no++;
        ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><a href="../data?page=tambah_visa211_2&passport=<?php echo $row['passport']; ?>">Pilih</a></td>
                <td><?php echo $row['nama_pt']; ?></td>
                <td><?php echo $row['nama_mandarin']; ?></td>
                <td><?php echo $row['nama_latin']; ?></td>
                <td><?php echo $row['kewarganegaraan']; ?></td>
                <td><?php echo $row['passport']; ?></td>
                <td><?php echo $row['expired_passport']; ?></td>
                <td><?php echo $row['tgl_lahir']; ?></td>
                <td><?php echo $row['ket']; ?></td>

              </tr>
            <?php
            } else {
            }
          }
        }


        $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' AND verif_data = 'Baru' AND visa211_2 != 0 ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("gak bisa");
        }


        while ($row = mysqli_fetch_array($result)) {

          $passport = $row['passport'];

          $sql = "SELECT * FROM visa211_2 WHERE nama_pt = '$nama_pt' && passport ='$passport' ";
          $hasil = mysqli_query($connection, $sql);
          if (mysqli_num_rows($hasil) == 0) {
            $no++;
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><a href="../data?page=tambah_visa211_2&passport=<?php echo $row['passport']; ?>">Pilih</a></td>
              <td><?php echo $row['nama_pt']; ?></td>
              <td><?php echo $row['nama_mandarin']; ?></td>
              <td><?php echo $row['nama_latin']; ?></td>
              <td><?php echo $row['kewarganegaraan']; ?></td>
              <td><?php echo $row['passport']; ?></td>
              <td><?php echo $row['expired_passport']; ?></td>
              <td><?php echo $row['tgl_lahir']; ?></td>
              <td><?php echo $row['ket']; ?></td>

            </tr>
        <?php
          } else {
          }
        }
        // Akhir Fungsi Perpanjang visa Kedua


        // Awal Fungsi Perpanjang visa Ketiga
      } elseif (isset($_POST['visa_ketiga'])) {

        ?>
        <tr>
          <td colspan=10 style="text-align : center">Data TKA Untuk Katgori Visa211-3</td>
        </tr>
        <?php

        $nama_pt = $_POST['nama_pt'];
        $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' AND verif_data = 'Lama' ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("gak bisa");
        }
        $no = 0;


        while ($row = mysqli_fetch_array($result)) {

          $passport = $row['passport'];
          $sql_verif = "SELECT * FROM visa211_2 WHERE passport='$passport'";
          $hasil = mysqli_query($connection, $sql_verif);
          if (mysqli_num_rows($hasil) == 0) {
          } else {

            $sql = "SELECT * FROM visa211_3 WHERE nama_pt = '$nama_pt' && passport ='$passport' ";
            $hasil = mysqli_query($connection, $sql);
            if (mysqli_num_rows($hasil) == 0) {
              $no++;
        ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><a href="../data?page=tambah_visa211_3&passport=<?php echo $row['passport']; ?>">Pilih</a></td>
                <td><?php echo $row['nama_pt']; ?></td>
                <td><?php echo $row['nama_mandarin']; ?></td>
                <td><?php echo $row['nama_latin']; ?></td>
                <td><?php echo $row['kewarganegaraan']; ?></td>
                <td><?php echo $row['passport']; ?></td>
                <td><?php echo $row['expired_passport']; ?></td>
                <td><?php echo $row['tgl_lahir']; ?></td>
                <td><?php echo $row['ket']; ?></td>

              </tr>
            <?php
            } else {
            }
          }
        }


        $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' AND verif_data = 'Baru' AND visa211_3 != 0 ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("gak bisa");
        }


        while ($row = mysqli_fetch_array($result)) {

          $passport = $row['passport'];

          $sql = "SELECT * FROM visa211_3 WHERE nama_pt = '$nama_pt' && passport ='$passport' ";
          $hasil = mysqli_query($connection, $sql);
          if (mysqli_num_rows($hasil) == 0) {
            $no++;
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><a href="../data?page=tambah_visa211_3&passport=<?php echo $row['passport']; ?>">Pilih</a></td>
              <td><?php echo $row['nama_pt']; ?></td>
              <td><?php echo $row['nama_mandarin']; ?></td>
              <td><?php echo $row['nama_latin']; ?></td>
              <td><?php echo $row['kewarganegaraan']; ?></td>
              <td><?php echo $row['passport']; ?></td>
              <td><?php echo $row['expired_passport']; ?></td>
              <td><?php echo $row['tgl_lahir']; ?></td>
              <td><?php echo $row['ket']; ?></td>

            </tr>
        <?php
          } else {
          }
        }
        //Akhir Fungsi Perpanjang Visa Ketiga

        //Awal Fungsi Perpanjang Visa Keempat
      } elseif (isset($_POST['visa_keempat'])) {

        ?>
        <tr>
          <td colspan=10 style="text-align : center">Data TKA Untuk Katgori Visa211-4</td>
        </tr>
        <?php

        $nama_pt = $_POST['nama_pt'];
        $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' AND verif_data = 'Lama' ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("gak bisa");
        }
        $no = 0;


        while ($row = mysqli_fetch_array($result)) {

          $passport = $row['passport'];
          $sql_verif = "SELECT * FROM visa211_3 WHERE passport='$passport'";
          $hasil = mysqli_query($connection, $sql_verif);
          if (mysqli_num_rows($hasil) == 0) {
          } else {

            $sql = "SELECT * FROM visa211_4 WHERE nama_pt = '$nama_pt' && passport ='$passport' ";
            $hasil = mysqli_query($connection, $sql);
            if (mysqli_num_rows($hasil) == 0) {
              $no++;
        ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><a href="../data?page=tambah_visa211_4&passport=<?php echo $row['passport']; ?>">Pilih</a></td>
                <td><?php echo $row['nama_pt']; ?></td>
                <td><?php echo $row['nama_mandarin']; ?></td>
                <td><?php echo $row['nama_latin']; ?></td>
                <td><?php echo $row['kewarganegaraan']; ?></td>
                <td><?php echo $row['passport']; ?></td>
                <td><?php echo $row['expired_passport']; ?></td>
                <td><?php echo $row['tgl_lahir']; ?></td>
                <td><?php echo $row['ket']; ?></td>

              </tr>
            <?php
            } else {
            }
          }
        }


        $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' AND verif_data = 'Baru' AND visa211_4 != 0 ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("gak bisa");
        }


        while ($row = mysqli_fetch_array($result)) {

          $passport = $row['passport'];

          $sql = "SELECT * FROM visa211_4 WHERE nama_pt = '$nama_pt' && passport ='$passport' ";
          $hasil = mysqli_query($connection, $sql);
          if (mysqli_num_rows($hasil) == 0) {
            $no++;
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><a href="../data?page=tambah_visa211_4&passport=<?php echo $row['passport']; ?>">Pilih</a></td>
              <td><?php echo $row['nama_pt']; ?></td>
              <td><?php echo $row['nama_mandarin']; ?></td>
              <td><?php echo $row['nama_latin']; ?></td>
              <td><?php echo $row['kewarganegaraan']; ?></td>
              <td><?php echo $row['passport']; ?></td>
              <td><?php echo $row['expired_passport']; ?></td>
              <td><?php echo $row['tgl_lahir']; ?></td>
              <td><?php echo $row['ket']; ?></td>

            </tr>
        <?php
          } else {
          }
        }
        // Awal Fungsi Perpanjang Visa Keempat

        // Awal Fungsi Untuk Visa Kerja
      } elseif (isset($_POST['visa_kerja'])) {

        ?>
        <tr>
          <td colspan=10 style="text-align : center">Data TKA Untuk Katgori Visa312</td>
        </tr>
        <?php

        $nama_pt = $_POST['nama_pt'];
        $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' AND verif_data = 'Lama' ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("gak bisa");
        }
        $no = 0;


        while ($row = mysqli_fetch_array($result)) {

          $passport = $row['passport'];

          $sql = "SELECT * FROM visa312 WHERE nama_pt = '$nama_pt' && passport ='$passport' ";
          $hasil = mysqli_query($connection, $sql);
          if (mysqli_num_rows($hasil) == 0) {
            $no++;
        ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><a href="../data?page=tambah_visa312&passport=<?php echo $row['passport']; ?>">Pilih</a></td>
              <td><?php echo $row['nama_pt']; ?></td>
              <td><?php echo $row['nama_mandarin']; ?></td>
              <td><?php echo $row['nama_latin']; ?></td>
              <td><?php echo $row['kewarganegaraan']; ?></td>
              <td><?php echo $row['passport']; ?></td>
              <td><?php echo $row['expired_passport']; ?></td>
              <td><?php echo $row['tgl_lahir']; ?></td>
              <td><?php echo $row['ket']; ?></td>

            </tr>
          <?php
          } else {
          }
        }


        $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' AND verif_data = 'Baru' AND visa312 != 0 ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("gak bisa");
        }


        while ($row = mysqli_fetch_array($result)) {

          $passport = $row['passport'];

          $sql = "SELECT * FROM visa312 WHERE nama_pt = '$nama_pt' && passport ='$passport' ";
          $hasil = mysqli_query($connection, $sql);
          if (mysqli_num_rows($hasil) == 0) {
            $no++;
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><a href="../data?page=tambah_visa312&passport=<?php echo $row['passport']; ?>">Pilih</a></td>
              <td><?php echo $row['nama_pt']; ?></td>
              <td><?php echo $row['nama_mandarin']; ?></td>
              <td><?php echo $row['nama_latin']; ?></td>
              <td><?php echo $row['kewarganegaraan']; ?></td>
              <td><?php echo $row['passport']; ?></td>
              <td><?php echo $row['expired_passport']; ?></td>
              <td><?php echo $row['tgl_lahir']; ?></td>
              <td><?php echo $row['ket']; ?></td>

            </tr>
        <?php
          } else {
          }
        }
      }
      // Akhir Fungsi untuk Visa 312


      // Awal Fungsi untuk VOA
      else if (isset($_POST['voa'])) {

        ?>
        <tr>
          <td colspan=10 style="text-align : center">Data TKA Untuk Katgori VOA</td>
        </tr>
        <?php

        $nama_pt = $_POST['nama_pt'];

        $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' AND verif_data = 'Lama' ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("gak bisa");
        }
        $no = 0;


        while ($row = mysqli_fetch_array($result)) {

          $passport = $row['passport'];

          $sql = "SELECT * FROM voa WHERE nama_pt = '$nama_pt' && passport ='$passport' ";
          $hasil = mysqli_query($connection, $sql);
          if (mysqli_num_rows($hasil) == 0) {
            $no++;
        ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><a href="../data?page=tambah_voa&passport=<?php echo $row['passport']; ?>">Pilih</a></td>
              <td><?php echo $row['nama_pt']; ?></td>
              <td><?php echo $row['nama_mandarin']; ?></td>
              <td><?php echo $row['nama_latin']; ?></td>
              <td><?php echo $row['kewarganegaraan']; ?></td>
              <td><?php echo $row['passport']; ?></td>
              <td><?php echo $row['expired_passport']; ?></td>
              <td><?php echo $row['tgl_lahir']; ?></td>
              <td><?php echo $row['ket']; ?></td>

            </tr>
          <?php
          } else {
          }
        }


        $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' AND verif_data = 'Baru' AND voa != 0 ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("gak bisa");
        }


        while ($row = mysqli_fetch_array($result)) {

          $passport = $row['passport'];

          $sql = "SELECT * FROM voa WHERE nama_pt = '$nama_pt' && passport ='$passport' ";
          $hasil = mysqli_query($connection, $sql);
          if (mysqli_num_rows($hasil) == 0) {
            $no++;
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><a href="../data?page=tambah_voa&passport=<?php echo $row['passport']; ?>">Pilih</a></td>
              <td><?php echo $row['nama_pt']; ?></td>
              <td><?php echo $row['nama_mandarin']; ?></td>
              <td><?php echo $row['nama_latin']; ?></td>
              <td><?php echo $row['kewarganegaraan']; ?></td>
              <td><?php echo $row['passport']; ?></td>
              <td><?php echo $row['expired_passport']; ?></td>
              <td><?php echo $row['tgl_lahir']; ?></td>
              <td><?php echo $row['ket']; ?></td>

            </tr>
        <?php
          } else {
          }
        }
      }

      // Awal Fungsi untuk Visa Lain
      else if (isset($_POST['visa_lain'])) {

        ?>
        <tr>
          <td colspan=10 style="text-align : center">Data TKA Untuk Katgori Visa Lain</td>
        </tr>
        <?php

        $nama_pt = $_POST['nama_pt'];

        $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' AND verif_data = 'Lama' ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("gak bisa");
        }
        $no = 0;


        while ($row = mysqli_fetch_array($result)) {

          $passport = $row['passport'];

          $sql = "SELECT * FROM visa_lain WHERE nama_pt = '$nama_pt' && passport ='$passport' ";
          $hasil = mysqli_query($connection, $sql);
          if (mysqli_num_rows($hasil) == 0) {
            $no++;
        ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><a href="../data?page=tambah_visalain&passport=<?php echo $row['passport']; ?>">Pilih</a></td>
              <td><?php echo $row['nama_pt']; ?></td>
              <td><?php echo $row['nama_mandarin']; ?></td>
              <td><?php echo $row['nama_latin']; ?></td>
              <td><?php echo $row['kewarganegaraan']; ?></td>
              <td><?php echo $row['passport']; ?></td>
              <td><?php echo $row['expired_passport']; ?></td>
              <td><?php echo $row['tgl_lahir']; ?></td>
              <td><?php echo $row['ket']; ?></td>

            </tr>
          <?php
          } else {
          }
        }


        $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' AND verif_data = 'Baru' AND voa != 0 ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("gak bisa");
        }


        while ($row = mysqli_fetch_array($result)) {

          $passport = $row['passport'];

          $sql = "SELECT * FROM visa_lain WHERE nama_pt = '$nama_pt' && passport ='$passport' ";
          $hasil = mysqli_query($connection, $sql);
          if (mysqli_num_rows($hasil) == 0) {
            $no++;
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><a href="../data?page=tambah_visalain&passport=<?php echo $row['passport']; ?>">Pilih</a></td>
              <td><?php echo $row['nama_pt']; ?></td>
              <td><?php echo $row['nama_mandarin']; ?></td>
              <td><?php echo $row['nama_latin']; ?></td>
              <td><?php echo $row['kewarganegaraan']; ?></td>
              <td><?php echo $row['passport']; ?></td>
              <td><?php echo $row['expired_passport']; ?></td>
              <td><?php echo $row['tgl_lahir']; ?></td>
              <td><?php echo $row['ket']; ?></td>

            </tr>
        <?php
          } else {
          }
        }
      } else {
        ?>
        <tr>
          <td colspan=10 style="text-align : center">Pilih Kategori Visa</td>
        </tr>
      <?php
      }
      ?>


    </tbody>
  </table>
</div>

</table>
</div>




<!-- Pop uo visa kunjungan -->
<div class="modal fade" id="visa211" role="dialog" style="width:100%">
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
              <label>Nama Perusahaan </label>
              <div>
                <input type="text" list="pt_list" name="nama_pt" class="form-control" style="width:100%;" autocomplete="off">
                <?php
                $query = "SELECT * FROM perusahaan";
                $result = mysqli_query($connection, $query);
                ?>

                <datalist id="pt_list">
                  <?php while ($row = mysqli_fetch_array($result)) {; ?>
                    <option><?php echo $row['nama_pt']; ?></option>
                  <?php } ?>
                </datalist>
              </div>
            </div>
            <br>



            <div class="modal-footer">
              <input type="submit" name="visa211" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;"> </div>
          </div>

      </form>
    </div>
  </div>
</div>
</div>

<!-- Pop up perpanjang visa pertama -->
<div class="modal fade" id="visa_pertama" role="dialog" style="width:100%">
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
              <label>Nama Perusahaan </label>
              <div>
                <input type="text" list="pt_list" name="nama_pt" class="form-control" style="width:100%;" autocomplete="off">
                <?php
                $query = "SELECT * FROM perusahaan";
                $result = mysqli_query($connection, $query);
                ?>

                <datalist id="pt_list">
                  <?php while ($row = mysqli_fetch_array($result)) {; ?>
                    <option><?php echo $row['nama_pt']; ?></option>
                  <?php } ?>
                </datalist>
              </div>
            </div>
            <br>



            <div class="modal-footer">
              <input type="submit" name="visa_pertama" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;"> </div>
          </div>

      </form>
    </div>
  </div>
</div>
</div>

<!-- Pop up perpanjang visa Kedua -->
<div class="modal fade" id="visa_kedua" role="dialog" style="width:100%">
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
              <label>Nama Perusahaan </label>
              <div>
                <input type="text" list="pt_list" name="nama_pt" class="form-control" style="width:100%;" autocomplete="off">
                <?php
                $query = "SELECT * FROM perusahaan";
                $result = mysqli_query($connection, $query);
                ?>

                <datalist id="pt_list">
                  <?php while ($row = mysqli_fetch_array($result)) {; ?>
                    <option><?php echo $row['nama_pt']; ?></option>
                  <?php } ?>
                </datalist>
              </div>
            </div>
            <br>



            <div class="modal-footer">
              <input type="submit" name="visa_kedua" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;"> </div>
          </div>

      </form>
    </div>
  </div>
</div>
</div>

<!-- Pop up perpanjang visa Ketiga -->
<div class="modal fade" id="visa_ketiga" role="dialog" style="width:100%">
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
              <label>Nama Perusahaan </label>
              <div>
                <input type="text" list="pt_list" name="nama_pt" class="form-control" style="width:100%;" autocomplete="off">
                <?php
                $query = "SELECT * FROM perusahaan";
                $result = mysqli_query($connection, $query);
                ?>

                <datalist id="pt_list">
                  <?php while ($row = mysqli_fetch_array($result)) {; ?>
                    <option><?php echo $row['nama_pt']; ?></option>
                  <?php } ?>
                </datalist>
              </div>
            </div>
            <br>



            <div class="modal-footer">
              <input type="submit" name="visa_ketiga" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;"> </div>
          </div>

      </form>
    </div>
  </div>
</div>
</div>

<!-- Pop up perpanjang visa Keempat -->
<div class="modal fade" id="visa_keempat" role="dialog" style="width:100%">
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
              <label>Nama Perusahaan </label>
              <div>
                <input type="text" list="pt_list" name="nama_pt" class="form-control" style="width:100%;" autocomplete="off">
                <?php
                $query = "SELECT * FROM perusahaan";
                $result = mysqli_query($connection, $query);
                ?>

                <datalist id="pt_list">
                  <?php while ($row = mysqli_fetch_array($result)) {; ?>
                    <option><?php echo $row['nama_pt']; ?></option>
                  <?php } ?>
                </datalist>
              </div>
            </div>
            <br>



            <div class="modal-footer">
              <input type="submit" name="visa_keempat" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;"> </div>
          </div>

      </form>
    </div>
  </div>
</div>
</div>

<!-- Pop up visa Kerja -->
<div class="modal fade" id="visa_kerja" role="dialog" style="width:100%">
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
              <label>Nama Perusahaan </label>
              <div>
                <input type="text" list="pt_list" name="nama_pt" class="form-control" style="width:100%;" autocomplete="off">
                <?php
                $query = "SELECT * FROM perusahaan";
                $result = mysqli_query($connection, $query);
                ?>

                <datalist id="pt_list">
                  <?php while ($row = mysqli_fetch_array($result)) {; ?>
                    <option><?php echo $row['nama_pt']; ?></option>
                  <?php } ?>
                </datalist>
              </div>
            </div>
            <br>



            <div class="modal-footer">
              <input type="submit" name="visa_kerja" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;"> </div>
          </div>

      </form>
    </div>
  </div>
</div>
</div>

<!-- Pop up VOA-->
<div class="modal fade" id="voa" role="dialog" style="width:100%">
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
              <label>Nama Perusahaan </label>
              <div>
                <input type="text" list="pt_list" name="nama_pt" class="form-control" style="width:100%;" autocomplete="off">
                <?php
                $query = "SELECT * FROM perusahaan";
                $result = mysqli_query($connection, $query);
                ?>

                <datalist id="pt_list">
                  <?php while ($row = mysqli_fetch_array($result)) {; ?>
                    <option><?php echo $row['nama_pt']; ?></option>
                  <?php } ?>
                </datalist>
              </div>
            </div>
            <br>



            <div class="modal-footer">
              <input type="submit" name="voa" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;"> </div>
          </div>

      </form>
    </div>
  </div>
</div>
</div>

<!-- Pop up VOA-->
<div class="modal fade" id="visa_lain" role="dialog" style="width:100%">
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
              <label>Nama Perusahaan </label>
              <div>
                <input type="text" list="pt_list" name="nama_pt" class="form-control" style="width:100%;" autocomplete="off">
                <?php
                $query = "SELECT * FROM perusahaan";
                $result = mysqli_query($connection, $query);
                ?>

                <datalist id="pt_list">
                  <?php while ($row = mysqli_fetch_array($result)) {; ?>
                    <option><?php echo $row['nama_pt']; ?></option>
                  <?php } ?>
                </datalist>
              </div>
            </div>



            <div class="modal-footer">
              <input type="submit" name="visa_lain" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;"> </div>
          </div>

      </form>
    </div>
  </div>
</div>
</div>