<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4"> 
			<li class="breadcrumb-item"><a href="<?php echo site_url('pelapor') ?>">Pelapor</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
			<form action="<?php echo site_url('pelapor/save') ?>" method="post"  >
			<div class="mb-3">
				<label for="nama_pelapor">NAMA PELAPOR <code>*</code></label>
				<input class="form-control" type="text" name="nama_pelapor" placeholder="NAMA PELAPOR" required />				
			</div>			
			<div class="mb-3">
				<label for="NIK">NIK <code>*</code></label>
				<input class="form-control" type="text" name="no_identitas" placeholder="NIK" required />				
			</div>	
			<div class="mb-3">
				<label for="phone">PHONE</label>
				<input class="form-control" type="number" name="phone" placeholder="PHONE" required/>				
			</div>			
			<div class="mb-3">
				<label for="alamat">ALAMAT</label>
				<textarea name="alamat" rows="3" class="form-control" autocomplete="off" required></textarea>			
			</div>					
			
			<button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Save</button>
		</form>				
		</div>
		</div>
		<div style="height: 100vh"></div>
	</div>
</main>
