<?php
$id = $_GET['id'];

$query = "SELECT * FROM rptka WHERE id = '$id'";
$data = mysqli_query($connection, $query);
$row = mysqli_fetch_array($data);
$no_rptka = $row['no_rptka'];
?>

<div class="container">
  <?php
  $tgl_input = date('Y-m-d');
  ?>
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form name="myform" method="post" action="../../system/edit_rptka.php">
        <h2>Menambah RPTKA <?php echo $nama_pt; ?></h2>
        <hr class="colorgraph">
        <input type="hidden" class="form-control" name="tgl_input" value="<?php echo $tgl_input; ?>">
        <input type="hidden" class="form-control" name="input_by" value="<?php echo $nama_user; ?>">
        <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
        <input type="hidden" class="form-control" name="nama_pt" value="<?php echo $nama_pt; ?>">
        <div class="form-group">
          <label><strong> No RPTKA </strong> </label>
          <input type="text" name="no_rptka" id="no_rptka" class="form-control input-lg" value="<?php echo $no_rptka; ?>" tabindex="3" style="width:90% !important;">
        </div>

        <div class="form-group">
          <label><strong> Tanggal Terbit </strong> </label>
          <input type="date" name="tgl_terbit" id="tgl_terbit" class="form-control input-lg" tabindex="3" style="width:90% !important;" value="<?php echo $row['tgl_terbit']; ?>">
        </div>

        <div class="form-group">
          <label><strong> Tanggal Habis </strong> </label>
          <input type="date" name="tgl_habis" id="tgl_habis" class="form-control input-lg" tabindex="3" style="width:90% !important;" value="<?php echo $row['tgl_habis']; ?>">
        </div>

        <div class="form-group">
          <label><strong> Jumlah Pengguna RPTKA </strong> </label>
          <input type="number" name="jumlah_rptka" id="jumlah_rptka" class="form-control input-lg" value="<?php echo $row['jumlah_rptka']; ?>" tabindex="3" style="width:90% !important;">
        </div>

        <div class="form-group">
          <label><strong> Keterangan </strong> </label>
          <input type="text" name="ket" id="ket" class="form-control input-lg" value="<?php echo $row['ket']; ?>" tabindex="3" style="width:90% !important;">
        </div>

        <table class="table table-hover table-bordered results auto-index" id="myTable" style="width: 90%;">
          <thead class="thead-light">
            <tr>

              <th style="text-align:center; color:black;">Nama Jabatan</th>
              <th style="text-align:center; color:black;">Jumlah Maksimal Jabatan</th>
              <th style="text-align:center; color:black;">Aksi</th>

            </tr>

          </thead>

          <tbody id="badan">
            <?php
            $query = "SELECT * FROM jabatan_rptka WHERE nama_pt = '$nama_pt' && no_rptka = '$no_rptka'";
            $data = mysqli_query($connection, $query);
            while ($rpt = mysqli_fetch_array($data)) {
            ?>
              <tr style="width:90% !important;">
                <td>
                  <input type="text" class="form-control" name="nama_jabatan[]" value="<?php echo $rpt['jabatan']; ?>" />
                  <input type="hidden" class="form-control" name="njabatan_lama[]" value="<?php echo $rpt['jabatan']; ?>" />
                </td>

                <?php
                if ($rpt['terpakai'] == 0) {
                ?>

                  <td><input type="number" min="<?php echo $rpt['terpakai']; ?>" class="form-control" name=jumlah_jabatan[]" value="<?php echo $rpt['jumlah']; ?>" style="width: 100%  !important;" /></td>
                  <input type="hidden" class="form-control" name=jjabatan_lama[]" value="<?php echo $rpt['jumlah']; ?>" style="width: 100%  !important;" />
                  <td><button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>


                <?php } else {
                ?>
                  <td><input type="number" min="<?php echo $rpt['terpakai']; ?>" class="form-control" name=jumlah_jabatan[]" value="<?php echo $rpt['jumlah']; ?>" style="width: 100%  !important;" /></td>
                  <input type="hidden" class="form-control" name=jjabatan_lama[]" value="<?php echo $rpt['jumlah']; ?>" />
                <?php
                }
                ?>

              </tr>
            <?php } ?>
          </tbody>

        </table>
        <p>
          <input type="button" value="Tambah Jabatan" class="btn btn-success">
          <input type="submit" value="Submit" name="submit" class="btn btn-primary" style="width: 43% !important;">

        </p>



      </form>
    </div>
  </div>
</div>

<script>
  function validateForm() {
    var x = document.forms["myform"]["ket"].value;
    alert(x);
  }
</script>