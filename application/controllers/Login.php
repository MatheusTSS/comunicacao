<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if ($this->session->userdata('usuario')) {
			return redirect('usuario');
		}
	}

	public function index(){
		$this->load->view('login/view_login');
	}

	public function autentica()
	{
		imprime([$_POST]);

		// verificar se post existe e se não esta vazio

		// validações

		// criar session

		// redirecionar para Usuario


	}
}
