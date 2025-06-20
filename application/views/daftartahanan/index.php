<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('daftartahanan') ?>">Daftar Tahanan</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-header">
				<a href="<?php echo site_url('daftartahanan/add') ?>" class="btn btn-primary btn-icon-split">
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
					<table class="table table-striped table-bordered table-hover" id="tabelTahanan" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Tahanan</th>
								<th>Jenis Kelamin</th>
								<th>Jenis Kejahatan</th>
								<th>Tanggal Ditangkap</th>
								<th>Status Hukum</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($tahanan as $row) {
								echo "<tr>
                                        <td>$no</td>
                                        <td>$row->nama_orang</td>
                                        <td>$row->jenis_kelamin</td>
                                        <td>$row->jenis_kejahatan</td>
                                        <td>" . date('d/m/Y', strtotime($row->tanggal_ditangkap)) . "</td>
                                        <td>$row->status_hukum</td>
                                        <td>
                                        <div>
                                        <a href='" . base_url('daftartahanan/getedit/' . $row->id_orang) . "' class='btn btn-sm btn-warning'><i class='fas fa-edit'></i> Edit</a>
                                        <a href='" . base_url('daftartahanan/delete/' . $row->id_orang) . "' class='btn btn-sm btn-danger'
                                        onclick='return confirm(\"Ingin menghapus data tahanan ini?\");'><i class='fas fa-trash'></i> Hapus</a>
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
		$('#tabelTahanan').DataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
			}
		});
	});
</script>
