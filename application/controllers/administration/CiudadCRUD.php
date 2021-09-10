<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class CiudadCRUD
{
	private $crud;
	private $showColumns   = ['CIUDAD','BANDERA','CODIGO_CIUDAD','ID_PAIS'];
	private $createColumns = ['CIUDAD','BANDERA','CODIGO_CIUDAD','ID_PAIS','USER_REG','FECHA_REG'];
	private $editColumns   = ['CIUDAD','BANDERA','CODIGO_CIUDAD','ID_PAIS','ESTADO','USER_MOD', 'FECHA_MOD'];

	private $labels    = array(
							"CIUDAD"        =>"Ciudad",
							"CODIGO_CIUDAD" =>"Codigo",
							"BANDERA"       => "Icono",
							"ESTADO"        =>"Estado",
							"ID_PAIS"		=> 'Pais'
						);

	private $table         = 'aud_ciudad';
	private $idField       = "ID_CIUDAD";
	private $subject;
	private $username;

	function __construct($subject, $showDeleteRows = true, $softDelete = true, $id = 0)
	{
		$this->crud = new BaseCrud($subject,$this->table,$this->idField, $showDeleteRows, $softDelete);

		$this->crud->setShowFields($this->createColumns);
		$this->crud->setRequiredFields($this->createColumns);
		$this->crud->setEditFields($this->editColumns);
		$this->crud->setColumns($this->showColumns);
		$this->crud->setAuditFields("#DEINS");
		$this->crud->setDisplayFields($this->labels);
		$this->crud->getPaisSelect();
	}

	/*===========================================================================*/
	/**   RETURN GROCERY CRUD
	/*===========================================================================*/
	public function getCRUD()
	{
		return $this->crud->getRender();
	}
}