<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('laporankejahatan') ?>">Laporan Kejahatan</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<form action="<?php echo site_url('laporankejahatan/save') ?>" method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="jenis_kejahatan">JENIS KEJAHATAN <code>*</code></label>
						<select name="jenis_kejahatan" class="form-control chosen-select" required>
							<option selected disabled value="">-- Pilih --</option>
							<option value="Pencurian">Pencurian</option>
							<option value="Pembunuhan">Pembunuhan</option>
							<option value="Narkotika">Narkotika</option>
							<option value="Penipuan">Penipuan</option>
							<option value="Kekerasan">Kekerasan</option>
							<option value="Lainnya">Lainnya</option>
						</select>
					</div>

					<div class="mb-3">
						<label for="lokasi_kejadian">LOKASI KEJADIAN <code>*</code></label>
						<textarea name="lokasi_kejadian" rows="2" class="form-control" required></textarea>
					</div>

					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="tanggal_kejadian">TANGGAL KEJADIAN <code>*</code></label>
							<input class="form-control" type="date" name="tanggal_kejadian" required />
						</div>
						<div class="col-md-6 mb-3">
							<label for="waktu_kejadian">WAKTU KEJADIAN <code>*</code></label>
							<input class="form-control" type="time" name="waktu_kejadian" required />
						</div>
					</div>

					<div class="mb-3">
						<label for="deskripsi_kejadian">DESKRIPSI KEJADIAN <code>*</code></label>
						<textarea name="deskripsi_kejadian" rows="4" class="form-control" required></textarea>
					</div>

					<div class="mb-3">
						<label for="status">STATUS <code>*</code></label>
						<select name="status" class="form-control chosen-select" required>
							<option selected disabled value="">-- Pilih --</option>
							<option value="Sedang Proses">Sedang Proses</option>
							<option value="Dalam Penyelidikan">Dalam Penyelidikan</option>
							<option value="Selesai">Selesai</option>
						</select>
					</div>

					<div class="mb-3">
						<label for="bukti">BUKTI</label>
						<input class="form-control" type="file" name="bukti" />
						<small class="text-muted">Format: JPG, PNG, PDF (Maks. 2MB)</small>
					</div>

					<button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Save</button>
				</form>
			</div>
		</div>
		<div style="height: 100vh"></div>
	</div>
</main>
