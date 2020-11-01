<?php
// Load file koneksi.php
include("../../system/connect.php");
$id = $_GET['id'];
$data_voucher = "SELECT * FROM voucher_other WHERE id = '$id' ";
$sql_voucher = mysqli_query($connection, $data_voucher);
$hasil = mysqli_fetch_assoc($sql_voucher);
$mata_uang = $hasil['mata_uang'];
$no_voucher = $hasil['kode'];
$nama_pengguna = $hasil['nama_pengguna'];
$total = $hasil['total_harga'];
$nama_pt = $hasil['nama_pt'];
$ket = $hasil['ket'];
$lokasi = $hasil['lokasi'];
$officer = $hasil['officer'];
$hari_ini = date('Y-m-d');

// Load plugin PHPExcel nya
require_once 'PHPExcel/PHPExcel.php';

// Panggil class PHPExcel nya
$excel = new PHPExcel();

// Settingan awal fil excel
$excel->getProperties()->setCreator('My Notes Code')
    ->setLastModifiedBy('My Notes Code')
    ->setTitle("Data Voucher")
    ->setSubject("Voucher")
    ->setDescription("Laporan Voucher")
    ->setKeywords("Data Voucher");

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
$style_cols = array(
    'font' => array('bold' => true), // Set font nya jadi bold
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT, // Set text jadi ditengah secara horizontal (center)
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
$style_cops = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ),
    'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border bottom dengan garis tipis
    )
);

// Menambahkan file gambar pada document excel pada kolom B2

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Media Kreatif Indonesia');
$objDrawing->setDescription('Logo Media Kreatif');
$objDrawing->setPath('assets/img/blog.png');
$objDrawing->setCoordinates('A1');
$objDrawing->setWorksheet($excel->getActiveSheet());
$objDrawing->setWidth(170)->setHeight(170);


$excel->setActiveSheetIndex(0)->setCellValue('A1', "PT. BLITZINDO UTAMA"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A1:F4'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk 
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER); // Set text center untuk 

$excel->setActiveSheetIndex(0)->setCellValue('A5', "FORM PROSES"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A5:F5'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A5')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A5')->getFont()->setSize(14); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk 

$excel->setActiveSheetIndex(0)->setCellValue('A6', "$no_voucher"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A6:F6'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A6')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A6')->getFont()->setSize(14); // Set font size 14 untuk kolom A1
$excel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

// Field Lokasi dan Staff OP
$excel->setActiveSheetIndex(0)->setCellValue('A8', "NAMA PT"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A8:B8'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A8:B8')->applyFromArray($style_cols);

