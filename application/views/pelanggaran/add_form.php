<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('pelanggaran') ?>">Pelanggaran</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<?php if (validation_errors()) : ?>
					<div class="alert alert-danger">
						<?php echo validation_errors(); ?>
					</div>
				<?php endif; ?>

				<form action="<?php echo site_url('pelanggaran/save') ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<!-- Kolom Kiri -->
						<div class="col-md-6">
							<div class="mb-3">
								<label for="nama_pelanggar">NAMA PELANGGAR <code>*</code></label>
								<input class="form-control" type="text" name="nama_pelanggar" placeholder="NAMA PELANGGAR" required />
							</div>

							<div class="mb-3">
								<label for="nik">NIK <code>*</code></label>
								<input class="form-control" type="text" name="nik" placeholder="NOMOR INDUK KEPENDUDUKAN" required />
							</div>

							<div class="mb-3">
								<label for="jenis_pelanggaran">JENIS PELANGGARAN <code>*</code></label>
								<select class="form-control" name="jenis_pelanggaran" required>
									<option value="">- Pilih Jenis Pelanggaran -</option>
									<option value="Pelanggaran Lalu Lintas">Pelanggaran Lalu Lintas</option>
									<option value="Pelanggaran Administrasi">Pelanggaran Administrasi</option>
									<option value="Pelanggaran Umum">Pelanggaran Umum</option>
									<option value="Pelanggaran Khusus">Pelanggaran Khusus</option>
								</select>
							</div>

							<div class="mb-3">
								<label for="lokasi">LOKASI KEJADIAN <code>*</code></label>
								<input class="form-control" type="text" name="lokasi" placeholder="LOKASI KEJADIAN" required />
							</div>
						</div>

						<!-- Kolom Kanan -->
						<div class="col-md-6">
							<div class="mb-3">
								<label for="tanggal">TANGGAL KEJADIAN <code>*</code></label>
								<input class="form-control" type="date" name="tanggal" required />
							</div>

							<div class="mb-3">
								<label for="sanksi">SANKSI <code>*</code></label>
								<input class="form-control" type="text" name="sanksi" placeholder="JENIS SANKSI" required />
							</div>

							<div class="mb-3">
								<label for="status">STATUS <code>*</code></label>
								<select class="form-control" name="status" required>
									<option value="Belum Diproses" selected>Belum Diproses</option>
									<option value="Dalam Proses">Dalam Proses</option>
									<option value="Selesai">Selesai</option>
								</select>
							</div>

							<div class="mb-3">
								<label for="id_petugas">ID PETUGAS <code>*</code></label>
								<input class="form-control" type="text" name="id_petugas" placeholder="ID PETUGAS" required />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label for="alamat">ALAMAT LENGKAP <code>*</code></label>
								<textarea name="alamat" rows="3" class="form-control" required></textarea>
							</div>

							<div class="mb-3">
								<label for="bukti">BUKTI PELANGGARAN</label>
								<input class="form-control" type="file" name="bukti" accept="image/*,.pdf" />
								<small class="text-muted">Format: JPG, PNG, PDF (Maks. 2MB)</small>
							</div>
						</div>
					</div>

					<div class="d-flex justify-content-between">
						<a href="<?php echo site_url('pelanggaran') ?>" class="btn btn-secondary">
							<i class="fas fa-arrow-left"></i> Kembali
						</a>
						<button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Save</button>
				</form>
			</div>

		</div>
	</div>
	<div style="height: 100vh"></div>
	</div>
</main>
