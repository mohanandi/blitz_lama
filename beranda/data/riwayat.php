<div class="container" style="margin-top:101px;">
<!-- <div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="What you looking for?">
  </div> -->
  
<center><h2> RIWAYAT DATA TKA </h2></center>

<div class="row">
			    <div class="btn-group dropright pull-right">
          <input type="text" class="search form-control" placeholder="What you looking for?">
  <button type="button" class="btn btn-outline-primary dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 15px;">
    Filter
  </button>
  <div class="dropdown-menu">
      
    <div class="col-xs-12 col-md-12"><input type="submit" value="Filter by Perusahaan" 
    class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#filter_pt"></div>

    <div class="col-xs-12 col-md-12"><input type="submit" value="Filter by Tanggal Input"  
    class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#filter_tgl"></div>
                    
    <div class="col-xs-12 col-md-12"><input type="submit" value="Filter by Input by" 
    class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#filter_user"></div>

    <div class="col-xs-12 col-md-12"><input type="submit" value="Filter by Passport"  
    class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#filter_passport"></div>

    <div class="col-xs-12 col-md-12"><input type="submit" value="Filter by Nama"  
    class="btn btn-link" style="color: black;" tabindex="7" data-toggle="modal" data-target="#filter_nama"></div>
    			

  </div>
</div>
  <span class="counter pull-right"></span>
  <br>
  <div class="scrollable-table" style="margin-top:19px;">
    

    <table class="table table-hover table-bordered results" >

                    

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
        
      </thead>
      <tbody id="myTable">

        <?php
          if(isset($_GET['passport'])){
            $passport = $_GET['passport'];
            filtering("passport", $passport);
          
         
          }else if(isset($_POST['filter_pt'])){
            $nama_pt = $_POST['nama_pt'] ;
            if (strlen($nama_pt)==0){
              seluruh();
            }else{
              filtering("nama_pt", $nama_pt );
            }
          
          
        }else if(isset($_POST['filter_tgl'])){
          $tgl_input = $_POST ['tgl_input'] ;
          
          if ($tgl_input == NULL){
            seluruh();
          }else{

            filtering("tgl_input", $tgl_input);
          }
        }else if(isset($_POST['filter_user'])){
          $user = $_POST ['nama_user'] ;
          
          if (strlen($user)==0){
            seluruh();
          }else{

            filtering("input_by", $user);
          }
        
        }else if(isset($_POST['filter_passport'])){
          $passport = $_POST ['passport'] ;
          
          if (strlen($passport)==0){
            seluruh();
          }else{

            filtering("passport", $passport);
          }
        
        }else if(isset($_POST['filter_nama'])){
          $nama = $_POST ['nama'] ;
          
          if (strlen($nama)==0){
            seluruh();
          }else{

            filtering("nama_latin", $nama);
          }
        
        }else{
          seluruh();    
         } ?>
          
            
      </tbody>
      
    </table>
  </div>
</div>

<!-- fungsi untuk menampilkan seluruh data -->
<?php
function seluruh() {
  include("../../system/connect.php");
    $query = "SELECT * FROM data";
    $result = mysqli_query ($connection, $query) ;
    
            if (!$result) {
              die ("gak bisa") ;
              } 
              $no = 0;
           while($row = mysqli_fetch_array($result)) { ; $no++;      
          ?>

        <tr>
          <td><?php echo $no ;  ?></td>
          <td><a href="../data?page=data_edit&passport=<?php echo $row['passport']; ?>">Edit</a></td> 
          <td><?php echo $row['nama_pt'] ;  ?></td>
          <td><?php echo $row['nama_mandarin'] ;  ?></td>
          <td><?php echo $row['nama_latin'] ;  ?></td>
          <td><?php echo $row['kewarganegaraan'] ;  ?></td>
          <td><?php echo $row['passport'] ;  ?></td>
          <td><?php echo $row['expired_passport'] ;  ?></td>
          <td><?php echo $row['tgl_lahir'] ;  ?></td>
          <td><?php echo $row['ket'] ;  ?></td> 
          <td><?php echo $row['verif_data'] ;  ?></td> 
        </tr>
        <?php } } ?>

