<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Login - Polsek</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/css/adminlte.css') ?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="login-page bg-body-secondary">
	<div class="login-box">
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<img src="<?= base_url('assets/img/polsek.png') ?>" width="100" class="rounded" />
			</div>
			<div class="card-body login-card-body">
				<h5 class="login-box-msg text-center">Sign in to start your session</h5>

				<!-- Flash message -->
				<?= $this->session->flashdata('message'); ?>

				<!-- Validation errors -->
				<?php if (validation_errors()) : ?>
					<div class="alert alert-danger"><?= validation_errors(); ?></div>
				<?php endif; ?>

				<form action="<?= site_url('auth/login') ?>" method="POST">
					<div class="input-group mb-3">
						<div class="form-floating flex-grow-1">
							<input id="loginUsername" type="text" name="username" class="form-control" placeholder="Username" />
							<label for="loginUsername">Username</label>
						</div>
						<div class="input-group-text"><i class="bi bi-person"></i></div>
					</div>
					<div class="input-group mb-3">
						<div class="form-floating flex-grow-1">
							<input id="loginPassword" type="password" name="password" class="form-control" placeholder="Password" />
							<label for="loginPassword">Password</label>
						</div>
						<div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
					</div>
					<div class="d-grid gap-2 mb-2">
						<button type="submit" class="btn btn-primary">Sign In</button>
					</div>
				</form>

				<p class="mb-1"><a href="#">I forgot my password</a></p>
				<p class="mb-0"><a href="#" class="text-center">Register a new membership</a></p>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('assets/js/adminlte.js') ?>"></script>
</body>

</html>
