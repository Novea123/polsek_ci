<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KinerjaPetugas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('KinerjaPetugas_model');
		$this->load->library('form_validation');
	}

	public function index() // tampilkan data kinerja petugas
	{
		$data = array(
			'title' => 'View Data Kinerja Petugas',
			'userlog' => infoLogin(),
			'kinerja' => $this->KinerjaPetugas_model->getAll(),
			'content' => 'kinerjapetugas/index'
		);
		$this->load->view('template/main', $data);
	}

	public function add() //menampilkan form add kinerja petugas
	{
		$data = array(
			'title' => 'Tambah Data Kinerja Petugas',
			'petugas' => $this->KinerjaPetugas_model->getPetugasList(), // asumsi ada method untuk mendapatkan daftar petugas
			'content' => 'kinerjapetugas/add_form'
		);
		$this->load->view('template/main', $data);
	}

	public function save() // menyimpan data dari form add
	{
		$this->form_validation->set_rules('id_petugas', 'Petugas', 'required');
		$this->form_validation->set_rules('total_kasus', 'Total Kasus', 'required|numeric');
		$this->form_validation->set_rules('kasus_selesai', 'Kasus Selesai', 'required');
		$this->form_validation->set_rules('rata_penangan', 'Rata-rata Penanganan', 'required');
		$this->form_validation->set_rules('tersangka', 'Tersangka', 'required');
		$this->form_validation->set_rules('nilai_kinerja', 'Nilai Kinerja', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$this->KinerjaPetugas_model->Save();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata("success", "Data Kinerja Petugas Berhasil Disimpan");
			}
			redirect('kinerjapetugas');
		}
	}

	public function getedit($id) //menampilkan data ke form edit
	{
		$data = array(
			'title' => 'Update Data Kinerja Petugas',
			'kinerja' => $this->KinerjaPetugas_model->getById($id),
			'petugas' => $this->KinerjaPetugas_model->getPetugasList(),
			'content' => 'kinerjapetugas/edit_form'
		);
		$this->load->view('template/main', $data);
	}

	public function edit() //melakukan update data dari form edit
	{
		$this->form_validation->set_rules('id_petugas', 'Petugas', 'required');
		$this->form_validation->set_rules('total_kasus', 'Total Kasus', 'required|numeric');
		$this->form_validation->set_rules('kasus_selesai', 'Kasus Selesai', 'required');
		$this->form_validation->set_rules('rata_penangan', 'Rata-rata Penanganan', 'required');
		$this->form_validation->set_rules('tersangka', 'Tersangka', 'required');
		$this->form_validation->set_rules('nilai_kinerja', 'Nilai Kinerja', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$id = $this->input->post('id_kinerja');
			$this->getedit($id);
		} else {
			$this->KinerjaPetugas_model->editData();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata("success", "Data Kinerja Petugas Berhasil Diupdate");
			}
			redirect('kinerjapetugas');
		}
	}

	public function delete($id) //melakukan delete
	{
		$this->KinerjaPetugas_model->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Kinerja Petugas Berhasil Dihapus");
		}
		redirect('kinerjapetugas');
	}
}
