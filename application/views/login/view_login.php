<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url('assets/login/fonts/icomoon/style.css')?>">

	<link rel="stylesheet" href="<?= base_url('assets/login/css/owl.carousel.min.css')?>">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/login/css/bootstrap.min.css')?>">

	<!-- Style -->
	<link rel="stylesheet" href="<?= base_url('assets/login/css/style.css')?>">

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
			height: 8vh;
			text-align: center;
			line-height: 8vh;
		}
	</style>

	<title>Login #7</title>
</head>

<body>



	<div class="mt-5">
		<div class="container mb-5">
			<div class="row">
				<div class="col-md-6">
					<img src="<?= base_url('assets/login/images/undraw_remotely_2j6y.svg')?>" alt="Image" class="img-fluid">
				</div>
				<div class="col-md-6 contents">
					<div class="row justify-content-center">
						<div class="col-md-8">
							<div class="mb-4">
								<h3>Sign In</h3>
								<p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
							</div>
							<form action="#" method="post">
								<div class="form-group first">
									<label for="username">Username</label>
									<input type="text" class="form-control" id="username">

								</div>
								<div class="form-group last mb-4">
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password">

								</div>

								<div class="d-flex mb-5 align-items-center">
									<label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
										<input type="checkbox" checked="checked" />
										<div class="control__indicator"></div>
									</label>
									<span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
								</div>

								<input type="submit" value="Log In" class="btn btn-block btn-primary">

								<span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>

								<div class="social-login">
									<a href="#" class="facebook">
										<span class="icon-facebook mr-3"></span>
									</a>
									<a href="#" class="twitter">
										<span class="icon-twitter mr-3"></span>
									</a>
									<a href="#" class="google">
										<span class="icon-google mr-3"></span>
									</a>
								</div>
							</form>
						</div>
					</div>

				</div>

			</div>
		</div>
		<footer>
			<!-- Copyright -->
			<div class="text-white mb-3 mb-md-0">
				Copyright © 2020. All rights reserved.
			</div>
			<!-- Copyright -->

			<!-- Right -->
			<div>
				<a href="#!" class="text-white me-4">
					<i class="fab fa-facebook-f"></i>
				</a>
				<a href="#!" class="text-white me-4">
					<i class="fab fa-twitter"></i>
				</a>
				<a href="#!" class="text-white me-4">
					<i class="fab fa-google"></i>
				</a>
				<a href="#!" class="text-white">
					<i class="fab fa-linkedin-in"></i>
				</a>
			</div>
			<!-- Right -->
		</footer>
	</div>


	<script src="<?= base_url('assets/login/js/jquery-3.3.1.min.js')?>"></script>
	<script src="<?= base_url('assets/login/js/popper.min.js')?>"></script>
	<script src="<?= base_url('assets/login/js/bootstrap.min.js')?>"></script>
	<script src="<?= base_url('assets/login/js/main.js')?>"></script>
</body>

</html>
