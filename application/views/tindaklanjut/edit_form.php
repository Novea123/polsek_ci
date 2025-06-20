<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('tindaklanjut') ?>">Tindak Lanjut</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<form action="<?php echo site_url('tindaklanjut/edit') ?>" method="post">
					<!-- ID tersembunyi -->
					<input type="hidden" name="id" value="<?= $tindaklanjut->id_tindak_lanjut; ?>" />

					<div class="mb-3">
						<label for="id_laporan">LAPORAN <code>*</code></label>
						<select name="id_laporan" class="form-control chosen-select" required>
							<option value="<?= $tindaklanjut->id_laporan ?>" selected><?= $tindaklanjut->judul_laporan ?></option>
							<?php foreach ($laporan as $l) : ?>
								<?php if ($l->id_laporan != $tindaklanjut->id_laporan) : ?>
									<option value="<?= $l->id_laporan ?>"><?= $l->judul_laporan ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="mb-3">
						<label for="id_petugas">PETUGAS <code>*</code></label>
						<select name="id_petugas" class="form-control chosen-select" required>
							<option value="<?= $tindaklanjut->id_petugas ?>" selected><?= $tindaklanjut->nama_petugas ?></option>
							<?php foreach ($petugas as $p) : ?>
								<?php if ($p->id_petugas != $tindaklanjut->id_petugas) : ?>
									<option value="<?= $p->id_petugas ?>"><?= $p->nama_petugas ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="mb-3">
						<label for="tanggal_tindak_kasus">TANGGAL TINDAKAN <code>*</code></label>
						<input class="form-control" type="date" name="tanggal_tindak_kasus" value="<?= $tindaklanjut->tanggal_tindak_kasus ?>" required />
					</div>

					<div class="mb-3">
						<label for="jenis_tindakan">JENIS TINDAKAN <code>*</code></label>
						<input class="form-control" type="text" name="jenis_tindakan" value="<?= $tindaklanjut->jenis_tindakan ?>" placeholder="Contoh: Penyelidikan, Penangkapan, dll" required />
					</div>

					<div class="mb-3">
						<label for="hasil_tindakan">HASIL TINDAKAN</label>
						<textarea class="form-control" name="hasil_tindakan" rows="3" required><?= $tindaklanjut->hasil_tindakan ?></textarea>
					</div>

					<div class="mb-3">
						<label for="status">STATUS</label>
						<select name="status" class="form-control" required>
							<option value="<?= $tindaklanjut->status ?>" selected><?= $tindaklanjut->status ?></option>
							<option value="Belum Ditindaklanjuti">Belum Ditindaklanjuti</option>
							<option value="Dalam Proses">Dalam Proses</option>
							<option value="Selesai">Selesai</option>
						</select>
					</div>

					<button class="btn btn-warning" type="submit"><i class="fas fa-edit"></i> UPDATE</button>
				</form>
			</div>
		</div>
		<div style="height: 100vh"></div>
	</div>
</main>
