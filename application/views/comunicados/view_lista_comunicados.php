<div class="container mt-5">
	<h3 class="mt-3 mb-3">Listagem de Comunicados</h3>
	<div id="comunicados"></div>
</div>

<script>
	window.onload = () => lista_comunicados();
	const base_url = '<?= base_url() ?>'

	async function lista_comunicados() {

		try {

			let response = await fetch(base_url + 'comunicado/lista_comunicados')
			let result = await response.json()
			await renderiza_conponentes(result.data)
			//console.log(result)
			//await exibe_tabela_usuario(result.data)

		} catch (error) {
			console.log(error)
		}
	}

	async function renderiza_conponentes(comunicados){
		document.querySelector('#comunicados').innerHTML = ''
		let comunicado = ''

		for (let i = 0; i < comunicados.length; i++) {
			//console.log(comunicados[i])
			comunicado += 
			`
			<div class="m-3">
				<div class="d-flex justify-content-between">
					<div class="align-items-start m-1" style="width: 15rem;">
						<img style="float:right" class="rounded m-1" src="${base_url+comunicados[i].diretorio}"height="130px"  alt="">
					</div>

					<div class="align-items-start m-1 border" style="width: 90%; border-radius: 10px;">
						<span class="ms-2" style="font-size: 35px; font-weight: 500;">${comunicados[i].titulo}</span>
						<span class="me-2" style="float: right; font-size: 35px; font-weight: 500;">${comunicados[i].sequencia}</span>
						<br><br>
						<a class="ms-2" href="${comunicados[i].link}" target="_blank" rel="noopener noreferrer">Link</a>
					</div>
					
					<div class="d-flex flex-column align-items-end m-1">
						<button class="btn btn-primary w-100"><i class="fa-solid fa-arrow-up-1-9"></i></i></button>
						<button class="btn btn-secondary mt-auto w-100"><i class="fa-solid fa-eye"></i></button>
						<button class="btn btn-success mt-auto w-100"><i class="fa-solid fa-arrow-down-1-9"></i></i></button>
					</div>
				</div>
			</div>
			`			
		}
		//console.log(comunicado);
		document.querySelector('#comunicados').innerHTML = comunicado
	}
</script>
