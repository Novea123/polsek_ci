<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TindakLanjut extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TindakLanjut_model');
		$this->load->library('form_validation');
	}

	public function index() // Menampilkan semua data tindak lanjut
	{
		$data = array(
			'title' => 'Data Tindak Lanjut Kasus',
			'userlog' => infoLogin(),
			'tindaklanjut' => $this->TindakLanjut_model->getAll(),
			'content' => 'tindaklanjut/index'
		);
		$this->load->view('template/main', $data);
	}

	public function add() // Form tambah data
	{
		
		$data = array(
			'title' => 'Tambah Tindak Lanjut Kasus',
			'content' => 'tindaklanjut/add_form'
		);
		$this->load->view('template/main', $data);
	}

	public function save() // Menyimpan data baru
	{
		$this->TindakLanjut_model->save();
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Tindak Lanjut Berhasil Disimpan");
		}
		redirect('tindaklanjut');
	}

	public function getedit($id) // Form edit data
	{
		$data = array(
			'title' => 'Edit Tindak Lanjut Kasus',
			'tindaklanjut' => $this->TindakLanjut_model->getById($id),
			'content' => 'tindaklanjut/edit_form'
		);
		$this->load->view('template/main', $data);
	}

	public function edit() // Menyimpan perubahan data
	{
		$this->TindakLanjut_model->update();
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Tindak Lanjut Berhasil Diperbarui");
		}
		redirect('tindaklanjut');
	}

	public function delete($id) // Hapus data
	{
		$this->TindakLanjut_model->delete($id);
		redirect('tindaklanjut');
	}
}
