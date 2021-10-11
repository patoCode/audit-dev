<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actividad_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getAll()
	{
		$this->db->from('aud_actividad');
		$this->db->where('estado', STATUS_ACTIVE);
  		$this->db->where('estado_reg', CURRENT_STATUS);
        $query = $this->db->get();
        if($query->num_rows() > 0)
            return $query->result();
        else
            return null;
	}
}