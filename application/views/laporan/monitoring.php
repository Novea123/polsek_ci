<?php
include 'lap_header.php';

$pdf->SetFont('Times', 'B', 18);
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN MONITORING KASUS', 0, 1, 'C');
$pdf->Cell(30, 8, '', 0, 1); // Spasi vertikal

// Header Tabel
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(7, 6, 'NO', 1, 0, 'C');
$pdf->Cell(35, 6, 'Nama Pelapor', 1, 0, 'C');
$pdf->Cell(35, 6, 'Nama Petugas', 1, 0, 'C');
$pdf->Cell(25, 6, 'Tanggal Lapor', 1, 0, 'C');
$pdf->Cell(45, 6, 'Jenis Kejahatan', 1, 0, 'C');
$pdf->Cell(42, 6, 'Status', 1, 1, 'C');
// Total width: 7+35+35+25+45+42 = 189 mm

// Data
$i = 1;
$data = $this->db->get('tbl_monitoring')->result_array();

foreach ($data as $d) {
	$pdf->SetFont('Times', '', 9);
	$pdf->Cell(7, 6, $i++, 1, 0);
	$pdf->Cell(35, 6, $d['nama_pelapor'], 1, 0);
	$pdf->Cell(35, 6, $d['nama_petugas'], 1, 0);
	$pdf->Cell(25, 6, date('d/m/Y', strtotime($d['tanggal_lapor'])), 1, 0);
	$pdf->Cell(45, 6, $d['jenis_kejahatan'], 1, 0);
	$pdf->Cell(42, 6, $d['status'], 1, 1);
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
$pdf->Output('laporan_monitoring.pdf', 'I');
