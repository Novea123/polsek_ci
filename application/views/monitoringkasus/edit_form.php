<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('monitoringkasus') ?>">Monitoring Kasus</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<form action="<?php echo site_url('monitoringkasus/edit') ?>" method="post">
					<div class="mb-3">
						<label for="id_kasus">ID KASUS <code>*</code></label>
						<input class="form-control" type="hidden" name="id_kasus" value="<?= $monitoring->id_kasus; ?>" required />
						<input class="form-control" type="text" value="<?= $monitoring->id_kasus; ?>" disabled />
					</div>

					<div class="mb-3">
						<label for="nama_pelapor">NAMA PELAPOR <code>*</code></label>
						<input class="form-control <?php echo form_error('nama_pelapor') ? 'is-invalid' : '' ?>"
							type="text" name="nama_pelapor" value="<?= $monitoring->nama_pelapor; ?>" placeholder="NAMA PELAPOR" required />
						<div class="invalid-feedback">
							<?php echo form_error('nama_pelapor') ?>
						</div>
					</div>

					<div class="mb-3">
						<label for="nama_petugas">PETUGAS PENANGGUNG JAWAB <code>*</code></label>
						<input class="form-control <?php echo form_error('nama_petugas') ? 'is-invalid' : '' ?>"
							type="text" name="nama_petugas" value="<?= $monitoring->nama_petugas; ?>" placeholder="NAMA PETUGAS" required />
						<div class="invalid-feedback">
							<?php echo form_error('nama_petugas') ?>
						</div>
					</div>

					<div class="mb-3">
						<label for="tanggal_lapor">TANGGAL LAPOR <code>*</code></label>
						<input class="form-control <?php echo form_error('tanggal_lapor') ? 'is-invalid' : '' ?>"
							type="date" name="tanggal_lapor" value="<?= date('Y-m-d', strtotime($monitoring->tanggal_lapor)); ?>" required />
						<div class="invalid-feedback">
							<?php echo form_error('tanggal_lapor') ?>
						</div>
					</div>

					<div class="mb-3">
						<label for="jenis_kejahatan">JENIS KEJAHATAN <code>*</code></label>
						<input class="form-control <?php echo form_error('jenis_kejahatan') ? 'is-invalid' : '' ?>"
							type="text" name="jenis_kejahatan" value="<?= $monitoring->jenis_kejahatan; ?>" placeholder="JENIS KEJAHATAN" required />
						<div class="invalid-feedback">
							<?php echo form_error('jenis_kejahatan') ?>
						</div>
					</div>

					<div class="mb-3">
						<label for="lokasi">LOKASI <code>*</code></label>
						<textarea name="lokasi" rows="2" class="form-control <?php echo form_error('lokasi') ? 'is-invalid' : '' ?>"
							placeholder="LOKASI KEJAHATAN" required><?= $monitoring->lokasi; ?></textarea>
						<div class="invalid-feedback">
							<?php echo form_error('lokasi') ?>
						</div>
					</div>

					<div class="mb-3">
						<label for="status">STATUS <code>*</code></label>
						<select name="status" class="form-control <?php echo form_error('status') ? 'is-invalid' : '' ?>" required>
							<option value="<?= $monitoring->status; ?>" selected><?= $monitoring->status; ?></option>
							<option value="Dalam Proses">Dalam Proses</option>
							<option value="Proses">Proses</option>
							<option value="Selesai">Selesai</option>
						</select>
						<div class="invalid-feedback">
							<?php echo form_error('status') ?>
						</div>
					</div>

					<button class="btn btn-warning" type="submit"><i class="fas fa-save"></i> UPDATE DATA</button>
					<a href="<?php echo site_url('monitoringkasus') ?>" class="btn btn-secondary">BATAL</a>
				</form>
			</div>
		</div>
		<div style="height: 100vh"></div>
	</div>
</main>