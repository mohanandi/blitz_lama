<div class="container" style="margin-top:101px;">
    <h2>
        <center>DATA VOA NON-AKTIF <br> <?php echo $nama_pt; ?> </center>
    </h2>
    <div class="form-group pull-right">
        <input type="text" class="search form-control" placeholder="What you looking for?">
    </div>

</div>

<span class="counter pull-right"></span>
<div class="scrollable-table col-md-11" style="background-color: #f5f5f5; margin-left: 55px;">

    <table class="table table-hover table-bordered results" id="example">

        <thead class="thead-dark">
            <tr>
                <th>NO</th>
                <th>NAMA MANDARIN</th>
                <th>NAMA LATIN</th>
                <th>PASSPORT</th>
                <th>JENIS VISA</th>
                <th>AWAL VISA</th>
                <th>EXPIRED VISA</th>
                <th>KETERANGAN</th>

            </tr>
            <tr class="warning no-result">
                <td colspan="10"><i class="fa fa-warning"></i> Tidak Ditemukan</td>
            </tr>
        </thead>

        <?php




        ?>

        <tbody>
            <?php
            // if (isset($_POST['filter_passport'])) {
            //     $passport = $_POST['passport'];
            //     if (strlen($passport) == 0) {
            //         seluruh($nama_pt);
            //     } else {
            //         filter($nama_pt, "passport", $passport);
            //     }
            // } else if (isset($_POST['filter_tgl_input'])) {
            //     $tgl_input = $_POST['tgl_input'];
            //     if (strlen($tgl_input) == 0) {
            //         seluruh($nama_pt);
            //     } else {
            //         filter($nama_pt, "tgl_input", $tgl_input);
            //     }
            // } else if (isset($_POST['filter_expired'])) {
            //     $tgl_awal = $_POST['tgl_awal'];
            //     $tgl_akhir = $_POST['tgl_akhir'];
            //     if (strlen($tgl_awal) == 0 || strlen($tgl_akhir) == 0) {
            //         seluruh($nama_pt);
            //     } else {
            //         filter_expired($nama_pt, "expired_passport", $tgl_awal, $tgl_akhir);
            //     }
            // } else {
            seluruh($nama_pt);
            // } 
            ?>
        </tbody>
    </table>
</div>





<?php
// Awal fungsi untuk keseluruhan
function seluruh($nama_pt)
{
    include("../../system/connect.php");

    $query = "SELECT * FROM riwayat_voa WHERE nama_pt = '$nama_pt'";
    $data = mysqli_query($connection, $query);

    $no = 0;
    while ($row_imta = mysqli_fetch_array($data)) {
        $passport_tanda = $row_imta['passport'];
        $no++;
        $query_data = "SELECT * FROM riwayat_data WHERE passport='$passport_tanda' AND nama_pt='$nama_pt' ";
        $sql_data = mysqli_query($connection, $query_data);
        $row_data = mysqli_fetch_array($sql_data);
?>
        <tr>
            <td><?php echo $row_data['nama_mandarin'];  ?></td>
            <td><?php echo $row_data['nama_latin'];  ?></td>
            <td><?php echo $row_data['passport'];  ?></td>
            <td><?php echo $row_imta['visa'];  ?></td>
            <td><?php echo $row_imta['start_visa'];  ?></td>
            <td><?php echo $row_imta['expired'];  ?></td>
            <td><?php echo $row_imta['ket'];  ?></td>
        </tr>
    <?php
    }
}
// Akhir fungsi untuk keseluruhan

// Awal fungsi untuk filter
function filter($nama_pt, $point, $filter)
{
    include("../../system/connect.php");

    $query = "SELECT * FROM riwayat_data WHERE nama_pt = '$nama_pt' && $point = '$filter'";
    $data = mysqli_query($connection, $query);

    $no = 0;
    while ($row_data = mysqli_fetch_array($data)) {;
        $no++;
    ?>
        <tr>
            <td><?php echo $no;  ?></td>

            <td><a href="">Aktifkan</a></td>
            <td><?php echo $row_data['nama_pt'];  ?></td>
            <td><?php echo $row_data['nama_mandarin'];  ?></td>
            <td><?php echo $row_data['nama_latin'];  ?></td>
            <td><?php echo $row_data['kewarganegaraan'];  ?></td>
            <td><?php echo $row_data['passport'];  ?></td>
            <td><?php echo $row_data['expired_passport'];  ?></td>
            <td><?php echo $row_data['tgl_lahir'];  ?></td>
            <td><?php echo $row_data['ket'];  ?></td>
            <td><?php echo $row_data['verif_data'];  ?></td>
        </tr>
<?php
    }
}
?>