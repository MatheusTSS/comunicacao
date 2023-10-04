<div class="mt-5">
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
			let sequencia_up = '<button disabled class="btn btn-primary w-100"><i class="fa-solid fa-arrow-up-1-9"></i></i></button>'	
			if (i !== 0) {
				sequencia_up = `<button class="btn btn-primary w-100" onclick="altera_sequencia_up(${comunicados[i].id})" ><i class="fa-solid fa-arrow-up-1-9"></i></i></button>`
			}

			let sequencia_down = '<button disabled class="btn btn-success mt-auto w-100"><i class="fa-solid fa-arrow-down-1-9"></i></i></button>'
			if ((comunicados.length - 1) !== i) {
				sequencia_down = `<button class="btn btn-success mt-auto w-100" onclick="altera_sequencia_down(${comunicados[i].id})"><i class="fa-solid fa-arrow-down-1-9"></i></i></button>`
			} 

			let comunicado_link = `<a class="ms-2" style="font-size: 18px;" href="${comunicados[i].link}" target="_blank" rel="noopener noreferrer">Link</a>`
			if (comunicados[i].link == '') {
				comunicado_link = ``
			}

			comunicado += 
			`
			<div class="m-3">
				<div class="d-flex justify-content-between">
					<div class="align-items-start m-1" style="width: 15rem;">
						<img style="float:right" class="rounded m-1" src="${base_url+comunicados[i].diretorio}"height="130px"  alt="">
					</div>

					<div class="align-items-start m-1 border" style="width: 90%; border-radius: 10px;">
						<span class="ms-2" style="font-size: 30px; font-weight: 500;">${comunicados[i].titulo}</span>
						<span class="me-2" style="float: right; font-size: 35px; font-weight: 500;">${comunicados[i].sequencia}</span>
						<br><br><br>
						${comunicado_link}
					</div>
					
					<div class="d-flex flex-column align-items-end m-1">
						${sequencia_up}
						<a class="btn btn-secondary mt-auto w-100" href="${base_url+'comunicado/view_exibe_comunicado/'+comunicados[i].id}" target="_self" rel="noopener noreferrer"><i class="fa-solid fa-eye"></i></a>
						${sequencia_down}
					</div>
				</div>
			</div>
			`			
		}
		//console.log(comunicado);
		document.querySelector('#comunicados').innerHTML = comunicado
	}

	async function altera_sequencia_up(comunicado_id)
	{
		const data = new FormData();
		data.append('comunicado_id', comunicado_id);

		try {
			let response = await fetch(base_url + 'comunicado/altera_sequencia_up', {
				method: 'POST',
				body: data
			})
			let result = await response.json()
			lista_comunicados()
			
		} catch (error) {
			console.log(error)
			
		}
	}

	async function altera_sequencia_down(comunicado_id)
	{
		const data = new FormData();
		data.append('comunicado_id', comunicado_id);

		try {
			let response = await fetch(base_url + 'comunicado/altera_sequencia_down', {
				method: 'POST',
				body: data
			})
			let result = await response.json()
			lista_comunicados()
			
		} catch (error) {
			console.log(error)
			
		}

	}
</script>
