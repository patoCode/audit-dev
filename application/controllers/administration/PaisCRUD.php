<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class PaisCRUD
{
	private $crud;
	private $showColumns   = ['PAIS','CODIGO_PAIS','BANDERA'];
	private $createColumns = ['PAIS','CODIGO_PAIS','BANDERA','USER_REG','FECHA_REG'];
	private $editColumns   = ['PAIS','CODIGO_PAIS','BANDERA','ESTADO','USER_MOD', 'FECHA_MOD'];

	private $labels    = array(
							"PAIS" =>"Pais",
							"CODIGO_PAIS" =>"Codigo",
							"BANDERA" => "Icono",
							"ESTADO"      =>"Estado",
						);

	private $table         = 'aud_pais';
	private $idField       = "ID_PAIS";
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