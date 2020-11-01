<div class="table-responsive">
  <table class="table">
    <thead class="thead-dark">
        <tr>
          <th>No</th>
          <th>Name PT</th>
          <th>Nama Mandarin</th>
          <th>Nama Latin</th>
          <th>Kewarganegaraan</th>
          <th>Passport</th>
          <th>Expired Passport</th>
          <th>Tanggal Lahir</th>
          <th>Keterangan</th>
      
        </tr>
        <tr class="warning no-result">
          <td colspan="10"><i class="fa fa-warning"></i> Tidak Ditemukan</td>
        </tr>
      </thead>
      <tbody id="myTable">

        <?php
          if(isset($_GET['passport'])){
          $passport = $_GET['passport'];

          $query = "SELECT * FROM data WHERE passport = '$passport'" ;
            $result = mysqli_query ($connection, $query) ;
    
            if (!$result) {
              die ("gak bisa") ;
              } 
              $no = 0;
           while($row = mysqli_fetch_array($result)) { ; $no++;      
          ?>

        <tr>
          <td><?php echo $no ;  ?></td>
          <td><?php echo $row['nama_pt'] ;  ?></td>
          <td><?php echo $row['nama_mandarin'] ;  ?></td>
          <td><a href = "../data?page=data_edit&passport=<?php echo $row['passport']; ?>"><?php echo $row['nama_latin'] ;  ?></a></td>
          <td><?php echo $row['kewarganegaraan'] ;  ?></td>
          <td><?php echo $row['passport'] ;  ?></td>
          <td><?php echo $row['expired_passport'] ;  ?></td>
          <td><?php echo $row['tgl_lahir'] ;  ?></td>
          <td><?php echo $row['ket'] ;  ?></td> 
        </tr>
        <?php } 
          }else{
            $query = "SELECT * FROM data WHERE input_by = '$nama_user'";
            $result = mysqli_query ($connection, $query) ;
    
            if (!$result) {
              die ("gak bisa") ;
              } 
              $no = 0;
           while($row = mysqli_fetch_array($result)) { ; $no++;      
          ?>

        <tr>
          <td><?php echo $no ;  ?></td>
          <td><?php echo $row['nama_pt'] ;  ?></td>
          <td><?php echo $row['nama_mandarin'] ;  ?></td>
          <td><a href = "../data?page=data_edit&passport=<?php echo $row['passport']; ?>"><?php echo $row['nama_latin'] ;  ?></a></td>
          <td><?php echo $row['kewarganegaraan'] ;  ?></td>
          <td><?php echo $row['passport'] ;  ?></td>
          <td><?php echo $row['expired_passport'] ;  ?></td>
          <td><?php echo $row['tgl_lahir'] ;  ?></td>
          <td><?php echo $row['ket'] ;  ?></td> 
        </tr>
        <?php } } ?>
          
            
      </tbody>
  </table>
</div>