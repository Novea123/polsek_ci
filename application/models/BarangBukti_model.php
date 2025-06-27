<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BarangBukti_model extends CI_Model
{
	protected $_table = 'tbl_bukti';
	protected $primary = 'id_bukti';

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function Save()
{
    $data = array(
        'id_laporan'        => $this->input->post('id_laporan', true),
        'jenis_barang_bukti'=> $this->input->post('jenis_barang_bukti', true),
        'deskripsi'         => htmlspecialchars($this->input->post('deskripsi'), ENT_QUOTES), 
        'jumlah'            => $this->input->post('jumlah', true),
        'tanggal_ditemukan'=> $this->input->post('tanggal_ditemukan', true),
        'lokasi_penyimpanan'=> $this->input->post('lokasi_penyimpanan', true),
        'status_barang'     => $this->input->post('status_barang', true),
        'bukti'             => $this->uploadBukti() // jika ada upload file
    );

    $this->db->insert('tbl_bukti', $data);
}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, [$this->primary => $id])->row();
	}

	public function editData()
	{
		$id = $this->input->post('id_bukti');
		$data = array(
			'id_laporan' => htmlspecialchars($this->input->post('id_laporan'), true),
			'deskripsi' => htmlspecialchars($this->input->post('deskripsi'), true),
			'jenis_barang_bukti' => htmlspecialchars($this->input->post('jenis_barang_bukti'), true),
			'jumlah' => htmlspecialchars($this->input->post('jumlah'), true),
			'tanggal_ditemukan' => $this->input->post('tanggal_ditemukan'),
			'lokasi_penyimpanan' => htmlspecialchars($this->input->post('lokasi_penyimpanan'), true),
			'status_barang' => htmlspecialchars($this->input->post('status_barang'), true),
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
		$barang = $this->getById($id);
		if ($barang->bukti != null) {
			$file_path = './uploads/bukti/' . $barang->bukti;
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}

		$this->db->where($this->primary, $id)->delete($this->_table);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata("success", "Data Barang Bukti Berhasil Dihapus");
		}
	}

	private function uploadBukti()
	{
		$config['upload_path'] = './uploads/bukti/';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
		$config['max_size'] = 2048; // 2MB
		$config['file_name'] = 'bukti_' . time(); // Nama file unik

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('bukti')) {
			return $this->upload->data('file_name');
		} else {
			// Jika upload gagal, kembalikan null atau bukti lama (untuk edit)
			return $this->input->post('old_bukti') ?? null;
		}
	}
}
