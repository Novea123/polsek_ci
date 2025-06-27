<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('pelanggaran') ?>">Pelanggaran</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-header">
				<a href="<?php echo site_url('pelanggaran/add') ?>" class="btn btn-primary btn-icon-split">
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
					<table class="table table-striped table-bordered table-hover text-center" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No.</th>
								<th>NIK</th>
								<th>Nama Pelanggar</th>
								<th>Alamat</th>
								<th>Jenis Pelanggaran</th>
								<th>Tanggal</th>
								<th>Lokasi</th>
								<th>Sanksi</th>
								<th>Petugas</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($pelanggaran as $row) {
								// Format status dengan badge warna
								$status_badge = '';
								switch ($row->status) {
									case 'Belum Diproses':
										$status_badge = '<span class="badge badge-danger text-dark">' . $row->status . '</span>';
										break;
									case 'Dalam Proses':
										$status_badge = '<span class="badge badge-warning text-dark">' . $row->status . '</span>';
										break;
									case 'Selesai':
										$status_badge = '<span class="badge badge-primary text-dark">' . $row->status . '</span>';
										break;
									default:
										$status_badge = $row->status;
								}

								echo "<tr>
										<td>$no</td>
										<td>$row->nik</td>
										<td>$row->nama_pelanggar</td>
										<td>$row->alamat</td>
										<td>$row->jenis_pelanggaran</td>
										<td>" . date('d/m/Y', strtotime($row->tanggal)) . "</td>
										<td>$row->lokasi</td>
										<td>$row->sanksi</td>
										<td>$row->nama_petugas</td>
										<td>$status_badge</td>
										<td>
											<div class='btn-group'>
												<a href='" . base_url('pelanggaran/getedit/' . $row->id_pelanggaran) . "' class='btn btn-warning' title='Edit'>
													<i class='fas fa-edit'></i> Edit
												</a>
												<a href='" . base_url('pelanggaran/delete/' . $row->id_pelanggaran) . "' class='btn btn-danger' onclick='return confirm(\"Apakah Anda yakin menghapus data ini?\");' title='Hapus'>
													<i class='fas fa-trash'></i> Hapus
												</a>
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
	// Inisialisasi DataTable
	$(document).ready(function() {
		$('#dataTable').DataTable({
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
