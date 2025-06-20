<?php
defined('BASEPATH') or exit('No direct script access allowed');
class LaporanKejahatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LaporanKejahatan_model');
        $this->load->library('form_validation');
    }

    public function index() // tampilkan data
    {
        $data = array(
            'title' => 'Data Laporan Kejahatan',
            'userlog' => infoLogin(),
            'laporankejahatan' => $this->LaporanKejahatan_model->getAll(),
            'content' => 'laporankejahatan/index'
        );
        $this->load->view('template/main', $data);
    }

    public function add() //menampilkan form add
    {
        $data = array(
            'title' => 'Tambah Laporan Kejahatan',
            'content' => 'laporankejahatan/add_form'
        );
        $this->load->view('template/main', $data);
    }

    public function save() // menyimpan data dari form add
    {
        $this->form_validation->set_rules('jenis_kejahatan', 'Jenis Kejahatan', 'required');
        $this->form_validation->set_rules('lokasi_kejadian', 'Lokasi Kejadian', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $this->LaporanKejahatan_model->Save();
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata("success", "Laporan Kejahatan Berhasil Disimpan");
            }
            redirect('laporankejahatan');
        }
    }

    public function getedit($id) //menampilkan data ke form edit
    {
        $data = array(
            'title' => 'Edit Laporan Kejahatan',
            'laporan' => $this->LaporanKejahatan_model->getById($id),
            'content' => 'laporankejahatan/edit_form'
        );
        $this->load->view('template/main', $data);
    }

    public function edit() //melakukan update data dari form edit
    {
        $this->form_validation->set_rules('jenis_kejahatan', 'Jenis Kejahatan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->getedit($this->input->post('id_laporan'));
        } else {
            $this->LaporanKejahatan_model->editData();
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata("success", "Laporan Kejahatan Berhasil Diupdate");
            }
            redirect('laporankejahatan');
        }
    }

    public function delete($id) //melakukan delete
    {
        $this->LaporanKejahatan_model->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Laporan Kejahatan Berhasil Dihapus");
        }
        redirect('laporankejahatan');
    }
}
