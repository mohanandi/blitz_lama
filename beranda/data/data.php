<?php
$tgl = date('Y-m-d');
?>

<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="../../system/tambah_data.php" method="post" onsubmit="return empty()">
			<center>
				<h2>INPUT DATA TKA</h2>
			</center>
			<hr class="colorgraph">

			<div class="row">

				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label><strong> Mandarin Name </strong> </label>
						<input type="text" name="nama_mandarin" id="nama_mandarin" class="form-control input-lg" placeholder="Nama Mandarin" tabindex="1" required>
					</div>
				</div>
				<input type="hidden" class="form-control" name="input_by" value="<?php echo $nama_user; ?>">
				<input type="hidden" class="form-control" name="tanggal" value="<?php echo $tgl; ?>">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label><strong> Nama </strong> </label>
						<input type="text" name="nama_latin" id="nama_latin" class="form-control input-lg" placeholder="Nama Latin" tabindex="2" required>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label><strong>Nationality</strong> </label>
						<input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control input-lg" placeholder="Nationality" />
					</div>
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label><strong>Data Lama/Baru</strong> </label>

						<select name="verif_data" class="form-control" id="ver" required>
							<option selected></option>

							<option>Lama</option>
							<option>Baru</option>
						</select>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label><strong>Passport</strong> </label>
				<input type="text" name="passport" id="passport" class="form-control input-lg" placeholder="Nomor Paspor" tabindex="3" required>
			</div>
			<div class="row">

				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label><strong> Nama Perusahaan </strong> </label>

						<input list="pt_list" name="nama_pt" class="form-control" id="nama_pt" placeholder="Pilih Nama PT" required>
						<?php


						$query = "SELECT * FROM perusahaan";
						$result = mysqli_query($connection, $query);

						if (!$result) {
							die("gak bisa");
						}

						?>

						<datalist id="pt_list">
							<?php while ($row = mysqli_fetch_array($result)) {; ?>
								<option><?php echo $row['nama_pt']; ?></option>
							<?php } ?>
						</datalist>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label><strong> Date of Birth</strong> </label>
						<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control input-lg" tabindex="2" required>
					</div>
				</div>
			</div>

			<div class="row">

				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label><strong> Expired Passport </strong></label>
						<input type="date" name="expired_passport" id="expired_passport" class="form-control input-lg" tabindex="3">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<label><strong>Keterangan</strong> </label>
						<input type="text" name="ket" id="kewarganegaraan" class="form-control input-lg" placeholder="Keterangan" required />
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-md-12"><input type="submit" value="Submit" name="submit" class="btn btn-primary btn-md" tabindex="8" style="margin-left:200px; margin-top:30px;"></div>
			</div>
	</div>
	</form>
</div>
</div>



<script type="text/javascript">
	function empty() {
		var nama_mandarin = document.getElementById("nama_mandarin").value;
		var nama_latin = document.getElementById("nama_latin").value;
		var kewarganegaraan = document.getElementById("kewarganegaraan").value;
		var passport = document.getElementById("passport").value;
		var pt = document.getElementById("nama_pt").value;
		var tgl_lahir = document.getElementById("tgl_lahir").value;
		var expired_passport = document.getElementById("expired_passport").value;
		var ver = document.getElementById("ver").value;
	}
</script>