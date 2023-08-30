<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if (!$this->session->userdata('usuario')) {
			return redirect('login');
		}
		$this->load->model('model_usuario');
	}

	public function index(){
		template();
	}

	public function logout()
	{
		$this->session->unset_userdata('usuario');
		return redirect('home');
	}

	public function view_altera_senha()
	{
		$dados['tela'] = 'usuarios/view_altera_senha';
		template($dados);
	}

	public function altera_senha()
	{
		// verificar se post existe e se não esta vazio
		if (!isset($_POST) || empty($_POST)) {
			return redirect('usuario');
		}

		$nova_senha = $this->input->post('nova_senha');
		$confirma_nova_senha = $this->input->post('confirma_nova_senha');

		if ($nova_senha != $confirma_nova_senha) {
			return redirect('usuario');
		}

		$dados_usuario = $this->session->userdata('usuario');

		$nova_senha = password_hash($nova_senha, PASSWORD_DEFAULT);

		$this->model_usuario->altera_senha($dados_usuario['id'], $nova_senha);

		add_flash_message('success', 'Senha alterada com sucesso!');

		return redirect('usuario');
	}

	public function view_usuarios()
	{
		$dados['tela'] = 'usuarios/view_usuarios';
		template($dados);
	}

	public function lista_usuarios()
	{
		$dados = $this->model_usuario->busca_dados_usuarios();
		resposta_json('success', 'Dados retornados com sucesso.', $dados);
	}

	public function desativa_usuario()
	{
		// verificar se post existe e se não esta vazio
		if (!isset($_POST) || empty($_POST)) {
			return redirect('usuario');
		}

		$id = $this->input->post('id');
		$sucesso = $this->model_usuario->desativa_usuario($id);

		if ($sucesso) {
			resposta_json('success', 'Usuário desativado com sucesso!');
		} else {
			resposta_json('error', 'Erro ao desativar usuário!');
		}
	}

	public function ativa_usuario()
	{
		// verificar se post existe e se não esta vazio
		if (!isset($_POST) || empty($_POST)) {
			return redirect('usuario');
		}

		$id = $this->input->post('id');
		$sucesso = $this->model_usuario->ativa_usuario($id);

		if ($sucesso) {
			resposta_json('success', 'Usuário ativado com sucesso!');
		} else {
			resposta_json('error', 'Erro ao ativar usuário!');
		}
	}
}