$excel->setActiveSheetIndex(0)->setCellValue('C8', "$nama_pt"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('C8:F8'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('C8:F8')->applyFromArray($style_col);

$excel->setActiveSheetIndex(0)->setCellValue('A9', "NAMA CLIENT"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A9:B9'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A9:B9')->applyFromArray($style_cols);

$excel->setActiveSheetIndex(0)->setCellValue('C9', "$nama_pengguna"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('C9:D9'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('C9:D9')->applyFromArray($style_cols);

$excel->setActiveSheetIndex(0)->setCellValue('A10', "TANGGAL"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A10:B10'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A10:B10')->applyFromArray($style_cols);

$excel->setActiveSheetIndex(0)->setCellValue('C10', "$hari_ini"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('C10:D10'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('C10:D10')->applyFromArray($style_cols);

// Field Lokasi dan Staff OP
$excel->setActiveSheetIndex(0)->setCellValue('E9', "LOKASI"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->getStyle('E9')->applyFromArray($style_cols);

$excel->setActiveSheetIndex(0)->setCellValue('F9', $lokasi); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->getStyle('F9')->applyFromArray($style_cols);

$excel->setActiveSheetIndex(0)->setCellValue('E10', "STAFF OP"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->getStyle('E10')->applyFromArray($style_cols);

$excel->setActiveSheetIndex(0)->setCellValue('F10', $officer); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->getStyle('F10')->applyFromArray($style_cols);




// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

$excel->setActiveSheetIndex(0)->setCellValue('A12', "NO");
$excel->setActiveSheetIndex(0)->setCellValue('B12', "NAMA");
$excel->getActiveSheet()->mergeCells('B12:C12');
$excel->setActiveSheetIndex(0)->setCellValue('D12', "NO PASSPORT");
$excel->setActiveSheetIndex(0)->setCellValue('E12', "JENIS PROSES");
$excel->setActiveSheetIndex(0)->setCellValue('F12', "JUMLAH");

$excel->getActiveSheet()->getStyle('A12')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B12')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C12')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D12')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E12')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F12')->applyFromArray($style_col);


// Buat query untuk menampilkan semua data siswa
$no = 1;
$numrow = 13;
$tanda = $_GET['id'];
$data_voucher = "SELECT * FROM data_voucherother WHERE no_voucher= $tanda ";
$sql_voucher = mysqli_query($connection, $data_voucher);
while ($data = mysqli_fetch_assoc($sql_voucher)) {  // Ambil semua data dari hasil eksekusi $sql
    $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
    $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data['nama_mandarin']);
    $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data['nama_latin']);
    $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data['passport']);
    $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data['jenis_proses']);
    if ($mata_uang == "Rupiah") {
        $result = "Rp " . number_format($data['harga'], 2, ',', '.');
    } else {
        $result = "$ " . number_format($data['harga'], 2, '.', ',');
    }
    $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $result);

    // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
    $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
    $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
    $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
    $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
    $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
    $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);

    $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);

    $no++; // Tambah 1 setiap kali looping
    $numrow++; // Tambah 1 setiap kali looping
}

$sisa = 20 - $no;

for ($i = 0; $i <= $sisa; $i++) {
    $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, "$no");
    $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, "");
    $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, "");
    $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, "");
    $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, "");
    $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, "");

    // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
    $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
    $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
    $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
    $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
    $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
    $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);

    $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
    $numrow++;
    $no++;
}

$excel->setActiveSheetIndex(0)->setCellValue('A33', "TOTAL"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A33:E33'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A33:E33')->applyFromArray($style_col);

if ($mata_uang == "Rupiah") {
    $cetak_total = "Rp " . number_format($hasil['total_harga'], 2, ',', '.');
} else {
    $cetak_total = "$ " . number_format($hasil['total_harga'], 2, '.', ',');
}

$excel->setActiveSheetIndex(0)->setCellValue('F33', $cetak_total); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->getStyle('F33')->applyFromArray($style_col);

$excel->setActiveSheetIndex(0)->setCellValue('F33', $cetak_total); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->getStyle('F33')->applyFromArray($style_col);

$excel->setActiveSheetIndex(0)->setCellValue('A35', "APPLY BY");
$excel->getActiveSheet()->mergeCells('A35:B36'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A35:B36')->applyFromArray($style_col);

$excel->setActiveSheetIndex(0)->setCellValue('C35', $hasil['input_by']);
$excel->getActiveSheet()->mergeCells('C35:F36'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('C35:F36')->applyFromArray($style_col);

$excel->setActiveSheetIndex(0)->setCellValue('A37', "HEAD DPT");
$excel->getActiveSheet()->mergeCells('A37:B38'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A37:B38')->applyFromArray($style_col);

$excel->getActiveSheet()->mergeCells('C37:F38'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('C37:F38')->applyFromArray($style_col);

$excel->setActiveSheetIndex(0)->setCellValue('A40', "NOTE	:");
$excel->getActiveSheet()->mergeCells('A40:B40'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A40')->getFont()->setBold(TRUE);
$excel->getActiveSheet()->getStyle('A40')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

$excel->setActiveSheetIndex(0)->setCellValue('A41', $ket);
$excel->getActiveSheet()->mergeCells('A41:F45'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A41:F45')->applyFromArray($style_col);


// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom F

// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Laporan Data Transaksi");
$excel->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="voucher.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
