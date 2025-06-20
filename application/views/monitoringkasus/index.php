<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('monitoringkasus') ?>">Monitoring Kasus</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-header">
				<a href="<?php echo site_url('monitoringkasus/add') ?>" class="btn btn-primary btn-icon-split">
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
					<table class="table table-striped table-bordered table-hover" id="tabelkasus" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Pelapor</th>
								<th>Petugas Penanggung Jawab</th>
								<th>Tanggal Lapor</th>
								<th>Jenis Kejahatan</th>
								<th>Lokasi</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($monitoring as $kasus) {
								echo "<tr>
                                        <td>$no</td>
                                        <td>$kasus->nama_pelapor</td>
                                        <td>$kasus->nama_petugas</td>
                                        <td>" . date('d-m-Y', strtotime($kasus->tanggal_lapor)) . "</td>
                                        <td>$kasus->jenis_kejahatan</td>
                                        <td>$kasus->lokasi</td>
                                        <td>
                                            <span class='badge badge-" . ($kasus->status == 'Selesai' ? 'success' : ($kasus->status == 'Proses' ? 'warning' : 'primary')) . "'>
                                                $kasus->status
                                            </span>
                                        </td>
                                        <td>
                                            <div>
                                                <a href=" . base_url('monitoringkasus/getedit/' . $kasus->id_kasus) . " class='btn btn-sm btn-warning'><i class='fas fa-edit'></i> Edit</a>
                                                <a href=" . base_url('monitoringkasus/delete/' . $kasus->id_kasus) . " class='btn btn-sm btn-danger'
                                                onclick='return confirm(\"Apakah Anda yakin ingin menghapus data kasus ini?\");'><i class='fas fa-trash'></i> Hapus</a>
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
