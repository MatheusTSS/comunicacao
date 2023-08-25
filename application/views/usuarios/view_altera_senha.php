<div class="container mt-5">
	<h3 class="mt-3 mb-3">Alterar Senha</h3>
	<form action="<?= base_url('usuario/altera_senha')?>" method="post">
		<div class="row g-3">
			<div class="col-md-6 mb-3">
				<label for="usuario" class="form-label">Usuario</label>
				<input type="text" class="form-control" id="usuario" name="usuario" disabled value="<?= $_SESSION['usuario']['usuario'] ?>">
			</div>
		</div>
		<br>
		<div class="row g-3">
			<div class="col-md-6 mb-3">
				<label for="nova_senha" class="form-label">Nova Senha</label>
				<input type="password" class="form-control" id="nova_senha" name="nova_senha" required>
			</div>
			<div class="col-md-6 mb-3">
				<label for="confirma_nova_senha" class="form-label">Confirma Nova Senha</label>
				<input type="password" class="form-control" id="confirma_nova_senha" name="confirma_nova_senha" required>
			</div>
		</div>
		<div class="col-12">
			<button type="submit" id="salvar" disabled class="btn btn-primary">Salvar</button>
		</div>
	</form>
</div>

<script>
	const nova_senha = document.querySelector('#nova_senha')
	const confirma_nova_senha = document.querySelector('#confirma_nova_senha')
	const salvar = document.querySelector('#salvar')

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

</script>
