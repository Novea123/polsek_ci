<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('pelanggaran') ?>">Pelanggaran</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<form action="<?php echo site_url('pelanggaran/edit') ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id_pelanggaran" value="<?= $pelanggaran->id_pelanggaran; ?>" required />

					<div class="row">
						<!-- Kolom Kiri -->
						<div class="col-md-6">
							<div class="mb-3">
								<label for="nama_pelanggar">NAMA PELANGGAR <code>*</code></label>
								<input class="form-control <?php echo form_error('nama_pelanggar') ? 'is-invalid' : '' ?>"
									type="text" name="nama_pelanggar" value="<?= $pelanggaran->nama_pelanggar; ?>" placeholder="NAMA PELANGGAR" required />
								<div class="invalid-feedback">
									<?php echo form_error('nama_pelanggar') ?>
								</div>
							</div>

							<div class="mb-3">
								<label for="nik">NIK <code>*</code></label>
								<input class="form-control <?php echo form_error('nik') ? 'is-invalid' : '' ?>"
									type="text" name="nik" value="<?= $pelanggaran->nik; ?>" placeholder="NOMOR INDUK KEPENDUDUKAN" required />
								<div class="invalid-feedback">
									<?php echo form_error('nik') ?>
								</div>
							</div>

							<div class="mb-3">
								<label for="jenis_pelanggaran">JENIS PELANGGARAN <code>*</code></label>
								<select class="form-control <?php echo form_error('jenis_pelanggaran') ? 'is-invalid' : '' ?>" name="jenis_pelanggaran" required>
									<option value="">- Pilih Jenis Pelanggaran -</option>
									<option value="Pelanggaran Lalu Lintas" <?= $pelanggaran->jenis_pelanggaran == 'Pelanggaran Lalu Lintas' ? 'selected' : ''; ?>>Pelanggaran Lalu Lintas</option>
									<option value="Pelanggaran Administrasi" <?= $pelanggaran->jenis_pelanggaran == 'Pelanggaran Administrasi' ? 'selected' : ''; ?>>Pelanggaran Administrasi</option>
									<option value="Pelanggaran Umum" <?= $pelanggaran->jenis_pelanggaran == 'Pelanggaran Umum' ? 'selected' : ''; ?>>Pelanggaran Umum</option>
									<option value="Pelanggaran Khusus" <?= $pelanggaran->jenis_pelanggaran == 'Pelanggaran Khusus' ? 'selected' : ''; ?>>Pelanggaran Khusus</option>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('jenis_pelanggaran') ?>
								</div>
							</div>

							<div class="mb-3">
								<label for="lokasi">LOKASI KEJADIAN <code>*</code></label>
								<input class="form-control <?php echo form_error('lokasi') ? 'is-invalid' : '' ?>"
									type="text" name="lokasi" value="<?= $pelanggaran->lokasi; ?>" placeholder="LOKASI KEJADIAN" required />
								<div class="invalid-feedback">
									<?php echo form_error('lokasi') ?>
								</div>
							</div>
						</div>

						<!-- Kolom Kanan -->
						<div class="col-md-6">
							<div class="mb-3">
								<label for="tanggal">TANGGAL KEJADIAN <code>*</code></label>
								<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid' : '' ?>"
									type="date" name="tanggal" value="<?= $pelanggaran->tanggal; ?>" required />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal') ?>
								</div>
							</div>

							<div class="mb-3">
								<label for="sanksi">SANKSI <code>*</code></label>
								<input class="form-control <?php echo form_error('sanksi') ? 'is-invalid' : '' ?>"
									type="text" name="sanksi" value="<?= $pelanggaran->sanksi; ?>" placeholder="JENIS SANKSI" required />
								<div class="invalid-feedback">
									<?php echo form_error('sanksi') ?>
								</div>
							</div>

							<div class="mb-3">
								<label for="status">STATUS <code>*</code></label>
								<select class="form-control <?php echo form_error('status') ? 'is-invalid' : '' ?>" name="status" required>
									<option value="Belum Diproses" <?= $pelanggaran->status == 'Belum Diproses' ? 'selected' : ''; ?>>Belum Diproses</option>
									<option value="Dalam Proses" <?= $pelanggaran->status == 'Dalam Proses' ? 'selected' : ''; ?>>Dalam Proses</option>
									<option value="Selesai" <?= $pelanggaran->status == 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('status') ?>
								</div>
							</div>

							<div class="mb-3">
								<label for="id_petugas">ID PETUGAS <code>*</code></label>
								<input class="form-control <?php echo form_error('id_petugas') ? 'is-invalid' : '' ?>"
									type="text" name="id_petugas" value="<?= $pelanggaran->id_petugas; ?>" placeholder="ID PETUGAS" required />
								<div class="invalid-feedback">
									<?php echo form_error('id_petugas') ?>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label for="alamat">ALAMAT LENGKAP <code>*</code></label>
								<textarea name="alamat" rows="3" class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" required><?= $pelanggaran->alamat; ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>

							<div class="mb-3">
								<label for="bukti">BUKTI PELANGGARAN</label>
								<input class="form-control" type="file" name="bukti" accept="image/*,.pdf" />
								<small class="text-muted">Format: JPG, PNG, PDF (Maks. 2MB)</small>
								<?php if ($pelanggaran->bukti): ?>
									<div class="mt-2">
										<small>File saat ini:</small>
										<a href="<?= base_url('uploads/bukti/' . $pelanggaran->bukti) ?>" target="_blank"><?= $pelanggaran->bukti ?></a>
										<input type="hidden" name="old_bukti" value="<?= $pelanggaran->bukti ?>" />
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>

					<div class="d-flex justify-content-between">
						<a href="<?php echo site_url('pelanggaran') ?>" class="btn btn-secondary">
							<i class="fas fa-arrow-left"></i> Kembali
						</a>
						<button class="btn btn-warning" type="submit">
							<i class="fas fa-save"></i> Update Data
						</button>
					</div>
				</form>
			</div>
		</div>
		<div style="height: 100vh"></div>
	</div>
</main>
