<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DaftarTahanan_model extends CI_Model
{
	protected $_table = 'tbl_tahanan';
	protected $primary = 'id_tahanan';

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, [$this->primary => $id])->row();
	}

	public function save()
	{
		$data = array(
			'nama_tahanan' => htmlspecialchars($this->input->post('nama_tahanan'), true),
			'nik' => htmlspecialchars($this->input->post('nik'), true),
			'alamat' => htmlspecialchars($this->input->post('alamat'), true),
			'jenis_kejahatan' => htmlspecialchars($this->input->post('jenis_kejahatan'), true),
			'tanggal_masuk' => $this->input->post('tanggal_masuk'),
			'status' => $this->input->post('status')
		);
		return $this->db->insert($this->_table, $data);
	}

	public function update()
	{
		$id = $this->input->post('id_tahanan');
		$data = array(
			'nama_tahanan' => htmlspecialchars($this->input->post('nama_tahanan'), true),
			'nik' => htmlspecialchars($this->input->post('nik'), true),
			'alamat' => htmlspecialchars($this->input->post('alamat'), true),
			'jenis_kejahatan' => htmlspecialchars($this->input->post('jenis_kejahatan'), true),
			'tanggal_masuk' => $this->input->post('tanggal_masuk'),
			'status' => $this->input->post('status')
		);
		return $this->db->where($this->primary, $id)->update($this->_table, $data);
	}

	public function delete($id)
	{
		return $this->db->where($this->primary, $id)->delete($this->_table);
	}

	// Tambahan untuk dashboard
	public function count_all()
	{
		return $this->db->count_all($this->_table);
	}
}
