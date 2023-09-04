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
		imprime([$_POST, $_FILES]);
	}

	public function view_lista_comunicados()
	{
		imprime(['public function view_lista_comunicados()']);
	}

}
