<?php
$data_voucher = "SELECT * FROM voucher_visa WHERE nama_pt='$nama_pt'";
$sql_voucher = mysqli_query($connection, $data_voucher);

?>
<div class="container" style="margin-top:101px;"><h2 style="text-align: center;"> Record Voucher </h2>
<div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="What you looking for?">
  </div>


<span class="counter pull-right"></span>
<div class="scrollable-table">

<table class="table table-hover table-bordered results" >
<thead class="thead-dark">
<tr>
  <th style="text-align:center;">No</th>
  <th style="text-align:center;">Aksi</th>
  <th style="text-align:center;">Nama PT</th>
  <th style="text-align:center;">Jumlah Pengguna</th>
  <th style="text-align:center;">Total Harga</th>
  <th style="text-align:center;">Tanggal Input Voucher</th>
  <th style="text-align:center;">Input Voucher By</th>
  <th style="text-align:center;">Invoice</th>
  <th style="text-align:center;">Tanggal Input Invoice</th>
  <th style="text-align:center;">Input Invoice By</th>
</tr>

</thead>
<tbody>
<?php
$x = 1;
while ($hasil = mysqli_fetch_assoc($sql_voucher)) {
?>
<tr>
  <td><?php echo $x; $x++ ;?></td>
  <th><a href="../perusahaan?page=data_voucher&id=<?php echo $hasil['id']; ?>">Pilih</a></th>
  <th><?php echo $hasil['nama_pt']; ?></th>
  <td><?php echo $hasil['jumlah_pengguna']; ?></td>
 
  <?php 
  
  if ($hasil['mata_uang'] == "Rupiah") { 
    $result = "Rp " . number_format($hasil['total_harga'],2,',','.');
    ?>
  <td><?php echo $result; ?></td>
  <?php } else {
    $result = "$ " . number_format( $hasil['total_harga'] , 2 , '.' , ',' );
    ?>
  <td><?php echo $result ?></td>
  <?php } 
  ?>

  <td><?php echo $hasil['tgl_input']; ?></td>
  <td><?php echo $hasil['input_by']; ?></td>

  <?php
  if ($hasil['ket_invoice'] == 0) { 
    
    ?>
  <td><a href="../voucher?page=input_invoice&id=<?php echo $hasil['id']; ?>"><?php echo "Belum Ada Invoice"; ?></td>
  <td>-</td>
  <td>-</td>
  <?php } else {
    $id = $hasil['id'] ;
    $data_invoice = "SELECT * FROM invoice_vouchervisa WHERE id=$id ";
    $sql_invoice = mysqli_query($connection, $data_invoice);
  $hasil_invoice = mysqli_fetch_assoc($sql_invoice) ;
    ?>
  <td><?php echo $hasil_invoice['invoice']; ?></td>
  <td><?php echo $hasil_invoice['tgl_input']; ?></td>
  <td><?php echo $hasil_invoice['input_by']; ?></td>
  <?php } ?>
  


  
</tr>
<?php } ?>
</tbody>


</table></div>
