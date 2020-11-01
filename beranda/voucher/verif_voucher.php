<?php

if (isset($_POST['submit'])) {
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
  $visa_pilih = $_POST['visa_pilih'];


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
      <h2> Validasi Voucher <?= $visa_pilih; ?> </h2>
    </center>
    <hr class="colorgraph">

    <table id="tab" class="table table-hover table-bordered" style="width:50%;">
      <tr>
        <th> Nama Perusahaan </th>
        <td><?php echo $nama_pt; ?></td>
      </tr>

      <tr>
        <th> Nama Client </th>
        <td><?php echo $nama_pengguna; ?></td>
      </tr>



    </table>


    <span class="counter pull-right"></span>
    <div class="scrollable-table">

      <table class="table table-hover table-bordered results">
        <thead>
          <tr>
            <th style="text-align:center;">No</th>
            <th colspan="2" style="text-align:center;">Nama</th>
            <th style="text-align:center;">No Paspor</th>
            <th style="text-align:center;">Jenis Proses</th>
            <th style="text-align:center;">Harga</th>
          </tr>
          <tr class="warning no-result">
            <td colspan="10"><i class="fa fa-warning"></i> Tidak Ditemukan</td>
          </tr>
        </thead>
        <tbody>
          <?php
          for ($x = 0; $x < count($data); $x++) {
          ?>
            <tr>
              <th><?php echo $x + 1; ?></th>
              <td><?php echo $nama_mandarin[$x]; ?></td>
              <td><?php echo $nama_latin[$x]; ?></td>
              <td><?php echo $data[$x]; ?></td>
              <td><?php echo $jenis_visa[$x]; ?></td>
              <?php
              $total = $total + $harga[$x];
              if ($mata_uang == "Rupiah") {
                $hasil = "Rp " . number_format($harga[$x], 2, ',', '.');
              ?>
                <td><?php echo $hasil; ?></td>
              <?php } else {
                $hasil = "$ " . number_format($harga[$x], 2, '.', ',');
              ?>
                <td><?php echo $hasil ?></td>
              <?php } ?>
            </tr>
          <?php } ?>
        </tbody>


      </table>
    </div>
    <table id="tab" class="table table-hover table-bordered" style="width:100%;margin-top:50px;">

      <tr>
        <th colspan="6"> Total </th>
        <?php
        if ($mata_uang == "Rupiah") {
          $hasil = "Rp " . number_format($total, 2, ',', '.');
        ?>
          <td><?php echo $hasil; ?></td>
        <?php } else {
          $hasil = "$ " . number_format($total, 2, '.', ',');
        ?>
          <td><?php echo $hasil ?></td>
        <?php } ?>

      </tr>
    </table>


    <table id="tab" class="table table-hover table-bordered" style="width:100%;margin-top:50px;">

      <tr>
        <th colspan="6"> Staff OP </th>
        <td><?php echo $officer ?></td>
      </tr>
      <tr>
        <th colspan="6"> Tanggal Input </th>
        <td><?php echo $tgl_input ?></td>
      </tr>
      <tr>
        <th colspan="6"> Input By </th>
        <td><?php echo $input_by ?></td>
      </tr>
      <tr>
        <th colspan="6"> Lokasi </th>
        <td><?php echo $lokasi ?></td>
      </tr>
      <tr>
        <th colspan="6"> Note </th>
        <td><?php echo $ket ?></td>
      </tr>
    </table>
    <table id="tab" class="table table-hover table-bordered" style="width:60%;margin-top:50px;">


      <tr>
        <form method="post" action="index.php?page=edit_vouchervisa">
          <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
          <input type="hidden" class="form-control" name="mata_uang" value="<?php echo $mata_uang; ?>">
          <input type="hidden" class="form-control" name="total_harga" value="<?php echo $total; ?>">
          <input type="hidden" class="form-control" name="jumlah_pengguna" value="<?php echo $jumlah_pengguna; ?>">
          <input type="hidden" class="form-control" name="tgl_input" value="<?php echo $tgl_input; ?>">
          <input type="hidden" class="form-control" name="input_by" value="<?php echo $nama_user; ?>">
          <input type="hidden" class="form-control" name="ket" value="<?php echo $ket; ?>">
          <input type="hidden" class="form-control" name="nama_pengguna" value="<?php echo $nama_pengguna; ?>">
          <input type="hidden" class="form-control" name="officer" value="<?php echo $officer; ?>">
          <input type="hidden" class="form-control" name="visa" value="<?php echo $visa; ?>">
          <input type="hidden" class="form-control" name="visa_pilih" value="<?php echo $visa_pilih; ?>">
          <input type="hidden" class="form-control" name="lokasi" value="<?php echo $lokasi; ?>">
          <?php

          for ($x = 0; $x < count($data); $x++) {

          ?>
            <input type="hidden" class="form-control" name="jenis_visa[]" value="<?php echo $jenis_visa[$x]; ?>">
            <input type="hidden" class="form-control" name="harga[]" value="<?php echo $harga[$x]; ?>">
            <input type="hidden" class="form-control" name="data[]" value="<?php echo $data[$x]; ?>">

            <input type="hidden" class="form-control" name="nama_mandarin[]" value="<?php echo $nama_mandarin[$x]; ?>">
            <input type="hidden" class="form-control" name="nama_latin[]" value="<?php echo $nama_latin[$x]; ?>">
          <?php
          }
          ?>

          <th> <input type="submit" value="Edit" name="edit" class="btn btn-primary btn-block btn-lg" style="height:40px;"></th>

        </form>
        <form method="post" action="../../system/buat_vouchervisa.php">
          <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
          <input type="hidden" class="form-control" name="mata_uang" value="<?php echo $mata_uang; ?>">
          <input type="hidden" class="form-control" name="total_harga" value="<?php echo $total; ?>">
          <input type="hidden" class="form-control" name="jumlah_pengguna" value="<?php echo $jumlah_pengguna; ?>">
          <input type="hidden" class="form-control" name="tgl_input" value="<?php echo $tgl_input; ?>">
          <input type="hidden" class="form-control" name="input_by" value="<?php echo $nama_user; ?>">
          <input type="hidden" class="form-control" name="ket" value="<?php echo $ket; ?>">
          <input type="hidden" class="form-control" name="nama_pengguna" value="<?php echo $nama_pengguna; ?>">
          <input type="hidden" class="form-control" name="officer" value="<?php echo $officer; ?>">
          <input type="hidden" class="form-control" name="visa" value="<?php echo $visa; ?>">
          <input type="hidden" class="form-control" name="lokasi" value="<?php echo $lokasi; ?>">
          <?php

          for ($x = 0; $x < count($data); $x++) {

          ?>
            <input type="hidden" class="form-control" name="jenis_visa[]" value="<?php echo $jenis_visa[$x]; ?>">
            <input type="hidden" class="form-control" name="harga[]" value="<?php echo $harga[$x]; ?>">
            <input type="hidden" class="form-control" name="data[]" value="<?php echo $data[$x]; ?>">

            <input type="hidden" class="form-control" name="nama_mandarin[]" value="<?php echo $nama_mandarin[$x]; ?>">
            <input type="hidden" class="form-control" name="nama_latin[]" value="<?php echo $nama_latin[$x]; ?>">
          <?php
          }
          ?>
          <td>
            <input type="submit" value="Simpan" name="submit" class="btn btn-primary btn-block btn-lg" style="height:40px;">
          </td>
        </form>
      </tr>



    </table>
  </div>

<?php
} else if (isset($_POST['simpan_edit'])) {
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
  $id = $_POST['id'];
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
      <h2> Validasi Edit Voucher Visa </h2>
    </center>
    <hr class="colorgraph">

    <table id="tab" class="table table-hover table-bordered" style="width:50%;">
      <tr>
        <th> Nama Perusahaan </th>
        <td><?php echo $nama_pt; ?></td>
      </tr>

      <tr>
        <th> Nama Client </th>
        <td><?php echo $nama_pengguna; ?></td>
      </tr>



    </table>


    <span class="counter pull-right"></span>
    <div class="scrollable-table">

      <table class="table table-hover table-bordered results">
        <thead>
          <tr>
            <th style="text-align:center;">No</th>
            <th colspan="2" style="text-align:center;">Nama</th>
            <th style="text-align:center;">No Paspor</th>
            <th style="text-align:center;">Jenis Proses</th>
            <th style="text-align:center;">Harga</th>
          </tr>
          <tr class="warning no-result">
            <td colspan="10"><i class="fa fa-warning"></i> Tidak Ditemukan</td>
          </tr>
        </thead>
        <tbody>
          <?php
          for ($x = 0; $x < count($data); $x++) {
          ?>
            <tr>
              <th><?php echo $x + 1; ?></th>
              <td><?php echo $nama_mandarin[$x]; ?></td>
              <td><?php echo $nama_latin[$x]; ?></td>
              <td><?php echo $data[$x]; ?></td>
              <td><?php echo $jenis_visa[$x]; ?></td>
              <?php
              $total = $total + $harga[$x];
              if ($mata_uang == "Rupiah") {
                $hasil = "Rp " . number_format($harga[$x], 2, ',', '.');
              ?>
                <td><?php echo $hasil; ?></td>
              <?php } else {
                $hasil = "$ " . number_format($harga[$x], 2, '.', ',');
              ?>
                <td><?php echo $hasil ?></td>
              <?php } ?>
            </tr>
          <?php } ?>
        </tbody>


      </table>
    </div>
    <table id="tab" class="table table-hover table-bordered" style="width:100%;margin-top:50px;">

      <tr>
        <th colspan="6"> Total </th>
        <?php
        if ($mata_uang == "Rupiah") {
          $hasil = "Rp " . number_format($total, 2, ',', '.');
        ?>
          <td><?php echo $hasil; ?></td>
        <?php } else {
          $hasil = "$ " . number_format($total, 2, '.', ',');
        ?>
          <td><?php echo $hasil ?></td>
        <?php } ?>

      </tr>
    </table>


    <table id="tab" class="table table-hover table-bordered" style="width:100%;margin-top:50px;">

      <tr>
        <th colspan="6"> Staff OP </th>
        <td><?php echo $officer ?></td>
      </tr>
      <tr>
        <th colspan="6"> Tanggal Input </th>
        <td><?php echo $tgl_input ?></td>
      </tr>
      <tr>
        <th colspan="6"> Input By </th>
        <td><?php echo $input_by ?></td>
      </tr>
      <tr>
        <th colspan="6"> Lokasi </th>
        <td><?php echo $lokasi ?></td>
      </tr>
      <tr>
        <th colspan="6"> Note </th>
        <td><?php echo $ket ?></td>
      </tr>
    </table>
    <table id="tab" class="table table-hover table-bordered" style="width:60%;margin-top:50px;">


      <tr>

        <form method="post" action="../voucher/?page=editjadi_vouchervisa">
          <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
          <input type="hidden" class="form-control" name="mata_uang" value="<?php echo $mata_uang; ?>">
          <input type="hidden" class="form-control" name="total_harga" value="<?php echo $total; ?>">
          <input type="hidden" class="form-control" name="jumlah_pengguna" value="<?php echo $jumlah_pengguna; ?>">
          <input type="hidden" class="form-control" name="tgl_input" value="<?php echo $tgl_input; ?>">
          <input type="hidden" class="form-control" name="input_by" value="<?php echo $nama_user; ?>">
          <input type="hidden" class="form-control" name="ket" value="<?php echo $ket; ?>">
          <input type="hidden" class="form-control" name="nama_pengguna" value="<?php echo $nama_pengguna; ?>">
          <input type="hidden" class="form-control" name="officer" value="<?php echo $officer; ?>">
          <input type="hidden" class="form-control" name="visa" value="<?php echo $visa; ?>">
          <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
          <input type="hidden" class="form-control" name="lokasi" value="<?php echo $lokasi; ?>">
          <?php

          for ($x = 0; $x < count($data); $x++) {

          ?>
            <input type="hidden" class="form-control" name="jenis_visa[]" value="<?php echo $jenis_visa[$x]; ?>">
            <input type="hidden" class="form-control" name="harga[]" value="<?php echo $harga[$x]; ?>">
            <input type="hidden" class="form-control" name="data[]" value="<?php echo $data[$x]; ?>">

            <input type="hidden" class="form-control" name="nama_mandarin[]" value="<?php echo $nama_mandarin[$x]; ?>">
            <input type="hidden" class="form-control" name="nama_latin[]" value="<?php echo $nama_latin[$x]; ?>">
          <?php
          }
          ?>
          <td>
            <input type="submit" value="Edit" name="edit" class="btn btn-primary btn-block btn-lg" style="height:40px;">
          </td>
        </form>


        <form method="post" action="../../system/edit_vouchervisa.php">
          <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
          <input type="hidden" class="form-control" name="mata_uang" value="<?php echo $mata_uang; ?>">
          <input type="hidden" class="form-control" name="total_harga" value="<?php echo $total; ?>">
          <input type="hidden" class="form-control" name="jumlah_pengguna" value="<?php echo $jumlah_pengguna; ?>">
          <input type="hidden" class="form-control" name="tgl_input" value="<?php echo $tgl_input; ?>">
          <input type="hidden" class="form-control" name="input_by" value="<?php echo $nama_user; ?>">
          <input type="hidden" class="form-control" name="ket" value="<?php echo $ket; ?>">
          <input type="hidden" class="form-control" name="nama_pengguna" value="<?php echo $nama_pengguna; ?>">
          <input type="hidden" class="form-control" name="officer" value="<?php echo $officer; ?>">
          <input type="hidden" class="form-control" name="visa" value="<?php echo $visa; ?>">
          <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
          <input type="hidden" class="form-control" name="lokasi" value="<?php echo $lokasi; ?>">
          <?php

          for ($x = 0; $x < count($data); $x++) {

          ?>
            <input type="hidden" class="form-control" name="jenis_visa[]" value="<?php echo $jenis_visa[$x]; ?>">
            <input type="hidden" class="form-control" name="harga[]" value="<?php echo $harga[$x]; ?>">
            <input type="hidden" class="form-control" name="data[]" value="<?php echo $data[$x]; ?>">

            <input type="hidden" class="form-control" name="nama_mandarin[]" value="<?php echo $nama_mandarin[$x]; ?>">
            <input type="hidden" class="form-control" name="nama_latin[]" value="<?php echo $nama_latin[$x]; ?>">
          <?php
          }
          ?>
          <td>
            <input type="submit" value="Simpan Edit" name="submit" class="btn btn-primary btn-block btn-lg" style="height:40px;">
          </td>
        </form>
      </tr>



    </table>
  </div>

<?php
}
?>