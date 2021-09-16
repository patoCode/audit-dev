<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class EmpresaCRUD
{
	private $crud;
	private $showColumns   = ['NOMBRE','SIGLA','TELEFONO_FIJO','TELEFONO_CEL','PAGINA_WEB','EMAIL', 'RESPONSABLE','CI', 'EXPEDIDO_EN','NIT'];
	private $createColumns = ['NOMBRE','SIGLA','TELEFONO_FIJO','TELEFONO_CEL','PAGINA_WEB','EMAIL', 'RESPONSABLE','CI', 'EXPEDIDO_EN','NIT','USER_REG','FECHA_REG'];
	private $editColumns   = ['NOMBRE','SIGLA','TELEFONO_FIJO','TELEFONO_CEL','PAGINA_WEB','EMAIL', 'RESPONSABLE','CI', 'EXPEDIDO_EN','NIT','ESTADO','USER_MOD', 'FECHA_MOD'];

	private $labels    = array(
							'NOMBRE' =>'Nombre',
							'SIGLA' =>'Sigla',
							'TELEFONO_FIJO' =>'Telf. Fijo',
							'TELEFONO_CEL' =>'Telf.Celular',
							'PAGINA_WEB' =>'Web',
							'EMAIL' =>'Email',
							'RESPONSABLE' =>'Responsable',
							'CI' =>'C.I.',
							'EXPEDIDO_EN' =>'Exp.',
							'NIT' =>'NIT'
						);

	private $table         = 'aud_empresa';
	private $idField       = "ID_EMPRESA";
	private $subject;
	private $username;

	function __construct($subject, $showDeleteRows = false, $softDelete = true, $id = 0)
	{
		$this->crud = new BaseCrud($subject,$this->table,$this->idField, $showDeleteRows, $softDelete);

		$this->crud->setShowFields($this->createColumns);
		$this->crud->setRequiredFields($this->createColumns);
		$this->crud->setEditFields($this->editColumns);
		$this->crud->setColumns($this->showColumns);
		$this->crud->setAuditFields("#DEINS");
		$this->crud->setDisplayFields($this->labels);
		$this->crud->getCiudadSelect();
	}

	/*===========================================================================*/
	/**   RETURN GROCERY CRUD
	/*===========================================================================*/
	public function getCRUD()
	{
		return $this->crud->getRender();
	}
}