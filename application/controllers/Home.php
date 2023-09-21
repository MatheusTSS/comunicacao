<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if ($this->session->userdata('usuario')) {
			return redirect('usuario');
		}
		$this->load->model('model_comunicado');
	}

	public function index(){
	/* 	$dados = $this->model_comunicado->busca_comunicados();
		if ($dados) {
			$data['comunicados'] = json_encode($dados);
		} */
		$this->load->view('home');
	}

	public function carrega_comunicados()
	{
		$dados = $this->model_comunicado->busca_comunicados();
		if ($dados) {
			resposta_json('success', 'Dados obtidos com sucesso', $dados);
		} else {
			resposta_json('error', 'Nenhum comunicado encontrado');
		}

	}
}
