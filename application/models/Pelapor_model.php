<?php defined('BASEPATH') or exit('No direct script access allowed');
class Pelapor_model extends CI_Model
{
	protected $_table = 'tbl_pelapor';
	protected $primary = 'id_pelapor';

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function save()
	{
		$data = array(
			'nama_pelapor' => htmlspecialchars($this->input->post('nama_pelapor'), true),
			'no_identitas' => htmlspecialchars($this->input->post('no_identitas'), true),
			'no_hp' => htmlspecialchars($this->input->post('phone'), true),
			'alamat' => htmlspecialchars($this->input->post('alamat'), true),
		);
		return $this->db->insert($this->_table, $data);
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_pelapor" => $id])->row();
	}

	public function editData()
	{
		$id = $this->input->post('id');
		$data = array(
			'nama_pelapor' => htmlspecialchars($this->input->post('nama_pelapor'), true),
			'no_identitas' => htmlspecialchars($this->input->post('no_identitas'), true),
			'no_hp' => htmlspecialchars($this->input->post('phone'), true),
			'alamat' => htmlspecialchars($this->input->post('alamat'), true),
		);
		return $this->db->set($data)->where($this->primary, $id)->update($this->_table);
	}

	public function delete($id)
	{
		$this->db->where('id_pelapor', $id)->delete($this->_table);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Pelapor Berhasil DiDelete");
		}
	}
}
