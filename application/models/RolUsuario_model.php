<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RolUsuario_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getNotificable($idUsuario)
    {
		$this->db->from('aud_rol_usuario ru');
        $this->db->join('aud_rol r', 'r.ID_ROL = ru.ID_ROL', '');
		$this->db->where('ru.id_usuario', $idUsuario);
        $this->db->where('r.ESTADO', 'activo');
        $this->db->where('r.CODE', 'NOTY');
		$query = $this->db->get();
		if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else{
            return null;
        }
    }
}