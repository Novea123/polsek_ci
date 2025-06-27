<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('daftartahanan') ?>">Daftar Tahanan</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<?php if (validation_errors()) : ?>
					<div class="alert alert-danger">
						<?php echo validation_errors(); ?>
					</div>
				<?php endif; ?>
				<form action="<?php echo site_url('daftartahanan/save') ?>" method="post">
					<div class="mb-3">
						<label for="nama_orang">NAMA TAHANAN <code>*</code></label>
						<input class="form-control" type="text" name="nama_orang" placeholder="NAMA TAHANAN" required />
					</div>

					<div class="mb-3">
						<label for="id_laporan">ID LAPORAN <code>*</code></label>
						<input class="form-control" type="text" name="id_laporan" placeholder="ID LAPORAN" required />
					</div>

					<div class="mb-3">
						<label for="jenis_kelamin">JENIS KELAMIN <code>*</code></label>
						<select name="jenis_kelamin" class="form-control chosen-select" required>
							<option selected disabled value="">-- Pilih --</option>
							<option value="Pria">Pria</option>
							<option value="Wanita">Wanita</option>
						</select>
					</div>

					<div class="mb-3">
						<label for="tanggal_lahir">TANGGAL LAHIR<code>*</code></label>
						<input class="form-control" type="date" name="tanggal_lahir" value="<?= set_value('tanggal_lahir') ?>" required />

					</div>

					<div class="mb-3">
						<label for="jenis_kejahatan">JENIS KEJAHATAN <code>*</code></label>
						<input class="form-control" type="text" name="jenis_kejahatan" placeholder="JENIS KEJAHATAN" required />
					</div>

					<div class="mb-3">
						<label for="tanggal_ditangkap">TANGGAL DITANGKAP <code>*</code></label>
						<input class="form-control" type="date" name="tanggal_ditangkap" required />
					</div>

					<div class="mb-3">
						<label for="status_hukum">STATUS HUKUM <code>*</code></label>
						<input class="form-control" type="text" name="status_hukum" placeholder="STATUS HUKUM" required />
					</div>

					<div class="mb-3">
						<label for="alamat">ALAMAT <code>*</code></label>
						<textarea name="alamat" rows="3" class="form-control" required></textarea>
					</div>

					<div class="mb-3">
						<label for="pekerjaan">PEKERJAAN</label>
						<input class="form-control" type="text" name="pekerjaan" placeholder="PEKERJAAN" />
					</div>

					<div class="mb-3">
						<label for="durasi">DURASI</label>
						<input class="form-control" type="text" name="durasi" placeholder="DURASI" />
					</div>

					<button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Save</button>
				</form>
			</div>
		</div>
		<div style="height: 100vh"></div>
	</div>
</main>
