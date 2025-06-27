<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pelanggaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggaran_model');
		$this->load->library('form_validation');
		$this->load->library('pdf');
		$this->load->helper('form');
	}

	public function index() // tampilkan data pelanggaran
	{
		$data = array(
			'title' => 'Data Pelanggaran',
			'userlog' => infoLogin(),
			'pelanggaran' => $this->Pelanggaran_model->getPetugas(),
			'content' => 'pelanggaran/index'
		);
		$this->load->view('template/main', $data);
	}

	public function add() // menampilkan form tambah
	{
		$data = array(
			'title' => 'Tambah Data Pelanggaran',
			'status_options' => ['Belum Diproses', 'Dalam Proses', 'Selesai'],
			'content' => 'pelanggaran/add_form'
		);
		$this->load->view('template/main', $data);
	}

	public function save() // menyimpan data dari form tambah
	{

		// Validasi form
		$this->form_validation->set_rules('nama_pelanggar', 'Nama Pelanggar', 'required');
		$this->form_validation->set_rules('nik', 'NIK', 'required|min_length[16]|max_length[16]');
		$this->form_validation->set_rules('jenis_pelanggaran', 'Jenis Pelanggaran', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$this->Pelanggaran_model->Save();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata("success", "Data Pelanggaran Berhasil Disimpan");
			}
			redirect('pelanggaran');
		}
	}

	public function getedit($id) // menampilkan form edit
	{
		$data = array(
			'title' => 'Edit Data Pelanggaran',
			'pelanggaran' => $this->Pelanggaran_model->getById($id),
			'status_options' => ['Belum Diproses', 'Dalam Proses', 'Selesai'],
			'content' => 'pelanggaran/edit_form'
		);
		$this->load->view('template/main', $data);
	}

	public function edit() // melakukan update data
	{
		$this->form_validation->set_rules('nama_pelanggar', 'Nama Pelanggar', 'required');
		$this->form_validation->set_rules('nik', 'NIK', 'required|min_length[16]|max_length[16]');

		if ($this->form_validation->run() == FALSE) {
			$this->getedit($this->input->post('id_pelanggaran'));
		} else {
			$this->Pelanggaran_model->editData();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata("success", "Data Pelanggaran Berhasil Diupdate");
			}
			redirect('pelanggaran');
		}
	}

	public function delete($id) // menghapus data
	{
		$this->Pelanggaran_model->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Pelanggaran Berhasil Dihapus");
		}
		redirect('pelanggaran');
	}

	public function detail($id) // menampilkan detail
	{
		$data = array(
			'title' => 'Detail Pelanggaran',
			'pelanggaran' => $this->Pelanggaran_model->getById($id),
			'content' => 'pelanggaran/detail'
		);
		$this->load->view('template/main', $data);
	}

	public function laporan() // generate laporan PDF
	{
		$data['pelanggaran'] = $this->Pelanggaran_model->getAll();

		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan-pelanggaran.pdf";
		$this->pdf->load_view('pelanggaran/laporan_pdf', $data);
	}

	public function pelanggaran()
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
