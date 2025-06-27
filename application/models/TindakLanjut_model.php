<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TindakLanjut_model extends CI_Model
{
	protected $_table = 'tbl_tindaklanjutkasus';
	protected $primary = 'id_tindak_lanjut';

	// Ambil semua data dengan join ke petugas dan laporan
	public function getAll()
	{
		$this->db->select('tl.*, p.nama_petugas, l.jenis_kejahatan');
		$this->db->from('tbl_tindaklanjutkasus tl');
		$this->db->join('tbl_petugas p', 'p.id_petugas = tl.id_petugas', 'left');
		$this->db->join('tbl_laporan l', 'l.id_laporan = tl.id_laporan', 'left');
		return $this->db->get()->result();
	}

	// Ambil semua petugas
	public function getAllPetugas()
	{
		return $this->db->get('tbl_petugas')->result();
	}

	// Ambil semua laporan
	public function getAllLaporan()
	{
		return $this->db->get('tbl_laporan')->result();
	}



	// Simpan data baru
	public function save()
	{
		$data = array(
			'id_laporan' => htmlspecialchars($this->input->post('id_laporan'), true),
			'tanggal_tindak_kasus' => $this->input->post('tanggal_tindak_kasus'),
			'jenis_tindakan' => htmlspecialchars($this->input->post('jenis_tindakan'), true),
			'id_petugas' => htmlspecialchars($this->input->post('id_petugas'), true),
			'status' => $this->input->post('status')
		);
		return $this->db->insert($this->_table, $data);
	}

	// Ambil 1 data berdasarkan ID
	public function getById($id)
	{
		$this->db->select('tl.*, p.nama_petugas, l.jenis_kejahatan');
		$this->db->from("$this->_table tl");
		$this->db->join('tbl_petugas p', 'p.id_petugas = tl.id_petugas', 'left');
		$this->db->join('tbl_laporan l', 'l.id_laporan = tl.id_laporan', 'left');
		$this->db->where($this->primary, $id);
		return $this->db->get()->row();
	}

	// Update data
	public function update()
	{
		$id = $this->input->post('id_tindak_lanjut');
		$data = array(
			'id_laporan' => htmlspecialchars($this->input->post('id_laporan'), true),
			'tanggal_tindak_kasus' => $this->input->post('tanggal_tindak_kasus'),
			'jenis_tindakan' => htmlspecialchars($this->input->post('jenis_tindakan'), true),
			'id_petugas' => htmlspecialchars($this->input->post('id_petugas'), true),
			'status' => $this->input->post('status')
		);
		log_message('debug', 'Update ID: ' . $id);
		return $this->db->set($data)->where($this->primary, $id)->update($this->_table);
	}

	// Hapus data
	public function delete($id)
	{
		$this->db->where($this->primary, $id)->delete($this->_table);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Tindak Lanjut Kasus Berhasil Dihapus");
		}
	}
}
