<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_comunicado extends CI_Model
{
	function busca_sequencia()
	{
		$sql = "SELECT sequencia 
				FROM comunicados 
				WHERE ativo = 1 
				ORDER BY sequencia DESC 
				LIMIT 1";

		$query = $this->db->query($sql);

		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}
	
}
