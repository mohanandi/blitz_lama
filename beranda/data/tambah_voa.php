<div class="container" style="margin-top:101px;"><center><h2> Input Data VOA </h2></center>
<hr class="colorgraph">
<?php

$passport = $_GET['passport'] ;
$tgl_input = date('Y-m-d');

    $query = "SELECT * FROM data WHERE passport = '$passport' " ;
      $result = mysqli_query ($connection, $query) ;
    
    
      if (!$result) {
        die ("gak bisa") ;
        } 
                    
      $row = mysqli_fetch_array($result) ;
      $nama_pt = $row['nama_pt'];
    $vou = $row['voa'] ;
        $query = "SELECT * FROM perusahaan WHERE nama_pt = '$nama_pt' " ;
      $result = mysqli_query ($connection, $query) ;
    
      if (!$result) {
        die ("gak bisa") ;
        }
        $s = mysqli_fetch_array($result) ;
?>
<table id="tab" class="table table-hover table-bordered" style="width:50%;" >
    <tr>
    <th> Nama Perusahaan </th>
        <td> <?php echo $s['nama_pt'] ; ?> </td>
    </tr>
    <tr>
    <th> Nama Client </th>
        <td><?php echo $s['nama_client']; ?></td>
    </tr>
    
</table>


<span class="counter pull-right"></span>
<div class="scrollable-table">

<table class="table table-hover table-bordered results" >
  <thead>
    <tr>
      <th style="text-align:center;">Nama Mandarin</th>
      <th style="text-align:center;">Nama Latin</th>
      <th style="text-align:center;">Kewarganegaraan</th>
      <th style="text-align:center;">Passport</th>
      <th style="text-align:center;">Expired Passport</th>
      <th style="text-align:center;">Tanggal Lahir</th>
    </tr>
    
  </thead>
  <tbody>
    <tr>
      <td><?php echo $row['nama_mandarin'] ;  ?></td>
      <td><?php echo $row['nama_latin'] ;  ?></td>
      <td><?php echo $row['kewarganegaraan'] ;  ?></td>
      <td><?php echo $row['passport'] ;  ?></td>
      <td><?php echo $row['expired_passport'] ;  ?></td>
      <td><?php echo $row['tgl_lahir'] ;  ?></td>
      
     
      
    </tr>
    
  </tbody>
    
</table></div>
<table id="tab" class="table table-hover table-bordered" style="width:60%;margin-top:50px;" >
    <form method="post" action= "../../system/buat_voa.php">
    <input type = "hidden" class="form-control" name = "passport" value = "<?php echo $passport ;?>">
    <input type = "hidden" class="form-control" name = "tgl_input" value = "<?php echo $tgl_input ;?>">
    <input type = "hidden" class="form-control" name = "input_by" value = "<?php echo $nama_user ;?>">
    <input type = "hidden" class="form-control" name = "nama_pt" value = "<?php echo $nama_pt ;?>">

    <tr>
    <th width="40%"> Visa </th>
        <?php
        if ($vou==0){
        ?>
        <td><input id="fc1" type="text" name = "jenis_proses"  placeholder="Jenis Visa"  class="form-control"  /></td>
        <?php 
        } else {
            $query = "SELECT * FROM data_vouchervisa WHERE passport = '$passport' AND no_voucher = '$vou'" ;
            $result = mysqli_query ($connection, $query) ;
            if(mysqli_num_rows($result) == 0) {} else {
                 $visa_vou = mysqli_fetch_array($result) ;
        ?>
        <td><input id="fc1" type="text" name = "jenis_proses"  value="<?php echo $visa_vou['jenis_proses']; ?>"  class="form-control"  readonly /></td>
        <?php
            } }
        ?>
        
    </tr>
    <tr>
      <th> Tanggal Awal Visa</th>
      <td><input id="fc1" type="date" name = "start_visa"  class="form-control"   oninvalid="alert('Masukan Tanggal Awal Visa');" required/></td>
    </tr>
    <tr>
      <th> Tanggal Akhir Visa</th>
      <td><input id="fc1" type="date" name = "expired" class="form-control" / oninvalid="alert('Masukan Tanggal Expired Visa');" required></td>
    </tr>
    <tr>
      <th>Keterangan</th>
      <td><input id="fc1" type="text" name = "ket" class="form-control" / oninvalid="alert('Masukan Keterangan Visa');" required></td>
    </tr>
    
    <tr>
      <th colspan="2"><input type = "submit" value="Masukan" name="submit"  class="btn btn-primary btn-md" style="height:40px;"></th>
    </tr>
  </form>
</table>
    </div>