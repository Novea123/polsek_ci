<?php
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage(); 
$pdf->SetFont('Times','B',18);
$pdf->Image('./assets/img/polda.png',30,5,24,24);
$pdf->Cell(25);
$pdf->SetFont('Times','B',20);
$pdf->Cell(0,5,'POLSEK BANJARMASIN UTARA',0,1,'C');
$pdf->Cell(25);
$pdf->SetFont('Times','B',15);
$pdf->Cell(0,8,'KECAMATAN BANJARMASIN UTARA',0,1,'C');
$pdf->Cell(10);
$pdf->SetFont('Times','',10);
$pdf->Cell(0,15,'Alamat : JL.Brig Jend. Hasan Basri, Alalak Utara, Kec, Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70123',0,1,'C');

$pdf->SetLineWidth(1);
$pdf->Line(10,36,197,36);
$pdf->SetLineWidth(0);
$pdf->Line(10,37,197,37);
$pdf->Cell(30,10,'',0,1);
