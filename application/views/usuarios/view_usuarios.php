<div class="container mt-5">

	<div id="cadastro" class="d-none">

		<div class="row g-3" style="margin-top: 15vh;">
			<div class="col-md-6 mb-3">
				<label style="font-weight: 700; font-size: 1.1em;" for="usuario" class="form-label"><span class="text-danger">*</span> Usuário</label>
				<input type="text" class="form-control" id="usuario" name="usuario" required>
			</div>
			<div class="col-md-6 mb-3">
				<label style="font-weight: 700; font-size: 1.1em;" for="nova_senha" class="form-label">Senha</label>
				<input type="text" class="form-control" id="senha" name="senha" disabled value="Abc@123">
			</div>
		</div>
		<!-- <div id="aviso_usuario"><br><br><br><br></div> -->
		<div class="row g-3">
			<div class="col-md-6 mb-3" id="aviso_usuario">
				<ul style="font-weight: 700;">
					<li id="aviso_1" class="text-danger">O usuário deve conter pelo menos 1 caractere.</li>
					<li id="aviso_2" class="text-danger">O usuário deve ter entre 4 a 20 caracteres.</li>
				</ul>
			</div>
			<div class="col-md-6 mb-3" id="aviso_senha">
				<ul style="font-weight: 700;">
					<li id="aviso_3" class="text-secondary">Senha padrão do sistema.</li>
				</ul>
			</div>

		</div>
		<div class="d-flex justify-content-between" style="margin-top: 22vh;">
			<button type="button" id="voltar" class="btn btn-danger"><i class="fa fa-arrow-left me-1"></i> Voltar</button>
			<button type="button" id="salvar" disabled class="btn btn-primary ">Salvar <i class="fa-regular fa-floppy-disk ms-1"></i></button>
		</div>
	</div>

	<div id="lista">
		<div class="d-flex justify-content-end">
			<button style="float: right;" id="cadastrar" type="button" class="btn btn-success mb-3">Cadastrar <i class="fa fa-user-plus ms-1"></i></button>
		</div>
		<div class="card mt-5">
			<div class="card-header">
				<h4>Lista de Usuários Cadastrados</h4>
			</div>
			<div class="card-body">

				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th style="width: 5%;" scope="col">ID</th>
							<th scope="col">Usuário</th>
							<th style="width: 8%;" scope="col">Ação</th>
						</tr>
					</thead>
					<tbody id="tbody">

					</tbody>
				</table>
			</div>
		</div>

	</div>
	<div class="mt-5">
		<div id="alert" class="alert d-none" role="alert"></div>
	</div>

</div>

