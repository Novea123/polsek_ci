<?php
include 'lap_header.php';

$pdf->SetFont('Times', 'B', 18);
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN DATA KEJAHATAN', 0, 1, 'C');
$pdf->Cell(30, 8, '', 0, 1); // Spasi vertikal

// Header Tabel
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(7, 6, 'NO', 1, 0, 'C');
$pdf->Cell(30, 6, 'Jenis Kejahatan', 1, 0, 'C');
$pdf->Cell(45, 6, 'Lokasi Kejadian', 1, 0, 'C');
$pdf->Cell(25, 6, 'Tanggal', 1, 0, 'C');
$pdf->Cell(20, 6, 'Waktu', 1, 0, 'C');
$pdf->Cell(40, 6, 'Status', 1, 1, 'C');
// Total: 7+30+45+25+20+40 = 167mm

// Data
$i = 1;
$data = $this->db->get('tbl_laporan')->result_array();

foreach ($data as $d) {
	$pdf->SetFont('Times', '', 9);
	$pdf->Cell(7, 6, $i++, 1, 0);
	$pdf->Cell(30, 6, $d['jenis_kejahatan'], 1, 0);
	$pdf->Cell(45, 6, $d['lokasi_kejadian'], 1, 0);
	$pdf->Cell(25, 6, date('d/m/Y', strtotime($d['tanggal_kejadian'])), 1, 0);
	$pdf->Cell(20, 6, date('H:i', strtotime($d['waktu_kejadian'])), 1, 0);
	$pdf->Cell(40, 6, $d['status'], 1, 1);
}

$pdf->Ln(10); // Spasi setelah tabel

// Tanda Tangan di kanan bawah
$pdf->SetFont('Times', '', 10);
$pdf->Cell(130); // Geser ke kanan (130mm dari kiri)
$pdf->Cell(60, 6, 'Banjarmasin, ' . date('d M Y'), 0, 1, 'C');

$pdf->Cell(130);
$pdf->Cell(60, 6, 'Mengetahui,', 0, 1, 'C');

$pdf->Cell(130);
$pdf->Cell(60, 6, 'Kapolsek Banjarmasin Utara', 0, 1, 'C');

$pdf->Ln(18); // Spasi untuk tanda tangan

$pdf->Cell(130);
$pdf->SetFont('Times', 'BU', 10); // BU = Bold + Underline
$pdf->Cell(60, 6, '_____________________', 0, 1, 'C');

$pdf->Cell(130);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(60, 6, 'NIP: 123456789', 0, 1, 'C');


$pdf->SetFont('Times', '', 10);
$pdf->Output('laporan_kejahatan.pdf', 'I');
