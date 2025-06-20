<?php defined('BASEPATH') or exit('No direct script access allowed');
class MonitoringKasus_model extends CI_Model
{
	protected $_table = 'tbl_monitoring';
	protected $primary = 'id_kasus';

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function save()
	{
		$data = array(
			'nama_pelapor' => htmlspecialchars($this->input->post('nama_pelapor'), true),
			'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas'), true),
			'tanggal_lapor' => htmlspecialchars($this->input->post('tanggal_lapor'), true),
			'jenis_kejahatan' => htmlspecialchars($this->input->post('jenis_kejahatan'), true),
			'lokasi' => htmlspecialchars($this->input->post('lokasi'), true),
			'status' => htmlspecialchars($this->input->post('status'), true)
		);
		return $this->db->insert($this->_table, $data);
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_kasus" => $id])->row();
	}

	public function editData()
	{
		$id = $this->input->post('id_kasus');
		$data = array(
			'nama_pelapor' => htmlspecialchars($this->input->post('nama_pelapor'), true),
			'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas'), true),
			'tanggal_lapor' => htmlspecialchars($this->input->post('tanggal_lapor'), true),
			'jenis_kejahatan' => htmlspecialchars($this->input->post('jenis_kejahatan'), true),
			'lokasi' => htmlspecialchars($this->input->post('lokasi'), true),
			'status' => htmlspecialchars($this->input->post('status'), true)
		);
		return $this->db->set($data)->where($this->primary, $id)->update($this->_table);
	}

	public function delete($id)
	{
		$this->db->where('id_kasus', $id)->delete($this->_table);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Monitoring Kasus Berhasil Dihapus");
		}
	}

	public function totalKasus()
	{
		return $this->db->count_all($this->_table);
	}

	public function getKasusByStatus($status)
	{
		return $this->db->get_where($this->_table, ["status" => $status])->result();
	}
}
