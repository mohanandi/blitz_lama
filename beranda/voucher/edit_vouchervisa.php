<?php
if (isset($_POST['edit'])) {
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
  $visa_pilih = $_POST['visa_pilih'];
  $lokasi = $_POST['lokasi'];


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
      <h2> Edit Voucher <?php echo $visa_pilih; ?> </h2>
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
                <td><input id="fc1" type="text" name="jenis_visa[]" class="form-control" value="<?php echo $jenis_visa[$i]; ?>" oninvalid="alert('Masukan Jenis Visa');" required /></td>
                <td><input id="fc1" type="number" name="harga[]" class="form-control" value="<?php echo $harga[$i]; ?>" oninvalid="alert('Masukan Harga');" required /></td>

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
        <input type="submit" value="Masukan" name="submit" class="btn btn-primary btn-block btn-lg" style="height:40px;">
      </th>
    </tr>

  </table>
  </form>


  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/Table-with-search.js"></script>
<?php }
?>