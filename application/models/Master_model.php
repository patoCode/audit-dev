<?php

class Master_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function getAll($tabla){
		$this->db->from($tabla);
		$this->db->where('estado', STATUS_ACTIVE);
  		$this->db->where('estado_reg', CURRENT_STATUS);
        $query = $this->db->get();
        if($query->num_rows() > 0)
            return $query->result();
        else
            return null;

	}
	function delete($id, $table, $idField, $username)
	{
		return $this->db->update($table,array('ESTADO'=>STATUS_INACTIVE,'ESTADO_REG' => DELETE_STATUS,'FECHA_MOD' => date("Y-m-d H:i:s"),'USER_MOD' => $username),array($idField => $id));
	}
	function update($id, $table, $idField, $data)
	{
		if(!isset($data['FECHA_MOD'])){
			$data['FECHA_MOD'] = date("Y-m-d H:i:s");
		}
		return $this->db->update($table,$data,array($idField => $id));
	}
	public function add($table, $data)
	{
		return $this->db->insert($table, $data);

	}
}