<div class="container" align="center" style="margin-top:101px;"><h2> DATA VISA 211 AKTIF <?php echo $nama_pt ?> </h2>

  <div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="What you looking for?">
  </div>
  <div class="row">
  <div class="btn-group dropright pull-right">
  <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 15px;">
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

    <table class="table table-hover table-bordered results row-border order-column display" >

      <thead class="thead-dark">
        <tr>
          <th >No</th>
          <th rowspan="2">Chinese's Name</th>
          <th>Name</th>
          <th>No Passport</th>
          <th>Visa</th>
          <th>Start Visa</th>
          <th>Expired</th>
          <th>Extend-1</th>
          <th>Start Visa</th>
          <th>Expired</th>
          <th>Extend-2</th>
          <th>Start Visa</th>
          <th>Expired</th>
          <th>Extend-3</th>
          <th>Start Visa</th>
          <th>Expired</th>
          <th>Extend-4</th>
          <th>Start Visa</th>
          <th>Expired</th>

      
        </tr>
        <tr class="warning no-result">
          <td colspan="10"><i class="fa fa-warning"></i> Tidak Ditemukan</td>
        </tr>
      </thead>

      <?php
                    

        $query = "SELECT * FROM data WHERE nama_pt='$nama_pt' " ;
        $data = mysqli_query($connection, $query);
    
        $no = 0;
                    
                    
      ?>

      <tbody>
      <?php
        while($row_data = mysqli_fetch_array($data)) {  
          $no++;
          $passport = $row_data['passport'] ;
      ?>
        <tr>

          <td style="background-color: white;"><?php echo $no; ?></td>
          <td style="background-color: white;"><?php echo $row_data['nama_mandarin']; ?></td>
          <td style="background-color: white;"><?php echo $row_data['nama_latin']; ?></td>
          <td style="background-color: white;"><?php echo $row_data['passport']; ?></td>

        <?php
          $query = "SELECT * FROM visa211 WHERE nama_pt='$nama_pt' AND passport='$passport'" ;
          $vis = mysqli_query($connection, $query);
          if(mysqli_num_rows($vis) == 0){
          ?>
            <td style="background-color: white;"><?php echo "Belum Ada" ; ?></td>
            <td style="background-color: white;"><?php echo "Belum Ada" ; ?></td>
            <td style="background-color: white;"><?php echo "Belum Ada" ; ?></td>
          <?php } else {  
            $row_vis = mysqli_fetch_array($vis) ;
            ?>
            <td style="background-color: white;"><?php echo $row_vis['visa']; ?></td>
            <td style="background-color: white;"><?php echo $row_vis['start_visa']; ?></td>
            <td style="background-color: white;"><?php echo $row_vis['expired']; ?></td>

          <?php } 
          $query = "SELECT * FROM visa211_1 WHERE nama_pt='$nama_pt' AND passport='$passport'" ;
          $vis = mysqli_query($connection, $query);
          if(mysqli_num_rows($vis) == 0){
          ?>
            <td style="background-color: white;"><?php echo "Belum Ada" ; ?></td>
            <td style="background-color: white;"><?php echo "Belum Ada" ; ?></td>
            <td style="background-color: white;"><?php echo "Belum Ada" ; ?></td>
          <?php } else {  
            $row_vis = mysqli_fetch_array($vis) ;
            ?>
            <td style="background-color: white;"><?php echo "Sudah Diperpanjang"; ?></td>
            <td style="background-color: white;"><?php echo $row_vis['start_visa']; ?></td>
            <td style="background-color: white;"><?php echo $row_vis['expired']; ?></td>

          <?php }  
          $query = "SELECT * FROM visa211_2 WHERE nama_pt='$nama_pt' AND passport='$passport'" ;
          $vis = mysqli_query($connection, $query);
          if(mysqli_num_rows($vis) == 0){
          ?>
            <td><?php echo "Belum Ada" ; ?></td>
            <td><?php echo "Belum Ada" ; ?></td>
            <td><?php echo "Belum Ada" ; ?></td>
          <?php } else {  
            $row_vis = mysqli_fetch_array($vis) ;
            ?>
            <td><?php echo "Sudah Diperpanjang"; ?></td>
            <td><?php echo $row_vis['start_visa']; ?></td>
            <td><?php echo $row_vis['expired']; ?></td>

          <?php } 
          $query = "SELECT * FROM visa211_3 WHERE nama_pt='$nama_pt' AND passport='$passport'" ;
          $vis = mysqli_query($connection, $query);
          if(mysqli_num_rows($vis) == 0){
          ?>
            <td><?php echo "Belum Ada" ; ?></td>
            <td><?php echo "Belum Ada" ; ?></td>
            <td><?php echo "Belum Ada" ; ?></td>
          <?php } else {  
            $row_vis = mysqli_fetch_array($vis) ;
            ?>
            <td><?php echo "Sudah Diperpanjang"; ?></td>
            <td><?php echo $row_vis['start_visa']; ?></td>
            <td><?php echo $row_vis['expired']; ?></td>
            
          <?php } 
          $query = "SELECT * FROM visa211_4 WHERE nama_pt='$nama_pt' AND passport='$passport'" ;
          $vis = mysqli_query($connection, $query);
          if(mysqli_num_rows($vis) == 0){
          ?>
            <td><?php echo "Belum Ada" ; ?></td>
            <td><?php echo "Belum Ada" ; ?></td>
            <td><?php echo "Belum Ada" ; ?></td>
          <?php } else {  
            $row_vis = mysqli_fetch_array($vis) ;
            ?>
            <td><?php echo "Sudah Diperpanjang"; ?></td>
            <td><?php echo $row_vis['start_visa']; ?></td>
            <td><?php echo $row_vis['expired']; ?></td>
            
          <?php } ?>
        </tr>
      <?php
        }
      ?>
      <tr>
        <td><button><a href="export_visa211.php?nama_pt=<?php echo $nama_pt; ?>">Export</a></button></td>
      </tr> 
      </tbody>
      
    </table>
  </div>
</div>

<div class="col-xs-12 col-md-12">
  
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


