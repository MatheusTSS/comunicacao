<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	function busca_dados_usuario($usuario)
	{
		$sql = "SELECT * FROM usuarios WHERE usuario = ?";
		
		$query = $this->db->query($sql, array($usuario));

		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

}
