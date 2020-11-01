<div class="container" style="margin-top:101px;">
  <h2>
    <center>Validasi Jabatan</center>
  </h2>
  <hr class="colorgraph">

  <?php
  $tgl_terbit = $_POST['tgl_terbit'];
  $jangka_visa = $_POST['jangka_visa'];
  $no_imta = $_POST['no_imta'];
  $tgl_input = $_POST['tgl_input'];
  $input_by = $_POST['input_by'];
  $nama_pt = $_POST['nama_pt'];
  $passport = $_POST['passport'];
  $visa = $_POST['visa'];
  $no_rptka = $_POST['no_rptka'];
  $exp_kitas = $_POST['exp_kitas'];
  $ket = $_POST['ket'];
  $notif = $_POST['notif'];
  ?>

  <table id="tab" class="table table-hover table-bordered" style="width:50%;">
    <tr>
      <th> Nama Perusahaan </th>
      <td> <?php echo "$nama_pt"; ?> </td>
    </tr>

  </table>


  <span class="counter pull-right"></span>
  <div class="scrollable-table">

    <?php
    $query = "SELECT * FROM data WHERE passport = '$passport' ";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    ?>
    <table class="table table-hover table-bordered results">
      <thead>
        <tr>
          <th style="text-align:center;">Nama Mandarin</th>
          <th style="text-align:center;">Nama Latin</th>
          <th style="text-align:center;">Passport</th>
          <th style="text-align:center;">No RPTKA</th>
          <th style="text-align:center;">Jenis Visa</th>
          <th style="text-align:center;">Tanggal Terbit Visa</th>
          <th style="text-align:center;">Jangka Waktu Visa (Bulan)</th>
          <th style="text-align:center;">No KITAS</th>
          <th style="text-align:center;">EXPIRED KITAS</th>
          <th style="text-align:center;">No Notifikasi</th>
          <th style="text-align:center;">KETERANGAN</th>
        </tr>

      </thead>
      <tbody>
        <tr>
          <td><?php echo $row['nama_mandarin'];  ?></td>
          <td><?php echo $row['nama_latin'];  ?></td>
          <td><?php echo $row['passport'];  ?></td>
          <td><?php echo "$no_rptka";  ?></td>
          <td><?php echo "$visa";  ?></td>
          <td><?php echo "$tgl_terbit";  ?></td>
          <td><?php echo "$jangka_visa";  ?></td>
          <td><?php echo "$no_imta";  ?></td>
          <td><?php echo "$exp_kitas";  ?></td>
          <td><?php echo "$notif";  ?></td>
          <td><?php echo "$ket";  ?></td>



        </tr>

      </tbody>
    </table>
  </div>

  <table id="tab" class="table table-hover table-bordered" style="width:60%;margin-top:50px;">
    <form method="post" action="index.php?page=tambah_visa312">
      <input type="hidden" class="form-control" name="passport" value="<?php echo $passport; ?>">
      <input type="hidden" class="form-control" name="no_rptka" value="<?php echo $no_rptka; ?>">
      <input type="hidden" class="form-control" name="no_imta" value="<?php echo $no_imta; ?>">
      <input type="hidden" class="form-control" name="jangka_visa" value="<?php echo $jangka_visa; ?>">
      <input type="hidden" class="form-control" name="tgl_terbit" value="<?php echo $tgl_terbit; ?>">
      <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
      <input type="hidden" class="form-control" name="visa" value="<?php echo $visa; ?>">
      <input type="hidden" class="form-control" name="exp_kitas" value="<?php echo $exp_kitas; ?>">
      <input type="hidden" class="form-control" name="notif" value="<?php echo $notif; ?>">
      <input type="hidden" class="form-control" name="ket" value="<?php echo $ket; ?>">
      <tr>
        <th colspan="2"><input type="submit" value="Edit" name="edit" class="btn btn-success"></th>
      </tr>
    </form>
  </table>

  <table id="tab" class="table table-hover table-bordered" style="width:60%;margin-top:50px;">
    <form method="post" action="../../system/buat_visa312.php">
      <input type="hidden" class="form-control" name="passport" value="<?php echo $passport; ?>">
      <input type="hidden" class="form-control" name="no_rptka" value="<?php echo $no_rptka; ?>">
      <input type="hidden" class="form-control" name="no_imta" value="<?php echo $no_imta; ?>">
      <input type="hidden" class="form-control" name="jangka_visa" value="<?php echo $jangka_visa; ?>">
      <input type="hidden" class="form-control" name="tgl_terbit" value="<?php echo $tgl_terbit; ?>">
      <input type="hidden" class="form-control" name="visa" value="<?php echo $visa; ?>">
      <input type="hidden" class="form-control" name="tgl_input" value="<?php echo $tgl_input; ?>">
      <input type="hidden" class="form-control" name="input_by" value="<?php echo $nama_user; ?>">
      <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
      <input type="hidden" class="form-control" name="exp_kitas" value="<?php echo $exp_kitas; ?>">
      <input type="hidden" class="form-control" name="notif" value="<?php echo $notif; ?>">
      <input type="hidden" class="form-control" name="ket" value="<?php echo $ket; ?>">

      <tr>
        <th width="40%"> Jabatan </th>
        <td><select name="jabatan" id="jabatan" class="form-control">
            <option selected>Pilih</option>
            <?php
            $query = "SELECT * FROM jabatan_rptka WHERE nama_pt = '$nama_pt' && no_rptka = '$no_rptka' ";
            $result = mysqli_query($connection, $query);
            while ($jabatan = mysqli_fetch_array($result)) {
            ?>
              <?php if ($jabatan['jumlah'] - $jabatan['terpakai'] != 0) { ?>
                <option><?php echo $jabatan['jabatan']; ?></option>
              <?php } ?>
            <?php } ?>
          </select></td>
      </tr>

      <tr>
        <td></td>
        <th colspan="2"><input type="submit" value="Masukan" name="submit" class="btn btn-primary btn-block btn-lg" style="height:40px;"></th>

      </tr>
    </form>
  </table>
</div>