<?php
// Load file koneksi.php
include("../../system/connect.php");
$no_rptka = $_GET['no_rptka'];
$jumlah_rptka = $_GET['jumlah_rptka'];
$nama_pt = $_GET['nama_pt'];
$array_passport = [];
$array_passport_non = [];
$cek = "SELECT * FROM visa312 WHERE no_rptka = '$no_rptka' && nama_pt = '$nama_pt' ";
$hasil = mysqli_query($connection, $cek);
while ($row = mysqli_fetch_array($hasil)) {
  array_push($array_passport, $row['passport']);
}
$hitung = count($array_passport);

$cek = "SELECT * FROM riwayat_visa312 WHERE no_rptka = '$no_rptka' && nama_pt = '$nama_pt' ";
$hasil = mysqli_query($connection, $cek);
while ($row = mysqli_fetch_array($hasil)) {
  array_push($array_passport_non, $row['passport']);
}
$hitung_non = count($array_passport_non);

// Load plugin PHPExcel nya
require_once 'PHPExcel/PHPExcel.php';

// Panggil class PHPExcel nya
$excel = new PHPExcel();

// Settingan awal fil excel
$excel->getProperties()->setCreator('My Notes Code')
  ->setLastModifiedBy('My Notes Code')
  ->setTitle("Data Siswa")
  ->setSubject("Siswa")
  ->setDescription("Laporan Semua Data Siswa")
  ->setKeywords("Data Siswa");

// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = array(
  'font' => array('bold' => true), // Set font nya jadi bold
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ),
  'borders' => array(
    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
  )
);

// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = array(
  'alignment' => array(
    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ),
  'borders' => array(
    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
  )
);

$excel->setActiveSheetIndex(0)->setCellValue('B1', "DATA RPTKA $nama_pt"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('B1:N1'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

$excel->setActiveSheetIndex(0)->setCellValue('B2', "NO RPTKA $no_rptka"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('B2:N2'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('B2')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('B2')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1


// Buat header tabel nya pada baris ke 3
$excel->setActiveSheetIndex(0)->setCellValue('B3', "NO"); // Set kolom A3 dengan tulisan "NO"
$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA MANDARIN"); // Set kolom B3 dengan tulisan "NIS"
$excel->setActiveSheetIndex(0)->setCellValue('D3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
$excel->setActiveSheetIndex(0)->setCellValue('E3', "PASSPORT"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$excel->setActiveSheetIndex(0)->setCellValue('F3', "KEWARGANEGARAAN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$excel->setActiveSheetIndex(0)->setCellValue('G3', "EXPIRED PASSPORT"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$excel->setActiveSheetIndex(0)->setCellValue('H3', "JENIS VISA"); // Set kolom E3 dengan tulisan "TELEPON"
$excel->setActiveSheetIndex(0)->setCellValue('I3', "JABATAN"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->setActiveSheetIndex(0)->setCellValue('J3', "JANGKA WAKTU VISA(BULAN)"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->setActiveSheetIndex(0)->setCellValue('K3', "TANGGAL TERBIT VISA"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->setActiveSheetIndex(0)->setCellValue('L3', "NO KITAS"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->setActiveSheetIndex(0)->setCellValue('M3', "KADALUARSA KITAS"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->setActiveSheetIndex(0)->setCellValue('N3', "KETERANGAN"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->setActiveSheetIndex(0)->setCellValue('O3', "STATUS"); // Set kolom F3 dengan tulisan "ALAMAT"

// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);

// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

//fungsi memanggil rptka
$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
for ($x = 0; $x < $hitung; $x++) {
  $cek = "SELECT * FROM data WHERE passport = '$array_passport[$x]' ";
  $hasil = mysqli_query($connection, $cek);
  while ($row_data = mysqli_fetch_array($hasil)) {
    $cek_imta = "SELECT * FROM visa312 WHERE passport = '$array_passport[$x]' ";
    $hasil_imta = mysqli_query($connection, $cek_imta);
    while ($row_imta = mysqli_fetch_array($hasil_imta)) {
      if ($row_data['expired_passport'] == '0000-00-00') {
        $tgl_exp_passport = " ";
      } else {
        $tgl_exp_passport = $row_data['expired_passport'];
      }

      if ($row_imta['exp_kitas'] == '0000-00-00') {
        $tgl_exp_kitas = " ";
      } else {
        $tgl_exp_kitas = $row_imta['exp_kitas'];
      }

      $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $row_data['nama_mandarin']);
      $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $row_data['nama_latin']);
      $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $row_data['passport']);
      $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $row_data['kewarganegaraan']);
      $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $tgl_exp_passport);
      $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $row_imta['visa']);
      $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $row_imta['jabatan']);
      $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $row_imta['jangka_visa']);
      $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $row_imta['tgl_terbit']);
      $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $row_imta['no_imta']);
      $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $tgl_exp_kitas);
      $excel->setActiveSheetIndex(0)->setCellValue('N' . $numrow, $row_imta['ket']);
      $excel->setActiveSheetIndex(0)->setCellValue('O' . $numrow, 'AKTIF');


      $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('N' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('O' . $numrow)->applyFromArray($style_row);
    }
  }
  $no++; // Tambah 1 setiap kali looping
  $numrow++; // Tambah 1 setiap kali looping
}

for ($x = 0; $x < $hitung_non; $x++) {
  $cek = "SELECT * FROM riwayat_data WHERE passport = '$array_passport_non[$x]' ";
  $hasil = mysqli_query($connection, $cek);
  while ($row_data = mysqli_fetch_array($hasil)) {
    $cek_imta = "SELECT * FROM riwayat_visa312 WHERE passport = '$array_passport_non[$x]' ";
    $hasil_imta = mysqli_query($connection, $cek_imta);
    while ($row_imta = mysqli_fetch_array($hasil_imta)) {
      if ($row_data['expired_passport'] == '0000-00-00') {
        $tgl_exp_passport = " ";
      } else {
        $tgl_exp_passport = $row_data['expired_passport'];
      }

      if ($row_imta['exp_kitas'] == '0000-00-00') {
        $tgl_exp_kitas = " ";
      } else {
        $tgl_exp_kitas = $row_imta['exp_kitas'];
      }
      $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $row_data['nama_mandarin']);
      $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $row_data['nama_latin']);
      $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $row_data['passport']);
      $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $row_data['kewarganegaraan']);
      $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $tgl_exp_passport);
      $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $row_imta['visa']);
      $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $row_imta['jabatan']);
      $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $row_imta['jangka_visa']);
      $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $row_imta['tgl_terbit']);
      $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $row_imta['no_imta']);
      $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $tgl_exp_kitas);
      $excel->setActiveSheetIndex(0)->setCellValue('N' . $numrow, $row_imta['ket']);
      $excel->setActiveSheetIndex(0)->setCellValue('O' . $numrow, 'NON-AKTIF');

      $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('N' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('O' . $numrow)->applyFromArray($style_row);
    }
  }
  $no++; // Tambah 1 setiap kali looping
  $numrow++; // Tambah 1 setiap kali looping
}

