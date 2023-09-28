<div class="container" style="margin-top: 15vh;">

	<form action="<?= base_url('usuario/altera_senha') ?>" method="post">
		<div class="row g-3">
			<div class="col-md-6 mb-3">
				<label style="font-weight: 700; font-size: 1.1em;" for="usuario" class="form-label"> Usuário</label>
				<input type="text" class="form-control" id="usuario" name="usuario" disabled value="<?= $_SESSION['usuario']['usuario'] ?>">
			</div>
		</div>
		<br>
		<div class="row g-3">
			<div id="div_nova_senha" class="col-md-6 mb-3">
				<label style="font-weight: 700; font-size: 1.1em;" for="nova_senha" class="form-label"><span class="text-danger">*</span> Nova Senha</label>
				<div class="input-group">
					<input type="password" class="form-control" id="nova_senha" name="nova_senha" required>
					<button class="btn btn-outline-secondary" type="button" id="btn_senha"><i id="icon_senha" class="fa-solid fa-eye-slash"></i></button>
				</div>
				<div id="aviso_nova_senha"><br><br><br><br></div>
			</div>
			<div id="div_confirma_nova_senha" class="col-md-6 mb-3">
				<label style="font-weight: 700; font-size: 1.1em;" for="confirma_nova_senha" class="form-label"> <span class="text-danger">*</span> Confirma Nova Senha</label>
				<div class="input-group">
					<input type="password" class="form-control" id="confirma_nova_senha" name="confirma_nova_senha" required>
					<button class="btn btn-outline-secondary" type="button" id="btn_senha2"><i id="icon_senha2" class="fa-solid fa-eye-slash"></i></button>
				</div>
				<div id="aviso_confirma_nova_senha"><br><br><br><br></div>
			</div>
		</div>

		<br>
		<div class="col-12" style="margin-top: 10vh;">
			<button style="float: right;" type="submit" id="salvar" disabled class="btn btn-primary btn-lg">Salvar <i class="fa-regular fa-floppy-disk ms-1"></i></button>
		</div>
	</form>
</div>

