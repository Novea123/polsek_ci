<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas_model extends CI_Model
{
	protected $_table = 'tbl_petugas';
	protected $primary = 'id_petugas';

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
			'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas'), true),
			'nip' => htmlspecialchars($this->input->post('nip'), true),
			'jabatan' => htmlspecialchars($this->input->post('jabatan'), true),
			'alamat' => htmlspecialchars($this->input->post('alamat'), true),
			'telepon' => htmlspecialchars($this->input->post('telepon'), true),
		);
		return $this->db->insert($this->_table, $data);
	}

	public function update()
	{
		$id = $this->input->post('id_petugas');
		$data = array(
			'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas'), true),
			'nip' => htmlspecialchars($this->input->post('nip'), true),
			'jabatan' => htmlspecialchars($this->input->post('jabatan'), true),
			'alamat' => htmlspecialchars($this->input->post('alamat'), true),
			'telepon' => htmlspecialchars($this->input->post('telepon'), true),
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
