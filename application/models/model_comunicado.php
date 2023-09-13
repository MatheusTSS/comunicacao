<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_comunicado extends CI_Model
{
	function trans_start(){
		$this->db->trans_start();
	}
	
	function trans_complete()
	{
		$this->db->trans_complete();
	
		if ($this->db->trans_status() === FALSE) {
			return false;
		}
		return true;
	}

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

	function cadastra_comunicado($comunicado)
	{
		$this->db->insert('comunicados', $comunicado);
		return $this->db->insert_id();
	}

	function atualiza_diretorio($id, $diretorio)
	{
		$this->db->set('diretorio', $diretorio);
		$this->db->where('id', $id);
		$this->db->update('comunicados');
	}

	function busca_comunicados()
	{
		$sql = "SELECT * FROM comunicados 
				WHERE ativo = 1
				ORDER BY sequencia ASC";

		$query = $this->db->query($sql);

		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	function busca_dados_comunicado($id)
	{
		$sql = "SELECT * FROM comunicados WHERE id = ?";
		
		$query = $this->db->query($sql, array($id));

		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function busca_dados_comunicado_sequencia($sequencia)
	{
		$sql = "SELECT * FROM comunicados WHERE sequencia = ?";
		
		$query = $this->db->query($sql, array($sequencia));

		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}

	function altera_sequencia($id, $sequencia)
	{
		$this->db->set('sequencia', $sequencia);
		$this->db->where('id', $id);
		$this->db->update('comunicados');
	}

}
