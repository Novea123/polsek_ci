<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MonitoringKasus extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MonitoringKasus_model');
		$this->load->library('form_validation');
	}

	public function index() // tampilkan data
	{
		$data = array(
			'title' => 'View Data Monitoring Kasus',
			'userlog' => infoLogin(),
			'monitoring' => $this->MonitoringKasus_model->getAll(),
			'content' => 'monitoringkasus/index'
		);
		$this->load->view('template/main', $data);
	}

	public function add() //menampilkan form add
	{
		$data = array(
			'title' => 'Tambah Data Monitoring Kasus',
			'content' => 'monitoringkasus/add_form'
		);
		$this->load->view('template/main', $data);
	}

	public function save() // menyimpan data dari form add
	{
		$this->MonitoringKasus_model->Save();
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Monitoring Kasus Berhasil DiSimpan");
		}
		redirect('monitoringkasus');
	}

	public function getedit($id) //menampilkan data ke form edit
	{
		$data = array(
			'title' => 'Update Data Monitoring Kasus',
			'monitoring' => $this->MonitoringKasus_model->getById($id),
			'content' => 'monitoringkasus/edit_form'
		);
		$this->load->view('template/main', $data);
	}

	public function edit() //melakukan update data dari form edit
	{
		$this->MonitoringKasus_model->editData();
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Monitoring Kasus Berhasil DiUpdate");
		}
		redirect('monitoringkasus');
	}

	function delete($id) //melakukan delete
	{
		$this->MonitoringKasus_model->delete($id);
		redirect('monitoringkasus');
	}
}
