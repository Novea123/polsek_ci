<?php
include 'lap_header.php';

$pdf->SetFont('Times', 'B', 18);
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN DATA KINERJA PETUGAS', 0, 1, 'C');
$pdf->Cell(30, 8, '', 0, 1); // Spasi vertikal

// Header Tabel
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(7, 6, 'NO', 1, 0, 'C');
$pdf->Cell(35, 6, 'Nama Petugas', 1, 0, 'C');
$pdf->Cell(25, 6, 'Jabatan', 1, 0, 'C');
$pdf->Cell(18, 6, 'Total', 1, 0, 'C');
$pdf->Cell(25, 6, 'Selesai', 1, 0, 'C');
$pdf->Cell(28, 6, 'Rata Penangan', 1, 0, 'C');
$pdf->Cell(25, 6, 'Tersangka', 1, 0, 'C');
$pdf->Cell(26, 6, 'Nilai', 1, 1, 'C');
// Total width: 7+35+25+18+25+28+25+26 = 189 mm

// Data
$i = 1;
$data = $this->db->get('tbl_kinerja')->result_array();

foreach ($data as $d) {
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(7, 6, $i++, 1, 0);
    $pdf->Cell(35, 6, $d['nama_petugas'], 1, 0);
    $pdf->Cell(25, 6, $d['jabatan'], 1, 0);
    $pdf->Cell(18, 6, $d['total_kasus'], 1, 0, 'C');
    $pdf->Cell(25, 6, $d['kasus_selesai'], 1, 0, 'C');
    $pdf->Cell(28, 6, $d['rata_penangan'], 1, 0, 'C');
    $pdf->Cell(25, 6, $d['tersangka'], 1, 0, 'C');
    $pdf->Cell(26, 6, $d['nilai_kinerja'], 1, 1, 'C');
}

// Spasi sebelum tanda tangan
$pdf->Ln(10);

// Tanda Tangan Kanan Bawah
$pdf->SetFont('Times', '', 10);
$pdf->Cell(130);
$pdf->Cell(60, 6, 'Banjarmasin, ' . date('d M Y'), 0, 1, 'C');
$pdf->Cell(130);
$pdf->Cell(60, 6, 'Mengetahui,', 0, 1, 'C');
$pdf->Cell(130);
$pdf->Cell(60, 6, 'Kapolsek Banjarmasin Utara', 0, 1, 'C');

$pdf->Ln(18);

$pdf->Cell(130);
$pdf->SetFont('Times', 'BU', 10);
$pdf->Cell(60, 6, '_____________________', 0, 1, 'C');
$pdf->Cell(130);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(60, 6, 'NIP: 123456789', 0, 1, 'C');

// Output PDF
$pdf->Output('laporan_kinerja.pdf', 'I');
