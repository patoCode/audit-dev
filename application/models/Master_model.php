<?php

class Master_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function delete($id, $table, $idField, $username)
	{
		return $this->db->update($table,array('ESTADO'=>'inactivo','ESTADO_REG' => 'borrado','FECHA_MOD' => date("Y-m-d H:i:s"),'USER_MOD' => $username),array($idField => $id));
	}
}