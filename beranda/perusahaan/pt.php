<div class="container" align="center" style="margin-top:101px;"><h2> PROFIL <?php echo $nama_pt; ?> </h2>
  <span class="counter pull-right"></span>
  <div class="scrollable-table table-responsive col-md-11" style="background-color: #f5f5f5;">

    <table class="table table-hover table-borderless results" id="ptx" style="width:100%;" >

                    <?php
                    
                    
                     

                    $query = "SELECT * FROM perusahaan WHERE nama_pt = '$nama_pt' " ;
                    $result = mysqli_query ($connection, $query) ;
    
                    if (!$result) {
                    die ("gak bisa") ;
                    } 
                    
                    $row = mysqli_fetch_array($result) ;
                    
                    ?>

      <thead class="thead-dark">
        <tr style="background-color: white;">
          <th style="10%;">Name PT</th>
          <td> <?php echo $row['nama_pt']; ?></td>
        </tr>
        <tr style="background-color: white;">
          <th>PIC</th>
          <td><?php echo $row['pic'] ?></td>
        </tr>
        <tr style="background-color: white;">
          <th >Nama </th>
          <td><?php echo $row['nama_client']; ?></td>
        </tr>
        <tr style="background-color: white;">
          <th>Alamat</th>
          <td><?php echo $row['alamat']; ?></td>
          
        </tr>
        <tr style="background-color: white;">
          <th>Keterangan</th>
          <td><?php echo $row['ket']; ?></td>
        </tr>
      </thead>
    </table>
  
  </div>
  <br>
    <a class="btn btn-primary pull-left" href="../perusahaan?nama_pt=<?php echo $nama_pt; ?>&page=edit_pt" role="button" style="margin-left:52px;">Edit Profil Perusahaan</a>
    <button type="button" class="btn btn-danger pull-left" style="margin-left:10px;">Hapus</button>
    
</div>

