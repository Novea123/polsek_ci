<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
		$this->load->library(['form_validation', 'session']);
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login/index');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email', true);
		$password = $this->input->post('password', true);
		$user = $this->user->get_by_email($email);

		if ($user) {
			if (password_verify($password, $user['password'])) {
				$this->session->set_userdata([
					'email' => $user['email'],
					'role' => $user['role']
				]);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', 'Password salah!');
			}
		} else {
			$this->session->set_flashdata('error', 'Email tidak terdaftar!');
		}
		redirect('login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
