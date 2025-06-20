<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DaftarTahanan_model extends CI_Model
{
	protected $_table = 'tbl_tahanan';
	protected $primary = 'id_orang';

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function save()
	{
		$data = array(
			'id_laporan' => htmlspecialchars($this->input->post('id_laporan'), true),
			'nama_orang' => htmlspecialchars($this->input->post('nama_orang'), true),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'alamat' => htmlspecialchars($this->input->post('alamat'), true),
			'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan'), true),
			'status_hukum' => htmlspecialchars($this->input->post('status_hukum'), true),
			'jenis_kejahatan' => htmlspecialchars($this->input->post('jenis_kejahatan'), true),
			'tanggal_ditangkap' => $this->input->post('tanggal_ditangkap'),
			'durasi' => htmlspecialchars($this->input->post('durasi'), true)
		);
		return $this->db->insert($this->_table, $data);
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, [$this->primary => $id])->row();
	}

	public function editData()
	{
		$id = $this->input->post('id_orang');
		$data = array(
			'id_laporan' => htmlspecialchars($this->input->post('id_laporan'), true),
			'nama_orang' => htmlspecialchars($this->input->post('nama_orang'), true),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'alamat' => htmlspecialchars($this->input->post('alamat'), true),
			'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan'), true),
			'status_hukum' => htmlspecialchars($this->input->post('status_hukum'), true),
			'jenis_kejahatan' => htmlspecialchars($this->input->post('jenis_kejahatan'), true),
			'tanggal_ditangkap' => $this->input->post('tanggal_ditangkap'),
			'durasi' => htmlspecialchars($this->input->post('durasi'), true)
		);
		return $this->db->set($data)->where($this->primary, $id)->update($this->_table);
	}

	public function delete($id)
	{
		$this->db->where($this->primary, $id)->delete($this->_table);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Tahanan Berhasil Dihapus");
		}
	}
}
