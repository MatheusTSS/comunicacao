<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comunicado extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('usuario')) {
			return redirect('login');
		}
		$this->load->model('model_comunicado');
	}

	public function index()
	{
		return redirect('usuario');
	}

	public function view_cadastra_comunicado()
	{
		$dados['tela'] = 'comunicados/view_cadastra_comunicado';
		template($dados);
	}

	public function cadastra_comunicado()
	{
		// verificar se post existe e se não esta vazio
		if (!isset($_POST) || empty($_POST)) {
			return redirect('usuario');
		}

		$dados_usuario = $this->session->userdata('usuario');

		$sequencia = $this->model_comunicado->busca_sequencia();

		$comunicado['usuario_id'] = $dados_usuario['id'];
		$comunicado['titulo'] = $this->input->post('titulo');
		$comunicado['descricao'] = $this->input->post('descricao');
		$comunicado['link'] = $this->input->post('link');
		$comunicado['sequencia'] = $sequencia === false ? 1 : ++$sequencia['sequencia'];

		$this->model_comunicado->trans_start();

		// cadastrar comunicado
		$comunicado_id = $this->model_comunicado->cadastra_comunicado($comunicado);

		// fazer upload
		$path = $_FILES['imagem']['name'][0];
		$nome_comunicado = $comunicado_id . '.' . pathinfo($path, PATHINFO_EXTENSION);
		$_FILES['imagem']['name'][0] = $nome_comunicado;
		$upload = upload_multiple_files('uploads/', $_FILES['imagem']);

		// atualizar diretorio na tabela comunicados
		$this->model_comunicado->atualiza_diretorio($comunicado_id, "uploads/$nome_comunicado");

		$sucesso = $this->model_comunicado->trans_complete();

		if ($sucesso) {
			add_flash_message('success', 'Comunicado cadastrado com sucesso!');
			return redirect('comunicado/view_lista_comunicados');
		} else {
			add_flash_message('danger', 'Erro ao cadastrar comunicado!');
			return redirect('comunicado/view_cadastra_comunicado');
		}
	}

	public function view_lista_comunicados()
	{
		$dados['tela'] = 'comunicados/view_lista_comunicados';
		template($dados);
	}

	public function lista_comunicados()
	{
		$dados = $this->model_comunicado->busca_comunicados();
		if (!$dados) {
			resposta_json('error', 'Não há comunicados cadastrados.');
		} else {
			resposta_json('success', 'Dados retornados com sucesso.', $dados);
		}
	}

	public function altera_sequencia_up()
	{
		// verificar se post existe e se não esta vazio
		if (!isset($_POST) || empty($_POST)) {
			return redirect('usuario');
		} else {
			$comunicado_id = $this->input->post('comunicado_id');
			$comunicado = $this->model_comunicado->busca_dados_comunicado($comunicado_id);
			$comunicado_sequencia_menor = $this->model_comunicado->busca_dados_comunicado_sequencia(--$comunicado['sequencia']);
			if ($comunicado_sequencia_menor) {

				$this->model_comunicado->trans_start();

				$this->model_comunicado->altera_sequencia($comunicado_sequencia_menor['id'], ++$comunicado['sequencia']);
				$this->model_comunicado->altera_sequencia($comunicado['id'], $comunicado_sequencia_menor['sequencia']);

				$sucesso = $this->model_comunicado->trans_complete();
				if ($sucesso) {
					resposta_json('success', 'Sucesso ao alterar sequencia.');
				} else {
					resposta_json('error', 'Erro ao alterar sequencia.');
				}
			} else {
				resposta_json('error', 'Erro ao alterar sequencia.');
			}
		}
	}

	public function altera_sequencia_down()
	{
		// verificar se post existe e se não esta vazio
		if (!isset($_POST) || empty($_POST)) {
			return redirect('usuario');
		} else {
			$comunicado_id = $this->input->post('comunicado_id');
			$comunicado = $this->model_comunicado->busca_dados_comunicado($comunicado_id);
			$comunicado_sequencia_maior = $this->model_comunicado->busca_dados_comunicado_sequencia(++$comunicado['sequencia']);
			if ($comunicado_sequencia_maior) {

				$this->model_comunicado->trans_start();

				$this->model_comunicado->altera_sequencia($comunicado_sequencia_maior['id'], --$comunicado['sequencia']);
				$this->model_comunicado->altera_sequencia($comunicado['id'], $comunicado_sequencia_maior['sequencia']);

				$sucesso = $this->model_comunicado->trans_complete();
				if ($sucesso) {
					resposta_json('success', 'Sucesso ao alterar sequencia.');
				} else {
					resposta_json('error', 'Erro ao alterar sequencia.');
				}
			} else {
				resposta_json('error', 'Erro ao alterar sequencia.');
			}
		}
	}

	public function view_exibe_comunicado($comunicado_id)
	{
		$dados['comunicado'] = $this->model_comunicado->busca_dados_comunicado($comunicado_id);
		if ($dados['comunicado'] === false) {
			return redirect('comunicado/view_lista_comunicados');
		}
		$this->load->view('comunicados/view_exibe_comunicado', $dados);
	}

	public function edita_comunicado()
	{
		// verificar se post existe e se não esta vazio
		if (!isset($_POST) || empty($_POST)) {
			return redirect('usuario');
		} else {
			$comunicado_id = $this->input->post('comunicado_id');
			$titulo = $this->input->post('titulo');
			$descricao = $this->input->post('descricao');
			$link = $this->input->post('link');

			$this->model_comunicado->edita_comunicado($comunicado_id, $titulo, $descricao, $link);
			resposta_json('success', 'Sucesso ao editar comunicado.');
		}
	}

	public function remove_comunicado()
	{
		// verificar se post existe e se não esta vazio
		if (!isset($_POST) || empty($_POST)) {
			return redirect('usuario');
		} else {
			$comunicado_id = $this->input->post('comunicado_id');
			$sequencia = $this->input->post('sequencia');
			$sequencia_db = $this->model_comunicado->busca_sequencia();

			$this->model_comunicado->trans_start();
			if ($sequencia === $sequencia_db['sequencia']) {
				$this->model_comunicado->remove_comunicado($comunicado_id);
			} else {
				$this->model_comunicado->remove_comunicado($comunicado_id);
				for ($i=$sequencia; $i <= $sequencia_db['sequencia']; $i++) {
					$nova_sequencia = $i;
					$this->model_comunicado->remove_altera_sequencia($i, --$nova_sequencia);
				}
			}
			$sucesso = $this->model_comunicado->trans_complete();
			

			//$this->model_comunicado->remove_comunicado($comunicado_id);
			resposta_json('success', 'Sucesso ao remover comunicado.', $sucesso);
		}
	}
}
