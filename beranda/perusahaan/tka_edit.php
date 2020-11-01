<?php

$passport = $_GET['passport'] ;
$tgl_input = date('Y-m-d');

$query_data = "SELECT * FROM data WHERE passport = '$passport' " ;
$result_data = mysqli_query ($connection, $query_data) ;
    
if (!$result_data) {
    die ("gak bisa") ;
    } 
                    
$row_data = mysqli_fetch_array($result_data) ;


?>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="../../system/edit_data.php" method="post">
			<h2>Data TKA</h2>
			<hr class="colorgraph">
           
			<div class="row">
                
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
                        <label><strong> Mandarin Name </strong> </label>
                        <input type="text" name="nama_mandarin" id="nama_mandarin" class="form-control input-lg" value="<?php echo $row_data['nama_mandarin']; ?>" tabindex="1">
					</div>
				</div>
				<input type = "hidden" class="form-control" name = "input_by" value = "<?php echo $nama_user ;?>">
				<input type = "hidden" class="form-control" name = "tanggal" value = "<?php echo $tgl_input ;?>">
                <?php $passport_lama = $passport; ?>
                <input type = "hidden" class="form-control" name = "passport_lama" value = "<?php echo $passport_lama;?>">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
                        <label><strong> Nama </strong> </label>
						<input type="text" name="nama_latin" id="nama_latin" class="form-control input-lg" value="<?php echo $row_data['nama_latin']; ?>" tabindex="2">
					</div>
				</div>
			</div>
            
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
            			<label><strong>Nationality</strong> </label>
						<input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control input-lg" value="<?php echo $row_data['kewarganegaraan']; ?>" />
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
                        <label><strong>Data Lama/Baru</strong> </label>

                        <select name="verif_data" class="form-control">
                        <option selected><?php echo $row_data['verif_data']; ?></option>
                           
                            <option>Lama</option>
                            <option>Baru</option>
                         </select>
					</div>
				</div>
			</div>

			<div class="form-group">
            <label><strong>Passport</strong> </label>
				<input type="text" name="passport_baru" id="passport" class="form-control input-lg" value="<?php echo $row_data['passport']; ?>" tabindex="3">
			</div>
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
          
                            <option selected><?php echo $row_data['nama_pt']; ?></option>
                            <?php while($row = mysqli_fetch_array($result)){ ; ?>
                            <option><?php echo $row['nama_pt']; ?></option>
                            <?php } ?>
                         </select>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
                        <label><strong> Date of Birth</strong> </label>
						<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control input-lg" tabindex="2" value="<?php echo $row_data['tgl_lahir']; ?>">
					</div>
				</div>
			</div>
            
            <div class="row">
                
				<div class="col-xs-6 col-sm-6 col-md-6">
				    <div class="form-group">
                <label><strong> Expired Passport </strong></label>
				<input type="date" name="expired_passport" id="expired_passport" class="form-control input-lg" tabindex="3" value="<?php echo $row_data['expired_passport']; ?>">
                    </div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
            			<label><strong>Keterangan</strong> </label>
						<input type="text" name="ket" id="ket" class="form-control input-lg" value="<?php echo $row_data['ket']; ?>" />
					</div>
				</div>
			</div>
                 
                 
			
			
            
            
            
			
			
			<div class="row">
				<div class="col-xs-12 col-md-12"><input type="submit" value="Edit" name="edit" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
			</div>
            </div>
		</form>
	</div>
</div>