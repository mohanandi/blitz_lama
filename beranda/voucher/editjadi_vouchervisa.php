<?php
include("../../system/connect.php");
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $data_voucher = "SELECT * FROM voucher_visa WHERE id=$id ";
  $sql_voucher = mysqli_query($connection, $data_voucher);
  $hasil = mysqli_fetch_assoc($sql_voucher);
  $mata_uang = $hasil['mata_uang'];
  $total = $hasil['total_harga'];
  $nama_pt = $hasil['nama_pt'];
?>




  <div class="container" style="margin-top:101px;">
    <h2 style="text-align: center;"> Edit Voucher Visa </h2>
    <hr class="colorgraph">

    <table id="tab" class="table table-hover table-bordered" style="width:50%;">
      <tr>
        <th> Nama Perusahaan </th>
        <td><?php echo $nama_pt; ?></td>
      </tr>

    </table>
    <table class="table table-hover table-bordered results" style="background-color:white;">
      <thead>
        <tr>
          <th style="text-align:center;">No</th>
          <th colspan="2" style="text-align:center;">Nama</th>
          <th style="text-align:center;">No Paspor</th>
          <th style="text-align:center;">Jenis Proses</th>
          <th style="text-align:center;">Jumlah</th>
        </tr>

      </thead>

      <form method="post" action="index.php?page=verif_voucher" style="width:80%; margin-left:200px !important;">
        <span class="counter pull-right"></span>
        <div class="scrollable-table">


          <tbody>
            <?php
            $i = 1;
            $data_voucher = "SELECT * FROM data_vouchervisa WHERE no_voucher=$id ";
            $sql_voucher = mysqli_query($connection, $data_voucher);
            while ($data = mysqli_fetch_assoc($sql_voucher)) {

            ?>
              <tr>
                <th><?php echo $i++; ?></th>
                <input type="hidden" class="form-control" name="nama_mandarin[]" value="<?php echo $data['nama_mandarin']; ?>">
                <input type="hidden" class="form-control" name="nama_latin[]" value="<?php echo $data['nama_latin']; ?>">
                <input type="hidden" class="form-control" name="data[]" value="<?php echo $data['passport']; ?>">
                <td><?php echo $data['nama_mandarin']; ?></td>
                <td><?php echo $data['nama_latin']; ?></td>

                <td><?php echo $data['passport']; ?></td>
                <td><input class="form-control" type="text" name="jenis_visa[]" value="<?php echo $data['jenis_proses']; ?>"></td>
                <td><input class="form-control" type="number" name="harga[]" value="<?php echo $data['harga']; ?>"></td>

              </tr>
            <?php } ?>
          </tbody>

    </table>
  </div>
  <table id="tab" class="table table-hover table-bordered" style="width:60%;margin-top:50px;">

    <tr>
      <th width="40%">Nama Client</th>
      <td><input id="fc1" type="text" name="nama_pengguna" class="form-control" value="<?php echo $hasil['nama_pengguna']; ?>" oninvalid="alert('Nama Client kosong');" required /></td>
    </tr>
    <tr>
      <th width="40%">Mata Uang</th>
      <td><select name="mata_uang" class="form-control">

          <option selected><?php echo $mata_uang ?></option>
          <option>Rupiah</option>
          <option>Dollar</option>
        </select></td>
    </tr>

    <tr>
      <th width="40%">Staff OP</th>
      <td><input id="fc1" type="text" name="officer" class="form-control" value="<?php echo $hasil['officer']; ?>" required /></td>
    </tr>

    <tr>
      <th width="40%">Lokasi</th>
      <td><input id="fc1" type="text" name="lokasi" class="form-control" value="<?php echo $hasil['lokasi']; ?>" required /></td>
    </tr>
    <th width="40%">Note</th>
    <td><input id="fc1" type="text" name="ket" class="form-control" value="<?php echo $hasil['ket']; ?>" required /></td>
    </tr>

    <tr>
      <th colspan="2">
        <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
        <input type="hidden" class="form-control" name="input_by" value="<?php echo $nama_user; ?>">
        <input type="hidden" class="form-control" name="tgl_input" value="<?php echo $tgl_input; ?>">
        <input type="hidden" class="form-control" name="visa" value="<?php echo $visa; ?>">
        <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
        <input type="submit" value="Simpan" name="simpan_edit" class="btn btn-primary btn-block btn-lg" style="height:40px;">
      </th>
    </tr>


  </table>
  </form>
  </div>



