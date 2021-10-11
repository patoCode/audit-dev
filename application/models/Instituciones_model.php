<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instituciones_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getall()
	{
		$this->db->from('aud_institucion');
        $query = $this->db->get();
        if($query->num_rows() > 0)
            return $query->result();
        else
            return null;
	}
}