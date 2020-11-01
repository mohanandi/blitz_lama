<div class="container">
<?php
  $tgl_input = date('Y-m-d');
?>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <form method="post" action="../../system/tambah_rptka.php" onsubmit="return empty()">
      <h2>Menambah RPTKA <?php echo $nama_pt; ?></h2>
      <hr class="colorgraph">
      <input type = "hidden" class="form-control" name = "tgl_input" value = "<?php echo $tgl_input ;?>">
    <input type = "hidden" class="form-control" name = "input_by" value = "<?php echo $nama_user ;?>">
    
      <input type = "hidden" class="form-control" name = "nama_pt" value = "<?php echo $nama_pt ;?>">
        <div class="form-group">
            <label><strong> No RPTKA </strong> </label>
        <input type="text" name="no_rptka" id="no_rptka" class="form-control input-lg" placeholder="NO RPTKA" tabindex="3" style="width:90% !important;" required>
      	</div>

      	<div class="form-group">
            <label><strong> Tanggal Terbit </strong> </label>
        <input type="date" name="tgl_terbit" id="tgl_terbit" class="form-control input-lg"  tabindex="3" style="width:90% !important;" required>
      	</div>

      	<div class="form-group">
            <label><strong> Tanggal Habis </strong> </label>
        <input type="date" name="tgl_habis" id="tgl_habis" class="form-control input-lg"  tabindex="3" style="width:90% !important;" required>
      	</div>

      	<div class="form-group">
            <label><strong> Jumlah Pengguna RPTKA </strong> </label>
        <input type="number" name="jumlah_rptka" id="jumlah_rptka" class="form-control input-lg" placeholder="0" tabindex="3" style="width:90% !important;" required>
      	</div>

        <div class="form-group">
            <label><strong> Keterangan </strong> </label>
        <input type="text" name="ket" id="ket" class="form-control input-lg" placeholder="Keterangan" tabindex="3" style="width:90% !important;" required>
      	</div>

      <table class="table table-hover table-bordered results auto-index" id="myTable" style="width: 90%;">
        <thead class="thead-light">
        <tr>
          
          <th style="text-align:center; color:black;">Nama Jabatan</th>
          <th style="text-align:center; color:black;">Jumlah Maksimal Jabatan</th>
          <th style="text-align:center; color:black;">Aksi</th>

        </tr>
        
        </thead>

        <tbody id="badan" >
        <tr style="width:90% !important;">
        
        </tr>
    
  
        </tbody>

      </table>
        <p>
            <input type="button" value="Tambah Jabatan" class="btn btn-success">
            <input type="submit" value="Submit" name="submit" class="btn btn-primary" style="width: 43% !important;">

        </p>
      
      
  
    </form>
  </div>
</div></div>

<script type="text/javascript">
	
	function empty() {
    var jumlah_jabatan = document.getElementById("jumlah_jabatan[]").value;
    var jumlah_rptka = document.getElementById("jumlah_rptka").value;
    var kewarganegaraan = document.getElementById("kewarganegaraan").value;
	var passport = document.getElementById("passport").value;
    var pt = document.getElementById("pt").value;
    var tgl_lahir = document.getElementById("tgl_lahir").value;
    var expired_passport = document.getElementById("expired_passport").value;
    var ver = document.getElementById("ver").value;
    var tambah = 0 ;

    for (var i =0; i<count(jumlah_jabatan); i++){
        tambah = tambah + jumlah_jabatan[i] ;
    }

    if (tambah != jumlah_rptka) {
        alert("Jumlah Jabatan dan Jumlah RPTKA Tidak Sama");
        return false;
    }
}



</script>



