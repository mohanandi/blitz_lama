<div class="container" style="margin-top:101px;"><h2 style="text-align: center;"> RPTKA <?php echo $nama_pt; ?> </h2>
   <div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="What you looking for?">
  </div>
  <div class="row">
          <div class="btn-group dropright pull-right">
  <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 30px;">
    Filter
  </button>
  <div class="dropdown-menu">

    <div class="col-xs-12 col-md-12"><input type="submit" value="by date" 
    class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#date"></div>
      
    <div class="col-xs-12 col-md-12"><input type="submit" value="by expired date" 
    class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#expired"></div>

  
                  
          

  </div>
</div>

  </div>
</div>
</div>
  <span class="counter pull-right"></span>
<div class="scrollable-table col-md-11" style="background-color: #f5f5f5; margin-left: 55px;">

    <table class="table table-hover table-bordered results " >

                    <?php
                    

                    $query = "SELECT * FROM rptka" ;
                    $result = mysqli_query ($connection, $query) ;
    
                    if (!$result) {
                    die ("gak bisa") ;
                    } 
                    $no = 0;
                    
                    
                    ?>

      <thead class="thead-dark">
        <tr>
          <th>No</th>
          <th>No RPTKA</th>
          <th>Tanggal Terbit</th>
          <th>Tanggal Habis</th>
          <th>Jumlah RPTKA</th>
          <th>RPTKA Terpakai</th>
          <th>RPTKA Sisa</th>
          <th>Keterangan</th>
          <th>Aksi</th>
      
        </tr>
        <tr class="warning no-result" >
          <td colspan="10"><i class="fa fa-warning"></i> Tidak Ditemukan</td>
        </tr>
      </thead>
      <tbody>
      <?php while($row = mysqli_fetch_array($result)){   
        if ($row['nama_pt'] == $nama_pt){
        ?>

        <tr style="background-color: white;">
          <td width="10%"><?php $no++; echo $no ?></td>
          <td><?php echo $row['no_rptka']; ?> </td>
          <td><?php echo $row['tgl_terbit']; ?></td>
          <td><?php echo $row['tgl_habis']; ?></td>
          <td><?php echo $row['jumlah_rptka']; ?></td>
          <td><?php echo $row['rptka_pakai']; ?></td>
          <td><?php echo $row['rptka_sisa']; ?></td>
          <td><?php echo $row['ket'] ; ?></td>
          <td>
          <a class="btn btn-success pull-center btn-sm" href="index.php?page=rptka_edit&&id=<?php echo $row['id'] ?>&&nama_pt=<?php echo $nama_pt ?>" role="button">Edit</a>
          <a class="btn btn-info pull-center btn-sm" href="../perusahaan?no_rptka=<?php echo $row['no_rptka']; ?>&page=pengguna_rptka&nama_pt=<?php echo $nama_pt; ?>&jumlah_rptka=<?php echo $row['jumlah_rptka']; ?>" role="button">Detail</a>
          
        </tr>
        <?php } else {}
        } ?>
      </tbody>
    </table>
  </div>
</div>

<div align="center">
    
    <a class="btn btn-primary pull-center" href="../perusahaan?nama_pt=<?php echo $nama_pt; ?>&page=tambah_rptka" role="button">Tambah RPTKA</a>
</div>


<div class="modal fade" id="date" role="dialog" style="width:100%">
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
            <label>Tanggal</label>
            <div><select name="nama_pt" class="form-control" style="width:100%;"> 
            <?php
              $query = "SELECT * FROM perusahaan" ;
              $result = mysqli_query ($connection, $query) ;
           ?>
          
            <option selected></option>
            <?php while($row = mysqli_fetch_array($result)){ ; ?>
            <option><?php echo $row['nama_pt']; ?></option>
            <?php } ?>
          </select>
          </div>
          </div>
            <br>
                                      
                                    
        
        <div class="modal-footer">
            <input type="submit" name="visa_kunjungan" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;">             </div>
        </div>

        </form>
        </div>
      </div>
      </div>
      </div>

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
            <label>Tanggal Awal</label>
            <div><select name="nama_pt" class="form-control" style="width:100%;"> 
            <?php
              $query = "SELECT * FROM perusahaan" ;
              $result = mysqli_query ($connection, $query) ;
           ?>
          
            <option selected></option>
            <?php while($row = mysqli_fetch_array($result)){ ; ?>
            <option><?php echo $row['nama_pt']; ?></option>
            <?php } ?>
          </select>
          </div>
          </div>
          <div class="form-group">
            <div class="row">
            <label>Tanggal Expired</label>
            <div><select name="nama_pt" class="form-control" style="width:100%;"> 
            <?php
              $query = "SELECT * FROM perusahaan" ;
              $result = mysqli_query ($connection, $query) ;
           ?>
          
            <option selected></option>
            <?php while($row = mysqli_fetch_array($result)){ ; ?>
            <option><?php echo $row['nama_pt']; ?></option>
            <?php } ?>
          </select>
          </div>
          </div>
            <br>
                                      
                                    
        
        <div class="modal-footer">
            <input type="submit" name="visa_kunjungan" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;">             </div>
        </div>

        </form>
        </div>
      </div>
      </div>
      </div>