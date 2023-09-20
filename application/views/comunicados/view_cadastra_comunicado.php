<div class="container mt-5">

	<div id="cadastro">
		<h3 class="mt-3 mb-3">Cadastrar Comunicado</h3>

		<form action="<?= base_url('comunicado/cadastra_comunicado') ?>" method="post" enctype="multipart/form-data">
			<div class="row g-1 mb-3">
				<label for="titulo" class="form-label"><span class="text-danger">* </span>Título</label>
				<input type="text" class="form-control" id="titulo" name="titulo" maxlength="100" required>
			</div>

			<div class="row g-1 mb-3">
				<label for="descricao">Descrição</label>
				<textarea class="form-control" placeholder="Escreva sua descrição aqui (opcional)" id="descricao" name="descricao" rows="3" maxlength="255"></textarea>
			</div>

			<div class="row g-1 mb-3">
				<label for="link" class="form-label">Link</label>
				<input type="text" class="form-control" placeholder="Adicione um link aqui (opcional)" id="link" name="link" maxlength="255">
			</div>

			<div class="row g-1 mb-3">
				<label for="imagem" class="form-label"><span class="text-danger">* </span>Imagem</label>
				<input type="file" class="form-control" id="imagem" name="imagem[]" required>
			</div>

			<div class="d-flex justify-content-end">
				<button type="submit" id="salvar" disabled class="btn btn-primary">Salvar</button>
			</div>
		</form>
	</div>

</div>

<script>
	const titulo = document.querySelector('#titulo')
	const link = document.querySelector('#link')
	const imagem = document.querySelector('#imagem')
	const salvar = document.querySelector('#salvar')

	titulo.addEventListener('change', () => {
		valida_dados()
	})

	link.addEventListener('change', () => {
		valida_link()
	})

	imagem.addEventListener('input', () => {
		valida_dados()
	})

	function valida_dados() {
		if (valida_titulo() && valida_imagem()) {
			salvar.disabled = false;
		} else {
			salvar.disabled = true;
		}
	}

	function valida_titulo() {
		titulo.value = titulo.value.trim()

		if (titulo.value.length > 0 && titulo.value.length < 101) {
			return true
		} else {
			return false
		}
	}

	function valida_link() {
		if (link.value) {
			try {
				let url = new URL(link.value)
				return true
			} catch (err) {
				link.value = ''
				return false
			}
		}
		return false
	}

	function valida_imagem() {
		if (!imagem.value) {
			return false
		} else {
			const tamanho = imagem.files[0].size / 1024 / 1024; // para mb

			if (tamanho > 3) {
				imagem.value = ''
				return false
			}

			const caminhoArquivo = imagem.value;
			const extensao = caminhoArquivo.match(/\.[0-9a-z]+$/i)[0];

			if (extensao.toLowerCase() == '.png' || extensao.toLowerCase() == '.jpg' || extensao.toLowerCase() == '.jpeg') {
				return true
			} else {
				imagem.value = ''
				return false
			}
		}
	}
</script>
