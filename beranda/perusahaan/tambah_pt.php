<div class="container">

  <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form method="post" action="../../system/tambah_pt.php" onsubmit="return empty()">
        <h2>Menambah Data Perusahaan</h2>
        <hr class="colorgraph">
        <div class="form-group">
          <label><strong> Nama Perusahaan </strong> </label>
          <input type="text" name="nama_pt" id="nama_pt" class="form-control input-lg" placeholder="Nama Perusahaan" tabindex="1" style="width:90% !important;">
        </div>

        <div class="form-group">
          <label for="inputNamaPT"> <strong>PIC</strong> </label>
          <input name="pic" list="list_pic" class="form-control" tabindex="2" style="width:90%;" id="picy">
          <datalist id="list_pic">
            <?php
            $query_pic = "SELECT * FROM pic";
            $sql_pic = mysqli_query($connection, $query_pic);
            while ($row = mysqli_fetch_array($sql_pic)) {
            ?>
              <option><?= $row['nama']; ?></option>
            <?php
            }
            ?>
          </datalist>
        </div>

        <div class="form-group">
          <label><strong> Nama Client </strong> </label>
          <input type="text" name="nama_client" id="nama_client" class="form-control" placeholder="Nama Client" tabindex="3" style="width:90% !important;">
        </div>

        <div class="form-group">

          <label><strong> Alamat </strong> </label>
          <input type="text" name="alamat" id="alamat" class="form-control input-lg" placeholder="Alamat" tabindex="4" style="width:90% !important;">
        </div>

        <div class="form-group">
          <label><strong> Keterangan </strong></label>
          <input type="textarea" name="ket" id="ket" class="form-control input-lg" placeholder="Keterangan" tabindex="5" style="width:90% !important;">
        </div>


        <div class="row">
          <div class="col-xs-12 col-md-12"><input type="submit" value="Masukan" name="submit" class="btn btn-primary btn-md" tabindex="6" style="width:50% !important;"></div>
        </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
  function empty() {
    var nama_pt = document.getElementById("nama_pt").value;
    var picy = document.getElementById("pic").value;
    var nama_client = document.getElementById("nama_client").value;
    var alamat = document.getElementById("alamat").value;
    var ket = document.getElementById("ket").value;

    if (nama_pt == "") {
      alert("Nama Perusahaan Kosong");
      return false;
    } else if (picy == "Pilih") {
      alert("Pilih PIC");
      return false;
    } else if (nama_client == "") {
      alert("Nama Client Kosong");
      return false;
    } else if (alamat == "") {
      alert("Masukan Alamat");
      return false;
    } else if (ket == "") {
      alert("Masukan Keterangan");
      return false;
    };
  }
</script>