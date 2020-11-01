
<?php
  if (isset($_POST['edit']))
  {
?>

<div class="container" style="margin-top:101px;"><h2><center>Input Data Visa 312</center> </h2>
<hr class="colorgraph">
<?php

$passport = $_POST['passport'] ;
$visa = $_POST['visa'] ;
$tgl_terbit = $_POST ['tgl_terbit'] ;
$jangka_visa = $_POST ['jangka_visa'] ;
$no_rptka = $_POST ['no_rptka'] ;
$no_imta = $_POST ['no_imta'] ;
$exp_kitas = $_POST ['exp_kitas'] ;
$notif = $_POST ['notif'] ;
$ket = $_POST ['ket'] ;
$tgl_input = date('Y-m-d');

    $query = "SELECT * FROM data WHERE passport = '$passport' " ;
      $result = mysqli_query ($connection, $query) ;
    
      if (!$result) {
        die ("gak bisa") ;
        } 
                    
      $row = mysqli_fetch_array($result) ;
      $vou = $row['visa312'] ;
      $nama_pt = $row['nama_pt'];
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
    <form method="post" action= "index.php?page=validasi312">
    <input type = "hidden" class="form-control" name = "passport" value = "<?php echo $passport ;?>">
    <input type = "hidden" class="form-control" name = "tgl_input" value = "<?php echo $tgl_input ;?>">
    <input type = "hidden" class="form-control" name = "input_by" value = "<?php echo $nama_user ;?>">
    <input type = "hidden" class="form-control" name = "nama_pt" value = "<?php echo $s['nama_pt'] ;?>">

    <tr>
    <th width="40%"> Visa </th>
        <?php
        if ($vou==0){
        ?>
        <td><input id="fc1" type="text" name = "visa"  value = "<?php echo "$visa"; ?>"  class="form-control"  /></td>
        <?php 
        } else {
            $query = "SELECT * FROM data_vouchervisa WHERE passport = '$passport' AND no_voucher = '$vou'" ;
            $result = mysqli_query ($connection, $query) ;
            if(mysqli_num_rows($result) == 0) {} else {
                 $visa_vou = mysqli_fetch_array($result) ;
        ?>
        <td><input id="fc1" type="text" name = "visa"  value="<?php echo $visa_vou['jenis_proses']; ?>"  class="form-control"  readonly /></td>
        <?php
            } }
        ?>
        
    </tr>
    <tr>
    <th width="40%"> No RPTKA </th>
        <td><select name="no_rptka" id="no_rptka" class="form-control">
                        <?php
                    

                        $query = "SELECT * FROM rptka WHERE nama_pt = '$nama_pt' && rptka_sisa != 0 " ;
                        $result = mysqli_query ($connection, $query) ;
    
                        if (!$result) {
                        die ("gak bisa") ;
                        } 
                        
                      ?>
          
                            <option selected><?php echo "$no_rptka"; ?></option>
                            <?php while($row = mysqli_fetch_array($result)){ ; ?>
                            <option><?php echo $row['no_rptka']; ?></option>
                            <?php } ?>
                         </select></td>
    </tr>
    
    <tr>
    <th> Tanggal Terbit Visa</th>
          <td><input id="fc1" type="date" name = "tgl_terbit" value="<?php echo "$tgl_terbit"; ?>" class="form-control" /></td>
    </tr>

    <tr>
    <th> Jangka Waktu Visa (Bulan) </th>
          <td><select name="jangka_visa" class="form-control">
          <option selected><?php echo "$jangka_visa"; ?></option>
              <?php
              
                for ($i=1; $i<=12; $i++){
                ?>
              <option><?php echo $i ; ?></option>
              <?php  
              }
              
              ?>
              
              </select>
        </td>
    </tr>

    <tr>
    <th> No KITAS </th>
          <td><input id="fc1" type="text" name = "no_imta" value= "<?php echo "$no_imta"; ?>" class="form-control" /></td>
    </tr>
    <tr>
    <th> Expired KITAS </th>
          <td><input id="fc1" type="date" name = "exp_kitas" value= "<?php echo "$exp_kitas"; ?>" class="form-control" /></td>
    </tr>
    <tr>
    <th> No Notifikasi </th>
          <td><input id="fc1" type="text" name = "notif" value= "<?php echo "$notif"; ?>" class="form-control" /></td>
    </tr>
    <tr>
    <th> KETERANGAN </th>
          <td><input id="fc1" type="text" name = "ket" value= "<?php echo "$ket"; ?>" class="form-control" /></td>
    </tr>
    <tr>
    <th colspan="2"><input type = "submit" value="Masukan" name="submit"  class="btn btn-primary btn-block btn-lg" style="height:40px;"></th>
    
        </tr>
  </form>
</table>
</div>


<?php
  }else {
?>
<div class="container" style="margin-top:101px;"><h2> <center>Input Data Visa 312</center> </h2>
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
      $vou = $row['visa312'] ;
      $nama_pt = $row['nama_pt'];
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
    <form method="post" action= "index.php?page=validasi312">
    <input type = "hidden" class="form-control" name = "passport" value = "<?php echo $passport ;?>">
    <input type = "hidden" class="form-control" name = "tgl_input" value = "<?php echo $tgl_input ;?>">
    <input type = "hidden" class="form-control" name = "input_by" value = "<?php echo $nama_user ;?>">
    <input type = "hidden" class="form-control" name = "nama_pt" value = "<?php echo $s['nama_pt'] ;?>">

    <tr>
    <th width="40%"> Visa </th>
        <?php
        if ($vou==0){
        ?>
        <td><input id="fc1" type="text" name = "visa"  placeholder="Jenis Visa"  class="form-control"  /></td>
        <?php 
        } else {
            $query = "SELECT * FROM data_vouchervisa WHERE passport = '$passport' AND no_voucher = '$vou'" ;
            $result = mysqli_query ($connection, $query) ;
            if(mysqli_num_rows($result) == 0) {} else {
                 $visa_vou = mysqli_fetch_array($result) ;
        ?>
        <td><input id="fc1" type="text" name = "visa"  value="<?php echo $visa_vou['jenis_proses']; ?>"  class="form-control"  readonly /></td>
        <?php
            } }
        ?>
        
    </tr>
    <tr>
    <th width="40%"> No RPTKA </th>
        <td><select name="no_rptka" id="no_rptka" class="form-control">
                        <?php
                    

                        $query = "SELECT * FROM rptka WHERE nama_pt = '$nama_pt' && rptka_sisa != 0 " ;
                        $result = mysqli_query ($connection, $query) ;
    
                        if (!$result) {
                        die ("gak bisa") ;
                        } 
                        
                      ?>
          
                            <option selected>Pilih</option>
                            <?php while($row = mysqli_fetch_array($result)){ ; ?>
                            <option><?php echo $row['no_rptka']; ?></option>
                            <?php } ?>
                         </select></td>
    </tr>
    
    <tr>
    <th> Tanggal Terbit Visa</th>
          <td><input id="fc1" type="date" name = "tgl_terbit" class="form-control" /></td>
    </tr>

    <tr>
    <th> Jangka Waktu Visa (Bulan) </th>
          <td><select name="jangka_visa" class="form-control">
          <option>Pilih</option>
              <?php
              
                for ($i=1; $i<=12; $i++){
                ?>
              <option><?php echo $i ; ?></option>
              <?php  
              }
              
              ?>
              
              </select>
        </td>
    </tr>

    <tr>
    <th> No KITAS </th>
          <td><input id="fc1" type="text" name = "no_imta" class="form-control" /></td>
    </tr>
    <tr>
    <th> Expired KITAS </th>
          <td><input id="fc1" type="date" name = "exp_kitas" class="form-control" /></td>
    </tr>
    <tr>
    <th> No Notifikasi </th>
          <td><input id="fc1" type="text" name = "notif" class="form-control" /></td>
    </tr>
    <tr>
    <th> Keterangan </th>
          <td><input id="fc1" type="text" name = "ket" class="form-control" /></td>
    </tr>
    <tr>
    <th colspan="2"><input type = "submit" value="Masukan" name="submit"  class="btn btn-primary btn-block btn-lg" style="height:40px;"></th>
    
        </tr>
  </form>
</table>
</div>

  <?php } ?>


