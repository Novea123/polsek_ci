<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('login'); // redirect jika belum login
		}
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->session->userdata(); // untuk ditampilkan di view
		$this->load->view('adminlte/dashboard', $data);
	}
}
