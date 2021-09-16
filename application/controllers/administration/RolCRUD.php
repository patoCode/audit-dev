<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class RolCRUD
{
	private $crud;

	private $showColumns   = ['ROL','DESCRIPCION','CODE','ACCESOS'];
	private $createColumns = ['ROL','DESCRIPCION','CODE','ACCESOS','USER_REG','FECHA_REG'];

	private $editColumns   = ['ROL','DESCRIPCION','CODE','ACCESOS','ESTADO','USER_MOD', 'FECHA_MOD'];
	private $labels        = array(
								'ROL'         => 'Rol',
								'DESCRIPCION' => 'Descripcion',
								'CODE'        => 'Código',
								'ACCESOS'    => 'Accesos'
							);
	private $table       = 'aud_rol';
	private $idField     = 'ID_ROL';
	private $subject;
	private $actionLabel = "";
	private $actionIcon  = "";
	private $username;


	function __construct($subject, $showDeleteRows = true, $softDelete = true)
	{
		$this->crud = new BaseCrud($subject,$this->table,$this->idField, $showDeleteRows, $softDelete);
		$this->crud->setShowFields($this->createColumns);
		$this->crud->setRequiredFields($this->createColumns);
		$this->crud->setEditFields($this->editColumns);
		$this->crud->setColumns($this->showColumns);
		$this->crud->setAuditFields("user");
		$this->crud->getPrivilegios();
		$this->crud->setDisplayFields($this->labels);
	}
	public function setActionStyle($label = "", $icon = "")
	{
		$this->actionLabel = $label;
		$this->actionIcon = $icon;
		$this->addAction();
	}
	/*===========================================================================*/
	/**   RETURN GROCERY CRUD
	/*===========================================================================*/
	public function getCRUD()
	{
		return $this->crud->getRender();
	}



}
