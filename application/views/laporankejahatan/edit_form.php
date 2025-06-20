<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('laporankejahatan') ?>">Laporan Kejahatan</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<form action="<?php echo site_url('laporankejahatan/edit') ?>" method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="id_laporan">ID LAPORAN</label>
						<input class="form-control" type="hidden" name="id_laporan" value="<?= $laporan->id_laporan; ?>" required />
						<input class="form-control" type="text" value="<?= $laporan->id_laporan; ?>" disabled />
					</div>

					<div class="mb-3">
						<label for="jenis_kejahatan">JENIS KEJAHATAN <code>*</code></label>
						<input class="form-control <?php echo form_error('jenis_kejahatan') ? 'is-invalid' : '' ?>"
							type="text" name="jenis_kejahatan" value="<?= $laporan->jenis_kejahatan; ?>" placeholder="JENIS KEJAHATAN" required />
						<div class="invalid-feedback">
							<?php echo form_error('jenis_kejahatan') ?>
						</div>
					</div>

					<div class="mb-3">
						<label for="lokasi_kejadian">LOKASI KEJADIAN <code>*</code></label>
						<textarea name="lokasi_kejadian" rows="2" class="form-control <?php echo form_error('lokasi_kejadian') ? 'is-invalid' : '' ?>" required><?= $laporan->lokasi_kejadian; ?></textarea>
						<div class="invalid-feedback">
							<?php echo form_error('lokasi_kejadian') ?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="tanggal_kejadian">TANGGAL KEJADIAN <code>*</code></label>
							<input class="form-control <?php echo form_error('tanggal_kejadian') ? 'is-invalid' : '' ?>"
								type="date" name="tanggal_kejadian" value="<?= $laporan->tanggal_kejadian; ?>" required />
							<div class="invalid-feedback">
								<?php echo form_error('tanggal_kejadian') ?>
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="waktu_kejadian">WAKTU KEJADIAN <code>*</code></label>
							<input class="form-control <?php echo form_error('waktu_kejadian') ? 'is-invalid' : '' ?>"
								type="time" name="waktu_kejadian" value="<?= $laporan->waktu_kejadian; ?>" required />
							<div class="invalid-feedback">
								<?php echo form_error('waktu_kejadian') ?>
							</div>
						</div>
					</div>

					<div class="mb-3">
						<label for="deskripsi_kejadian">DESKRIPSI KEJADIAN <code>*</code></label>
						<textarea name="deskripsi_kejadian" rows="4" class="form-control <?php echo form_error('deskripsi_kejadian') ? 'is-invalid' : '' ?>" required><?= $laporan->deskripsi_kejadian; ?></textarea>
						<div class="invalid-feedback">
							<?php echo form_error('deskripsi_kejadian') ?>
						</div>
					</div>

					<div class="mb-3">
						<label for="status">STATUS <code>*</code></label>
						<select name="status" class="form-control chosen-select <?php echo form_error('status') ? 'is-invalid' : '' ?>" required>
							<option value="<?= $laporan->status; ?>" selected><?= $laporan->status; ?></option>
							<option value="Sedang Proses">Sedang Proses</option>
							<option value="Dalam Penyelidikan">Dalam Penyelidikan</option>
							<option value="Selesai">Selesai</option>
						</select>
						<div class="invalid-feedback">
							<?php echo form_error('status') ?>
						</div>
					</div>

					<div class="mb-3">
						<label for="bukti">BUKTI</label>
						<input class="form-control" type="file" name="bukti" />
						<?php if ($laporan->bukti): ?>
							<small class="text-muted">File saat ini: <?= $laporan->bukti ?></small>
							<input type="hidden" name="old_bukti" value="<?= $laporan->bukti ?>" />
						<?php endif; ?>
					</div>

					<button class="btn btn-warning" type="submit"><i class="fas fa-save"></i> UPDATE</button>
				</form>
			</div>
		</div>
		<div style="height: 100vh"></div>
	</div>
</main>
