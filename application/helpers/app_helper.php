<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('imprime')) {
	function imprime($dados = [], $var_dump = false, $die = true)
	{
		echo '<pre>';

		if ($var_dump) {
			foreach ($dados as $d) {
				var_dump($d);
				echo '<hr>';
			}
		} else {
			foreach ($dados as $d) {
				print_r($d);
				echo '<hr>';
			}
		}

		echo '</pre>';

		if ($die) {
			die();
		}
	}
}

// ################################################################################################################################

if (!function_exists('template')) {
	function template($dados = [])
	{
		$CI =& get_instance();

		if (!isset($dados['tela'])) {
			$dados['tela']= 'usuarios/view_home';
		}
		
		$CI->load->view('template', $dados);
	}
}

// ################################################################################################################################
