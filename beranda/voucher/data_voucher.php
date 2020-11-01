<?php

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $data_voucher = "SELECT * FROM voucher_visa WHERE id=$id ";
  $sql_voucher = mysqli_query($connection, $data_voucher);
  $hasil = mysqli_fetch_assoc($sql_voucher);
  $mata_uang = $hasil['mata_uang'];
  $total = $hasil['total_harga'];
  $nama_pt = $hasil['nama_pt'];
  $lokasi = $hasil['lokasi'];
  $no_voucher = $hasil['kode'];
?>


  <div class="container" style="margin-top:101px;">
    <h2 style="text-align: center;"> Data Voucher Visa </h2>
    <h3 style="text-align: center;"> No <?= $no_voucher; ?> </h3>
    <hr class="colorgraph">

    <table id="tab" class="table table-hover table-bordered" style="width:50%;">
      <tr>
        <th> Nama Perusahaan </th>
        <td><?php echo $hasil['nama_pt']; ?></td>
      </tr>
      <tr>
        <th> Nama Client </th>
        <td><?php echo $hasil['nama_pengguna']; ?></td>
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
          $x = 1;
          $data_voucher = "SELECT * FROM data_vouchervisa WHERE no_voucher=$id ";
          $sql_voucher = mysqli_query($connection, $data_voucher);
          while ($data = mysqli_fetch_assoc($sql_voucher)) {

          ?>
            <tr>
              <th style="text-align: center;"><?php echo $x++; ?></th>

              <td style="text-align: center;"><?php echo $data['nama_mandarin']; ?></td>
              <td style="text-align: center;"><?php echo $data['nama_latin']; ?></td>

              <td style="text-align: center;"><?php echo $data['passport']; ?></td>
              <td style="text-align: center;"><?php echo $data['jenis_proses']; ?></td>
              <?php

              if ($mata_uang == "Rupiah") {
                $result = "Rp " . number_format($data['harga'], 2, ',', '.');
              ?>
                <td style="text-align: center;"><?php echo $result; ?></td>
              <?php } else {
                $result = "$ " . number_format($data['harga'], 2, '.', ',');
              ?>
                <td style="text-align: center;"><?php echo $result ?></td>
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
          $result = "Rp " . number_format($total, 2, ',', '.');
        ?>
          <td><?php echo $result; ?></td>
        <?php } else {
          $result = "$ " . number_format($total, 2, '.', ',');
        ?>
          <td><?php echo $result ?></td>
        <?php } ?>

      </tr>



    </table>
  </div>
  <table id="tab" class="table table-hover table-bordered" style="width:100%;margin-top:50px;">



    <tr>
      <th colspan="6"> Staff OP </th>
      <td><?php echo $hasil['officer']; ?></td>
    </tr>
    <tr>
      <th colspan="6"> Tanggal Input </th>
      <td><?php echo $hasil['tgl_input']; ?></td>
    </tr>
    <tr>
      <th colspan="6"> Input By </th>
      <td><?php echo $hasil['input_by']; ?></td>
    </tr>
    <tr>
      <th colspan="6"> Lokasi </th>
      <td><?php echo $hasil['lokasi']; ?></td>
    </tr>
    <tr>
      <th colspan="6"> Note </th>
      <td><?php echo $hasil['ket']; ?></td>
    </tr>
    <tr>

      <th colspan="6"> <a href="../voucher/cetak_vouchervisa.php?id=<?php echo $id; ?>">Export</a> </th>
      <td><a href="../voucher/?page=editjadi_vouchervisa&id=<?php echo $id; ?>">EDIT</a></td>
    </tr>


  </table>
  </div>

  <br>


<?php } ?>