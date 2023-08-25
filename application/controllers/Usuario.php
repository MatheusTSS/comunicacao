<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if (!$this->session->userdata('usuario')) {
			return redirect('login');
		}
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
		imprime([$_POST]);
	}
}
