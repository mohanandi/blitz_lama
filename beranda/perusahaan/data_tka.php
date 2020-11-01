<div class="container" style="margin-top:101px;">
  <h2>
    <center>DATA TKA AKTIF <br> <?php echo $nama_pt; ?> </center>
  </h2>
  <div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="What you looking for?">
  </div>
  <div class="row">
    <div class="btn-group dropright pull-right">
      <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 25px;">
        Filter
      </button>
      <div class="dropdown-menu">

        <div class="col-xs-12 col-md-12"><input type="submit" value="by Passport" class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#passport"></div>

        <div class="col-xs-12 col-md-12"><input type="submit" value="by expired date" class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#expired"></div>

        <div class="col-xs-12 col-md-12"><input type="submit" value="by Tgl Input" class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#tgl_input"></div>





      </div>
    </div>

  </div>
</div>
</div>
<span class="counter pull-right"></span>
<div class="scrollable-table col-md-11" style="background-color: #f5f5f5; margin-left: 55px;">

  <table class="table table-hover table-bordered results" id="example">

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
        <th>Data Lama/Baru</th>

      </tr>
      <tr class="warning no-result">
        <td colspan="10"><i class="fa fa-warning"></i> Tidak Ditemukan</td>
      </tr>
    </thead>

    <?php




    ?>

    <tbody>
      <?php
      if (isset($_POST['filter_passport'])) {
        $passport = $_POST['passport'];
        if (strlen($passport) == 0) {
          seluruh($nama_pt);
        } else {
          filter($nama_pt, "passport", $passport);
        }
      } else if (isset($_POST['filter_tgl_input'])) {
        $tgl_input = $_POST['tgl_input'];
        if (strlen($tgl_input) == 0) {
          seluruh($nama_pt);
        } else {
          filter($nama_pt, "tgl_input", $tgl_input);
        }
      } else if (isset($_POST['filter_expired'])) {
        $tgl_awal = $_POST['tgl_awal'];
        $tgl_akhir = $_POST['tgl_akhir'];
        if (strlen($tgl_awal) == 0 || strlen($tgl_akhir) == 0) {
          seluruh($nama_pt);
        } else {
          filter_expired($nama_pt, "expired_passport", $tgl_awal, $tgl_akhir);
        }
      } else {
        seluruh($nama_pt);
      } ?>
    </tbody>
  </table>
</div>
</div>
<br><br>


<!-- Awal Filter berdasarkan passport -->
<div class="modal fade" id="passport" role="dialog" style="width:100%">
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
              <label>No Passport</label>
            </div>
            <input type="text" name="passport">
          </div>
        </div>
        <br>
        <div class="modal-footer">
          <input type="submit" name="filter_passport" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;"> </div>
    </div>

    </form>
  </div>
</div>
</div>
<!-- Akhir filter by passport -->

<!-- Awal filter by tanggal input -->
<div class="modal fade" id="tgl_input" role="dialog" style="width:100%">
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
              <label>passport </label>
            </div>
            <input type="date" name="tgl_input">
          </div>
        </div>
        <br>
        <div class="modal-footer">
          <input type="submit" name="filter_tgl_input" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;"> </div>
    </div>

    </form>
  </div>
</div>
</div>
<!-- akhir filter tgl input -->

<!-- Awal Filter berdasarkan passport -->
<div class="modal fade" id="expired" role="dialog" style="width:100%">
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
              <label>Expired Antara Tanggal</label>
            </div>
            <input type="date" name="tgl_wal">
            <input type="date" name="tgl_akhir">
          </div>
        </div>
        <br>
        <div class="modal-footer">
          <input type="submit" name="filter_expiired" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;"> </div>
    </div>

    </form>
  </div>
</div>
</div>
<!-- Akhir filter by passport -->


<?php
// Awal fungsi untuk keseluruhan
function seluruh($nama_pt)
{
  include("../../system/connect.php");

  $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt'";
  $data = mysqli_query($connection, $query);

  $no = 0;
  while ($row_data = mysqli_fetch_array($data)) {;
    $no++;
?>
    <tr>
      <td><?php echo $no;  ?></td>
      <td><a href="../data?page=data_edit&passport=<?php echo $row_data['passport']; ?>" class="btn btn-primary">Edit</a></td>
      <td><?php echo $row_data['nama_pt'];  ?></td>
      <td><?php echo $row_data['nama_mandarin'];  ?></td>
      <td><?php echo $row_data['nama_latin'];  ?></td>
      <td><?php echo $row_data['kewarganegaraan'];  ?></td>
      <td><?php echo $row_data['passport'];  ?></td>
      <td><?php echo $row_data['expired_passport'];  ?></td>
      <td><?php echo $row_data['tgl_lahir'];  ?></td>
      <td><?php echo $row_data['ket'];  ?></td>
      <td><?php echo $row_data['verif_data'];  ?></td>
    </tr>
  <?php
  }
}
// Akhir fungsi untuk keseluruhan

// Awal fungsi untuk filter
function filter($nama_pt, $point, $filter)
{
  include("../../system/connect.php");

  $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' && $point = '$filter'";
  $data = mysqli_query($connection, $query);

  $no = 0;
  while ($row_data = mysqli_fetch_array($data)) {;
    $no++;
  ?>
    <tr>
      <td><?php echo $no;  ?></td>

      <td><a href="../data?page=data_edit&passport=<?php echo $row_data['passport']; ?>">Edit</a></td>
      <td><?php echo $row_data['nama_pt'];  ?></td>
      <td><?php echo $row_data['nama_mandarin'];  ?></td>
      <td><?php echo $row_data['nama_latin'];  ?></td>
      <td><?php echo $row_data['kewarganegaraan'];  ?></td>
      <td><?php echo $row_data['passport'];  ?></td>
      <td><?php echo $row_data['expired_passport'];  ?></td>
      <td><?php echo $row_data['tgl_lahir'];  ?></td>
      <td><?php echo $row_data['ket'];  ?></td>
      <td><?php echo $row_data['verif_data'];  ?></td>
    </tr>
  <?php
  }
}
// akhir fungsi untuk filter


// Awal fungsi untuk filter expired passport
function filter_expired($nama_pt, $point, $filter)
{
  include("../../system/connect.php");

  $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' && $point = '$filter'";
  $data = mysqli_query($connection, $query);

  $no = 0;
  while ($row_data = mysqli_fetch_array($data)) {;
    $no++;
  ?>
    <tr>
      <td><?php echo $no;  ?></td>
      <td><a href="../data?page=data_edit&passport=<?php echo $row_data['passport']; ?>">Edit</a></td>
      <td><?php echo $row_data['nama_pt'];  ?></td>
      <td><?php echo $row_data['nama_mandarin'];  ?></td>
      <td><?php echo $row_data['nama_latin'];  ?></td>
      <td><?php echo $row_data['kewarganegaraan'];  ?></td>
      <td><?php echo $row_data['passport'];  ?></td>
      <td><?php echo $row_data['expired_passport'];  ?></td>
      <td><?php echo $row_data['tgl_lahir'];  ?></td>
      <td><?php echo $row_data['ket'];  ?></td>
      <td><?php echo $row_data['verif_data'];  ?></td>
    </tr>
<?php
  }
}
// akhir fungsi untuk filter expired passport

?>