<div class="container" style="margin-top:101px;"><h2 style="text-align: center;">DATA VISA 312 AKTIF <?php echo $nama_pt; ?> </h2>
  <div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="What you looking for?">
  </div>
  <div class="row">
          <div class="btn-group dropright pull-right">
  <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 20px;">
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

    <table class="table table-hover table-bordered results" >

      <thead class="thead-dark">
        <tr>
          <th>No</th>
          <th colspan="2">Nama</th>
          <th>KEWARGANEGARAAN</th>
          <th>NO PASSPORT</th>
          <th>EXPIRED PASSPORT</th>
          <th>TANGGAL LAHIR</th>
          <th>JENIS VISA</th>
          <th>NO RPTKA</th>
          <th>JABATAN</th>
          <th>TANGGAL TERBIT VISA</th>
          <th>JANGKA WAKTU VISA (BULAN)</th>
          <th>NO KITAS</th>
          <th>EXPIRED KITAS</th>
          <th>NO NOTIFIKASI</th>
          <th>KETERANGAN</th>
        </tr>
        <tr class="warning no-result">
          <td colspan="10"><i class="fa fa-warning"></i> Tidak Ditemukan</td>
        </tr>
      </thead>

      <?php
                    

        $query = "SELECT * FROM visa312 WHERE nama_pt = '$nama_pt'" ;
        $visa = mysqli_query ($connection, $query) ;
    
        $no = 0;
                    
                    
      ?>

      <tbody>
        <?php
        while($row_visa = mysqli_fetch_array($visa)) { ; $no++;
        ?>

        <tr>
          <?php
            $passport = $row_visa['passport'] ;
            $query = "SELECT * FROM data WHERE nama_pt='$nama_pt' AND passport='$passport'" ;
            $data = mysqli_query($connection, $query);
            $row_data = mysqli_fetch_array($data) ;
          ?>
          <td><?php echo $no ; ?></td>
          <td><?php echo $row_data['nama_mandarin'] ; ?></td>
          <td><?php echo $row_data['nama_latin'] ; ?></td>
          <td><?php echo $row_data['kewarganegaraan'] ; ?></td>
          <td><?php echo $row_data['passport'] ; ?></td>
          <td><?php echo $row_data['expired_passport'] ; ?></td>
          <td><?php echo $row_data['tgl_lahir'] ; ?></td>
          <td><?php echo $row_visa['visa'] ; ?></td>
          <td><?php echo $row_visa['no_rptka'] ; ?></td>
          <td><?php echo $row_visa['jabatan'] ; ?></td>
          <td><?php echo $row_visa['tgl_terbit'] ; ?></td>
          <td><?php echo $row_visa['jangka_visa'] ; ?></td>
          <td><?php echo $row_visa['no_imta'] ; ?></td>
          <td><?php echo $row_visa['exp_kitas'] ; ?></td>
          <td><?php echo $row_visa['notif'] ; ?></td>
          <td><?php echo $row_visa['ket'] ; ?></td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
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
