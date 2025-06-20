<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('kinerjapetugas') ?>">Kinerja Petugas</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<form action="<?php echo site_url('kinerjapetugas/save') ?>" method="post">

					<div class="mb-3">
						<label for="id_petugas">PETUGAS <code>*</code></label>
						<select name="id_petugas" class="form-control chosen-select <?php echo form_error('id_petugas') ? 'is-invalid' : '' ?>" required>
							<option value="" selected disabled>-- Pilih Petugas --</option>
							<?php foreach ($petugas as $p): ?>
								<option value="<?= $p->id_petugas ?>" <?= set_select('id_petugas', $p->id_petugas) ?>>
									<?= $p->nama_petugas ?> (<?= $p->jabatan ?>)
								</option>
							<?php endforeach; ?>
						</select>
						<div class="invalid-feedback">
							<?php echo form_error('id_petugas') ?>
						</div>
					</div>

					<div class="mb-3">
						<label for="total_kasus">TOTAL KASUS <code>*</code></label>
						<input class="form-control <?php echo form_error('total_kasus') ? 'is-invalid' : '' ?>"
							type="number" name="total_kasus" value="<?= set_value('total_kasus') ?>"
							placeholder="Jumlah total kasus" required />
						<div class="invalid-feedback">
							<?php echo form_error('total_kasus') ?>
						</div>
					</div>

					<div class="mb-3">
						<label for="kasus_selesai">KASUS SELESAI <code>*</code></label>
						<input class="form-control <?php echo form_error('kasus_selesai') ? 'is-invalid' : '' ?>"
							type="text" name="kasus_selesai" value="<?= set_value('kasus_selesai') ?>"
							placeholder="Jumlah kasus yang selesai" required />
						<div class="invalid-feedback">
							<?php echo form_error('kasus_selesai') ?>
						</div>
					</div>

					<div class="mb-3">
						<label for="rata_penangan">RATA-RATA PENANGANAN (HARI) <code>*</code></label>
						<input class="form-control <?php echo form_error('rata_penangan') ? 'is-invalid' : '' ?>"
							type="text" name="rata_penangan" value="<?= set_value('rata_penangan') ?>"
							placeholder="Rata-rata waktu penanganan dalam hari" required />
						<div class="invalid-feedback">
							<?php echo form_error('rata_penangan') ?>
						</div>
					</div>

					<div class="mb-3">
						<label for="tersangka">TERSANGKA <code>*</code></label>
						<input class="form-control <?php echo form_error('tersangka') ? 'is-invalid' : '' ?>"
							type="text" name="tersangka" value="<?= set_value('tersangka') ?>"
							placeholder="Jumlah tersangka" required />
						<div class="invalid-feedback">
							<?php echo form_error('tersangka') ?>
						</div>
					</div>

					<div class="mb-3">
						<label for="nilai_kinerja">NILAI KINERJA (0-100) <code>*</code></label>
						<input class="form-control <?php echo form_error('nilai_kinerja') ? 'is-invalid' : '' ?>"
							type="number" min="0" max="100" name="nilai_kinerja" value="<?= set_value('nilai_kinerja') ?>"
							placeholder="Nilai kinerja (0-100)" required />
						<div class="invalid-feedback">
							<?php echo form_error('nilai_kinerja') ?>
						</div>
					</div>

					<button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> SIMPAN DATA</button>
					<a href="<?php echo site_url('kinerjapetugas') ?>" class="btn btn-secondary">
						<i class="fas fa-times"></i> BATAL
					</a>
				</form>
			</div>
		</div>
		<div style="height: 100vh"></div>
	</div>
</main>