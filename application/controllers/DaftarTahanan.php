<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DaftarTahanan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DaftarTahanan_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index() // tampilkan data
	{
		$data = array(
			'title' => 'View Data Tahanan',
			'userlog' => infoLogin(),
			'tahanan' => $this->DaftarTahanan_model->getAll(),
			'content' => 'daftartahanan/index'
		);
		$this->load->view('template/main', $data);
	}

	public function add() //menampilkan form add
	{
		$data = array(
			'title' => 'Tambah Data Tahanan',
			'jenis_kelamin_options' => ['Pria', 'Wanita'], // Sesuai dengan struktur enum di database
			'content' => 'daftartahanan/add_form'
		);
		$this->load->view('template/main', $data);
	}

	public function save() // menyimpan data dari form add
	{
		$this->form_validation->set_rules('nama_orang', 'Nama Orang', 'required');
		$this->form_validation->set_rules('id_laporan', 'ID Laporan', 'required|numeric');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('tanggal_ditangkap', 'Tanggal Ditangkap', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$this->DaftarTahanan_model->Save();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata("success", "Data Tahanan Berhasil DiSimpan");
			}
			redirect('daftartahanan');
		}
	}

	public function getedit($id) //menampilkan data ke form edit
	{
		$data = array(
			'title' => 'Update Data Tahanan',
			'tahanan' => $this->DaftarTahanan_model->getById($id),
			'jenis_kelamin_options' => ['Pria', 'Wania'],
			'content' => 'daftartahanan/edit_form'
		);
		$this->load->view('template/main', $data);
	}

	public function edit() //melakukan update data dari form edit
	{
		$this->form_validation->set_rules('nama_orang', 'Nama Orang', 'required');
		$this->form_validation->set_rules('id_laporan', 'ID Laporan', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->getedit($this->input->post('id_orang'));
		} else {
			$this->DaftarTahanan_model->editData();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata("success", "Data Tahanan Berhasil DiUpdate");
			}
			redirect('daftartahanan');
		}
	}

	public function delete($id) //melakukan delete
	{
		$this->DaftarTahanan_model->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Tahanan Berhasil Dihapus");
		}
		redirect('daftartahanan');
	}
}
