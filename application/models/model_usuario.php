<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_usuario extends CI_Model {

	function altera_senha($id, $senha)
	{
		$this->db->set('senha', $senha);
		$this->db->where('id', $id);
		$this->db->update('usuarios');
	}

	function busca_dados_usuarios()
	{
		$sql = "SELECT id, usuario, ativo FROM usuarios";
		
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

}
