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
                    echo '<div class="alert alert-' . $type . ' mt-2">' . $message . '</div>';
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

// RESPOSTA A REQUISIÇÕES AJAX
if (!function_exists('resposta_json')) {
    function resposta_json($status, $message, $data = [])
    {
        $resposta['status'] = $status;
        $resposta['message'] = $message;
        $resposta['data'] = $data;
        echo json_encode($resposta);
    }
}

// ################################################################################################################################

// UPLOAD DE ARQUIVOS
if (!function_exists('upload_multiple_files')) {
    function upload_multiple_files($path, $userfile)
    {
        $ci = get_instance();
        $status = true; // Variável para rastrear o status do upload

        if (!is_dir($path)) {
            mkdir($path, 0777, TRUE);
        }

        $cont = count($userfile['name']); // Pega quantos arquivos foram enviados

        $upload_config = array(
            'upload_path' => $path,
            'allowed_types' => 'jpg|jpeg|png',
            'max_size' => 1024 * 1024 * 4 // 4MB
        );

        for ($i = 0; $i < $cont; $i++) {
            if (!is_null($userfile['name'][$i]) && $userfile['name'][$i] != '') {
                $_FILES['arquivo']['name']     = $userfile['name'][$i];
                $_FILES['arquivo']['type']     = $userfile['type'][$i];
                $_FILES['arquivo']['tmp_name'] = $userfile['tmp_name'][$i];
                $_FILES['arquivo']['error']    = $userfile['error'][$i];
                $_FILES['arquivo']['size']     = $userfile['size'][$i];

                if (!empty($_FILES['arquivo'])) {
                    $ci->load->library('upload', $upload_config);
                    if (!$ci->upload->do_upload('arquivo')) {
                        $status = false; // Se um upload falhar, muda o status para false
                    }
                }
            }
        }
        return $status; // Retorna o status final do upload
    }
}

// ################################################################################################################################

// ENCRYPT
if (!function_exists('encode')) {

    function encode($valor)
    {
        $CI = &get_instance();
		$CI->load->library('encrypt');
		$encrypted_string = $CI->encrypt->encode($valor);
		return $encrypted_string; 
    }
}

// DECRYPT
if (!function_exists('decode')) {

    function decode($valor)
    {
        $CI = &get_instance();
		$CI->load->library('encrypt');
		$decrypted_string = $CI->encrypt->decode($valor);
		return $decrypted_string; 
    }
}

//################################################################################################################################
