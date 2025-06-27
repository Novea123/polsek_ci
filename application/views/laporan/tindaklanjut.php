<?php
include 'lap_header.php'; 

$pdf->SetFont('Times','B',18);
$pdf->SetFont('Times','B',14);
$pdf->Cell(0, 5, 'LAPORAN TINDAK LANJUT KASUS', 0, 1, 'C');
$pdf->Cell(30, 8, '', 0, 1); // Spasi vertikal

// Header Tabel
$pdf->SetFont('Times','B',9);
$pdf->Cell(7, 6, 'NO', 1, 0, 'C');
$pdf->Cell(25, 6, 'ID Laporan', 1, 0, 'C');
$pdf->Cell(35, 6, 'Tgl Tindak Lanjut', 1, 0, 'C');
$pdf->Cell(75, 6, 'Jenis Tindakan', 1, 0, 'C');
$pdf->Cell(25, 6, 'ID Petugas', 1, 0, 'C');
$pdf->Cell(22, 6, 'Status', 1, 1, 'C');
// Total width: 7+25+35+75+25+22 = 189 mm

// Data
$i = 1;
$data = $this->db->get('tbl_tindaklanjutkasus')->result_array();

foreach ($data as $d) {
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(7, 6, $i++, 1, 0);
    $pdf->Cell(25, 6, $d['id_laporan'], 1, 0);
    $pdf->Cell(35, 6, date('d/m/Y', strtotime($d['tanggal_tindak_kasus'])), 1, 0);
    $pdf->Cell(75, 6, $d['jenis_tindakan'], 1, 0);
    $pdf->Cell(25, 6, $d['id_petugas'], 1, 0);
    $pdf->Cell(22, 6, $d['status'], 1, 1);
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
$pdf->Output('laporan_tindaklanjut_kasus.pdf', 'I');
