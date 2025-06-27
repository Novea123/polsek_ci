<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			redirect('dashboard');
		}
		$this->load->view('login/index'); // view login kamu
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login/index');
		} else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$user = $this->User_model->get_by_username($username);

			if ($user && $user->password === $password) {
				$this->session->set_userdata([
					'id_user'   => $user->id_user,
					'username'  => $user->username,
					'role'      => $user->role,
					'logged_in' => true
				]);

				switch ($user->role) {
					case 'admin':
						redirect('dashboard');
					case 'petugas':
						redirect('dashboard');
					case 'kapolsek':
						redirect('dashboard');
					case 'pelapor':
						redirect('dashboard');
					default:
						redirect('dashboard');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Username atau Password salah</div>');
				redirect('auth');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}
