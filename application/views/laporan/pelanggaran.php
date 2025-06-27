<?php
include 'lap_header.php';

$pdf->SetFont('Times', 'B', 18);
$pdf->Cell(0, 10, 'LAPORAN DATA PELANGGARAN', 0, 1, 'C');
$pdf->Ln(5); // spasi antar judul dan tabel

$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 6, 'NO', 1, 0, 'C');                     // 10 mm
$pdf->Cell(40, 6, 'Nama', 1, 0, 'C');                   // 40 mm
$pdf->Cell(60, 6, 'Jenis Pelanggaran', 1, 0, 'C');      // 60 mm
$pdf->Cell(30, 6, 'Tanggal', 1, 0, 'C');                // 30 mm
$pdf->Cell(50, 6, 'Sanksi', 1, 1, 'C');                 // 50 mm
// Total = 190 mm


// Ambil data dari database
$i = 1;
$data = $this->db->get('tbl_pelanggaran')->result_array();

foreach ($data as $d) {
	$pdf->SetFont('Times', '', 9);
	$pdf->Cell(10, 6, $i++, 1, 0);
	$pdf->Cell(40, 6, $d['nama_pelanggar'], 1, 0);
	$pdf->Cell(60, 6, $d['jenis_pelanggaran'], 1, 0);
	$pdf->Cell(30, 6, date('d/m/Y', strtotime($d['tanggal'])), 1, 0);
	$pdf->Cell(50, 6, $d['sanksi'], 1, 1);
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



$pdf->Output('laporan_pelanggaran.pdf', 'I');
