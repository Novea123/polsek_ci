<?php defined('BASEPATH') or exit('No direct script access allowed');

class LaporanKejahatan_model extends CI_Model
{
	protected $_table = 'tbl_laporan';
	protected $primary = 'id_laporan';

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function save()
	{
		$data = array(
			'id_laporan' => htmlspecialchars($this->input->post('id_laporan'), true),
			'id_pelapor' => htmlspecialchars($this->input->post('id_pelapor'), true),
			'id_petugas' => htmlspecialchars($this->input->post('id_petugas'), true),
			'jenis_kejahatan' => htmlspecialchars($this->input->post('jenis_kejahatan'), true),
			'lokasi_kejadian' => htmlspecialchars($this->input->post('lokasi_kejadian'), true),
			'tanggal_kejadian' => htmlspecialchars($this->input->post('tanggal_kejadian'), true),
			'waktu_kejadian' => htmlspecialchars($this->input->post('waktu_kejadian'), true),
			'deskripsi_kejadian' => htmlspecialchars($this->input->post('deskripsi_kejadian'), true),
			'status' => htmlspecialchars($this->input->post('status'), true),
			'bukti' => htmlspecialchars($this->input->post('bukti'), true),
		);
		return $this->db->insert($this->_table, $data);
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_laporan" => $id])->row();
	}

	public function editData()
	{
		$id = $this->input->post('id');
		$data = array(
			'id_laporan' => htmlspecialchars($this->input->post('id_laporan'), true),
			'id_pelapor' => htmlspecialchars($this->input->post('id_pelapor'), true),
			'id_petugas' => htmlspecialchars($this->input->post('id_petugas'), true),
			'jenis_kejahatan' => htmlspecialchars($this->input->post('jenis_kejahatan'), true),
			'lokasi_kejadian' => htmlspecialchars($this->input->post('lokasi_kejadian'), true),
			'tanggal_kejadian' => htmlspecialchars($this->input->post('tanggal_kejadian'), true),
			'waktu_kejadian' => htmlspecialchars($this->input->post('waktu_kejadian'), true),
			'deskripsi_kejadian' => htmlspecialchars($this->input->post('deskripsi_kejadian'), true),
			'status' => htmlspecialchars($this->input->post('status'), true),
			'bukti' => htmlspecialchars($this->input->post('bukti'), true),
		);
		return $this->db->set($data)->where($this->primary, $id)->update($this->_table);
	}

	public function delete($id)
	{
		$this->db->where('id_laporan', $id)->delete($this->_table);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Laporan Berhasil Dihapus");
		}
	}

	// Tambahan untuk dashboard
	public function count_all()
	{
		return $this->db->count_all($this->_table);
	}

	public function get_latest($limit = 5)
	{
		return $this->db->order_by('tanggal_kejadian', 'DESC')
			->limit($limit)
			->get($this->_table)
			->result();
	}
}
