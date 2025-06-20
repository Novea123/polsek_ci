<?php
		$data = array(
			'pelanggaran' => $this->Pelanggaran_model->getAll()
		);

		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Times', 'B', 18);
		$pdf->Image('./assets/img/polda.png', 30, 5, 24, 24);
		$pdf->Cell(25);
		$pdf->SetFont('Times', 'B', 20);
		$pdf->Cell(0, 5, 'POLSEK BANJARMASIN UTARA', 0, 1, 'C');
		$pdf->Cell(25);
		$pdf->SetFont('Times', 'B', 15);
		$pdf->Cell(0, 8, 'KECAMATAN BANJARMASIN UTARA', 0, 1, 'C');
		$pdf->Cell(10);
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(0, 15, 'Alamat : JL.Brig Jend. Hasan Basri, Alalak Utara, Kec, Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70123', 0, 1, 'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10, 36, 197, 36);
		$pdf->SetLineWidth(0);
		$pdf->Line(10, 37, 197, 37);
		$pdf->Cell(30, 10, '', 0, 1);

		// Header tabel
		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(10, 10, 'No', 1, 0, 'C');
		$pdf->Cell(40, 10, 'Nama Pelanggar', 1, 0, 'C');
		$pdf->Cell(30, 10, 'NIK', 1, 0, 'C');
		$pdf->Cell(50, 10, 'Jenis Pelanggaran', 1, 0, 'C');
		$pdf->Cell(25, 10, 'Tanggal', 1, 0, 'C');
		$pdf->Cell(35, 10, 'Status', 1, 1, 'C');

		// Data pelanggaran
		$pdf->SetFont('Times', '', 10);
		$no = 1;
		foreach ($data['pelanggaran'] as $row) {
			$pdf->Cell(10, 10, $no++, 1, 0, 'C');
			$pdf->Cell(40, 10, $row->nama_pelanggar, 1, 0);
			$pdf->Cell(30, 10, $row->nik, 1, 0);
			$pdf->Cell(50, 10, $row->jenis_pelanggaran, 1, 0);
			$pdf->Cell(25, 10, date('d/m/Y', strtotime($row->tanggal)), 1, 0);
			$pdf->Cell(35, 10, $row->status, 1, 1);
		}

		$pdf->Output('laporan_pelanggaran.pdf', 'I');
	
