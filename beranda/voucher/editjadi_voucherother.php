<?php
include("../../system/connect.php");
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $data_voucher = "SELECT * FROM voucher_other WHERE id=$id ";
  $sql_voucher = mysqli_query($connection, $data_voucher);
  $hasil = mysqli_fetch_assoc($sql_voucher);
  $mata_uang = $hasil['mata_uang'];
  $total = $hasil['total_harga'];
  $nama_pt = $hasil['nama_pt'];
  $nama_pengguna = $hasil['nama_pengguna'];
  $officer = $hasil['officer'];
  $ket = $hasil['ket'];
  $lokasi = $hasil['lokasi'];
  if (isset($_GET['warning'])) {
    $warning = $_GET['warning'];
    if ($warning == "harga") {
?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Field Harga tidak boleh kosong!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php
    } else {
    ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Field Jenis Proses tidak boleh kosong!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

  <?php
    }
  }
  ?>

  <form method="post" action="index.php?page=verif_voucherother">
    <div class="container" style="margin-top:-20px;">
      <h2 style="text-align: center;"> Edit Voucher Other </h2>
      <hr class="colorgraph">
      <table id="tab" class="table table-hover table-bordered" style="width:50%;">

        <tr>
          <th> Nama Perusahaan </th>
          <td><select name="nama_pt" class="form-control">
              <?php
              $query = "SELECT * FROM perusahaan";
              $result = mysqli_query($connection, $query);
              ?>

              <option selected><?php echo $nama_pt; ?></option>
              <?php while ($row = mysqli_fetch_array($result)) {; ?>
                <option><?php echo $row['nama_pt']; ?></option>
              <?php } ?>
            </select></td>
        </tr>
        <tr>
          <th>Nama Client</th>
          <td><input class="form-control" type="text" name="nama_pengguna" value="<?php echo $nama_pengguna; ?>"></td>
          <td><input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>"></td>
        </tr>

      </table>


      <span class="counter pull-right"></span>
      <div class="scrollable-table">

        <table class="table table-hover table-bordered results auto-index" id="myTable">
          <thead class="thead-dark">
            <tr>
              <th style="text-align:center;">No</th>
              <th style="text-align:center;">Nama Mandarin</th>
              <th style="text-align:center;">Nama Latin</th>
              <th style="text-align:center;">No Paspor</th>
              <th style="text-align:center;">Jenis Proses</th>
              <th style="text-align:center;">Harga</th>
            </tr>

          </thead>

          <tbody id="badan">
            <?php
            $data_voucher = "SELECT * FROM data_voucherother WHERE no_voucher=$id ";
            $sql_voucher = mysqli_query($connection, $data_voucher);
            while ($data = mysqli_fetch_assoc($sql_voucher)) {

            ?>
              <tr>
                <td></td>
                <td> <input type="text" class="form-control" name="nama_mandarin[]" value="<?php echo $data['nama_mandarin']; ?>" /></td>
                <td><input type="text" class="form-control" name="nama_latin[]" value="<?php echo $data['nama_latin']; ?>" /></td>
                <td><input type="text" class="form-control" name="passport[]" value="<?php echo $data['passport']; ?>" /></td>
                <td><input type="text" class="form-control" name="jenis_proses[]" value="<?php echo $data['jenis_proses']; ?>" required /></td>
                <td> <input type="number" class="form-control" name="harga[]" value="<?php echo $data['harga']; ?>" required /></td>
                <td><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
              </tr>
            <?php  } ?>


          </tbody>

        </table>
        <p>
          <input type="button" value="Tambah Field" class="btn btn-success">
        </p>
      </div>



      <table id="tab" class="table table-hover table-bordered" style="width:60%;margin-top:50px;">
        <tr>

          <th> Mata Uang </th>
          <td><select name="mata_uang" class="form-control">

              <option selected><?php echo $mata_uang; ?></option>
              <option>Rupiah</option>
              <option>Dollar</option>
            </select></td>
        </tr>

        <tr>
          <th>Staff OP</th>
          <td><input class="form-control" type="text" name="officer" value="<?php echo $officer ?>"></td>
        </tr>
        <tr>
          <th>Lokasi</th>
          <td><input class="form-control" type="text" name="lokasi" value="<?php echo $lokasi ?>"></td>
        </tr>
        <tr>
          <th>Note</th>
          <td><input class="form-control" type="text" name="ket" value="<?php echo $ket ?>"></td>
        </tr>





      </table>
      <input type="submit" value="SIMPAN EDIT" name="simpan_edit" class="btn btn-primary btn-md">

    </div>

  </form>
