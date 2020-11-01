<form method="post" action="index.php?page=verif_voucherother">
  <div class="container" style="margin-top:-20px;">
    <h2 style="text-align: center;"> Input Voucher Other </h2>
    <hr class="colorgraph">

    <?php
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
      } else if ($warning == "data") {
      ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          Tidak ada pengguna voucher ini!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      <?php
      } else if ($warning == "proses") {
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

    <table id="tab" class="table table-hover table-bordered" style="width:50%;">

      <tr>
        <th> Nama Perusahaan </th>
        <td><input list="pt_list" name="nama_pt" class="form-control" placeholder="Pilih PT" required>
          <datalist id="pt_list">
            <?php
            $query = "SELECT * FROM perusahaan";
            $result = mysqli_query($connection, $query);
            ?>
            <?php while ($row = mysqli_fetch_array($result)) {; ?>
              <option><?php echo $row['nama_pt']; ?></option>
            <?php } ?>
          </datalist>
        </td>
      </tr>
      <tr>
        <th>Nama Client</th>
        <td><input class="form-control" type="text" name="nama_pengguna" placeholder="Nama client" required></td>
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



        </tbody>

      </table>
      <p>
        <input type="button" value="Tambah Field" class="btn btn-success">
      </p>
    </div>



    <table id="tab" class="table table-hover table-bordered" style="width:60%;margin-top:50px;">
      <tr>

        <th> Mata Uang </th>
        <td><input list="list_uang" name="mata_uang" id="mata_uang" placeholder="Mata Uang" class="form-control" required>
          <datalist id="list_uang">
            <option>Rupiah</option>
            <option>Dollar</option>
          </datalist>
        </td>
      </tr>

      <tr>
        <th>Staff OP</th>
        <td><input type="text" name="officer" id="officer" placeholder="Staff OP" class="form-control" required></td>
      </tr>
      <tr>
        <th>Lokasi</th>
        <td><input type="text" name="lokasi" id="lokasi" placeholder="Lokasi" class="form-control" required></td>
      </tr>
      <tr>
        <th>Note</th>
        <td><input type="text" name="ket" id="ket" placeholder="Note Voucher" class="form-control" required></td>
      </tr>





    </table>
    <input type="submit" value="Simpan" name="submit" class="btn btn-primary btn-md">

  </div>

</form>