<div class="container mt-5">
	<h3 class="mt-3 mb-3">Alterar Senha</h3>
	<form action="<?= base_url('usuario/altera_senha') ?>" method="post">
		<div class="row g-3">
			<div class="col-md-6 mb-3">
				<label for="usuario" class="form-label">Usuario</label>
				<input type="text" class="form-control" id="usuario" name="usuario" disabled value="<?= $_SESSION['usuario']['usuario'] ?>">
			</div>
		</div>
		<br>
		<div class="row g-3">
			<div id="div_nova_senha" class="col-md-6 mb-3">
				<label for="nova_senha" class="form-label">Nova Senha</label>
				<div class="input-group">
					<input type="password" class="form-control" id="nova_senha" name="nova_senha" required>
					<button class="btn btn-outline-secondary" type="button" id="btn_senha"><i id="icon_senha" class="fa-solid fa-eye-slash"></i></button>
				</div>
				<div id="aviso_nova_senha"></div>
			</div>
			<div id="div_confirma_nova_senha" class="col-md-6 mb-3">
				<label for="confirma_nova_senha" class="form-label">Confirma Nova Senha</label>
				<div class="input-group">
					<input type="password" class="form-control" id="confirma_nova_senha" name="confirma_nova_senha" required>
					<button class="btn btn-outline-secondary" type="button" id="btn_senha2"><i id="icon_senha2" class="fa-solid fa-eye-slash"></i></button>
				</div>
				<div id="aviso_confirma_nova_senha"></div>
			</div>
		</div>

		
		<br>
		<div class="col-12">
			<button type="submit" id="salvar" disabled class="btn btn-primary">Salvar</button>
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

		nova_senha.value = nova_senha.value.trim()

		if (nova_senha.value.length > 5 && nova_senha.value.length < 21) {
			if (nova_senha.value === confirma_nova_senha.value) {
				salvar.disabled = false;
			} else {
				salvar.disabled = true;
			}
		} else {
			salvar.disabled = true;
		}
	})

	confirma_nova_senha.addEventListener('keyup', () => {
		confirma_nova_senha.value = confirma_nova_senha.value.trim()

		if (confirma_nova_senha.value.length > 5 && confirma_nova_senha.value.length < 21) {
			if (nova_senha.value === confirma_nova_senha.value) {
				salvar.disabled = false;
			} else {
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
		aviso_nova_senha.innerHTML = `		<br><ul>
												<li>A senha deve conter pelo menos 1 caractere.</li>
												<li>A senha deve conter pelo menos 1 número.</li>
												<li>A senha deve ter entre 6 e 25 caracteres de comprimento.</li>
												<li>As senhas devem ser iguais.</li>
											</ul>`
	})

	div_nova_senha.addEventListener('mouseleave', () => {
		aviso_nova_senha.innerHTML = ``
	})

	div_confirma_nova_senha.addEventListener('click', () => {
		aviso_confirma_nova_senha.innerHTML = `		<br><ul>
														<li>A senha deve conter pelo menos 1 caractere.</li>
														<li>A senha deve conter pelo menos 1 número.</li>
														<li>A senha deve ter entre 6 e 25 caracteres de comprimento.</li>
														<li>As senhas devem ser iguais.</li>
													</ul>`
	})

	div_confirma_nova_senha.addEventListener('mouseleave', () => {
		aviso_confirma_nova_senha.innerHTML = ``
	})
	
</script>
