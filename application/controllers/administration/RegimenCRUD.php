<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class RegimenCRUD
{
	private $crud;

	private $showColumns   = ['REGIMEN','ESTADO'];
	private $createColumns = ['REGIMEN','USER_REG','FECHA_REG'];
	private $editColumns   = ['REGIMEN','ESTADO','USER_MOD','FECHA_MOD'];
	private $labels        = array(
								'REGIMEN' => 'Regimen',
								'ESTADO' => 'Estado'
							);
	private $table       = 'aud_regimen';
	private $idField     = 'ID_REGIMEN';
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