<script>
	const nova_senha = document.querySelector('#nova_senha')
	const confirma_nova_senha = document.querySelector('#confirma_nova_senha')
	const salvar = document.querySelector('#salvar')
	const aviso_nova_senha = document.querySelector('#aviso_nova_senha')
	const aviso_confirma_nova_senha = document.querySelector('#aviso_confirma_nova_senha')
	const div_nova_senha = document.querySelector('#div_nova_senha')
	const div_confirma_nova_senha = document.querySelector('#div_confirma_nova_senha')

	nova_senha.addEventListener('keyup', () => {
		nova_senha.value = nova_senha.value.trim();

		// Validação se a variável nova_senha contém pelo menos 1 número
		let containsNumber = /[0-9]/.test(nova_senha.value);

		// Validação se a variável nova_senha contém pelo menos 1 letra
		let containsLetter = /[a-zA-Z]/.test(nova_senha.value);

		if (containsNumber) {
			document.querySelector('#aviso_2').classList.remove('text-danger')
			document.querySelector('#aviso_2').classList.add('text-success')
		} else {
			document.querySelector('#aviso_2').classList.add('text-danger')
			document.querySelector('#aviso_2').classList.remove('text-success')
		}

		if (containsLetter) {
			document.querySelector('#aviso_1').classList.remove('text-danger')
			document.querySelector('#aviso_1').classList.add('text-success')
		} else {
			document.querySelector('#aviso_1').classList.add('text-danger')
			document.querySelector('#aviso_1').classList.remove('text-success')
		}

		if (nova_senha.value.length > 5 && nova_senha.value.length < 21 && containsNumber && containsLetter) {
			document.querySelector('#aviso_3').classList.remove('text-danger')
			document.querySelector('#aviso_3').classList.add('text-success')
			if (nova_senha.value === confirma_nova_senha.value) {
				salvar.disabled = false;
			} else {
				salvar.disabled = true;
			}
		} else {
			document.querySelector('#aviso_3').classList.add('text-danger')
			document.querySelector('#aviso_3').classList.remove('text-success')
			salvar.disabled = true;
		}
	})


	confirma_nova_senha.addEventListener('keyup', () => {
		confirma_nova_senha.value = confirma_nova_senha.value.trim()

		// Validação se a variável nova_senha contém pelo menos 1 número
		let containsNumber = /[0-9]/.test(confirma_nova_senha.value);

		// Validação se a variável nova_senha contém pelo menos 1 letra
		let containsLetter = /[a-zA-Z]/.test(confirma_nova_senha.value);

		if (confirma_nova_senha.value.length > 5 && confirma_nova_senha.value.length < 21 && containsNumber && containsLetter) {
			if (nova_senha.value === confirma_nova_senha.value) {
				document.querySelector('#aviso_4').classList.remove('text-danger')
				document.querySelector('#aviso_4').classList.add('text-success')
				salvar.disabled = false;
			} else {
				document.querySelector('#aviso_4').classList.add('text-danger')
				document.querySelector('#aviso_4').classList.remove('text-success')
				salvar.disabled = true;
			}
		} else {
			salvar.disabled = true;
		}
	})


	const nova_senha_input = document.getElementById('nova_senha');
	const btnSenha = document.getElementById('btn_senha');
	const eyeIcon = document.getElementById('icon_senha');

	btnSenha.addEventListener('click', () => {
		if (nova_senha_input.type === 'password') {
			nova_senha_input.type = 'text';
			btnSenha.innerHTML = '<i id="icon_senha" class="fa-solid fa-eye"></i>'
		} else {
			nova_senha_input.type = 'password';
			btnSenha.innerHTML = '<i id="icon_senha" class="fa-solid fa-eye-slash"></i>'
		}
	});

	const confirma_nova_senha_input = document.getElementById('confirma_nova_senha');
	const btnSenha2 = document.getElementById('btn_senha2');
	const eyeIcon2 = document.getElementById('icon_senha2');

	btnSenha2.addEventListener('click', () => {
		if (confirma_nova_senha_input.type === 'password') {
			confirma_nova_senha_input.type = 'text';
			btnSenha2.innerHTML = '<i id="icon_senha" class="fa-solid fa-eye"></i>'
		} else {
			confirma_nova_senha_input.type = 'password';
			btnSenha2.innerHTML = '<i id="icon_senha" class="fa-solid fa-eye-slash"></i>'
		}
	});

	div_nova_senha.addEventListener('click', () => {
		aviso_nova_senha.innerHTML = `		<br><ul style="font-weight: 700;">
												<li id="aviso_1" class="text-danger">A senha deve conter pelo menos 1 caractere.</li>
												<li id="aviso_2" class="text-danger">A senha deve conter pelo menos 1 número.</li>
												<li id="aviso_3" class="text-danger">A senha deve ter entre 6 a 20 caracteres.</li>
											</ul>`

		nova_senha.value = nova_senha.value.trim();

		// Validação se a variável nova_senha contém pelo menos 1 número
		let containsNumber = /[0-9]/.test(nova_senha.value);

		// Validação se a variável nova_senha contém pelo menos 1 letra
		let containsLetter = /[a-zA-Z]/.test(nova_senha.value);

		if (containsNumber) {
			document.querySelector('#aviso_2').classList.remove('text-danger')
			document.querySelector('#aviso_2').classList.add('text-success')
		} else {
			document.querySelector('#aviso_2').classList.add('text-danger')
			document.querySelector('#aviso_2').classList.remove('text-success')
		}

		if (containsLetter) {
			document.querySelector('#aviso_1').classList.remove('text-danger')
			document.querySelector('#aviso_1').classList.add('text-success')
		} else {
			document.querySelector('#aviso_1').classList.add('text-danger')
			document.querySelector('#aviso_1').classList.remove('text-success')
		}

		if (nova_senha.value.length > 5 && nova_senha.value.length < 21 && containsNumber && containsLetter) {
			document.querySelector('#aviso_3').classList.remove('text-danger')
			document.querySelector('#aviso_3').classList.add('text-success')
		} else {
			document.querySelector('#aviso_3').classList.add('text-danger')
			document.querySelector('#aviso_3').classList.remove('text-success')
		}
	})

	div_nova_senha.addEventListener('mouseleave', () => {
		aviso_nova_senha.innerHTML = `<br><br><br><br>`
	})

	div_confirma_nova_senha.addEventListener('click', () => {
		aviso_confirma_nova_senha.innerHTML = `		<br><ul style="font-weight: 700;">
														<li id="aviso_4" class="text-danger" >As senhas devem ser iguais.</li>
													</ul><br><br>`

		confirma_nova_senha.value = confirma_nova_senha.value.trim()

		if (nova_senha.value === confirma_nova_senha.value && (confirma_nova_senha.value.length > 5 && confirma_nova_senha.value.length < 21)) {
			document.querySelector('#aviso_4').classList.remove('text-danger')
			document.querySelector('#aviso_4').classList.add('text-success')
		} else {
			document.querySelector('#aviso_4').classList.add('text-danger')
			document.querySelector('#aviso_4').classList.remove('text-success')
		}

	})

	div_confirma_nova_senha.addEventListener('mouseleave', () => {
		aviso_confirma_nova_senha.innerHTML = `<br><br><br><br>`
	})
</script>
