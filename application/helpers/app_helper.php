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

// GRAVAR MENSAGENS TEMPORARIAS 
if (!function_exists('add_flash_message')) {
    /**
     * Adiciona uma mensagem temporária na sessão.
     *
     * @param string $type     Tipo da mensagem: 'success', 'warning' ou 'danger'.
     * @param string $message  Mensagem a ser exibida.
     */
    function add_flash_message($type, $message)
    {
        $CI = &get_instance();

        $flash_messages = $CI->session->flashdata('flash_messages') ?: array();

        if (!isset($flash_messages[$type])) {
            $flash_messages[$type] = array();
        }

        $flash_messages[$type][] = $message;

        $CI->session->set_flashdata('flash_messages', $flash_messages);
    }
}

// OBTER AS MENSAGENS TEMPORARIAS NA VIEW
if (!function_exists('get_flash_messages')) {

    function get_flash_messages()
    {
        $CI = &get_instance();

        $flash_messages =  $CI->session->flashdata('flash_messages') ?: array();

        if (!empty($flash_messages)) {
            foreach ($flash_messages as $type => $messages) {
                foreach ($messages as $message) {
                    echo '<div class="alert alert-' . $type . '">' . $message . '</div>';
                }
            }
        }
    }
}

/*  no controller
	public function teste()
	{
		add_flash_message('success', 'Usuário foi cadastrado com sucesso.');
		add_flash_message('warning', 'Aviso: Algo não está certo.');
		add_flash_message('danger', 'Erro: Ocorreu um erro no processo.');
		return redirect('usuario');
	}

    ----------------

    na view 
    <?php get_flash_messages()?>
*/

// ################################################################################################################################
