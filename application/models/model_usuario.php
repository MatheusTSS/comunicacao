<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_usuario extends CI_Model
{

	function altera_senha($id, $senha)
	{
		$this->db->set('senha', $senha);
		$this->db->where('id', $id);
		$this->db->update('usuarios');
	}

	function busca_dados_usuarios()
	{
		$sql = "SELECT id, usuario, ativo FROM usuarios ORDER BY ativo DESC";

		$query = $this->db->query($sql);

		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	function desativa_usuario($id)
	{
		$this->db->trans_start();
		$this->db->set('ativo', 0);
		$this->db->where('id', $id);
		$this->db->update('usuarios');

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			return false;
		}
		return true;
	}

	function ativa_usuario($id)
	{
		$this->db->trans_start();
		$this->db->set('ativo', 1);
		$this->db->where('id', $id);
		$this->db->update('usuarios');

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			return false;
		}
		return true;
	}

	function busca_dados_usuario($usuario)
	{
		$sql = "SELECT * FROM usuarios WHERE usuario = ?";
		
		$query = $this->db->query($sql, array($usuario));

		if ($query->num_rows() > 0) {
			return true;
		}
		return false;
	}

	function cadastra_usuario($dados)
	{
		$this->db->trans_start();
		$this->db->insert('usuarios', $dados);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			return false;
		}
		return true;
	}
}
