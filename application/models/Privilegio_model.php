<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Privilegio_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getPrivilegioBloque($idPrivilegio)
    {
        $this->db->select('m.MENU as MENU,m.ICONO as MENU_ICONO, p.URI as URI,p.ICONO as ICONO, p.PRIVILEGIO as PRIVILEGIO, p.ORDEN ORDEN');
		$this->db->from('aud_privilegio p');
        $this->db->join('aud_menu m', 'm.ID_MENU = p.ID_MENU', '');
		$this->db->where('p.ID_PRIVILEGIO', $idPrivilegio);
        $this->db->where('p.estado', 'activo');
        $this->db->where('p.estado_reg', 'vigente');
        $this->db->order_by('p.orden', 'asc');
		$query = $this->db->get();
		return $query->row();
    }
}