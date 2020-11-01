<?php
if (isset($_POST['submit'])) {
  $data = $_POST['data'];
  $nama_pt = $_POST['nama_pt'];
  $visa = $_POST['visa'];
  $visa_pilih = $_POST['visa_pilih'];
  $jumlah_dipilih = count($data);
  $tgl = date('Y-m-d');

?>
  <div class="container" style="margin-top:101px;">
    <center>
      <h2> Input Voucher <?= $visa_pilih; ?> </h2>
    </center>
    <br>
    <hr class="colorgraph">
    <br>
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
                <td>
                  <input list="jns_proses" id="fc1" type="text" name="jenis_visa[]" class="form-control" placeholder="Input Jenis Visa" autocomplete="off" required />
                  <datalist id="jns_proses">
                    <option>APPLY VISA SINGAPORE</option>
                    <option>APPLY VISA MALAYSIA</option>
                    <option>APPLY TELEX 211 A</option>
                    <option>APPLY TELEX 211 B</option>
                    <option>APPLY TELEX 212</option>
                    <option>APPLY TELEX 312</option>
                    <option>APPLY TELEX 313</option>
                    <option>APPLY TELEX 314</option>
                    <option>APPLY TELEX 317</option>
                    <option>VISA OTHER</option>
                    <option>ACC PENURUNAN KITAS 12 BLN</option>
                    <option>ACC PENURUNAN KITAS 6 BLN</option>
                    <option>ERP TAK KEMBALI</option>
                    <option>EPO</option>
                    <option>BAP</option>
                    <option>OVERSTAY VISA 211</option>
                    <option>OVERSTAY VISA 312</option>
                    <option>EXTEND VOA</option>
                    <option>EXTEND KITAS</option>
                    <option>EXTEND KITAS 12 BLN -1</option>
                    <option>EXTEND KITAS 12 BLN -2</option>
                    <option>EXTEND KITAS 12 BLN -3</option>
                    <option>EXTEND KITAS 12 BLN -4</option>
                    <option>EXTEND KITAS 12 BLN -5</option>
                    <option>PNBP VISA TEMPEL</option>
                    <option>PNBP KITAS</option>
                    <option>PNBP KITAS 6 BLN</option>
                    <option>PNBP KITAS 12 BLN</option>
                    <option>EXTEND 211-1</option>
                    <option>EXTEND 211-2</option>
                    <option>EXTEND 211-3</option>
                    <option>EXTEND 211-4</option>
                    <option>ALIH STATUS SK DIRJEN</option>
                    <option>KONVERSI 211 KE 312</option>
                    <option>DPKK</option>
                    <option>STM</option>
                    <option>SKTT</option>
                    <option>BIAYA BPJS</option>
                    <option>DOMISILI</option>
                    <option>MUTASI ALAMAT MASUK</option>
                    <option>MUTASI ALAMAT KELUAR</option>
                    <option>MUTASI PASSPORT LAMA - BARU</option>
                    <option>ENTERTAIN</option>
                    <option>TIKET PESAWAT</option>
                    <option>TIKET HOTEL</option>
                    <option>TIKET KERETA</option>
                  </datalist>
                </td>
                <td><input id="fc1" type="number" name="harga[]" class="form-control" placeholder="Input Harga" required /></td>

              </tr>
            <?php
            }
            ?>

          </tbody>

    </table>
  </div>
  <table id="tab" class="table table-hover table-bordered" style="width:60%;margin-top:50px; margin-left: 15px;">

    <tr>
      <th width="40%">Nama Client</th>
      <td><input id="fc1" type="text" name="nama_pengguna" class="form-control" placeholder="Nama Client" required /></td>
    </tr>
    <tr>
      <th width="40%">Mata Uang</th>
      <td><select name="mata_uang" class="form-control">


          <option>Rupiah</option>
          <option>Dollar</option>
        </select></td>
    </tr>

    <tr>
      <th width="40%">Staff OP</th>
      <td><input id="fc1" type="text" name="officer" class="form-control" placeholder="Staff Operation" required /></td>
    </tr>

    <tr>
      <th width="40%">Lokasi</th>
      <td><input id="fc1" type="text" name="lokasi" class="form-control" placeholder="Lokasi" required /></td>
    </tr>
    <tr>
      <th width="40%">Note</th>
      <td><input id="fc1" type="text" name="ket" class="form-control" placeholder="Note" required /></td>
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
        <input type="hidden" class="form-control" name="visa_pilih" value="<?php echo $visa_pilih; ?>">
        <input type="hidden" class="form-control" name="tgl_input" value="<?php echo $tgl_input; ?>">
        <input type="hidden" class="form-control" name="visa" value="<?php echo $visa; ?>">
        <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
        <input type="submit" value="Masukan" name="submit" class="btn btn-primary btn-block btn-lg" style="height:40px;">
      </th>
    </tr>

  </table>
  </form>
  </div>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/Table-with-search.js"></script>
<?php }
?>