<!-- fungsi untuk menampilkan seluruh data -->
<?php
function filtering($point, $filter) {
  include("../../system/connect.php");
    $query = "SELECT * FROM data WHERE $point='$filter' ";
    $result = mysqli_query ($connection, $query) ;
    
            if (!$result) {
              die ("gak bisa") ;
              } 
              $no = 0;
           while($row = mysqli_fetch_array($result)) { ; $no++;      
          ?>

        <tr>
          <td><?php echo $no ;  ?></td>
          <td><a href = "../data?page=data_edit&passport=<?php echo $row['passport']; ?>">Edit</a></td>
          <td><?php echo $row['nama_pt'] ;  ?></td>
          <td><?php echo $row['nama_mandarin'] ;  ?></td>
          <td><?php echo $row['nama_latin'] ;  ?></td>
          <td><?php echo $row['kewarganegaraan'] ;  ?></td>
          <td><?php echo $row['passport'] ;  ?></td>
          <td><?php echo $row['expired_passport'] ;  ?></td>
          <td><?php echo $row['tgl_lahir'] ;  ?></td>
          <td><?php echo $row['ket'] ;  ?></td> 
          <td><?php echo $row['verif_data'] ;  ?></td> 
        </tr>
        <?php } } ?>
  
  

<!-- Filter by perusahaan -->
<div class="modal fade" id="filter_pt" role="dialog" style="width:100%">
    <div class="modal-dialog">
    

      <div class="modal-content">
        <div class="modal-header">
             <h4 class="modal-title">Cari Berdasarkan</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
            
        </div>
        <form style="width:490px; margin-left:5px; margin-top:-50px;"  method="POST">
        <div class="modal-body">
          <div class="form-group">
            <div class="row">
            <label>Nama Perusahaan </label>
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
            <input type="submit" name="filter_pt" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;">             </div>
        </div>

        </form>
        </div>
      </div>
      </div>
      </div>

<!-- filter by tanggal input -->
<div class="modal fade" id="filter_tgl" role="dialog" style="width:100%">
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
            <label>Tanggal Input </label>
            <div>
              <input type="date" name="tgl_input">
          </div>
          </div>
            <br>
                                      
                                    
        
        <div class="modal-footer">
            <input type="submit" name="filter_tgl" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;">             </div>
        </div>

        </form>
        </div>
      </div>
      </div>
      </div>


<!-- Filter by user/input_by -->
<div class="modal fade" id="filter_user" role="dialog" style="width:100%">
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
            <label>Input By </label>
            <div><select name="nama_user" class="form-control" style="width:100%;"> 
            <?php
              $query = "SELECT * FROM user" ;
              $result = mysqli_query ($connection, $query) ;
           ?>
          
            <option selected></option>
            <?php while($row = mysqli_fetch_array($result)){ ; ?>
            <option><?php echo $row['nama']; ?></option>
            <?php } ?>
          </select>
          </div>
          </div>
            <br>
                                      
                                    
        
        <div class="modal-footer">
            <input type="submit" name="filter_user" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;">             </div>
        </div>

        </form>
        </div>
      </div>
      </div>
      </div>

<!-- filter by tanggal input -->
<div class="modal fade" id="filter_passport" role="dialog" style="width:100%">
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
            <div>
              <input type="text" name="passport">
          </div>
          </div>
            <br>
                                      
                                    
        
        <div class="modal-footer">
            <input type="submit" name="filter_passport" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;">             </div>
        </div>

        </form>
        </div>
      </div>
      </div>
      </div>

<!-- filter by tanggal input -->
<div class="modal fade" id="filter_nama" role="dialog" style="width:100%">
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
            <label>Nama Latin </label>
            <div>
              <input type="text" name="nama">
          </div>
          </div>
            <br>
                                      
                                    
        
        <div class="modal-footer">
            <input type="submit" name="filter_nama" class="btn btn-primary btn-md" value="Cari" style="margin-left:0px;">             </div>
        </div>

        </form>
        </div>
      </div>
      </div>
      </div>