<?php } else if (isset($_POST['edit'])) {
  $nama_mandarin = $_POST['nama_mandarin'];
  $harga = $_POST['harga'];
  $data = $_POST['data'];
  $jenis_visa = $_POST['jenis_visa'];
  $nama_latin = $_POST['nama_latin'];
  $nama_pengguna = $_POST['nama_pengguna'];
  $input_by = $_POST['input_by'];
  $ket = $_POST['ket'];
  $tgl_input = $_POST['tgl_input'];
  $officer = $_POST['officer'];
  $lokasi = $_POST['lokasi'];
  $id = $_POST['id'];


  $tgl_input = date('Y-m-d');
  $jumlah_pengguna = count($data);
  $total = 0;
  $mata_uang = $_POST['mata_uang'];
  $nama_pt = $_POST['nama_pt'];
  $visa = $_POST['visa'];
  $jumlah_dipilih = count($nama_mandarin);

?>
  <div class="container" style="margin-top:101px;">
    <center>
      <h2> Edit Voucher Visa </h2>
    </center>
    <hr class="colorgraph">

    <table id="tab" class="table table-hover table-bordered" style="width:50%;">
      <tr>
        <th> Nama Perusahaan </th>
        <td><?php echo $nama_pt; ?></td>
      </tr>

    </table>
    <table class="table table-hover table-bordered results" style="background-color:white;">
      <thead>
        <tr>
          <th style="text-align:center;">No</th>
          <th colspan="2" style="text-align:center;">Nama</th>
          <th style="text-align:center;">No Paspor</th>
          <th style="text-align:center;">Jenis Proses</th>
          <th style="text-align:center;">Jumlah</th>
        </tr>

      </thead>

      <form method="post" action="index.php?page=verif_voucher" style="width:80%; margin-left:200px !important;">
        <span class="counter pull-right"></span>
        <div class="scrollable-table">


          <tbody>
            <?php
            for ($i = 0; $i < $jumlah_dipilih; $i++) {
              $passport = $data[$i];
              $data_tka = "SELECT * FROM data WHERE nama_pt='$nama_pt' AND passport='$passport' ";
              $sql_tka = mysqli_query($connection, $data_tka);
              $hasil_tka = mysqli_fetch_assoc($sql_tka);
            ?>
              <tr>
                <th><?php echo $i + 1; ?></th>
                <td>
                  <input type="hidden" class="form-control" name="nama_mandarin[]" value="<?php echo $hasil_tka['nama_mandarin']; ?>">
                  <?php echo $hasil_tka['nama_mandarin'];  ?>
                </td>
                <td>
                  <input type="hidden" class="form-control" name="nama_latin[]" value="<?php echo $hasil_tka['nama_latin']; ?>">
                  <?php echo $hasil_tka['nama_latin'] ?>
                </td>
                <td>
                  <?php echo $hasil_tka['passport'] ?>
                </td>
                <td><input id="fc1" type="text" name="jenis_visa[]" class="form-control" value="<?php echo $jenis_visa[$i]; ?>" required /></td>
                <td><input id="fc1" type="number" name="harga[]" class="form-control" value="<?php echo $harga[$i]; ?>" required /></td>

              </tr>
            <?php
            }
            ?>

          </tbody>

    </table>
  </div>
  <table id="tab" class="table table-hover table-bordered" style="width:60%;margin-top:50px;">

    <tr>
      <th width="40%">Nama Client</th>
      <td><input id="fc1" type="text" name="nama_pengguna" class="form-control" value="<?php echo $nama_pengguna; ?>" oninvalid="alert('Nama Client kosong');" required /></td>
    </tr>
    <tr>
      <th width="40%">Mata Uang</th>
      <td><select name="mata_uang" class="form-control">

          <option selected><?php echo $mata_uang ?></option>
          <option>Rupiah</option>
          <option>Dollar</option>
        </select></td>
    </tr>

    <tr>
      <th width="40%">Staff OP</th>
      <td><input id="fc1" type="text" name="officer" class="form-control" value="<?php echo $officer; ?>" required /></td>
    </tr>

    <tr>
      <th width="40%">Lokasi</th>
      <td><input id="fc1" type="text" name="lokasi" class="form-control" value="<?php echo $lokasi; ?>" required /></td>
    </tr>
    <tr>
      <th width="40%">Note</th>
      <td><input id="fc1" type="text" name="ket" class="form-control" value="<?php echo $ket; ?>" required /></td>
    </tr>

    <tr>
      <th colspan="2">

        <?php
        $jumlah_dipilih = count($data);

        for ($x = 0; $x < $jumlah_dipilih; $x++) {
        ?>
          <input type="hidden" class="form-control" name="data[]" value="<?php echo $data[$x]; ?>">

        <?php } ?>
        <input type="hidden" class="form-control" name="input_by" value="<?php echo $nama_user; ?>">
        <input type="hidden" class="form-control" name="tgl_input" value="<?php echo $tgl_input; ?>">
        <input type="hidden" class="form-control" name="visa" value="<?php echo $visa; ?>">
        <input type="hidden" class="form-control" name="visa_pilih" value="<?php echo $visa_pilih; ?>">
        <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
        <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Masukan" name="simpan_edit" class="btn btn-primary btn-block btn-lg" style="height:40px;">
      </th>
    </tr>

  </table>
  </form>

<?php
}

?>