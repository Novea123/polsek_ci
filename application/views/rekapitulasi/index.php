<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('rekapitulasi') ?>">Rekapitulasi</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>

		<div class="card mb-4">
			<div class="card-header">
				<a href="<?php echo site_url('rekapitulasi/add') ?>" class="btn btn-primary btn-icon-split">
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
					<table class="table table-striped table-bordered table-hover text-center" id="tabelrekapitulasi" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No.</th>
								<th>ID Kasus</th>
								<th>Jenis Kejahatan</th>
								<th>Jumlah Kasus</th>
								<th>Proses Hukum</th>
								<th>Mediasi</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($rekapitulasi as $row) {
								echo "<tr>
										<td>$no</td>
										<td>$row->id_kasus</td>
										<td>$row->jenis_kejahatan</td>
										<td>$row->jumlah_kasus</td>
										<td>$row->proses_hukum</td>
										<td>$row->mediasi</td>
										<td>
											<div>
												<a href='".base_url('rekapitulasi/getedit/'.$row->id_penyelesaian)."' class='btn btn-sm btn-warning'>
													<i class='fas fa-edit'></i> Edit
												</a>
												<a href='".base_url('rekapitulasi/delete/'.$row->id_penyelesaian)."' class='btn btn-sm btn-danger' onclick='return confirm(\"Ingin menghapus data ini?\");'>
													<i class='fas fa-trash'></i> Hapus
												</a>
											</div>
										</td>
									</tr>";
								$no++;
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div style="height: 100vh"></div>
	</div>
</main>
