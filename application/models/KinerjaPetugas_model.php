<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KinerjaPetugas_model extends CI_Model
{
	protected $_table = 'tbl_kinerja';
	protected $primary = 'id_kinerja';

	public function getAll()
	{
		$this->db->select('tbl_kinerja.*, tbl_petugas.nama_petugas as nama_petugas_asli, tbl_petugas.jabatan as jabatan_asli');
		$this->db->from($this->_table);
		$this->db->join('tbl_petugas', 'tbl_petugas.id_petugas = tbl_kinerja.id_petugas');
		return $this->db->get()->result();
	}

	public function save()
	{
		// Ambil data petugas dari tbl_petugas
		$petugas = $this->db->get_where('tbl_petugas', ['id_petugas' => $this->input->post('id_petugas')])->row();

		$data = array(
			'id_petugas' => htmlspecialchars($this->input->post('id_petugas'), true),
			'nama_petugas' => $petugas->nama_petugas, // Ambil dari tbl_petugas
			'jabatan' => $petugas->jabatan, // Ambil dari tbl_petugas
			'total_kasus' => htmlspecialchars($this->input->post('total_kasus'), true),
			'kasus_selesai' => htmlspecialchars($this->input->post('kasus_selesai'), true),
			'rata_penangan' => htmlspecialchars($this->input->post('rata_penangan'), true),
			'tersangka' => htmlspecialchars($this->input->post('tersangka'), true),
			'nilai_kinerja' => htmlspecialchars($this->input->post('nilai_kinerja'), true)
		);
		return $this->db->insert($this->_table, $data);
	}

	public function getById($id)
	{
		$this->db->select('tbl_kinerja.*, tbl_petugas.nama_petugas as nama_petugas_asli, tbl_petugas.jabatan as jabatan_asli');
		$this->db->from($this->_table);
		$this->db->join('tbl_petugas', 'tbl_petugas.id_petugas = tbl_kinerja.id_petugas');
		$this->db->where($this->primary, $id);
		return $this->db->get()->row();
	}

	public function editData()
	{
		$id = $this->input->post('id_kinerja');
		// Ambil data petugas dari tbl_petugas
		$petugas = $this->db->get_where('tbl_petugas', ['id_petugas' => $this->input->post('id_petugas')])->row();

		$data = array(
			'id_petugas' => htmlspecialchars($this->input->post('id_petugas'), true),
			'nama_petugas' => $petugas->nama_petugas, // Update dari tbl_petugas
			'jabatan' => $petugas->jabatan, // Update dari tbl_petugas
			'total_kasus' => htmlspecialchars($this->input->post('total_kasus'), true),
			'kasus_selesai' => htmlspecialchars($this->input->post('kasus_selesai'), true),
			'rata_penangan' => htmlspecialchars($this->input->post('rata_penangan'), true),
			'tersangka' => htmlspecialchars($this->input->post('tersangka'), true),
			'nilai_kinerja' => htmlspecialchars($this->input->post('nilai_kinerja'), true)
		);
		return $this->db->set($data)->where($this->primary, $id)->update($this->_table);
	}

	public function delete($id)
	{
		return $this->db->where($this->primary, $id)->delete($this->_table);
	}

	public function getPetugasList()
	{
		return $this->db->get('tbl_petugas')->result();
	}

	public function getPetugasInfo($id_petugas)
	{
		return $this->db->get_where('tbl_petugas', ['id_petugas' => $id_petugas])->row();
	}

	// Fungsi baru untuk mendapatkan data kinerja dengan join (alternatif)
	public function getKinerjaWithPetugas()
	{
		$this->db->select('tbl_kinerja.*, tbl_petugas.nama_petugas, tbl_petugas.jabatan');
		$this->db->from($this->_table);
		$this->db->join('tbl_petugas', 'tbl_petugas.id_petugas = tbl_kinerja.id_petugas');
		return $this->db->get()->result();
	}
}
