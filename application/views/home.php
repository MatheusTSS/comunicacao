<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('_layout/header') ?>

<body>
	<div class="d-flex justify-content-end">
		<a href="<?= base_url('login') ?>" target="_blank" rel="noopener noreferrer">Acesso Restrito</a>
	</div>

	<div id="aviso" class="m-2 container-fluid d-none">
		<div style="text-align: center;" class="alert alert-danger" role="alert">
			Nenhum comunicado cadastrado no momento!
		</div>
	</div>

	<div id="exibicao" class="m-2 container-fluid">
		<div class="row">
			<!-- Coluna 1: Imagem (50% da largura) -->
			<div class="col-md-8" style="background-color: #f0f0f0;">
				<!-- Conteúdo da coluna 1 (Sua imagem aqui) -->
				<img id="imagem" src="" alt="Imagem" style="width: auto; height: 85vh;">
			</div>

			<!-- Coluna 2: Formulário (40% da largura) -->
			<div class="col-md-4" style="background-color: #e0e0e0;">
				<!-- Conteúdo da coluna 2 -->
				<form>
					<div class="mb-3">
						<label for="titulo" class="form-label">Título</label>
						<input type="text" class="form-control" id="titulo" disabled value="">
					</div>
					<div id="div_descricao" class="mb-3">
						<label for="descricao" class="form-label">Descrição</label>
						<textarea class="form-control" id="descricao" disabled rows="4"></textarea>
					</div>
					<div class="mb-3">
						<a id="link" href="#" target="_blank" rel="noopener noreferrer"></a>
					</div>
				</form>
			</div>
		</div>
		<div class="d-flex justify-content-between">
			<button id="anterior" type="button" class="btn btn-primary m-1"><i class="fa-solid fa-arrow-left"></i></button>
			<button id="proximo" type="button" class="btn btn-primary m-1"><i class="fa-solid fa-arrow-right"></i></button>
		</div>
	</div>

	<?php $this->load->view('_layout/scripts') ?>

</body>

</html>
<script>
	const base_url = '<?= base_url() ?>'
	let comunicados = ''
	let atual = 0
	window.onload = () => carrega_comunicados();

	async function carrega_comunicados() {
		try {
			let response = await fetch(base_url + 'home/carrega_comunicados')
			let result = await response.json()

			if (result.status == 'success') {
				comunicados = result.data
				document.querySelector('#titulo').value = comunicados[0].titulo
				if (comunicados[0].descricao == '') {
					document.querySelector('#div_descricao').classList.add('d-none')
				} else {
					document.querySelector('#div_descricao').classList.remove('d-none')
					document.querySelector('#descricao').value = comunicados[0].descricao
				}
				document.querySelector('#link').href = comunicados[0].link
				document.querySelector('#link').textContent = comunicados[0].link
				document.querySelector('#imagem').src = base_url + comunicados[0].diretorio
			} else {
				document.querySelector('#exibicao').classList.add('d-none')
				document.querySelector('#aviso').classList.remove('d-none')
			}
		} catch (error) {
			console.log(error)
		}
	}

	document.querySelector('#proximo').addEventListener('click', () => {
		adiciona_proximo()
	})

	function adiciona_proximo() {

		if ((comunicados.length - 1) == atual) {
			atual = 0
		} else {
			atual++
		}
		document.querySelector('#titulo').value = comunicados[atual].titulo

		if (comunicados[atual].descricao == '') {
			document.querySelector('#div_descricao').classList.add('d-none')
		} else {
			document.querySelector('#div_descricao').classList.remove('d-none')
			document.querySelector('#descricao').value = comunicados[atual].descricao
		}

		document.querySelector('#link').href = comunicados[atual].link
		document.querySelector('#link').textContent = comunicados[atual].link
		document.querySelector('#imagem').src = base_url + comunicados[atual].diretorio
	}

	document.querySelector('#anterior').addEventListener('click', () => {
		adiciona_anterior()
	})

	function adiciona_anterior() {

		if (atual == 0) {
			atual = comunicados.length - 1
		} else {
			atual--
		}

		document.querySelector('#titulo').value = comunicados[atual].titulo
		
		if (comunicados[atual].descricao == '') {
			document.querySelector('#div_descricao').classList.add('d-none')
		} else {
			document.querySelector('#div_descricao').classList.remove('d-none')
			document.querySelector('#descricao').value = comunicados[atual].descricao
		}

		document.querySelector('#link').href = comunicados[atual].link
		document.querySelector('#link').textContent = comunicados[atual].link
		document.querySelector('#imagem').src = base_url + comunicados[atual].diretorio
	}

	setInterval(adiciona_proximo, 15000);
</script>
