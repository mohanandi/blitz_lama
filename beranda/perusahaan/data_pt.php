<div class="container" style="margin-top:101px;">
  <h2> Data Perusahaan </h2>
  <div class="form-group pull-right">
    <div class="input-group">
      <span class="input-group-btn">
        <button id="tambah" class="btn btn-default" type="button" style="margin-right:20px;">
          <a href="../perusahaan?page=tambah_pt" style="color:black;">
            Tambah Perusahaan
          </a>
        </button>
      </span>
      <br>
      <input type="text" class="search form-control" placeholder="What you looking for?">
    </div>

  </div>
  <span class="counter pull-right"></span>
  <div class="scrollable-table" style="background-color: #f5f5f5">

    <table id="example" class="table table-hover table-bordered results row-border order-column display">

      <?php


      $query = "SELECT * FROM perusahaan";
      $result = mysqli_query($connection, $query);

      if (!$result) {
        die("gak bisa");
      }
      $no = 0;


      ?>

      <thead class="thead-dark">
        <tr>
          <th>No</th>
          <th>Aksi</th>
          <th>Name PT</th>
          <th>PIC</th>
          <th>Nama Client</th>
          <th>Alamat</th>
          <th>Keterangan</th>


        </tr>
        <tr class="warning no-result">
          <td colspan="10"><i class="fa fa-warning"></i> Tidak Ditemukan</td>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_array($result)) {;
          $no++; ?>
          <tr>
            <td><?php echo $no ?></td>
            <td>
              <a href="../perusahaan?page=pt&nama_pt=<?php echo $row['nama_pt']; ?>" class="btn btn-primary">
                Pilih
              </a>
            </td>
            <td><?php echo $row['nama_pt']; ?></td>
            <td><?php echo $row['pic']; ?></td>
            <td><?php echo $row['nama_client']; ?></td>
            <td><?php echo $row['alamat']; ?></td>

            <td><?php echo $row['ket']; ?></td>




          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>