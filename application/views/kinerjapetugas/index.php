<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-header">
				<a href="<?php echo site_url('kinerjapetugas/add') ?>" class="btn btn-primary btn-icon-split">
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
					<table class="table table-striped table-bordered table-hover text-center" id="tabelkinerja" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Petugas</th>
								<th>Jabatan</th>
								<th>Total Kasus</th>
								<th>Kasus Selesai</th>
								<th>Rata Penanganan</th>
								<th>Tersangka</th>
								<th>Nilai Kinerja</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($kinerja as $k) {
								// Format nilai kinerja dengan badge warna
								$nilai_badge = '';
								if ($k->nilai_kinerja >= 80) {
									$nilai_badge = '<span class="badge badge-success text-dark">' . $k->nilai_kinerja . '</span>';
								} elseif ($k->nilai_kinerja >= 60) {
									$nilai_badge = '<span class="badge badge-warning text-dark">' . $k->nilai_kinerja . '</span>';
								} else {
									$nilai_badge = '<span class="badge badge-danger text-dark">' . $k->nilai_kinerja . '</span>';
								}

								echo "<tr>
                                        <td>$no</td>
                                        <td>$k->nama_petugas</td>
                                        <td>$k->jabatan</td>
                                        <td>$k->total_kasus</td>
                                        <td>$k->kasus_selesai</td>
                                        <td>$k->rata_penangan</td>
                                        <td>$k->tersangka</td>
                                        <td>
                                            <span class='badge badge-" . ($k->nilai_kinerja >= 80 ? 'success' : ($k->nilai_kinerja >= 60 ? 'warning' : 'danger')) . " 
											text-dark'>
                                                $k->nilai_kinerja
                                            </span>
                                        </td>
                                        <td>
                                            <div>
                                                <a href='" . base_url('kinerjapetugas/getedit/' . $k->id_kinerja) . "' class='btn btn-warning'><i class='fas fa-edit'></i> Edit</a>
                                                <a href='" . base_url('kinerjapetugas/delete/' . $k->id_kinerja) . "' class='btn btn-danger'
                                                onclick='return confirm(\"Apakah Anda yakin ingin menghapus data kinerja ini?\");'><i class='fas fa-trash'></i> Hapus</a>
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
