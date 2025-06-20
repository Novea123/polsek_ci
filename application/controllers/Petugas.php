<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Petugas extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Petugas_model');
		$this->load->library('form_validation');
	}
	public function index() // tampilkan data
	{
		$data = array(
			'title' => 'View Data Petugas',
			'userlog' => infoLogin(),
			'petugas' => $this->Petugas_model->getAll(),
			'content' => 'petugas/index'
		);
		$this->load->view('template/main', $data);
	}

	public function add() //menampilkan form add
	{
		$data = array(
			'title' => 'Tambah Data Petugas',
			'content' => 'petugas/add_form'
		);
		$this->load->view('template/main', $data);
	}
	public function save() // menyimpan data dari form add
	{
		$this->Petugas_model->Save();
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Petugas Berhasil DiSimpan");
		}
		redirect('petugas');
	}

	public function getedit($id) //menampilkan data ke form edit
	{
		$data = array(
			'title' => 'Update Data Petugas',
			'petugas' => $this->Petugas_model->getById($id),
			'content' => 'petugas/edit_form'
		);
		$this->load->view('template/main', $data);
	}

	public function edit() //melakukan update data dari form edit
	{
		$this->Petugas_model->editData();
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Petugas Berhasil DiUpdate");
		}
		redirect('petugas');
	}

	function delete($id) //melakukan delate
	{
		$this->Petugas_model->delete($id);
		redirect('petugas');
	}
}
