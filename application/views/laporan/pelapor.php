<?php
include 'lap_header.php';
$pdf->SetFont('Times', 'B', 18);
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN DATA PELAPOR', 0, 1, 'C');
$pdf->Cell(30, 8, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(7, 6, 'NO', 1, 0, 'C');
$pdf->Cell(37, 6, 'NIK', 1, 0, 'C');
$pdf->Cell(45, 6, 'NAMA PELAPOR', 1, 0, 'C');
$pdf->Cell(30, 6, 'TELEPON', 1, 0, 'C');
$pdf->Cell(70, 6, 'ALAMAT', 1, 1, 'C');
$i = 1;
$data = $this->db->get('tbl_pelapor')->result_array();
foreach ($data as $d) {
	$pdf->SetFont('Times', '', 9);
	$pdf->Cell(7, 6, $i++, 1, 0);
	$pdf->Cell(37, 6, $d['no_identitas'], 1, 0);
	$pdf->Cell(45, 6, $d['nama_pelapor'], 1, 0);
	$pdf->Cell(30, 6, $d['no_hp'], 1, 0);
	$pdf->Cell(70, 6, $d['alamat'], 1, 1);
} // lebar tabel 7+37+45+30+70 = 189

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
$pdf->Output('laporan_pelapor.pdf', 'I');
