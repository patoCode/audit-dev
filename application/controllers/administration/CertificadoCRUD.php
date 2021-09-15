<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class CertificadoCRUD
{
	private $crud;
	private $showColumns   = ['CERTIFICADO','CODIGO','ID_INSTITUCION','ESTADO'];
	private $createColumns = ['CERTIFICADO','CODIGO','ID_INSTITUCION','USER_REG','FECHA_REG'];
	private $editColumns   = ['CERTIFICADO','CODIGO','ID_INSTITUCION','ESTADO','USER_MOD', 'FECHA_MOD'];

	private $labels    = array(
							"CERTIFICADO"    =>"Certificado",
							"ESTADO"         =>"Estado",
							'CODIGO'         => 'Código',
							'ID_INSTITUCION' => 'Institución'
						);

	private $table         = 'aud_certificados';
	private $idField       = "ID_CERTIFICADO";
	private $subject;
	private $username;

	function __construct($subject, $showDeleteRows = true, $softDelete = true, $id = 0)
	{
		$this->crud = new BaseCrud($subject,$this->table,$this->idField, $showDeleteRows, $softDelete);

		$this->crud->setShowFields($this->createColumns);
		$this->crud->setRequiredFields($this->createColumns);
		$this->crud->setEditFields($this->editColumns);
		$this->crud->setColumns($this->showColumns);

		$this->crud->setAuditFields("#DENIS");
		$this->crud->getInstitucionSelect();
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