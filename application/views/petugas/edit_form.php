<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('petugas') ?>">Petugas</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
			<form action="<?php echo site_url('petugas/edit') ?>" method="post"  > 
			<div class="mb-3">
				<label for="nama_petugas">NAMA PETUGAS <code>*</code></label>
				<input class="form-control" type="hidden" name="id" value="<?=$petugas->id_petugas;?>" required />	
				<input class="form-control <?php echo form_error('nama_petugas') ? 'is-invalid':'' ?>"
					type="text" name="nama_petugas" value="<?=$petugas->nama_petugas;?>" placeholder="NAMA PETUGAS" required />
				<div class="invalid-feedback">
					<?php echo form_error('nama_petugas') ?>
				</div>
			</div>			
						
			<div class="mb-3">
				<label for="full_name">JABATAN <code>*</code></label>
				<select name="jabatan" class="form-control chosen-select" autocomplete="off" required>
				<option value="<?=$petugas->jabatan ?>" selected><?=$petugas->jabatan ?></option>
				<option value="Kapolsek">Kapolsek</option>
					<option value="Wakapolsek">Wakapolsek</option>
					<option value="Kanit Provos">Kanit Provos</option>
					<option value="Kanitreskrim">Kanitreskrim</option>
					<option value="Kanitbinmas">Kanitbinmas</option>
					<option value="Kanitlantas">Kanitlantas</option>
					<option value="Kanitintelkam">Kanitintelkam</option>
				</select>				
			</div>
			<div class="mb-3">
				<label for="phone">PHONE</label>
				<input class="form-control" type="number" name="phone" value="<?=$petugas->no_hp;?>" placeholder="PHONE" required/>				
			</div>			
			<div class="mb-3">
				<label for="alamat">ALAMAT</label>
				<textarea name="alamat" rows="3" class="form-control"  autocomplete="off" required><?=$petugas->alamat;?></textarea>			
			</div>	

			<button class="btn btn-warning" type="submit"><i class="fas fa-plus"></i> UPDATE</button>
		</form>				
		</div>
		</div>
		<div style="height: 100vh"></div>
	</div>
</main>
