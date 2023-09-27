<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url('assets/login/fonts/icomoon/style.css') ?>">

	<link rel="stylesheet" href="<?= base_url('assets/login/css/owl.carousel.min.css') ?>">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/login/css/bootstrap.min.css') ?>">

	<!-- Style -->
	<link rel="stylesheet" href="<?= base_url('assets/login/css/style.css') ?>">

	<script src="<?= base_url('assets/js/all.js') ?>"></script>

	<style>
		html,
		body {
			min-height: 100%;
		}

		body {
			padding: 0;
			margin: 0;
		}

		footer {
			position: fixed;
			bottom: 0;
			background-color: #6c63ff;
			color: #FFF;
			width: 100%;
			height: 6vh;
			text-align: center;
			line-height: 6vh;
		}
	</style>

	<title><?= APP_NAME ?></title>
</head>

<body>



	<div class="mt-5">
		<div class="container mb-5">
			<div class="row">
				<div class="col-md-6">
					<img src="<?= base_url('assets/login/images/undraw_remotely_2j6y.svg') ?>" alt="Image" class="img-fluid">
				</div>
				<div class="col-md-6 contents">
					<div class="row justify-content-center">
						<div class="col-md-8 mt-5">
							<div class="mb-4">
								<h3>Entrar</h3>
								<p class="mb-4">Para acessar o sistema, por favor, informe o usuário e a senha.</p>
							</div>
							<?php get_flash_messages() ?>
							<form action="<?= base_url('login/autentica') ?>" method="post">
								<div class="form-group first">
									<label for="usuario">Usuário</label>
									<input type="text" class="form-control" id="usuario" name="usuario" required placeholder="Insira seu usuário">

								</div>
								<label for="senha">Senha</label>
								<div class="form-group input-group last mb-4">
									<input type="password" class="form-control" id="senha" name="senha" required placeholder="Insira sua senha">
									<button class="btn btn-outline-primary" type="button" id="btn_senha"><i id="icon_senha" class="fa-solid fa-eye-slash"></i></button>

								</div>
								<hr>								
								<input type="submit" value="Entrar" class="btn btn-block btn-primary">
								

							</form>
						</div>
					</div>

				</div>

			</div>
		</div>
		<br><br><br>
		<footer>
			<div class="text-white mb-3 mb-md-0">
				Copyright &copy; <?= APP_NAME ?> <?= date('Y') ?>
			</div>
		</footer>
	</div>


	<script src="<?= base_url('assets/login/js/jquery-3.3.1.min.js') ?>"></script>
	<script src="<?= base_url('assets/login/js/popper.min.js') ?>"></script>
	<script src="<?= base_url('assets/login/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/login/js/main.js') ?>"></script>

	<script>
        const senhaInput = document.getElementById('senha');
        const btnSenha = document.getElementById('btn_senha');
        const eyeIcon = document.getElementById('icon_senha');

        btnSenha.addEventListener('click', () => {
            if (senhaInput.type === 'password') {
                senhaInput.type = 'text';
				btnSenha.innerHTML = '<i id="icon_senha" class="fa-solid fa-eye"></i>'
            } else {
                senhaInput.type = 'password';
				btnSenha.innerHTML = '<i id="icon_senha" class="fa-solid fa-eye-slash"></i>'
            }
        });
    </script>

</body>

</html>
