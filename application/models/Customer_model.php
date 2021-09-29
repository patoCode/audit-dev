<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
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
}