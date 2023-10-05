<div class="container mt-5">

	<div id="cadastro" style="margin-top: 12vh;">
		<form action="<?= base_url('comunicado/cadastra_comunicado') ?>" method="post" enctype="multipart/form-data">
			<div class="row g-1 mb-3">
				<label for="titulo" style="font-weight: 700; font-size: 1.1em;" class="form-label"><span class="text-danger">* </span>Título</label>
				<input type="text" class="form-control" id="titulo" name="titulo" maxlength="100" required>
			</div>

			<div class="row g-1 mb-3">
				<label for="descricao" style="font-weight: 700; font-size: 1.1em;">Descrição</label>
				<textarea class="form-control" placeholder="Escreva sua descrição aqui (opcional)" id="descricao" name="descricao" rows="3" maxlength="255"></textarea>
			</div>

			<div class="row g-1 mb-3">
				<label for="link" class="form-label" style="font-weight: 700; font-size: 1.1em;">Link</label>
				<input type="text" class="form-control" placeholder="Adicione um link aqui (opcional)" id="link" name="link" maxlength="255">
			</div>

			<div class="row g-1 mb-3">
				<label for="imagem" class="form-label" style="font-weight: 700; font-size: 1.1em;"><span class="text-danger">* </span>Imagem</label>
				<input type="file" class="form-control" id="imagem" name="imagem[]" required>
			</div>

			<div class="d-flex justify-content-end mt-5">
				<button type="submit" id="salvar" disabled class="btn btn-primary btn-lg">Salvar <i class="fa-regular fa-floppy-disk ms-1"></i></button>
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
		let v_titulo = valida_titulo()
		let v_imagem = valida_imagem()
		if (v_titulo && v_imagem) {
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
			const width = imagem.clientWidth;
			const height = imagem.clientHeight;

			console.log(imagem.naturalHeight)
			console.log(width)
			console.log(height)

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
