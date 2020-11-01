<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form"  method="post">
			<h2>Data TKA</h2>
			<hr class="colorgraph">
           
			
             
            <div class="row">
                
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
                        <label><strong> Nama Perusahaan </strong> </label>

                        <select name="nama_pt" class="form-control">
                        <?php
                    
                        
                    		$query = "SELECT * FROM perusahaan" ;
                    		$result = mysqli_query ($connection, $query) ;
    
                    		if (!$result) {
                    		die ("gak bisa") ;
                    		} 
                    		
                   		?>
          
                            <option selected>Pilih</option>
                            <?php while($row = mysqli_fetch_array($result)){ ; ?>
                            <option><?php echo $row['nama_pt']; ?></option>
                            <?php } ?>
                         </select>
					         
      <label>PILIH TANGGAL</label>
      <input type="date" name="tanggal">
      
          </div>

				</div>
				
			</div>

			
			<div class="row">
				<div class="col-xs-12 col-md-12"><input type="submit" value="Cari" name="cari" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
			</div>
		</form>
	</div>
</div>
<br><br>

		<?php
      if (isset($_POST['cari'])) {
        
          $nama_pt = $_POST['nama_pt'] ;
          $tgl = $_POST['tanggal'];
   
        ?>
        
        <div class="scrollable-table">

<table class="table table-hover table-bordered results" >
  <thead>
    <tr>
      <th>No</th>
      <th>Name PT</th>
      <th>Nama Mandarin</th>
      <th>Nama Latin</th>
      <th>Kewarganegaraan</th>
      <th>Nomor Paspor</th>
      <th>Expired Passport</th>
      <th>Tanggal Lahir</th>
    </tr>
    
  </thead>
  
  <tbody>
                    <?php
                    
                    

                    $query = "SELECT * FROM data WHERE nama_pt = '$nama_pt' && tgl_input = '$tgl' && input_by = '$nama_user' " ;
                    $result = mysqli_query ($connection, $query) ;
    
                    if (!$result) {
                    die ("gak bisa") ;
                    } 
                    $no = 0;
                    
                    while($row = mysqli_fetch_array($result)){ 
                    if ($row['ket_visa312'] == 0){
                    $no++; 
                    ?>
     <tr>
     <td><?php echo $no; ?></td>
      <td><?php echo $row['nama_pt']; ?></td>
      <td><?php echo $row['nama_mandarin']; ?></td>
      <td><a href = "../data?page=tambah_visa312&passport=<?php echo $row['passport']; ?>"><?php echo $row['nama_latin']; ?></a></td>
      <td><?php echo $row['kewarganegaraan']; ?></td>
      <td><?php echo $row['passport']; ?></td>
      <td><?php echo $row['expired_passport']; ?></td>
      <td><?php echo $row['tgl_lahir']; ?></td>
      
    </tr>
    <?php 
     } } ?>
  </tbody>
</table></div>

<?php
	}
?>