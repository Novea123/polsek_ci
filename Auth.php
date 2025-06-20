<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        if ($this->session->userdata('nip')) {
            redirect('dashboard');
        }
        $this->load->view('auth/login');
    }

    public function login()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $nip = $this->input->post('nip');
            $password = md5($this->input->post('password'));
            $pegawai = $this->User_model->get_user($nip, $password);

            // Jika pengguna ditemukan dan password cocok
            if ($pegawai && $pegawai->password == $password) {
                $id_pegawai = ($pegawai) ? $pegawai->id_pegawai : NULL;

                $session_data = [
                    'id_pegawai'  => $pegawai->id_pegawai,
                    'nip'         => $pegawai->nip,
                    'nama'        => $pegawai->nama,
                    'level'       => $pegawai->level,
                    'logged_in'   => TRUE
                ];
                $this->session->set_userdata($session_data);
                redirect('dashboard');
            } else {
                // Jika password salah
                $this->session->set_flashdata('error', 'NIP atau password salah');
                redirect('auth/login');
            }
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
