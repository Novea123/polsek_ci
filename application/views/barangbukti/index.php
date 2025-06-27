<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('barangbukti') ?>">Barang Bukti</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-header">
				<a href="<?php echo site_url('barangbukti/add') ?>" class="btn btn-primary btn-icon-split">
					<span class="icon text-white-50">
						<i class="fas fa-plus-circle"></i>
					</span>
					<span class="text">Entri Data</span>
				</a>
			</div>
			<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover text-center" id="tabelBarangBukti" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No.</th>
								<th>ID Laporan</th>
								<th>Jenis Barang Bukti</th>
								<th>Deskripsi</th>
								<th>Tanggal Ditemukan</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($barangbukti as $row) {
								echo "<tr>
                                        <td>$no</td>
                                        <td>$row->id_laporan</td>
                                        <td>$row->jenis_barang_bukti</td>
                                        <td class='text-start'>" . substr($row->deskripsi, 0, 50) . "...</td>
                                        <td>" . date('d/m/Y', strtotime($row->tanggal_ditemukan)) . "</td>
                                        <td>$row->status_barang</td>
                                        <td>
                                        <div class='btn-group'>
                                            <a href='" . base_url('barangbukti/getedit/' . $row->id_bukti) . "' class='btn btn-sm btn-warning'><i class='fas fa-edit'></i> Edit</a>
                                            <a href='" . base_url('barangbukti/delete/' . $row->id_bukti) . "' class='btn btn-sm btn-danger'
                                            onclick='return confirm(\"Ingin menghapus data barang bukti ini?\");'><i class='fas fa-trash'></i> Hapus</a>
                                            
                                        </div>
                                        </td>
                                    </tr>";
								$no++;
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div style="height: 100vh"></div>
	</div>
</main>

<script>
	$(document).ready(function() {
		$('#tabelBarangBukti').DataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
			},
			"columnDefs": [{
					"orderable": false,
					"targets": [6]
				} // Non-aktifkan sorting untuk kolom aksi
			]
		});
	});
</script>
