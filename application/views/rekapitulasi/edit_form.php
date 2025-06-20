<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('rekapitulasi') ?>">Rekapitulasi</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<form action="<?php echo site_url('rekapitulasi/edit') ?>" method="post">
					<input type="hidden" name="id_penyelesaian" value="<?= $rekapitulasi->id_penyelesaian ?>" />

					<div class="mb-3">
						<label for="id_kasus">ID KASUS <code>*</code></label>
						<input class="form-control <?php echo form_error('id_kasus') ? 'is-invalid' : '' ?>" type="number" name="id_kasus" value="<?= $rekapitulasi->id_kasus ?>" required />
						<div class="invalid-feedback">
							<?php echo form_error('id_kasus') ?>
						</div>
					</div>

					<div class="mb-3">
						<label for="jenis_kejahatan">JENIS KEJAHATAN <code>*</code></label>
						<input class="form-control <?php echo form_error('jenis_kejahatan') ? 'is-invalid' : '' ?>" type="text" name="jenis_kejahatan" value="<?= $rekapitulasi->jenis_kejahatan ?>" required />
						<div class="invalid-feedback">
							<?php echo form_error('jenis_kejahatan') ?>
						</div>
					</div>

					<div class="mb-3">
						<label for="jumlah_kasus">JUMLAH KASUS</label>
						<input class="form-control" type="number" name="jumlah_kasus" value="<?= $rekapitulasi->jumlah_kasus ?>" required />
					</div>

					<div class="mb-3">
						<label for="proses_hukum">PROSES HUKUM</label>
						<input class="form-control" type="number" name="proses_hukum" value="<?= $rekapitulasi->proses_hukum ?>" required />
					</div>

					<div class="mb-3">
						<label for="mediasi">MEDIASI</label>
						<input class="form-control" type="number" name="mediasi" value="<?= $rekapitulasi->mediasi ?>" required />
					</div>

					<button class="btn btn-warning" type="submit">
						<i class="fas fa-edit"></i> UPDATE
					</button>
				</form>
			</div>
		</div>
		<div style="height: 100vh"></div>
	</div>
</main>