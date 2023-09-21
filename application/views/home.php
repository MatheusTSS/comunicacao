<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('_layout/header') ?>

<body>
	<div class="d-flex justify-content-end">
		<a href="<?= base_url('login') ?>" target="_blank" rel="noopener noreferrer">Acesso Restrito</a>
	</div>

	<div class="m-2 container-fluid">
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
					<div class="mb-3">
						<label for="descricao" class="form-label">Descrição</label>
						<textarea class="form-control" id="descricao" disabled rows="4"></textarea>
					</div>
					<div class="mb-3">
						<label for="link" class="form-label">Link</label>
						<input type="text" class="form-control" id="link" disabled value="">
					</div>
				</form>
			</div>
		</div>
		<div class="d-flex justify-content-between">
			<button type="button" class="btn btn-primary m-1">'<-'</button>
			<button type="button" class="btn btn-primary m-1">'->'</button>
		</div>
	</div>

	<?php $this->load->view('_layout/scripts') ?>

</body>

</html>
<script>
	const base_url = '<?= base_url() ?>'
	let comunicados = ''
	window.onload = () => carrega_comunicados();

	async function carrega_comunicados() {
		try {
			let response = await fetch(base_url + 'home/carrega_comunicados')
			let result = await response.json()

			if (result.status == 'success') {
				comunicados = result.data
				document.querySelector('#titulo').value = comunicados[0].titulo
				document.querySelector('#descricao').value = comunicados[0].descricao
				document.querySelector('#link').value = comunicados[0].link
				document.querySelector('#imagem').src = base_url+comunicados[0].diretorio
			} else {

			}
		} catch (error) {
			console.log(error)
		}
	}
	setTimeout(() => {
		//console.log("Delayed for 1 second.");
		console.log(comunicados)
	}, "1000");

</script>
