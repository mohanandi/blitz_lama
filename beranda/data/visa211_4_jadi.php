<?php

$passport = $_GET['passport'] ;


    $query = "SELECT * FROM data WHERE passport = '$passport' " ;
      $result = mysqli_query ($connection, $query) ;
    
      if (!$result) {
        die ("gak bisa") ;
        } 
                    
      $row = mysqli_fetch_array($result) ;
      $nama_pt = $row['nama_pt'];
        $query = "SELECT * FROM perusahaan WHERE nama_pt = '$nama_pt' " ;
      $result = mysqli_query ($connection, $query) ;
    
      if (!$result) {
        die ("gak bisa") ;
        }
        $s = mysqli_fetch_array($result) ;
?>

<div class="container" style="margin-top:101px;"><center><h2> Record VISA 211-4 <?php echo $row['nama_latin'] ; ?> </h2></center>
<hr class="colorgraph">

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

<?php
    $sql = "SELECT * FROM visa211_4 WHERE passport = '$passport' " ;
      $hasil = mysqli_query ($connection, $sql) ;
      $visa = mysqli_fetch_array($hasil) ;
    ?>

<table id="tab" class="table table-hover table-bordered" style="width:60%;margin-top:50px;" >
    <tr>
      <th> Jenis Visa </th>
      <td><?php echo $visa['visa'] ; ?></td>
    </tr>
    <tr>
      <th> Tanggal Awal Visa </th>
      <td><?php  echo $visa['start_visa'] ?></td>
    </tr>
   
    <tr>
      <th> Tanggal Akhir Visa </th>
      <td> <?php  echo $visa['expired'] ?></td>
    </tr>

    <tr>
      <th> Keterangan </th>
      <td> <?php  echo $visa['ket'] ?></td>
    </tr>

    <tr>
      <th colspan="2"> <a href="../data?page=visa211_4_edit&passport=<?php echo $passport ?>">Edit</a></th>
    </tr>
    
</table>

    </div>