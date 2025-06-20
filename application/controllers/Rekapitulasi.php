<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekapitulasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Rekapitulasi_model');
		$this->load->library('form_validation');
	}

	public function index() // tampilkan data rekapitulasi
	{
		$data = array(
			'title' => 'View Data Rekapitulasi',
			'userlog' => infoLogin(),
			'rekapitulasi' => $this->Rekapitulasi_model->getAll(),
			'content' => 'rekapitulasi/index'
		);
		$this->load->view('template/main', $data);
	}

	public function add() // menampilkan form tambah
	{
		$data = array(
			'title' => 'Tambah Data Rekapitulasi',
			'content' => 'rekapitulasi/add_form'
		);
		$this->load->view('template/main', $data);
	}

	public function save() // menyimpan data baru
	{
		$this->Rekapitulasi_model->save();
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Rekapitulasi Berhasil Disimpan");
		}
		redirect('rekapitulasi');
	}

	public function getedit($id) // menampilkan data ke form edit
	{
		$data = array(
			'title' => 'Update Data Rekapitulasi',
			'rekapitulasi' => $this->Rekapitulasi_model->getById($id),
			'content' => 'rekapitulasi/edit_form'
		);
		$this->load->view('template/main', $data);
	}

	public function edit() // menyimpan hasil edit
	{
		$this->Rekapitulasi_model->editData();
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Rekapitulasi Berhasil Diupdate");
		}
		redirect('rekapitulasi');
	}

	public function delete($id) // menghapus data
	{
		$this->Rekapitulasi_model->delete($id);
		redirect('rekapitulasi');
	}
}
