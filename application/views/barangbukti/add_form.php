<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('barangbukti') ?>">Barang Bukti</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<form action="<?php echo site_url('barangbukti/save') ?>" method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="id_laporan">ID LAPORAN <code>*</code></label>
						<input class="form-control" type="text" name="id_laporan" placeholder="ID LAPORAN" required />
					</div>

					<div class="mb-3">
						<label for="jenis_barang_bukti">JENIS BARANG BUKTI <code>*</code></label>
						<select name="jenis_barang_bukti" class="form-control chosen-select" required>
							<option selected disabled value="">-- Pilih --</option>
							<option value="Senjata Api">Senjata Api</option>
							<option value="Narkotika">Narkotika</option>
							<option value="Dokumen">Dokumen</option>
							<option value="Elektronik">Elektronik</option>
							<option value="Kendaraan">Kendaraan</option>
							<option value="Uang">Uang</option>
							<option value="Lainnya">Lainnya</option>
						</select>
					</div>

					<div class="mb-3">
						<label for="deskripsi">DESKRIPSI <code>*</code></label>
						<textarea name="deskripsi" rows="3" class="form-control" required></textarea>
					</div>

					<div class="mb-3">
						<label for="jumlah">JUMLAH <code>*</code></label>
						<input class="form-control" type="number" name="jumlah" placeholder="JUMLAH" required />
					</div>

					<div class="mb-3">
						<label for="tanggal_ditemukan">TANGGAL DITEMUKAN <code>*</code></label>
						<input class="form-control" type="date" name="tanggal_ditemukan" required />
					</div>

					<div class="mb-3">
						<label for="lokasi_penyimpanan">LOKASI PENYIMPANAN <code>*</code></label>
						<input class="form-control" type="text" name="lokasi_penyimpanan" placeholder="LOKASI PENYIMPANAN" required />
					</div>

					<div class="mb-3">
						<label for="status_barang">STATUS BARANG <code>*</code></label>
						<select name="status_barang" class="form-control chosen-select" required>
							<option selected disabled value="">-- Pilih --</option>
							<option value="Disimpan">Disimpan</option>
							<option value="Diproses">Diproses</option>
							<option value="Dikembalikan">Dikembalikan</option>
						</select>
					</div>

					<div class="mb-3">
						<label for="bukti">FILE BUKTI</label>
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
