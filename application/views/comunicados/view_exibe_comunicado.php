<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('_layout/header') ?>

<body>

	<div class="m-2 container-fluid">
		<div class="mt-3">
			<div class="row">
				<!-- Coluna 1: Imagem (50% da largura) -->
				<div class="col-md-6" style="background-color: #f0f0f0; padding: 0;">
					<!-- Conteúdo da coluna 1 (Sua imagem aqui) -->
					<!-- <img src="<?php //echo base_url($comunicado['diretorio']) 
									?>" alt="Imagem" style="width: auto; height: 90vh;"> -->
					<img src="<?= base_url($comunicado['diretorio']) ?>" alt="Imagem" style=" width: 100%; height: 100%; max-height: 600px;">
				</div>
	
				<!-- Coluna 2: Formulário (40% da largura) -->
				<div class="col-md-5" style="background-color: #e0e0e0;">
					<!-- Conteúdo da coluna 2 -->
					<form>
						<div class="mb-3">
							<label for="titulo" class="form-label">Título</label>
							<input type="text" class="form-control" id="titulo" disabled value="<?= $comunicado['titulo'] ?>">
						</div>
						<div class="mb-3">
							<label for="descricao" class="form-label">Descrição</label>
							<textarea class="form-control" id="descricao" disabled rows="4"><?= $comunicado['descricao'] ?></textarea>
						</div>
						<div class="mb-3">
							<label for="link" class="form-label">Link</label>
							<input type="text" class="form-control" id="link" disabled value="<?= $comunicado['link'] ?>">
						</div>
					</form>
				</div>
	
				<!-- Coluna 3: Botões (10% da largura) -->
				<div class="col-md-1" style="background-color: #c0c0c0;">
					<!-- Conteúdo da coluna 3 -->
					<div class="d-flex flex-column justify-content-start align-items-center" style="height: 100%;">
						<button id="fechar" class="btn btn-danger m-1" style="width: 80px;"><i class="fa fa-close"></i></button>
						<div style="margin-top: 35vh;"></div>
						<button id="editar" class="btn btn-primary m-1" style="width: 80px;"><i class="fa fa-edit"></i></button>
						<button id="salvar" disabled class="btn btn-success m-1 d-none" style="width: 80px;"><i class="fa fa-save"></i></button>
	
						<!-- Button trigger modal -->
						<button id="modal_remover" type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 80px;">
							<i class="fa fa-trash"></i>
						</button>
	
						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="exampleModalLabel">Remover Comunicado</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<span>Deseja realmente remover este comunicado?</span>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
										<button id="remover" type="button" class="btn btn-success">Sim</button>
									</div>
								</div>
							</div>
						</div>
	
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('_layout/scripts') ?>

</body>

</html>

<script>
	const comunicado_id = '<?= $comunicado['id'] ?>'
	const sequencia = '<?= $comunicado['sequencia'] ?>'
	const base_url = '<?= base_url() ?>'

	document.querySelector('#fechar').addEventListener('click', () => {
		window.location.href = base_url + "comunicado/view_lista_comunicados";
	})

	document.querySelector('#editar').addEventListener('click', () => {
		document.querySelector('#titulo').disabled = false
		document.querySelector('#descricao').disabled = false
		document.querySelector('#link').disabled = false
		document.querySelector('#salvar').classList.remove('d-none')
		document.querySelector('#editar').classList.add('d-none')
		document.querySelector('#modal_remover').classList.add('d-none')
		valida_dados()
	})

	document.querySelector('#salvar').addEventListener('click', () => {
		document.querySelector('#titulo').disabled = true
		document.querySelector('#descricao').disabled = true
		document.querySelector('#link').disabled = true
		document.querySelector('#salvar').classList.add('d-none')
		document.querySelector('#editar').classList.remove('d-none')
		document.querySelector('#modal_remover').classList.remove('d-none')
		edita_comunicado()
	})

	document.querySelector('#remover').addEventListener('click', () => {
		remove_comunicado()
	})

	async function remove_comunicado() {
		const data = new FormData();
		data.append('comunicado_id', comunicado_id);
		data.append('sequencia', sequencia);

		try {
			let response = await fetch(base_url + 'comunicado/remove_comunicado', {
				method: 'POST',
				body: data
			})
			let result = await response.json()
			if (result.status === 'success') {
				window.location.href = base_url + "comunicado/view_lista_comunicados";
			}
		} catch (error) {
			console.log(error)
		}
	}

	async function edita_comunicado() {
		const data = new FormData();
		data.append('comunicado_id', comunicado_id);
		data.append('titulo', document.querySelector('#titulo').value);
		data.append('descricao', document.querySelector('#descricao').value);
		data.append('link', document.querySelector('#link').value);

		try {
			let response = await fetch(base_url + 'comunicado/edita_comunicado', {
				method: 'POST',
				body: data
			})
			let result = await response.json()
			console.log(result)
		} catch (error) {
			console.log(error)
		}
	}

	const titulo = document.querySelector('#titulo')
	const link = document.querySelector('#link')
	const salvar = document.querySelector('#salvar')

	titulo.addEventListener('change', () => {
		valida_dados()
	})

	link.addEventListener('change', () => {
		valida_link()
	})

	function valida_dados() {
		if (valida_titulo()) {
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
</script>