<script>
	window.onload = () => lista_dados_usuarios();

	const base_url = '<?= base_url() ?>'

	async function lista_dados_usuarios() {

		try {

			let response = await fetch(base_url + 'usuario/lista_usuarios')
			let result = await response.json()
			//console.log(result)
			await exibe_tabela_usuario(result.data)

		} catch (error) {
			console.log(error)
		}
	}

	async function exibe_tabela_usuario(usuarios) {
		const tbody = document.querySelector('#tbody')
		tbody.innerHTML = ''

		usuarios.forEach(usuario => {
			let tr = document.createElement('tr')

			let id = document.createElement('td')
			id.textContent = usuario.id

			let nome_usuario = document.createElement('td')
			nome_usuario.textContent = usuario.usuario

			let acao = document.createElement('td')

			let botao = document.createElement('button')

			if (usuario.ativo == 1) {
				//botao.textContent = 'Ação'
				botao.classList.add('btn', 'btn-danger')
				botao.style.width = '100%'
				let icone = document.createElement('i')
				icone.classList.add('fa-solid', 'fa-toggle-off')
				botao.addEventListener('click', async () => {

					const data = new FormData();
					data.append('id', usuario.id);

					try {
						let response = await fetch(base_url + 'usuario/desativa_usuario', {
							method: 'POST',
							body: data
						})
						let result = await response.json()
						let alert = document.querySelector('#alert')

						if (result.status == 'success') {
							alert.textContent = result.message
							alert.classList.remove('alert-danger', 'd-none')
							alert.classList.add('alert-success')
							setTimeout(() => {
								alert.classList.add('d-none')
							}, 5000);
						} else {
							alert.textContent = result.message
							alert.classList.remove('alert-success', 'd-none')
							alert.classList.add('alert-danger')
							setTimeout(() => {
								alert.classList.add('d-none')
							}, 5000);
						}
						lista_dados_usuarios()

					} catch (error) {
						console.log(error)
					}
				})
				botao.append(icone)

			} else {
				//botao.textContent = 'Ação'
				botao.classList.add('btn', 'btn-success')
				botao.style.width = '100%'
				let icone = document.createElement('i')
				icone.classList.add('fa-solid', 'fa-toggle-on')
				botao.addEventListener('click', async () => {

					const data = new FormData();
					data.append('id', usuario.id);

					try {
						let response = await fetch(base_url + 'usuario/ativa_usuario', {
							method: 'POST',
							body: data
						})
						let result = await response.json()
						let alert = document.querySelector('#alert')

						if (result.status == 'success') {
							alert.textContent = result.message
							alert.classList.remove('alert-danger', 'd-none')
							alert.classList.add('alert-success')
							setTimeout(() => {
								alert.classList.add('d-none')
							}, 5000);
						} else {
							alert.textContent = result.message
							alert.classList.remove('alert-success', 'd-none')
							alert.classList.add('alert-danger')
							setTimeout(() => {
								alert.classList.add('d-none')
							}, 5000);
						}
						lista_dados_usuarios()

					} catch (error) {
						console.log(error)
					}
				})
				botao.append(icone)
			}

			acao.append(botao)

			tr.append(id, nome_usuario, acao)

			tbody.append(tr)
		});
	}

	document.querySelector('#cadastrar').addEventListener('click', () => {
		document.querySelector('#lista').classList.add('d-none')
		document.querySelector('#cadastro').classList.remove('d-none')
	})

	document.querySelector('#voltar').addEventListener('click', () => {
		document.querySelector('#lista').classList.remove('d-none')
		document.querySelector('#cadastro').classList.add('d-none')
	})


	const usuario = document.querySelector('#usuario')
	const salvar = document.querySelector('#salvar')

	usuario.addEventListener('keyup', () => {
		usuario.value = usuario.value.trim()

		// Validação se a variável usuario contém pelo menos 1 letra
		let containsLetter = /[a-zA-Z]/.test(usuario.value);

		if (containsLetter) {
			document.querySelector('#aviso_1').classList.remove('text-danger')
			document.querySelector('#aviso_1').classList.add('text-success')
		} else {
			document.querySelector('#aviso_1').classList.add('text-danger')
			document.querySelector('#aviso_1').classList.remove('text-success')
		}

		if (usuario.value.length > 3 && usuario.value.length < 21) {
			document.querySelector('#aviso_2').classList.remove('text-danger')
			document.querySelector('#aviso_2').classList.add('text-success')
		} else {
			document.querySelector('#aviso_2').classList.add('text-danger')
			document.querySelector('#aviso_2').classList.remove('text-success')
		}

		if (usuario.value.length > 3 && usuario.value.length < 21 && containsLetter) {
			salvar.disabled = false;
		} else {
			salvar.disabled = true;
		}
	})

	document.querySelector('#salvar').addEventListener('click', async () => {

		const data = new FormData();
		data.append('usuario', usuario.value);
		let alert = document.querySelector('#alert')

		try {
			let response = await fetch(base_url + 'usuario/cadastra_usuario', {
				method: 'POST',
				body: data
			})
			let result = await response.json()

			if (result.status == 'success') {
				lista_dados_usuarios()
				document.querySelector('#lista').classList.remove('d-none')
				document.querySelector('#cadastro').classList.add('d-none')
				alert.textContent = result.message
				alert.classList.remove('alert-danger', 'd-none')
				alert.classList.add('alert-success')
				setTimeout(() => {
					alert.classList.add('d-none')
				}, 5000);
			} else {
				alert.textContent = result.message
				alert.classList.remove('alert-success', 'd-none')
				alert.classList.add('alert-danger')
				setTimeout(() => {
					alert.classList.add('d-none')
				}, 5000);
			}

		} catch (error) {
			alert.textContent = 'Ocorreu um erro do lado do servidor, Tente novamente!'
			alert.classList.remove('alert-success', 'd-none')
			alert.classList.add('alert-danger')
			setTimeout(() => {
				alert.classList.add('d-none')
			}, 5000);
		}

	})
</script>
