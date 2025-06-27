<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('laporankejahatan') ?>">Laporan Kejahatan</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-header">
				<a href="<?php echo site_url('laporankejahatan/add') ?>" class="btn btn-primary btn-icon-split">
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
					<table class="table table-striped table-bordered table-hover text-center" id="tabelkelas" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No.</th>
								<th>Jenis Kejahatan</th>
								<th>Lokasi Kejadian</th>
								<th>Tanggal Kejadian</th>
								<th>Waktu Kejadian</th>
								<th>Deskripsi</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($laporankejahatan as $laporan) {
								echo "<tr>
							<td>$no</td>
							<td>$laporan->jenis_kejahatan</td>
							<td>" . substr($laporan->lokasi_kejadian, 0, 30) . "...</td>
							<td>" . date('d/m/Y', strtotime($laporan->tanggal_kejadian)) . "</td>
							<td>$laporan->waktu_kejadian</td>
							<td>" . substr($laporan->deskripsi_kejadian, 0, 30) . "...</td>
							<td>$laporan->status</td>																					
							<td>
							<div>
							<a href=" . base_url('laporankejahatan/getedit/' . $laporan->id_laporan) . " class='btn btn-sm btn-warning'><i class='fas fa-edit'></i> Edit</a>
							<a href=" . base_url('laporankejahatan/delete/' . $laporan->id_laporan) . " class='btn btn-sm btn-danger'
							onclick='return confirm(\"Ingin menghapus laporan ini?\");'><i class='fas fa-trash'></i> Hapus</a>
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
