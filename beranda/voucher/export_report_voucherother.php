<?php
// Load file koneksi.php


include("../../system/connect.php");
if (isset($_GET['export'])) {
    $array_key = $_GET['array_key'];
    $validasi_array = is_array($array_key) ? 'Array' : 'not an Array';
    if ($validasi_array == 'Array') {
        if (count($array_key) == 1) {
            $array_value = $_GET['array_value'];
            $tanda1 = $array_key[0];
            $isi = $array_value[0];
            $query_voucher_other = "SELECT * FROM voucher_other WHERE $tanda1 = '$isi' ";
            $sql_voucher_other = mysqli_query($connection, $query_voucher_other);
            $query_voucher = "SELECT * FROM voucher_visa WHERE $tanda1 = '$isi' ";
            $sql_voucher = mysqli_query($connection, $query_voucher);
            $loop = 1;
        } else if (count($array_key) == 2) {
            $array_value = $_GET['array_value'];
            $tanda1 = $array_key[0];
            $isi = $array_value[0];
            $tanda2 = $array_key[1];
            $isi2 = $array_value[1];
            $query_voucher_other = "SELECT * FROM voucher_other WHERE $tanda1 = '$isi' AND $tanda2 = '$isi2' ";
            $sql_voucher_other = mysqli_query($connection, $query_voucher_other);
            $query_voucher = "SELECT * FROM voucher_visa WHERE $tanda1 = '$isi' AND $tanda2 = '$isi2' ";
            $sql_voucher = mysqli_query($connection, $query_voucher);
            $loop = 1;
        } else if (count($array_key) == 3) {
            $array_value = $_GET['array_value'];
            $tanda1 = $array_key[0];
            $isi = $array_value[0];
            $tanda2 = $array_key[1];
            $isi2 = $array_value[1];
            $tanda3 = $array_key[2];
            $isi3 = $array_value[2];
            $query_voucher_other = "SELECT * FROM voucher_other WHERE $tanda1 = '$isi' AND $tanda2 = '$isi2' AND $tanda3 = '$isi3' ";
            $sql_voucher_other = mysqli_query($connection, $query_voucher_other);
            $query_voucher = "SELECT * FROM voucher_visa WHERE $tanda1 = '$isi' AND $tanda2 = '$isi2' AND $tanda3 = '$isi3' ";
            $sql_voucher = mysqli_query($connection, $query_voucher);
            $loop = 1;
        }
    } else {
        $array_key_visa = $_GET['array_key2'];
        $loop = 0;
    }
}


// Load plugin PHPExcel nya
require_once 'PHPExcel/PHPExcel.php';

// Panggil class PHPExcel nya
$excel = new PHPExcel();

// Settingan awal fil excel
$excel->getProperties()->setCreator('')
    ->setLastModifiedBy('')
    ->setTitle("Voucher Other")
    ->setSubject("Voucher Other")
    ->setDescription("Report Voucher Other")
    ->setKeywords("Voucher Other");

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

