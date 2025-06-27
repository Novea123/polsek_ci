<?php
include 'lap_header.php';

$pdf->SetFont('Times', 'B', 18);
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN DATA BARANG BUKTI', 0, 1, 'C');
$pdf->Cell(30, 8, '', 0, 1); // Spasi vertikal

// Header Tabel
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 6, 'NO', 1, 0, 'C');
$pdf->Cell(20, 6, 'ID Laporan', 1, 0, 'C');
$pdf->Cell(30, 6, 'Jenis Bukti', 1, 0, 'C');
$pdf->Cell(15, 6, 'Jumlah', 1, 0, 'C');
$pdf->Cell(30, 6, 'Tanggal Ditemukan', 1, 0, 'C');
$pdf->Cell(45, 6, 'Lokasi Simpan', 1, 0, 'C');
$pdf->Cell(40, 6, 'Status', 1, 1, 'C');
// Total lebar = 10 + 20 + 30 + 15 + 30 + 45 + 40 = 190 mm

// Ambil data dari database
$i = 1;
$data = $this->db->get('tbl_bukti')->result_array();

foreach ($data as $d) {
	$pdf->SetFont('Times', '', 9);
	$pdf->Cell(10, 6, $i++, 1, 0);
	$pdf->Cell(20, 6, $d['id_laporan'], 1, 0);
	$pdf->Cell(30, 6, $d['jenis_barang_bukti'], 1, 0);
	$pdf->Cell(15, 6, $d['jumlah'], 1, 0, 'C');
	$pdf->Cell(30, 6, date('d/m/Y', strtotime($d['tanggal_ditemukan'])), 1, 0);
	$pdf->Cell(45, 6, $d['lokasi_penyimpanan'], 1, 0);
	$pdf->Cell(40, 6, $d['status_barang'], 1, 1);
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
$pdf->Output('laporan_barang_bukti.pdf', 'I');
