<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form method="post" action="index.php?page=input_voucherother">
			<h2>Pendahuluan Voucher Other</h2>
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
                            <option>Lain-lain</option>
                         </select>
					         
          <label><strong> Jumlah Isi </strong> </label>

                    <input type ="number" name ="jumlah_field" placeholder="Input Jumlah Field" />

          </div>

				</div>
				
			</div>

			
			<div class="row">
				<div class="col-xs-12 col-md-12">
        <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-block btn-lg" tabindex="7">
        </div>
			</div>
		</form>
	</div>
</div>


		