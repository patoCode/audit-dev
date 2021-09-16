<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class PrivilegioCRUD
{
	private $crud;

	private $showColumns   = ['ID_MENU','PRIVILEGIO','URI','DESCRIPCION','ORDEN'];
	private $createColumns = ['ID_MENU','PRIVILEGIO','URI','DESCRIPCION','ORDEN','USER_REG','FECHA_REG'];

	private $editColumns   = ['ID_MENU','PRIVILEGIO','URI','DESCRIPCION','ORDEN','ESTADO','USER_MOD', 'FECHA_MOD'];
	private $labels        = array(
								'ID_MENU' => 'Bloque',
								'PRIVILEGIO' => 'Acceso',
								'URI' => 'URL',
								'DESCRIPCION' => 'Descripcion',
								'ORDEN' => 'Orden'
							);
	private $table       = 'aud_privilegio';
	private $idField     = 'ID_PRIVILEGIO';
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
		$this->crud->getMenuSelect();
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
