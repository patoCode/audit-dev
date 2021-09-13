<?php
class BaseCrud
{
	private $crud;
	private $table;
	private $idField;
	private $showColumns   = [];
	private $createColumns = [];
	private $editColumns   = [];
	private $labels        = [];
	private $username;

	function __construct($subject = "Sin Titulo", $table = "", $idField = "", $showDeleteRows = true, $softDelete = true){

		$this->crud    = new grocery_CRUD();
		$this->crud->unset_jquery();
		$this->crud->unset_export();
		$this->crud->unset_print();
		$this->crud->set_subject($subject);
		$this->crud->set_table($table);
		if(!$showDeleteRows)
			$this->crud->where($table.'.ESTADO_REG','vigente');

		if($softDelete)
			$this->crud->callback_delete(array($this,'_delete'));
	}
	public function setAuditFields($username)
	{
		$this->username = $username;
		$now            = date("Y-m-d H:i:s");
		$this->crud->field_type('USER_REG', 'hidden', $username);
		$this->crud->field_type('FECHA_REG', 'hidden', $now);
		$this->crud->field_type('USER_MOD', 'hidden', $username);
		$this->crud->field_type('FECHA_MOD', 'hidden', $now);

	}
	public function setTable($table)
	{
		$this->crud->set_table($table);
	}
	public function setShowFields($fields)
	{
		$this->crud->fields($fields);
	}
	public function setRequiredFields($fields)
	{
		$this->crud->required_fields($fields);
	}
	public function setEditFields($fields)
	{
		$this->crud->edit_fields($fields);
	}
	public function setColumns($fields)
	{
		$this->crud->columns($fields);
	}
	public function setUploadField($field, $path)
	{
		$this->crud->set_field_upload($field,$path);
	}
	public function _delete($primary_key)
	{
		$ci = & get_instance();
		$ci->load->model('Master_model','master');
		$ci->master->delete($primary_key, $this->table, $this->idField, $this->username);
	}
	public function setDisplayFields($labels)
	{
		foreach ($labels as $key => $value) {
			$this->crud->display_as($key, $value);
		}
		$this->crud->display_as("ESTADO", "Estado");
		$this->crud->display_as("USER_REG", "Usr. Reg.");
		$this->crud->display_as("USER_MOD", "Usr.Upd.");
		$this->crud->display_as("FECHA_REG", "Creado");
		$this->crud->display_as("FECHA_MOD", "Actualizado");
		$this->crud->display_as("actions", "Acciones");
	}

	public function getPaisSelect($show = 'pais')
	{
		$this->crud->set_relation('ID_PAIS','aud_pais',$show, array('aud_pais.ESTADO' => 'activo','aud_pais.ESTADO_REG' => 'vigente'));
	}

	public function addAction($label = "Default Text", $route = "", $icon= "",$showText = false){
		$icon = $icon!=""?$icon:'icon-cog';
		if($showText)
			$this->crud->add_action($label, '', $route, $icon);
		else
			$this->crud->add_action('','', $route, $icon);
	}
	// TODO Refactorizar estos metodos
	public function whereCompany($id)
	{
		$this->crud->where('id_company',$id);
	}
	public function inputHiddenCompany($value)
	{
		$this->crud->field_type("id_company", 'hidden', $value);
	}
	public function whereSite($id)
	{
		$this->crud->where('id_site',$id);
	}
	public function whereRol($id)
	{
		$this->crud->where('id_rol',$id);
	}
	public function inputHiddenSite($value)
	{
		$this->crud->field_type("id_site", 'hidden', $value);
	}
	//
	public function addHiddenInput($name = "", $value = 0)
	{
		$this->crud->field_type($name, 'hidden', $value);
	}
	public function setRelationN_toN($fieldname, $tableRelation, $otherTable, $idRelation, $idFinalTable, $nameField)
	{
		$this->crud->set_relation_n_n($fieldname, $tableRelation, $otherTable, $idRelation, $idFinalTable, $nameField);
	}
	public function setSimpleRelation()
	{
		$this->crud->set_relation('id_people','people','{name} {pat_surename} {mat_surename}', array('is_delete' => CURRENT_STATUS));
	}
	public function getCrud()
	{
		return $this->crud;
	}
	public function getRender()
	{
		return $this->crud->render();
	}
}