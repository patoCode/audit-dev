<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class ClienteCRUD
{
	private $crud;
	private $showColumns   = ['REGIMEN','CODIGO_CLIENTE','RAZON_SOCIAL', 'NIT','ID_SOCIEDAD','CONTACTO','EMAIL'];
	private $createColumns = ['REGIMEN','CODIGO_CLIENTE','RAZON_SOCIAL', 'NIT','ID_SOCIEDAD','CONTACTO','EMAIL','USER_REG','FECHA_REG'];
	private $editColumns   = ['REGIMEN','CODIGO_CLIENTE','RAZON_SOCIAL', 'NIT','ID_SOCIEDAD','CONTACTO','EMAIL','ESTADO','USER_MOD', 'FECHA_MOD'];
	private $labels        = array(
								'CODIGO_CLIENTE' => 'COD.',
								'RAZON_SOCIAL'   =>'Nombre/Razón social',
								'NIT'            => 'NIT',
								'REGIMEN'        => 'regimen',
								'ID_SOCIEDAD'    => 'Tipo Sociedad',
								'CONTACTO'       => 'Contacto',
								'EMAIL'          => 'Email'
							);
	private $table       = 'aud_cliente';
	private $idField     = 'ID_CLIENTE';
	private $subject;
	private $actionLabel = "";
	private $actionIcon  = "";
	private $username;

	function __construct($subject, $showDeleteRows = true, $softDelete = true)
	{
		$this->crud = new BaseCrud($subject,$this->table,$this->idField, $showDeleteRows, $softDelete);

		$this->crud->setRelationN_toN('regimen', 'aud_cliente_regimen','aud_regimen','aud_cliente_regimen.ID_CLIENTE','aud_regimen.ID_REGIMEN','REGIMEN','ESTADO');

		$this->crud->setShowFields($this->createColumns);
		$this->crud->setRequiredFields($this->createColumns);
		$this->crud->setEditFields($this->editColumns);
		$this->crud->setColumns($this->showColumns);
		$this->crud->getSociedadSelect();
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