<?php
} else if (isset($_POST['edit'])) {
  $nama_mandarin = $_POST['nama_mandarin'];
  $harga = $_POST['harga'];
  $id = $_POST['id'];
  $passport = $_POST['passport'];
  $jenis_proses = $_POST['jenis_proses'];
  $nama_latin = $_POST['nama_latin'];
  $nama_pengguna = $_POST['nama_pengguna'];
  $input_by = $_POST['input_by'];
  $ket = $_POST['ket'];
  $tgl_input = $_POST['tgl_input'];
  $officer = $_POST['officer'];
  $lokasi = $_POST['lokasi'];


  $tgl_input = date('Y-m-d');
  $jumlah_pengguna = count($passport);
  $total = 0;
  $mata_uang = $_POST['mata_uang'];
  $nama_pt = $_POST['nama_pt'];

  $jumlah_dipilih = count($nama_mandarin);

?>
  <div class="container" style="margin-top:101px;">
    <center>
      <h2> Edit Voucher Other </h2>
    </center>
    <hr class="colorgraph">


    <form method="post" action="index.php?page=verif_voucherother">
      <table id="tab" class="table table-hover table-bordered" style="width:50%;">

        <tr>
          <th> Nama Perusahaan </th>
          <td><select name="nama_pt" class="form-control">
              <?php
              $query = "SELECT * FROM perusahaan";
              $result = mysqli_query($connection, $query);
              ?>

              <option selected><?php echo $nama_pt; ?></option>
              <?php while ($row = mysqli_fetch_array($result)) {; ?>
                <option><?php echo $row['nama_pt']; ?></option>
              <?php } ?>
            </select></td>
        </tr>
        <tr>
          <th>Nama Client</th>
          <td><input type="text" name="nama_pengguna" value="<?php echo $nama_pengguna; ?>"></td>
          <td><input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>"></td>
        </tr>

      </table>


      <span class="counter pull-right"></span>
      <div class="scrollable-table">

        <table class="table table-hover table-bordered results auto-index" id="myTable">
          <thead class="thead-dark">
            <tr>
              <th style="text-align:center;">No</th>
              <th style="text-align:center;">Nama Mandarin</th>
              <th style="text-align:center;">Nama Latin</th>
              <th style="text-align:center;">No Paspor</th>
              <th style="text-align:center;">Jenis Proses</th>
              <th style="text-align:center;">Harga</th>
            </tr>

          </thead>

          <tbody id="badan">
            <?php
            for ($x = 0; $x < $jumlah_dipilih; $x++) {
            ?>
              <tr>
                <td></td>
                <td> <input type="text" class="form-control" name="nama_mandarin[]" value="<?php echo $nama_mandarin[$x]; ?>" /></td>
                <td><input type="text" class="form-control" name="nama_latin[]" value="<?php echo $nama_latin[$x]; ?>" /></td>
                <td> <input type="text" class="form-control" name="passport[]" value="<?php echo $passport[$x]; ?>" /></td>
                <td><input type="text" class="form-control" name="jenis_proses[]" value="<?php echo $jenis_proses[$x]; ?>" /></td>
                <td> <input type="number" class="form-control" name="harga[]" value="<?php echo $harga[$x]; ?>" /></td>
                <td><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
              </tr>
            <?php
            }
            ?>


          </tbody>

        </table>
        <p>
          <input type="button" value="Tambah Field" class="btn btn-success">
        </p>
      </div>



      <table id="tab" class="table table-hover table-bordered" style="width:60%;margin-top:50px;">
        <tr>

          <th> Mata Uang </th>
          <td><select name="mata_uang" class="form-control">

              <option selected><?php echo $mata_uang; ?></option>
              <option>Rupiah</option>
              <option>Dollar</option>
            </select></td>
        </tr>

        <tr>
          <th>Staff OP</th>
          <td><input type="text" name="officer" value="<?php echo $officer ?>"></td>
        </tr>
        <tr>
          <th>Lokasi</th>
          <td><input type="text" name="lokasi" id="lokasi" value="<?php echo $lokasi; ?>"></td>
        </tr>
        <tr>
          <th>Note</th>
          <td><input type="text" name="ket" id="ket" value="<?php echo $ket ?>"></td>
        </tr>





      </table>
      <input type="submit" value="Simpan Edit" name="simpan_edit" class="btn btn-primary btn-md">

  </div>

  </form>
<?php
}

?>