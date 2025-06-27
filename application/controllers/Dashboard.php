<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function index()
	{
		$data['content'] = 'dashboard/index';

		$this->load->model('LaporanKejahatan_model');
		$this->load->model('Pelanggaran_model');
		$this->load->model('Petugas_model');
		$this->load->model('DaftarTahanan_model');

		$data['total_petugas'] = $this->Petugas_model->count_all();
		$data['total_tahanan'] = $this->DaftarTahanan_model->count_all();


		$data['total_laporan'] = $this->LaporanKejahatan_model->count_all();
		$data['total_pelanggaran'] = $this->Pelanggaran_model->countAll(); // perhatikan huruf besar

		$data['laporan_terbaru'] = $this->LaporanKejahatan_model->get_latest(5);
		$data['pelanggaran_terbaru'] = $this->Pelanggaran_model->get_latest(5);


		$this->load->view('template/main', $data);
	}
}
