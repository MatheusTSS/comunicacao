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
		$comunicado['sequencia'] = $sequencia === false ? 1 : ++$sequencia;

		imprime([$_POST, $_FILES, $comunicado, $sequencia]);
	}

	public function view_lista_comunicados()
	{
		imprime(['public function view_lista_comunicados()']);
	}
}
