<?php
require_once APPPATH.'controllers/administration/BaseCrud.php';

class UsuarioCRUD
{
	private $crud;
	private $showColumns   = ['NOMBRE_PROPIO','APELLIDOS','USERNAME','PASSWORD','EMAIL','FOTO'];
	private $createColumns = ['NOMBRE_PROPIO','APELLIDOS','USERNAME','PASSWORD','EMAIL','FOTO','USER_REG','FECHA_REG'];
	private $editColumns   = ['NOMBRE_PROPIO','APELLIDOS','USERNAME','PASSWORD','EMAIL','FOTO','ESTADO','USER_MOD', 'FECHA_MOD'];

	private $labels    = array(
							'NOMBRE_PROPIO' => 'Nombre(s)',
							'APELLIDOS'=> 'Apellido(s)',
							'USERNAME' => 'Username',
							'PASSWORD' => 'Password',
							'EMAIL' => 'Email',
							'FOTO' => 'Fotografia'
						);

	private $table         = 'aud_usuario';
	private $idField       = "ID_USUARIO";
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
		$this->crud->setDisplayFields($this->labels);

		$this->crud->getUpload('FOTO',PATH_FOTOS_USUARIOS);
	}

	/*===========================================================================*/
	/**   RETURN GROCERY CRUD
	/*===========================================================================*/
	public function getCRUD()
	{
		return $this->crud->getRender();
	}
}