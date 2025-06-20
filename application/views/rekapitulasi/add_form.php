<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('rekapitulasi') ?>">Rekapitulasi</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>

		<div class="card mb-4">
			<div class="card-body">
				<form action="<?php echo site_url('rekapitulasi/save') ?>" method="post">

					<div class="mb-3">
						<label for="id_kasus">ID KASUS <code>*</code></label>
						<input class="form-control" type="number" name="id_kasus" placeholder="ID KASUS" required />
					</div>

					<div class="mb-3">
						<label for="jenis_kejahatan">JENIS KEJAHATAN <code>*</code></label>
						<input class="form-control" type="text" name="jenis_kejahatan" placeholder="JENIS KEJAHATAN" required />
					</div>

					<div class="mb-3">
						<label for="jumlah_kasus">JUMLAH KASUS <code>*</code></label>
						<input class="form-control" type="number" name="jumlah_kasus" placeholder="JUMLAH KASUS" required />
					</div>

					<div class="mb-3">
						<label for="proses_hukum">PROSES HUKUM <code>*</code></label>
						<input class="form-control" type="number" name="proses_hukum" placeholder="PROSES HUKUM" required />
					</div>

					<div class="mb-3">
						<label for="mediasi">MEDIASI <code>*</code></label>
						<input class="form-control" type="number" name="mediasi" placeholder="MEDIASI" required />
					</div>

					<button class="btn btn-primary" type="submit">
						<i class="fas fa-plus"></i> Save
					</button>
				</form>
			</div>
		</div>

		<div style="height: 100vh"></div>
	</div>
</main>