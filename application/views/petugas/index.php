<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('petugas') ?>">Petugas</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-header">
				<a href="<?php echo site_url('petugas/add') ?>" class="btn btn-primary btn-icon-split">
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
			<table class="table table-striped table-bordered table-hover" id="tabelkelas" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Petugas</th>
						<th>Jabatan</th>
						<th>Phone</th>
						<th>Alamat</th>																			
						<th>Action</th>
					</tr>
				</thead>
				<tbody>								
					<?php
					$no =1;
						foreach ($petugas as $petugas) {
					echo "<tr>
							<td>$no</td>
							<td>$petugas->nama_petugas</td>
							<td>$petugas->jabatan</td>
							<td>$petugas->no_hp</td>											
											
							<td>$petugas->alamat</td>																					
							<td>
							<div>
							<a href=".base_url('petugas/getedit/'. $petugas->id_petugas)." class='btn btn-sm btn-warning'><i class='fas fa-edit'></i> Edit</a>
							<a href=".base_url('petugas/delete/'. $petugas->id_petugas)." class='btn btn-sm btn-danger'
							onclick='return confirm(\"Ingin mengapus data petugas ini?\");'><i class='fas fa-trash'></i> Hapus</a>
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
