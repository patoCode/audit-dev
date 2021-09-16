<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rol_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getRolByUser($idUsuario)
    {
		$this->db->from('aud_rol_usuario ru');
        $this->db->join('aud_rol r', 'r.ID_ROL = ru.ID_ROL', '');
		$this->db->where('ru.ID_USUARIO', $idUsuario);
        $this->db->where('r.ESTADO', 'activo');
		$query = $this->db->get();
		return $query->result();
    }
    public function getPrivilegio($idRol)
    {
        $this->db->select('pr.ID_PRIVILEGIO');
        $this->db->from('aud_privilegio_rol pr');
        $this->db->join('aud_privilegio p', 'p.ID_PRIVILEGIO = pr.ID_PRIVILEGIO', '');
        $this->db->where('ID_ROL', $idRol);
        $this->db->order_by('p.ORDEN', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
}