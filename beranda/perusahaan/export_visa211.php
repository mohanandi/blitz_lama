<?php
// Load file koneksi.php
include("../../system/connect.php") ;
$nama_pt = $_GET['nama_pt'];

// Load plugin PHPExcel nya
require_once 'PHPExcel/PHPExcel.php';

// Panggil class PHPExcel nya
$excel = new PHPExcel();

// Settingan awal fil excel
$excel->getProperties()->setCreator('My Notes Code')
					   ->setLastModifiedBy('My Notes Code')
					   ->setTitle("Data Visa 211")
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

$excel->setActiveSheetIndex(0)->setCellValue('B1', "DATA VISA ".$nama_pt); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('B1:T1'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

// Buat header tabel nya pada baris ke 3
$excel->setActiveSheetIndex(0)->setCellValue('B3', "NO"); // Set kolom A3 dengan tulisan "NO"
$excel->setActiveSheetIndex(0)->setCellValue('C3', "CHINESE'S NAME"); // Set kolom B3 dengan tulisan "NIS"
$excel->setActiveSheetIndex(0)->setCellValue('D3', "NAME"); // Set kolom C3 dengan tulisan "NAMA"
$excel->setActiveSheetIndex(0)->setCellValue('E3', "NO PASSPORT"); // Set kolom D3 dengan tulisan "JENIS KE
$excel->setActiveSheetIndex(0)->setCellValue('F3', "VISA"); // Set kolom D3 dengan tulisan "JENIS KE
$excel->setActiveSheetIndex(0)->setCellValue('G3', "START VISA"); // Set kolom D3 dengan tulisan "JENIS KE
$excel->setActiveSheetIndex(0)->setCellValue('H3', "EXPIRED"); // Set kolom D3 dengan tulisan "JENIS KE
$excel->setActiveSheetIndex(0)->setCellValue('I3', "EXTEND-1"); // Set kolom D3 dengan tulisan "JENIS KE
$excel->setActiveSheetIndex(0)->setCellValue('J3', "START VISA"); // Set kolom D3 dengan tulisan "JENIS KE
$excel->setActiveSheetIndex(0)->setCellValue('K3', "EXPIRED"); // Set kolom D3 dengan tulisan "JENIS KE
$excel->setActiveSheetIndex(0)->setCellValue('L3', "EXTEND-2"); // Set kolom D3 dengan tulisan "JENIS KE
$excel->setActiveSheetIndex(0)->setCellValue('M3', "START VISA"); // Set kolom D3 dengan tulisan "JENIS KE
$excel->setActiveSheetIndex(0)->setCellValue('N3', "EXPIRED"); // Set kolom D3 dengan tulisan "JENIS KE
$excel->setActiveSheetIndex(0)->setCellValue('O3', "EXTEND-3"); // Set kolom D3 dengan tulisan "JENIS KE
$excel->setActiveSheetIndex(0)->setCellValue('P3', "START VISA"); // Set kolom D3 dengan tulisan "JENIS KE
$excel->setActiveSheetIndex(0)->setCellValue('Q3', "EXPIRED"); // Set kolom D3 dengan tulisan "JENIS KE
$excel->setActiveSheetIndex(0)->setCellValue('R3', "EXTEND-4"); // Set kolom D3 dengan tulisan "JENIS KE
$excel->setActiveSheetIndex(0)->setCellValue('S3', "START VISA"); // Set kolom D3 dengan tulisan "JENIS KE
$excel->setActiveSheetIndex(0)->setCellValue('T3', "EXPIRED"); // Set kolom D3 dengan tulisan "JENIS KE

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
$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);

// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

// Buat query untuk menampilkan semua data siswa
$query =  "SELECT * FROM visa211 WHERE nama_pt = '$nama_pt' ";
$sql = mysqli_query($connection, $query);
$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
while($visa211 = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    $passport = $visa211['passport'] ;
    $query = "SELECT * FROM data WHERE nama_pt='$nama_pt' AND passport='$passport'" ;
    $query_data = mysqli_query($connection, $query);
    $data = mysqli_fetch_array($query_data) ;

	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $no);
	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['nama_mandarin']);
	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['nama_latin']);
	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['passport']);
	$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $visa211['visa']);
	$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $visa211['start_visa']);
    $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $visa211['expired']);
    
    $query = "SELECT * FROM visa211_1 WHERE nama_pt='$nama_pt' AND passport='$passport'" ;
    $visa211_1 = mysqli_query($connection, $query);
    if(mysqli_num_rows($visa211_1) == 0){
        $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, "BELUM ADA");
        $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, "BELUM ADA");
        $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, "BELUM ADA");
    } else {
        $row_vis = mysqli_fetch_array($visa211_1) ;
        $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $row_vis['visa']);
        $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $row_vis['start_visa']);
        $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $row_vis['expired']);
    }
    $query = "SELECT * FROM visa211_2 WHERE nama_pt='$nama_pt' AND passport='$passport'" ;
    $visa211_2 = mysqli_query($connection, $query);
    if(mysqli_num_rows($visa211_2) == 0){
        $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, "BELUM ADA");
        $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, "BELUM ADA");
        $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, "BELUM ADA"); 
    }    else {
        $row_vis = mysqli_fetch_array($visa211_2) ;
        $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $row_vis['visa']);
        $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $row_vis['start_visa']);
        $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $row_vis['expired']);
    }
    $query = "SELECT * FROM visa211_3 WHERE nama_pt='$nama_pt' AND passport='$passport'" ;
    $visa211_3 = mysqli_query($connection, $query);
    if(mysqli_num_rows($visa211_3) == 0){
        $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, "BELUM ADA");
        $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, "BELUM ADA");
        $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, "BELUM ADA"); 
    }    else {
        $row_vis = mysqli_fetch_array($visa211_3) ;
        $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $row_vis['visa']);
        $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $row_vis['start_visa']);
        $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $row_vis['expired']);
    }
    $query = "SELECT * FROM visa211_4 WHERE nama_pt='$nama_pt' AND passport='$passport'" ;
    $visa211_4 = mysqli_query($connection, $query);
    if(mysqli_num_rows($visa211_4) == 0){
        $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, "BELUM ADA");
        $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, "BELUM ADA");
        $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, "BELUM ADA"); 
    }    else {
        $row_vis = mysqli_fetch_array($visa211_4) ;
        $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $row_vis['visa']);
        $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $row_vis['start_visa']);
        $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $row_vis['expired']);
    }
	// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
	
	$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
	
	$no++; // Tambah 1 setiap kali looping
	$numrow++; // Tambah 1 setiap kali looping
}

// Set width kolom
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(5); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('L')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('M')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('N')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('O')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('P')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('R')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('S')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('T')->setWidth(20); // Set width kolom D

// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Laporan Data Visa 211");
$excel->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=DATA VISA211.xlsx"); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
?>
