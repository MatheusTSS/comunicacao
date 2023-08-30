<div class="container mt-5">
	<div id="cadastro">
		<h3 class="mt-3 mb-3">Cadastrar Usuario</h3>

		<div class="row g-3">
			<div class="col-md-6 mb-3">
				<label for="usuario" class="form-label">Usuario</label>
				<input type="text" class="form-control" id="usuario" name="usuario" required>
			</div>
			<div class="col-md-6 mb-3">
				<label for="nova_senha" class="form-label">Senha</label>
				<input type="text" class="form-control" id="senha" name="senha" disabled value="Abc@123">
			</div>
		</div>
		<div class="col-12">
			<button type="submit" id="salvar" class="btn btn-primary">Salvar</button>
		</div>
	</div>

	<div id="lista">
		<div class="card">
			<div class="card-header">
				<h3>Lista Usuarios</h3>
			</div>
			<div class="card-body">

				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th style="width: 10%;" scope="col">ID</th>
							<th scope="col">Usuário</th>
							<th style="width: 10%;" scope="col">Ação</th>
						</tr>
					</thead>
					<tbody id="tbody">

					</tbody>
				</table>

			</div>
		</div>

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
						console.log(result)

					} catch (error) {
						console.log(error)
					}
				})
				botao.append(icone)

			} else {
				//botao.textContent = 'Ação'
				botao.classList.add('btn', 'btn-success')
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
						console.log(result)

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
</script>