$numrow += 2;
$excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, "NO"); // Set kolom A3 dengan tulisan "NO"
$excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, "JABATAN"); // Set kolom B3 dengan tulisan "NIS"
$excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, "JUMLAH"); // Set kolom C3 dengan tulisan "NAMA"
$excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, "TERPAKAI"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, "SISA"); // Set kolom E3 dengan tulisan "TELEPON"

$excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_col);

$jbt = "SELECT * FROM jabatan_rptka WHERE nama_pt = '$nama_pt' && no_rptka = '$no_rptka' ";
$numrow++;
$no = 1;
$trpkai = 0;
$hasil = mysqli_query($connection, $jbt);
while ($row = mysqli_fetch_array($hasil)) {
  $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $no);
  $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $row['jabatan']);
  $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $row['jumlah']);
  $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $row['terpakai']);
  $trpkai += $row['terpakai'];
  $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $row['jumlah'] - $row['terpakai']);

  $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_col);
  $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_col);
  $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_col);
  $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_col);
  $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_col);

  $numrow++;
  $no++;
}
$numrow++;

$excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, "TOTAL"); // Set kolom A3 dengan tulisan "NO"
$excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $jumlah_rptka); // Set kolom B3 dengan tulisan "NIS"
$excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $trpkai); // Set kolom C3 dengan tulisan "NAMA"
$excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $jumlah_rptka - $trpkai); // Set kolom D3 dengan tulisan "JENIS KELAMIN"

$excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_col);


// Set width kolom
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(5); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('L')->setWidth(30); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('M')->setWidth(30); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('N')->setWidth(30); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('N')->setWidth(15); // Set width kolom F

// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Laporan Data RPTKA");
$excel->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data RPTKA.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
