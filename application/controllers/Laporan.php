<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
	}
	public function lap()
	{
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Times', 'B', 18);
		$pdf->Image('./assets/img/polsek.png', 30, 5, 27, 24);
		$pdf->Cell(25);
		$pdf->SetFont('Times', 'B', 20);
		$pdf->Cell(0, 5, 'POLSEK BANJARMASIN UTARA', 0, 1, 'C');
		$pdf->Cell(25);
		$pdf->SetFont('Times', 'B', 18);
		$pdf->Cell(0, 5, 'KECAMATAN BANJARMASIN UTARA', 0, 1, 'C');
		$pdf->Cell(25);
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(0, 5, 'Alamat : JL.Brig Jend. Hasan Basri, Alalak Utara, Kec, Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70123', 0, 1, 'C');


		$pdf->SetLineWidth(1);
		$pdf->Line(10, 36, 197, 36);
		$pdf->SetLineWidth(0);
		$pdf->Line(10, 37, 197, 37);
		$pdf->Cell(30, 17, '', 0, 1);

		$pdf->SetFont('Times', '', 10);
		$pdf->Output('laporan_header_only.pdf', 'I');
	}
	public function laporan()
	{
		$this->load->view('laporan/pelapor');
	}

	public function laporan_pel()
	{
		$this->load->view('laporan/pelapor_pel');
	}
}
