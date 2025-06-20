<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rekapitulasi_model extends CI_Model
{
	protected $_table = 'tbl_rekapitulasi';
	protected $primary = 'id_penyelesaian';

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function save()
	{
		$data = array(
			'id_kasus' => (int) $this->input->post('id_kasus'),
			'jenis_kejahatan' => htmlspecialchars($this->input->post('jenis_kejahatan'), true),
			'jumlah_kasus' => (int) $this->input->post('jumlah_kasus'),
			'proses_hukum' => (int) $this->input->post('proses_hukum'),
			'mediasi' => (int) $this->input->post('mediasi')
		);
		return $this->db->insert($this->_table, $data);
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, [$this->primary => $id])->row();
	}

	public function editData()
	{
		$id = $this->input->post('id_penyelesaian');
		$data = array(
			'id_kasus' => (int) $this->input->post('id_kasus'),
			'jenis_kejahatan' => htmlspecialchars($this->input->post('jenis_kejahatan'), true),
			'jumlah_kasus' => (int) $this->input->post('jumlah_kasus'),
			'proses_hukum' => (int) $this->input->post('proses_hukum'),
			'mediasi' => (int) $this->input->post('mediasi')
		);
		return $this->db->set($data)->where($this->primary, $id)->update($this->_table);
	}

	public function delete($id)
	{
		$this->db->where($this->primary, $id)->delete($this->_table);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Rekapitulasi Berhasil DiDelete");
		}
	}

	public function totalRekapitulasi()
	{
		return $this->db->count_all($this->_table);
	}
}
