<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class InstitucionCRUD
{
	private $crud;
	private $showColumns   = ['INSTITUCION','SIGLA','CODIGO'];
	private $createColumns = ['INSTITUCION','SIGLA','CODIGO','USER_REG','FECHA_REG'];
	private $editColumns   = ['INSTITUCION','SIGLA','CODIGO','ESTADO','USER_MOD', 'FECHA_MOD'];

	private $labels    = array(
							'INSTITUCION' => 'Institucion',
							'SIGLA' => 'Sigla',
							'CODIGO' => 'Código'
						);

	private $table         = 'aud_institucion';
	private $idField       = "ID_INSTITUCION";
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