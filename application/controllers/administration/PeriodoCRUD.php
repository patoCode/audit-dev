<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class PeriodoCRUD
{
	private $crud;
	private $showColumns   = ['PERIODO','CODIGO_PERIODO','ESTADO'];
	private $createColumns = ['PERIODO','CODIGO_PERIODO','ESTADO','USER_REG','FECHA_REG'];
	private $editColumns   = ['PERIODO','CODIGO_PERIODO','ESTADO', 'USER_MOD', 'FECHA_MOD'];

	private $labels    = array(
							"PERIODO" =>"Periodo",
							"CODIGO_PERIODO"          =>"CODIGO",
							"ESTADO"         =>"Estado",
						);

	private $table         = 'aud_periodo';
	private $idField       = "ID_PERIODO";
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
	}

	/*===========================================================================*/
	/**   RETURN GROCERY CRUD
	/*===========================================================================*/
	public function getCRUD()
	{
		return $this->crud->getRender();
	}
}