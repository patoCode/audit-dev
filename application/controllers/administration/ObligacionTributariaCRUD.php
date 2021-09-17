<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class ObligacionTributariaCRUD
{
	private $crud;

	private $showColumns   = ['FORMULARIO','NOMBRE_SIN','DESCRIPCION','ID_PERIODO','ESTADO'];
	private $createColumns = ['FORMULARIO','NOMBRE_SIN','DESCRIPCION','ID_PERIODO',];
	private $editColumns   = ['FORMULARIO','NOMBRE_SIN','DESCRIPCION','ID_PERIODO','ESTADO','USER_MOD','FECHA_MOD'];
	private $labels        = array(
								'ID_PERIODO' => 'Periodo',
								'FORMULARIO' => 'Formulario',
								'NOMBRE_SIN' => 'Impuesto',
								'DESCRIPCION' => 'Descripcion'
							);
	private $table       = 'aud_obligacion_tributaria';
	private $idField     = 'ID_OBLIGACION';
	private $subject;
	private $actionLabel = "";
	private $actionIcon  = "";
	private $username;

	function __construct($subject, $showDeleteRows = false, $softDelete = true)
	{
		$this->crud = new BaseCrud($subject,$this->table,$this->idField, $showDeleteRows, $softDelete);
		$this->crud->setShowFields($this->createColumns);
		$this->crud->setRequiredFields($this->createColumns);
		$this->crud->setEditFields($this->editColumns);
		$this->crud->setColumns($this->showColumns);

		$this->crud->setAuditFields("user");
		$this->crud->getPeriodoSelect();

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
