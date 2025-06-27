<main>
	<div class="container-fluid">
		<h1 class="mt-4"></h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="<?php echo site_url('') ?>">User</a></li>
			<li class="breadcrumb-item active"><?php echo $title ?></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<form action="<?php echo site_url('user/edit') ?>" method="post">
					<div class="mb-3">
						<label for="username">USERNAME <code>*</code></label>
						<input class="form-control" type="hidden" name="id" value="<?= $user->id; ?>" required />
						<input class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>"
							type="text" name="username" value="<?= $user->username; ?>" placeholder="USERNAME" required />
						<div class="invalid-feedback">
							<?php echo form_error('username') ?>
						</div>
					</div>
					<div class="mb-3">
						<label for="full_name">FULL NAME <code>*</code></label>
						<input class="form-control" type="text" name="full_name" value="<?= $user->full_name; ?>" placeholder="FULL NAME" required />
					</div>
					<div class="mb-3">
						<label for="phone">PHONE</label>
						<input class="form-control" type="text" name="phone" value="<?= $user->phone; ?>" placeholder="PHONE" required />
					</div>
					<div class="mb-3">
						<label for="email">EMAIL</label>
						<input class="form-control" type="email" name="email" value="<?= $user->email; ?>" placeholder="EMAIL" required />
					</div>
					<div class="mb-3">
						<label for="email">PASSWORD</label>
						<input class="form-control" type="text" name="password" value="<?= $user->password; ?>" placeholder="EMAIL" required />
					</div>
					<div class="mb-3">
						<label for="role">Role</label>
						<select class="form-select" id="role" name="role" required>
							<?php if ($user->role == 'kapolsek') { ?>
								<option value="kapolsek">KAPOLSEK</option>
								<option value="petugas" selected>PETUGAS</option>
								<option value="masyarakat">MASYARAKAT</option>
							<?php } elseif ($user->role == 'petugas') { ?>
								<option value="kapolsek">KAPOLSEK</option>
								<option value="petugas">PETUGAS</option>
								<option value="masyarakat" selected>MASYARAKAT</option>
							<?php } else { ?>
								<option value="kapolsek" selected>KAPOLSEK</option>
								<option value="petugas">PETUGAS</option>
								<option value="masyarakat">MASYARAKAT</option>
							<?php } ?>
						</select>
					</div>
					<button class="btn btn-warning" type="submit"><i class="fas fa-plus"></i> UPDATE</button>
				</form>
			</div>
		</div>
		<div style="height: 100vh"></div>
	</div>
</main>
