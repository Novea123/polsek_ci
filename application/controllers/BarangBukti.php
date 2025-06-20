<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BarangBukti extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangBukti_model');
        $this->load->library('form_validation');
    }
    
    public function index() // tampilkan data
    {
        $data = array(
            'title' => 'View Data Barang Bukti',
            'userlog' => infoLogin(),
            'barangbukti' => $this->BarangBukti_model->getAll(),
            'content' => 'barangbukti/index'
        );
        $this->load->view('template/main', $data);
    }

    public function add() //menampilkan form add
    {
        $data = array(
            'title' => 'Tambah Data Barang Bukti',
            'content' => 'barangbukti/add_form'
        );
        $this->load->view('template/main', $data);
    }
    
    public function save() // menyimpan data dari form add
    {
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('id_laporan', 'ID Laporan', 'required|numeric');
        $this->form_validation->set_rules('jenis_barang_bukti', 'Jenis Barang Bukti', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $this->BarangBukti_model->Save();
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata("success", "Data Barang Bukti Berhasil DiSimpan");
            }
            redirect('barangbukti');
        }
    }

    public function getedit($id) //menampilkan data ke form edit
    {
        $data = array(
            'title' => 'Update Data Barang Bukti',
            'barangbukti' => $this->BarangBukti_model->getById($id),
            'content' => 'barangbukti/edit_form'
        );
        $this->load->view('template/main', $data);
    }

    public function edit() //melakukan update data dari form edit
    {
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('id_laporan', 'ID Laporan', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $this->getedit($this->input->post('id_bukti'));
        } else {
            $this->BarangBukti_model->editData();
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata("success", "Data Barang Bukti Berhasil DiUpdate");
            }
            redirect('barangbukti');
        }
    }

    public function delete($id) //melakukan delete
    {
        $this->BarangBukti_model->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Barang Bukti Berhasil Dihapus");
        }
        redirect('barangbukti');
    }
}
