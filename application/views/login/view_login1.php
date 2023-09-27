<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title><?= APP_NAME ?></title>
	<link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet" />
	<script src="<?= base_url('assets/js/all.js') ?>"></script>
</head>

<body class="bg-secondary">
	<div id="layoutAuthentication">
		<div id="layoutAuthentication_content">
			<main>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<div class="card shadow-lg border-0 rounded-lg mt-5">
								<div class="card-header">
									<h3 class="text-center font-weight-light my-4"><?= APP_NAME ?></h3>
								</div>
								<div class="card-body">
									<?php get_flash_messages() ?>
									<form action="<?= base_url('login/autentica') ?>" method="post">
										<div class="form-floating mb-3">
											<input class="form-control" id="usuario" name="usuario" type="text" required placeholder="Seu usuário" />
											<label for="usuario">Usuario</label>
										</div>
										<div class="form-floating mb-3">
											<input class="form-control" id="senha" name="senha" type="password" required placeholder="Sua senha" />
											<label for="senha">Senha</label>
										</div>

										<div class="d-flex align-items-center justify-content-end mt-4 mb-0">
											<button class="btn btn-primary" type="submit">Login</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
		<div id="layoutAuthentication_footer">
			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid px-4">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; <?= APP_NAME ?> <?= date('Y') ?></div>
						<div>
							<a href="#">Privacy Policy</a>
							&middot;
							<a href="#">Terms &amp; Conditions</a>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/scripts.js') ?>"></script>
</body>

</html>
