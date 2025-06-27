<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('pelapor') ?>">Pelapor</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-header">
				<a href="<?php echo site_url('pelapor/add') ?>" class="btn btn-primary btn-icon-split">
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
						<th>NIK</th>
						<th>Nama Pelapor</th>
						<th>No HP</th>
						<th>Alamat</th>																			
						<th>Action</th>
					</tr>
				</thead>
				<tbody>								
					<?php
					$no =1;
						foreach ($pelapor as $pelapor) {
					echo "<tr>
							<td>$no</td>
							<td>$pelapor->no_identitas</td>
							<td>$pelapor->nama_pelapor</td>
							<td>$pelapor->no_hp</td>									
											
							<td>$pelapor->alamat</td>																					
							<td>
							<div>
							<a href=".base_url('pelapor/getedit/'. $pelapor->id_pelapor)." class='btn btn-sm btn-warning'><i class='fas fa-edit'></i> Edit</a>
							<a href=".base_url('pelapor/delete/'. $pelapor->id_pelapor)." class='btn btn-sm btn-danger'
							onclick='return confirm(\"Ingin mengapus data pelapor ini?\");'><i class='fas fa-trash'></i> Hapus</a>
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
