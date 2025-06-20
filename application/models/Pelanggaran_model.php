<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pelanggaran_model extends CI_Model
{
	protected $_table = 'tbl_pelanggaran';
	protected $primary = 'id_pelanggaran';

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getPetugas()
	{
		$this->db->select('tbl_pelanggaran.*, tbl_petugas.nama_petugas');
		$this->db->from('tbl_pelanggaran');
		$this->db->join('tbl_petugas', 'tbl_petugas.id_petugas = tbl_pelanggaran.id_petugas', 'left');
		return $this->db->get()->result();
	}

	public function save()
	{

		$data = array(
			'nama_pelanggar' => htmlspecialchars($this->input->post('nama_pelanggar'), true),
			'nik' => htmlspecialchars($this->input->post('nik'), true),
			'alamat' => htmlspecialchars($this->input->post('alamat'), true),
			'jenis_pelanggaran' => htmlspecialchars($this->input->post('jenis_pelanggaran'), true),
			'lokasi' => htmlspecialchars($this->input->post('lokasi'), true),
			'tanggal' => $this->input->post('tanggal'),
			'sanksi' => htmlspecialchars($this->input->post('sanksi'), true),
			'status' => $this->input->post('status'),
			'id_petugas' => htmlspecialchars($this->input->post('id_petugas'), true),
			'bukti' => $this->uploadBukti() // Fungsi untuk handle upload bukti
		);
		return $this->db->insert($this->_table, $data);
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, [$this->primary => $id])->row();
	}

	public function editData()
	{
		$id = $this->input->post('id_pelanggaran');
		$data = array(
			'nama_pelanggar' => htmlspecialchars($this->input->post('nama_pelanggar'), true),
			'nik' => htmlspecialchars($this->input->post('nik'), true),
			'alamat' => htmlspecialchars($this->input->post('alamat'), true),
			'jenis_pelanggaran' => htmlspecialchars($this->input->post('jenis_pelanggaran'), true),
			'lokasi' => htmlspecialchars($this->input->post('lokasi'), true),
			'tanggal' => $this->input->post('tanggal'),
			'sanksi' => htmlspecialchars($this->input->post('sanksi'), true),
			'status' => $this->input->post('status'),
			'id_petugas' => htmlspecialchars($this->input->post('id_petugas'), true)
		);

		// Jika ada file bukti baru diupload
		if (!empty($_FILES['bukti']['name'])) {
			$data['bukti'] = $this->uploadBukti();
		}

		return $this->db->set($data)->where($this->primary, $id)->update($this->_table);
	}

	public function delete($id)
	{
		// Hapus file bukti terlebih dahulu jika ada
		$pelanggaran = $this->getById($id);
		if ($pelanggaran->bukti != null) {
			$file_path = './uploads/bukti/' . $pelanggaran->bukti;
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}

		$this->db->where($this->primary, $id)->delete($this->_table);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Pelanggaran Berhasil Dihapus");
		}
	}

	private function uploadBukti()
	{
		$config['upload_path'] = './uploads/bukti/';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf';
		$config['max_size'] = 4096; // 4MB
		$config['file_name'] = 'bukti_' . time(); // Nama file unik

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('bukti')) {
			return $this->upload->data('file_name');
		} else {
			// Jika upload gagal, kembalikan null atau bukti lama (untuk edit)
			return $this->input->post('old_bukti') ?? null;
		}
	}

	// Fungsi tambahan untuk mendapatkan data dengan filter tertentu
	public function getByStatus($status)
	{
		return $this->db->get_where($this->_table, ['status' => $status])->result();
	}

	// Fungsi untuk menghitung total pelanggaran
	public function countAll()
	{
		return $this->db->count_all($this->_table);
	}
}
