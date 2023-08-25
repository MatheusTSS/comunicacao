<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if ($this->session->userdata('usuario')) {
			return redirect('usuario');
		}
		$this->load->model('model_login');
	}

	public function index(){
		$this->load->view('login/view_login');
	}

	public function autentica()
	{
		
		// verificar se post existe e se não esta vazio
		if (!isset($_POST) || empty($_POST)) {
			return redirect('login');
		}
		
		// validações
		$this->form_validation->set_rules('usuario', 'Usuário', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
		
		if ($this->form_validation->run() === FALSE){  
			return redirect('login');
        }
		
		$usuario = $this->input->post('usuario');
		$senha = $this->input->post('senha');

		$dados_usuario = $this->model_login->busca_dados_usuario($usuario);

		if (!$dados_usuario) {
			add_flash_message('danger', 'Usuário ou senha inválido. Por favor, verifique as informações inseridas e tente novamente.');
			return redirect('login');
		}

		if (!password_verify($senha, $dados_usuario['senha'])) {
			add_flash_message('danger', 'Usuário ou senha inválido. Por favor, verifique as informações inseridas e tente novamente.');
			return redirect('login');
		}

		// criar session
		unset($dados_usuario['senha']);
		$this->session->set_userdata('usuario', $dados_usuario);

		// redirecionar para Usuario
		return redirect('usuario');
	}
}