$excel->setActiveSheetIndex(0)->setCellValue('A1', "REPORT VOUCHER"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A1:J1'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

// Buat header tabel nya pada baris ke 3
$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
$excel->setActiveSheetIndex(0)->setCellValue('B3', "NO VOUCHER"); // Set kolom B3 dengan tulisan "NIS"
$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA PT"); // Set kolom C3 dengan tulisan "NAMA"
$excel->setActiveSheetIndex(0)->setCellValue('D3', "MATA UANG"); // Set kolom C3 dengan tulisan "NAMA"
$excel->setActiveSheetIndex(0)->setCellValue('E3', "JUMLAH PENGGUNA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$excel->setActiveSheetIndex(0)->setCellValue('F3', "NAMA PENGGUNA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$excel->setActiveSheetIndex(0)->setCellValue('G3', "PASSPORT"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$excel->setActiveSheetIndex(0)->setCellValue('H3', "JENIS PROSES"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$excel->setActiveSheetIndex(0)->setCellValue('I3', "HARGA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$excel->setActiveSheetIndex(0)->setCellValue('J3', "TOTAL HARGA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$excel->setActiveSheetIndex(0)->setCellValue('K3', "TANGGAL INPUT VOUCHER"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$excel->setActiveSheetIndex(0)->setCellValue('L3', "INVOICE"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"

// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
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

// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);


if ($loop == 1) {
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    $no = 1;
    while ($data = mysqli_fetch_array($sql_voucher)) { // Ambil semua data dari hasil eksekusi $sql

        $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
        $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data['kode']);
        $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data['nama_pt']);
        $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data['mata_uang']);
        $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data['jumlah_pengguna']);

        $id_voucher = $data['id'];
        $numrow_data = $numrow;

        $query_data = "SELECT * FROM data_vouchervisa WHERE no_voucher='$id_voucher'";
        $sql_data = mysqli_query($connection, $query_data);
        $contoh = 0;
        while ($data_pengguna = mysqli_fetch_assoc($sql_data)) {
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow_data, $data_pengguna['nama_latin']);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow_data, $data_pengguna['passport']);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow_data, $data_pengguna['jenis_proses']);
            if ($data['mata_uang'] == "Rupiah") {
                $result = "Rp " . number_format($data_pengguna['harga'], 2, ',', '.');

                $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow_data, $result);
            } else {
                $result = "$ " . number_format($data_pengguna['harga'], 2, '.', ',');

                $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow_data, $result);
            }
            $numrow_data++;
            $contoh++;
        }

        if ($data['mata_uang'] == "Rupiah") {
            $result = "Rp " . number_format($data['total_harga'], 2, ',', '.');

            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $result);
        } else {
            $result = "$ " . number_format($data['total_harga'], 2, '.', ',');

            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $result);
        }

        $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data['tgl_input']);

        if ($data['ket_invoice'] == 0) {
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, '');
        } else {
            $data_invoice = "SELECT * FROM invoice_vouchervisa WHERE id='$data_id[$i]' ";
            $sql_invoice = mysqli_query($connection, $data_invoice);
            $hasil_invoice = mysqli_fetch_assoc($sql_invoice);

            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $hasil_invoice['invoice']);
        }


        $angka_merge = $numrow_data - 1;
        // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
        $excel->getActiveSheet()->getStyle('A' . $numrow . ':A' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->mergeCells('A' . $numrow . ':A' . $angka_merge);
        $excel->getActiveSheet()->getStyle('B' . $numrow . ':B' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->mergeCells('B' . $numrow . ':B' . $angka_merge);
        $excel->getActiveSheet()->getStyle('C' . $numrow . ':C' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->mergeCells('C' . $numrow . ':C' . $angka_merge);
        $excel->getActiveSheet()->getStyle('D' . $numrow . ':D' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->mergeCells('D' . $numrow . ':D' . $angka_merge);
        $excel->getActiveSheet()->getStyle('E' . $numrow . ':E' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->mergeCells('E' . $numrow . ':E' . $angka_merge);
        $excel->getActiveSheet()->getStyle('F' . $numrow . ':F' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('G' . $numrow . ':G' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('H' . $numrow . ':H' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('I' . $numrow . ':I' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('J' . $numrow . ':J' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->mergeCells('J' . $numrow . ':J' . $angka_merge);
        $excel->getActiveSheet()->getStyle('K' . $numrow . ':K' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->mergeCells('K' . $numrow . ':K' . $angka_merge);
        $excel->getActiveSheet()->getStyle('L' . $numrow . ':L' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->mergeCells('L' . $numrow . ':L' . $angka_merge);


        $numrow = $numrow + $contoh; // Tambah 1 setiap kali looping
        $no++;
    }
    while ($data = mysqli_fetch_array($sql_voucher_other)) { // Ambil semua data dari hasil eksekusi $sql

        $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
        $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data['kode']);
        $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data['nama_pt']);
        $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data['mata_uang']);
        $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data['jumlah_pengguna']);

        $id_voucher = $data['id'];
        $numrow_data = $numrow;

        $query_data = "SELECT * FROM data_voucherother WHERE no_voucher='$id_voucher'";
        $sql_data = mysqli_query($connection, $query_data);
        $contoh = 0;
        while ($data_pengguna = mysqli_fetch_assoc($sql_data)) {
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow_data, $data_pengguna['nama_latin']);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow_data, $data_pengguna['passport']);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow_data, $data_pengguna['jenis_proses']);
            if ($data['mata_uang'] == "Rupiah") {
                $result = "Rp " . number_format($data_pengguna['harga'], 2, ',', '.');

                $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow_data, $result);
            } else {
                $result = "$ " . number_format($data_pengguna['harga'], 2, '.', ',');

                $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow_data, $result);
            }
            $numrow_data++;
            $contoh++;
        }

        if ($data['mata_uang'] == "Rupiah") {
            $result = "Rp " . number_format($data['total_harga'], 2, ',', '.');

            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $result);
        } else {
            $result = "$ " . number_format($data['total_harga'], 2, '.', ',');

            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $result);
        }

        $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data['tgl_input']);

        if ($data['ket_invoice'] == 0) {
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, '');
        } else {
            $data_invoice = "SELECT * FROM invoice_voucherother WHERE id='$data_id[$i]' ";
            $sql_invoice = mysqli_query($connection, $data_invoice);
            $hasil_invoice = mysqli_fetch_assoc($sql_invoice);

            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $hasil_invoice['invoice']);
        }


        $angka_merge = $numrow_data - 1;
        // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
        $excel->getActiveSheet()->getStyle('A' . $numrow . ':A' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->mergeCells('A' . $numrow . ':A' . $angka_merge);
        $excel->getActiveSheet()->getStyle('B' . $numrow . ':B' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->mergeCells('B' . $numrow . ':B' . $angka_merge);
        $excel->getActiveSheet()->getStyle('C' . $numrow . ':C' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->mergeCells('C' . $numrow . ':C' . $angka_merge);
        $excel->getActiveSheet()->getStyle('D' . $numrow . ':D' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->mergeCells('D' . $numrow . ':D' . $angka_merge);
        $excel->getActiveSheet()->getStyle('E' . $numrow . ':E' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->mergeCells('E' . $numrow . ':E' . $angka_merge);
        $excel->getActiveSheet()->getStyle('F' . $numrow . ':F' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('G' . $numrow . ':G' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('H' . $numrow . ':H' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('I' . $numrow . ':I' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('J' . $numrow . ':J' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->mergeCells('J' . $numrow . ':J' . $angka_merge);
        $excel->getActiveSheet()->getStyle('K' . $numrow . ':K' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->mergeCells('K' . $numrow . ':K' . $angka_merge);
        $excel->getActiveSheet()->getStyle('L' . $numrow . ':L' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->mergeCells('L' . $numrow . ':L' . $angka_merge);


        $numrow = $numrow + $contoh; // Tambah 1 setiap kali looping
        $no++;
    }
} else {
    $no = 1;
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    for ($i = 0; $i < $array_key; $i++) {
        $id_tanda = $i + 1;
        $query = "SELECT * FROM voucher_other WHERE id = '$id_tanda'";
        $sql_voucher = mysqli_query($connection, $query);
        $data = mysqli_fetch_array($sql_voucher);  // Ambil semua data dari hasil eksekusi $sql

        $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
        $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data['kode']);
        $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data['nama_pt']);
        $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data['mata_uang']);
        $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data['jumlah_pengguna']);

        $id_voucher = $data['id'];
        $numrow_data = $numrow;

        $query_data = "SELECT * FROM data_voucherother WHERE no_voucher='$id_voucher'";
        $sql_data = mysqli_query($connection, $query_data);
        $contoh = 0;
        while ($data_pengguna = mysqli_fetch_assoc($sql_data)) {
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow_data, $data_pengguna['nama_latin']);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow_data, $data_pengguna['passport']);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow_data, $data_pengguna['jenis_proses']);
            if ($data['mata_uang'] == "Rupiah") {
                $result = "Rp " . number_format($data_pengguna['harga'], 2, ',', '.');

                $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow_data, $result);
            } else {
                $result = "$ " . number_format($data_pengguna['harga'], 2, '.', ',');

                $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow_data, $result);
            }
            $numrow_data++;
            $contoh++;
        }


        if ($data['mata_uang'] == "Rupiah") {
            $result = "Rp " . number_format($data['total_harga'], 2, ',', '.');

            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $result);
        } else {
            $result = "$ " . number_format($data['total_harga'], 2, '.', ',');

            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $result);
        }


        $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data['tgl_input']);

        if ($data['ket_invoice'] == 0) {
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, '');
        } else {
            $data_invoice = "SELECT * FROM invoice_voucherother WHERE id='$data_id[$i]' ";
            $sql_invoice = mysqli_query($connection, $data_invoice);
            $hasil_invoice = mysqli_fetch_assoc($sql_invoice);

            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $hasil_invoice['invoice']);
        }



        $angka_merge = $numrow_data - 1;
        // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
        $excel->getActiveSheet()->getStyle('A' . $numrow . ':A' . $angka_merge)->applyFromArray($style_row);

        $excel->getActiveSheet()->getStyle('B' . $numrow . ':B' . $angka_merge)->applyFromArray($style_row);

        $excel->getActiveSheet()->getStyle('C' . $numrow . ':C' . $angka_merge)->applyFromArray($style_row);

        $excel->getActiveSheet()->getStyle('D' . $numrow . ':D' . $angka_merge)->applyFromArray($style_row);

        $excel->getActiveSheet()->getStyle('E' . $numrow . ':E' . $angka_merge)->applyFromArray($style_row);

        $excel->getActiveSheet()->getStyle('F' . $numrow . ':F' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('G' . $numrow . ':G' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('H' . $numrow . ':H' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('I' . $numrow . ':I' . $angka_merge)->applyFromArray($style_row);

        $excel->getActiveSheet()->getStyle('J' . $numrow . ':J' . $angka_merge)->applyFromArray($style_row);

        $excel->getActiveSheet()->getStyle('K' . $numrow . ':K' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('L' . $numrow . ':L' . $angka_merge)->applyFromArray($style_row);



        $numrow = $numrow + $contoh; // Tambah 1 setiap kali looping
        $no++;
    }
    for ($i = 0; $i < $array_key_visa; $i++) {
        $id_tanda = $i + 1;
        $query = "SELECT * FROM voucher_visa WHERE id = '$id_tanda'";
        $sql_voucher = mysqli_query($connection, $query);
        $data = mysqli_fetch_array($sql_voucher);  // Ambil semua data dari hasil eksekusi $sql

        $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
        $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data['kode']);
        $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data['nama_pt']);
        $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data['mata_uang']);
        $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data['jumlah_pengguna']);

        $id_voucher = $data['id'];
        $numrow_data = $numrow;

        $query_data = "SELECT * FROM data_vouchervisa WHERE no_voucher='$id_voucher'";
        $sql_data = mysqli_query($connection, $query_data);
        $contoh = 0;
        while ($data_pengguna = mysqli_fetch_assoc($sql_data)) {
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow_data, $data_pengguna['nama_latin']);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow_data, $data_pengguna['passport']);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow_data, $data_pengguna['jenis_proses']);
            if ($data['mata_uang'] == "Rupiah") {
                $result = "Rp " . number_format($data_pengguna['harga'], 2, ',', '.');

                $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow_data, $result);
            } else {
                $result = "$ " . number_format($data_pengguna['harga'], 2, '.', ',');

                $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow_data, $result);
            }
            $numrow_data++;
            $contoh++;
        }


        if ($data['mata_uang'] == "Rupiah") {
            $result = "Rp " . number_format($data['total_harga'], 2, ',', '.');

            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $result);
        } else {
            $result = "$ " . number_format($data['total_harga'], 2, '.', ',');

            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $result);
        }


        $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data['tgl_input']);

        if ($data['ket_invoice'] == 0) {
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, '');
        } else {
            $data_invoice = "SELECT * FROM invoice_vouchervisa WHERE id='$data_id[$i]' ";
            $sql_invoice = mysqli_query($connection, $data_invoice);
            $hasil_invoice = mysqli_fetch_assoc($sql_invoice);

            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $hasil_invoice['invoice']);
        }



        $angka_merge = $numrow_data - 1;
        // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
        $excel->getActiveSheet()->getStyle('A' . $numrow . ':A' . $angka_merge)->applyFromArray($style_row);

        $excel->getActiveSheet()->getStyle('B' . $numrow . ':B' . $angka_merge)->applyFromArray($style_row);

        $excel->getActiveSheet()->getStyle('C' . $numrow . ':C' . $angka_merge)->applyFromArray($style_row);

        $excel->getActiveSheet()->getStyle('D' . $numrow . ':D' . $angka_merge)->applyFromArray($style_row);

        $excel->getActiveSheet()->getStyle('E' . $numrow . ':E' . $angka_merge)->applyFromArray($style_row);

        $excel->getActiveSheet()->getStyle('F' . $numrow . ':F' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('G' . $numrow . ':G' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('H' . $numrow . ':H' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('I' . $numrow . ':I' . $angka_merge)->applyFromArray($style_row);

        $excel->getActiveSheet()->getStyle('J' . $numrow . ':J' . $angka_merge)->applyFromArray($style_row);

        $excel->getActiveSheet()->getStyle('K' . $numrow . ':K' . $angka_merge)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('L' . $numrow . ':L' . $angka_merge)->applyFromArray($style_row);



        $numrow = $numrow + $contoh; // Tambah 1 setiap kali looping
        $no++;
    }
}



// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(20); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(24); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('L')->setWidth(20); // Set width kolom D

// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Laporan Data Transaksi");
$excel->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Report Voucher.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');
