    <?php
    $query = "SELECT * FROM perusahaan WHERE nama_pt = '$nama_pt' ";
    $result = mysqli_query($connection, $query);

    if (!$result) {
      die("gak bisa");
    }

    $row = mysqli_fetch_array($result);

    ?>


    <div class="container">

      <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <form method="post" action="../../system/edit_pt.php" onsubmit="return empty()">
            <h2>Menambah Data Perusahaan</h2>
            <hr class="colorgraph">
            <div class="form-group">
              <label><strong> Nama Perusahaan </strong> </label>
              <input type="text" name="nama_pt" id="nama_pt" class="form-control input-lg" value="<?php echo $row['nama_pt']; ?>" tabindex="3" style="width:90% !important;">
            </div>

            <div class="form-group">
              <label for="inputNamaPT"> <strong>PIC</strong> </label>
              <select name="pic" class="form-control" style="width:90%;" id="picy">
                <option selected><?php echo $row['pic']; ?></option>
                <?php
                $query_pic = "SELECT * FROM pic";
                $sql_pic = mysqli_query($connection, $query_pic);
                while ($row_pic = mysqli_fetch_array($sql_pic)) {
                ?>
                  <option><?= $row_pic['nama']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label><strong> Nama Client </strong> </label>
              <input type="text" name="nama_client" id="nama_client" class="form-control input-lg" value="<?php echo $row['nama_client']; ?>" tabindex="3" style="width:90% !important;">
              <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
            </div>

            <div class="form-group">

              <label><strong> Alamat </strong> </label>
              <input type="text" name="alamat" id="alamat" class="form-control input-lg" value="<?php echo $row['alamat']; ?>" tabindex="3" style="width:90% !important;">
            </div>

            <div class="form-group">
              <label><strong> Keterangan </strong></label>
              <input type="textarea" name="ket" id="ket" class="form-control input-lg" value="<?php echo $row['ket']; ?>" tabindex="4" style="width:90% !important;">
            </div>


            <div class="row">
              <div class="col-xs-12 col-md-12"><input type="submit" value="Edit" name="submit" class="btn btn-primary btn-block btn-md" tabindex="7" style="width:50% !important; margin-left: 20%;"></div>
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