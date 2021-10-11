<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function search($key)
	{
		$this->db->select('ID_CLIENTE as id, CONCAT(RAZON_SOCIAL," - ",NIT) as text');
  		$this->db->from('aud_cliente cl');
        $this->db->like('CONCAT(NIT," ", RAZON_SOCIAL)', $key);
		$this->db->where('estado', STATUS_ACTIVE);
  		$this->db->where('estado_reg', CURRENT_STATUS);
        $query = $this->db->get();
        if($query->num_rows() > 0)
            return $query->result_array();
        else
            return null;
	}
	public function getById($id)
	{
		$this->db->select('cl.*, p.PAIS,c.CIUDAD, ci.CODIGO_CIUDAD as EXP');
  		$this->db->from('aud_cliente cl');
  		$this->db->join('aud_pais p', 'p.ID_PAIS = cl.ID_PAIS');
  		$this->db->join('aud_ciudad c', 'c.ID_CIUDAD = cl.ID_CIUDAD', 'left');
  		$this->db->join('aud_ciudad ci', 'ci.ID_CIUDAD = cl.EXPEDIDO_EN', 'left');
  		$this->db->join('aud_sociedad s', 's.ID_SOCIEDAD = cl.ID_SOCIEDAD');
        $this->db->where('cl.ID_CLIENTE', $id);
        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row();
        else
            return null;
	}
	public function getActividades($id)
	{
		$this->db->select('cla.ID_CLI_ACT, a.ACTIVIDAD, a.ACTIVIDAD_ECONOMICA as actEconomica, a.MES_CIERRE');
  		$this->db->from('aud_cliente cl');
  		$this->db->join('aud_cliente_actividad cla', 'cla.ID_CLIENTE = cl.ID_CLIENTE');
  		$this->db->join('aud_actividad a', 'a.ID_ACTIVIDAD = cla.ID_ACTIVIDAD');
  		$this->db->where('cl.ID_CLIENTE', $id);
  		$this->db->where('cla.estado', STATUS_ACTIVE);
  		$this->db->where('cla.estado_reg', CURRENT_STATUS);
  		$query = $this->db->get();
        if($query->num_rows() > 0)
            return $query->result();
        else
            return null;
	}
	public function getCredentials($id)
	{
		$this->db->select('cl.ID_CREDENCIALES, USER, PASSWORD, i.INSTITUCION');
  		$this->db->from(' aud_cliente_credenciales cl');
  		$this->db->join('aud_institucion i', 'i.ID_INSTITUCION = cl.ID_INSTITUCION');
  		$this->db->where('cl.ID_CLIENTE', $id);
  		$this->db->where('cl.estado', STATUS_ACTIVE);
  		$this->db->where('cl.estado_reg', CURRENT_STATUS);
  		$query = $this->db->get();
        if($query->num_rows() > 0)
            return $query->result();
        else
            return null;
	}
	public function getGolo($id)
	{
		$this->db->select('cl.FECHA_REG, cl.NIT, cl.PROPIETARIO_REP_LEGAL as nombre, a.ACTIVIDAD, a.ACTIVIDAD_ECONOMICA as actEconomica, a.MES_CIERRE');
  		$this->db->from('aud_cliente cl');
  		$this->db->join('aud_cliente_actividad cla', 'cla.ID_CLIENTE = cl.ID_CLIENTE');
  		$this->db->join('aud_actividad a', 'a.ID_ACTIVIDAD = cla.ID_ACTIVIDAD');
  		$this->db->where('cl.ID_CLIENTE', $id);
  		$this->db->where('cl.estado', STATUS_ACTIVE);
  		$this->db->where('cl.estado_reg', CURRENT_STATUS);
  		$query = $this->db->get();
        if($query->num_rows() > 0)
            return $query->result();
        else
            return null;
	}
}