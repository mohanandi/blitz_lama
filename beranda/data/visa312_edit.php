<?php

$passport = $_GET['passport'];
$tgl_input = date('Y-m-d');

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
    <h2> Edit Visa 312 <?php echo $row['nama_latin']; ?></h2>
  </center>
  <hr class="colorgraph">

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

  <?php
  $sql = "SELECT * FROM visa312 WHERE passport = '$passport' ";
  $hasil = mysqli_query($connection, $sql);
  $visa = mysqli_fetch_array($hasil);
  ?>

  <table id="tab" class="table table-hover table-bordered" style="width:60%;margin-top:50px;">
    <form method="post" action="index.php?page=validasi312_edit">
      <input type="hidden" class="form-control" name="passport" value="<?php echo $passport; ?>">
      <input type="hidden" class="form-control" name="nama_latin" value="<?php echo $row['nama_latin']; ?>">
      <input type="hidden" class="form-control" name="tgl_input" value="<?php echo $tgl_input; ?>">
      <input type="hidden" class="form-control" name="input_by" value="<?php echo $nama_user; ?>">
      <input type="hidden" class="form-control" name="rptka_lama" value="<?php echo $visa['no_rptka']; ?>">
      <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $s['nama_pt']; ?>">
      <input type="hidden" class="form-control" name="jabatan" value="<?php echo $visa['jabatan']; ?>">

      <tr>
        <th> Visa </th>
        <td><input id="fc1" type="text" name="visa" class="form-control" value="<?php echo $visa['visa']; ?>" /></td>
      </tr>
      <tr>
        <th width="40%"> No RPTKA </th>
        <td><select name="rptka_baru" class="form-control">
            <?php


            $query = "SELECT * FROM rptka WHERE nama_pt = '$nama_pt' && rptka_sisa != 0 ";
            $result = mysqli_query($connection, $query);

            if (!$result) {
              die("gak bisa");
            }

            ?>

            <option selected><?php echo $visa['no_rptka'] ?></option>
            <?php while ($row = mysqli_fetch_array($result)) {; ?>
              <option><?php echo $row['no_rptka']; ?></option>
            <?php } ?>
          </select></td>
      </tr>

      <tr>
        <th> Tanggal Terbit Visa</th>
        <td><input id="fc1" type="date" name="tgl_terbit" class="form-control" value="<?php echo $visa['tgl_terbit']; ?>" /></td>
      </tr>

      <tr>
        <th> Jangka Waktu Visa(Bulan) </th>
        <td><select name="jangka_visa" class="form-control">
            <option selected><?php echo $visa['jangka_visa']; ?></option>
            <?php

            for ($i = 1; $i <= 12; $i++) {
            ?>
              <option><?php echo $i; ?></option>
            <?php
            }

            ?>

          </select>
        </td>

      </tr>

      <tr>
        <th>NO KITAS</th>
        <td><input id="fc1" type="text" name="no_imta" class="form-control" value="<?php echo $visa['no_imta']; ?>" /></td>
      </tr>
      <tr>
        <th>EXPIRED KITAS</th>
        <td><input id="fc1" type="date" name="exp_kitas" class="form-control" value="<?php echo $visa['exp_kitas']; ?>" /></td>
      </tr>
      <tr>
        <th>NO NOTIFIKASI</th>
        <td><input id="fc1" type="text" name="notif" class="form-control" value="<?php echo $visa['notif']; ?>" /></td>
      </tr>
      <tr>
        <th>KETERANGAN</th>
        <td><input id="fc1" type="text" name="ket" class="form-control" value="<?php echo $visa['ket']; ?>" /></td>
      </tr>

      <tr>
        <th colspan="2"><input type="submit" value="Edit" name="submit" class="btn btn-primary btn-block btn-lg" style="height:40px;"></th>
      </tr>
    </form>
  </table>
</div>