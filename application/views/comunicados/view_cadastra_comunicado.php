<div class="container mt-5">

	<div id="cadastro">
		<h3 class="mt-3 mb-3">Cadastrar Comunicado</h3>

		<form action="<?= base_url('comunicado/cadastra_comunicado')?>" method="post" enctype="multipart/form-data">
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
				<input type="text" class="form-control" placeholder="Adicione um link aqui (opcional)" id="link" name="link" maxlength="255" required>
			</div>

			<div class="row g-1 mb-3">
				<label for="imagem" class="form-label">Imagem</label>
				<input type="file" class="form-control" id="imagem" name="imagem" required>
			</div>

			<div class="d-flex justify-content-end">
				<button type="submit" id="salvar" class="btn btn-primary">Salvar</button>
			</div>
		</form>
	</div>

</div>
