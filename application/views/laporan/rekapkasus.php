<?php
include 'lap_header.php';

$pdf->SetFont('Times', 'B', 18);
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN REKAPITULASI KASUS', 0, 1, 'C');
$pdf->Cell(30, 8, '', 0, 1); // Spasi vertikal

// Header Tabel
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 6, 'NO', 1, 0, 'C');
$pdf->Cell(60, 6, 'Jenis Kejahatan', 1, 0, 'C');
$pdf->Cell(30, 6, 'Jumlah Kasus', 1, 0, 'C');
$pdf->Cell(45, 6, 'Proses Hukum', 1, 0, 'C');
$pdf->Cell(45, 6, 'Mediasi', 1, 1, 'C');
// Total: 10 + 60 + 30 + 45 + 45 = 190 mm

$i = 1;
$data = $this->db->get('tbl_rekapitulasi')->result_array();

foreach ($data as $d) {
	$pdf->SetFont('Times', '', 9);
	$pdf->Cell(10, 6, $i++, 1, 0, 'C');
	$pdf->Cell(60, 6, $d['jenis_kejahatan'], 1, 0);
	$pdf->Cell(30, 6, $d['jumlah_kasus'], 1, 0, 'C');
	$pdf->Cell(45, 6, $d['proses_hukum'], 1, 0, 'C');
	$pdf->Cell(45, 6, $d['mediasi'], 1, 1, 'C');
}

// Spasi sebelum tanda tangan
$pdf->Ln(10);

// Tanda Tangan Kanan Bawah
$pdf->SetFont('Times', '', 10);
$pdf->Cell(100); // Posisi ke kanan
$pdf->Cell(85, 6, 'Banjarmasin, ' . date('d M Y'), 0, 1, 'C');
$pdf->Cell(100);
$pdf->Cell(85, 6, 'Mengetahui,', 0, 1, 'C');
$pdf->Cell(100);
$pdf->Cell(85, 6, 'Kapolsek Banjarmasin Utara', 0, 1, 'C');

$pdf->Ln(18);

$pdf->Cell(100);
$pdf->SetFont('Times', 'BU', 10);
$pdf->Cell(85, 6, '_____________________', 0, 1, 'C');
$pdf->Cell(100);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(85, 6, 'NIP: 123456789', 0, 1, 'C');

// Output PDF
$pdf->Output('laporan_rekapitulasi.pdf', 'I');
