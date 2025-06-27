<main>
	<div class="container-fluid">
		<h1 class="mt-4">Dashboard Polsek</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item active">Dashboard</li>
		</ol>

		<!-- Info Cards -->
		<div class="row">
			<?php
			$total_laporan = $total_laporan ?? 0;
			$total_pelanggaran = $total_pelanggaran ?? 0;
			$total_petugas = $total_petugas ?? 0;
			$total_tahanan = $total_tahanan ?? 0;
			?>

			<div class="col-xl-3 col-md-6">
				<div class="card bg-primary text-white mb-4">
					<div class="card-body d-flex justify-content-between align-items-center">
						<div>
							<h5>Total Laporan</h5>
							<h2><?= number_format($total_laporan) ?></h2>
						</div>
						<div class="display-4"><i class="fas fa-file-alt"></i></div>
					</div>
					<div class="card-footer d-flex justify-content-between align-items-center">
						<a class="small text-white stretched-link" href="<?= site_url('pelapor') ?>">Lihat Detail</a>
						<i class="fas fa-angle-right text-white"></i>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6">
				<div class="card bg-success text-white mb-4">
					<div class="card-body d-flex justify-content-between align-items-center">
						<div>
							<h5>Total Pelanggaran</h5>
							<h2><?= number_format($total_pelanggaran) ?></h2>
						</div>
						<div class="display-4"><i class="fas fa-exclamation-triangle"></i></div>
					</div>
					<div class="card-footer d-flex justify-content-between align-items-center">
						<a class="small text-white stretched-link" href="<?= site_url('pelanggaran') ?>">Lihat Detail</a>
						<i class="fas fa-angle-right text-white"></i>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6">
				<div class="card bg-warning text-white mb-4">
					<div class="card-body d-flex justify-content-between align-items-center">
						<div>
							<h5>Total Petugas</h5>
							<h2><?= number_format($total_petugas) ?></h2>
						</div>
						<div class="display-4"><i class="fas fa-users"></i></div>
					</div>
					<div class="card-footer d-flex justify-content-between align-items-center">
						<a class="small text-white stretched-link" href="<?= site_url('petugas') ?>">Lihat Detail</a>
						<i class="fas fa-angle-right text-white"></i>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6">
				<div class="card bg-danger text-white mb-4">
					<div class="card-body d-flex justify-content-between align-items-center">
						<div>
							<h5>Total Tahanan</h5>
							<h2><?= number_format($total_tahanan) ?></h2>
						</div>
						<div class="display-4"><i class="fas fa-user-lock"></i></div>
					</div>
					<div class="card-footer d-flex justify-content-between align-items-center">
						<a class="small text-white stretched-link" href="<?= site_url('daftartahanan') ?>">Lihat Detail</a>
						<i class="fas fa-angle-right text-white"></i>
					</div>
				</div>
			</div>
		</div>

		<!-- Laporan Terbaru -->
		<div class="row">
			<div class="col-xl-6">
				<div class="card mb-4">
					<div class="card-header"><i class="fas fa-file-alt mr-1"></i> Laporan Terbaru</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Pelapor</th>
										<th>Jenis Kejahatan</th>
										<th>Tanggal</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($laporan_terbaru)): ?>
										<?php $no = 1;
										foreach ($laporan_terbaru as $laporan): ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $laporan->nama_pelapor ?? 'Anonim' ?></td>
												<td><?= $laporan->jenis_kejahatan ?></td>
												<td><?= date('d/m/Y', strtotime($laporan->tanggal_kejadian)) ?></td>
												<td>
													<span class="badge badge-<?=
																				($laporan->status == 'Selesai') ? 'success  text-dark' : (($laporan->status == 'Dalam Penyelidikan') ? 'warning  text-dark' : 'primary  text-dark')
																				?>">
														<?= $laporan->status ?>
													</span>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php else: ?>
										<tr>
											<td colspan="5" class="text-center">Tidak ada data</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<!-- Pelanggaran Terbaru -->
			<div class="col-xl-6">
				<div class="card mb-4">
					<div class="card-header"><i class="fas fa-exclamation-triangle mr-1"></i> Pelanggaran Terbaru</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Pelanggar</th>
										<th>Jenis Pelanggaran</th>
										<th>Tanggal</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($pelanggaran_terbaru)): ?>
										<?php $no = 1;
										foreach ($pelanggaran_terbaru as $pelanggaran): ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $pelanggaran->nama_pelanggar ?></td>
												<td><?= $pelanggaran->jenis_pelanggaran ?></td>
												<td><?= date('d/m/Y', strtotime($pelanggaran->tanggal)) ?></td>
												<td>
													<span class="badge badge-<?=
																				($pelanggaran->status == 'Selesai') ? 'success  text-dark' : (($pelanggaran->status == 'Dalam Proses') ? 'warning text-dark' : 'secondary text-dark')
																				?>">
														<?= $pelanggaran->status ?>
													</span>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php else: ?>
										<tr>
											<td colspan="5" class="text-center">Tidak ada data</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
