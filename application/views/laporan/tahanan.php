<?php
include 'lap_header.php'; 

$pdf->SetFont('Times','B',18);
$pdf->SetFont('Times','B',14);
$pdf->Cell(0, 5, 'LAPORAN DATA TAHANAN', 0, 1, 'C');
$pdf->Cell(30, 8, '', 0, 1); // spasi vertikal

// Header Tabel
$pdf->SetFont('Times','B',9);
$pdf->Cell(7, 6, 'NO', 1, 0, 'C');
$pdf->Cell(30, 6, 'Nama', 1, 0, 'C');
$pdf->Cell(15, 6, 'JK', 1, 0, 'C');
$pdf->Cell(25, 6, 'Tgl Lahir', 1, 0, 'C');
$pdf->Cell(30, 6, 'Pekerjaan', 1, 0, 'C');
$pdf->Cell(35, 6, 'Jenis Kejahatan', 1, 0, 'C');
$pdf->Cell(25, 6, 'Tgl Tangkap', 1, 0, 'C');
$pdf->Cell(22, 6, 'Durasi', 1, 1, 'C');
// Total width: 7+30+15+25+30+35+25+22 = 189mm

// Data
$i = 1;
$data = $this->db->get('tbl_tahanan')->result_array();

foreach ($data as $d) {
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(7, 6, $i++, 1, 0);
    $pdf->Cell(30, 6, $d['nama_orang'], 1, 0);
    $pdf->Cell(15, 6, $d['jenis_kelamin'], 1, 0);
    $pdf->Cell(25, 6, ($d['tanggal_lahir'] != '0000-00-00') ? date('d/m/Y', strtotime($d['tanggal_lahir'])) : '-', 1, 0);
    $pdf->Cell(30, 6, $d['pekerjaan'], 1, 0);
    $pdf->Cell(35, 6, $d['jenis_kejahatan'], 1, 0);
    $pdf->Cell(25, 6, date('d/m/Y', strtotime($d['tanggal_ditangkap'])), 1, 0);
    $pdf->Cell(22, 6, $d['durasi'], 1, 1);
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
$pdf->Output('laporan_tahanan.pdf', 'I');
