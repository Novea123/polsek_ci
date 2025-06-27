<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pelapor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelapor_model');
		$this->load->library('form_validation');
		$this->load->library('pdf');
	}
	public function index() // tampilkan data
	{
		$data = array(
			'title' => 'View Data Pelapor',
			'userlog' => infoLogin(),
			'pelapor' => $this->Pelapor_model->getAll(),
			'content' => 'pelapor/index'
		);
		$this->load->view('template/main', $data);
	}

	public function add() //menampilkan form add
	{
		$data = array(
			'title' => 'Tambah Data Pelapor',
			'content' => 'pelapor/add_form'
		);
		$this->load->view('template/main', $data);
	}
	public function save() // menyimpan data dari form add
	{
		$this->Pelapor_model->Save();
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Pelapor Berhasil DiSimpan");
		}
		redirect('pelapor');
	}

	public function getedit($id) //menampilkan data ke form edit
	{
		$data = array(
			'title' => 'Update Data Pelapor',
			'pelapor' => $this->Pelapor_model->getById($id),
			'content' => 'pelapor/edit_form'
		);
		$this->load->view('template/main', $data);
	}

	public function edit() //melakukan update data dari form edit
	{
		$this->Pelapor_model->editData();
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Pelapor Berhasil DiUpdate");
		}
		redirect('pelapor');
	}

	function delete($id) //melakukan delate
	{
		$this->Pelapor_model->delete($id);
		redirect('pelapor');
	}


	public function pelapor()
	{
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

		$pdf->SetFont('Times', '', 10);
		$pdf->Output('laporan_header_only.pdf', 'I');
	}
}
