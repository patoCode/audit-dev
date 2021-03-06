<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class ActividadCRUD
{
	private $crud;

	private $showColumns   = ['CODIGO','ACTIVIDAD','MES_CIERRE','ACTIVIDAD_ECONOMICA','CODIGO_SIN','ESTADO'];

	private $createColumns = ['CODIGO','ACTIVIDAD','MES_CIERRE','ACTIVIDAD_ECONOMICA','USER_REG','FECHA_REG'];

	private $editColumns   = ['CODIGO','ACTIVIDAD','MES_CIERRE','ACTIVIDAD_ECONOMICA','ESTADO','USER_MOD', 'FECHA_MOD'];
	private $labels        = array(
								'ACTIVIDAD'           => 'Nombre',
								'CODIGO'              => 'Código Act.',
								'MES_CIERRE'          => 'Mes Cierre',
								'ACTIVIDAD_ECONOMICA' => 'Act. Económica',
								'CODIGO_SIN'          => 'Código SIN',
								'ESTADO'              => 'Estado'
							);
	private $table       = 'aud_actividad';
	private $idField     = 'ID_ACTIVIDAD';
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

		$this->crud->mesSelect('MES_CIERRE');
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
