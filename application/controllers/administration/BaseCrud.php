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
	private $meses = array(
						'1'  => 'ENERO',
						'2'  => 'FEBRERO',
						'3'  => 'MARZO',
						'4'  => 'ABRIL',
						'5'  => 'MAYO',
						'6'  => 'JUNIO',
						'7'  => 'JULIO',
						'8'  => 'AGOSTO',
						'9'  => 'SEPTIEMBRE',
						'10' => 'OCTUBRE',
						'11' => 'NOVIEMBRE',
						'12' => 'DICIEMBRE'
					);

	function __construct($subject = "Sin Titulo", $table = "", $idField = "", $showDeleteRows = true, $softDelete = true, $columnState = 'ESTADO'){
		$this->idField = $idField;
		$this->table = $table;
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

		$this->crud->field_type($columnState,'dropdown',
            array('activo' => 'Activo', 'inactivo' => 'Inactivo'));
	}
	public function getPrivilegios(){
		$this->crud->set_relation_n_n('ACCESOS', 'aud_privilegio_rol', 'aud_privilegio', 'ID_ROL', 'ID_PRIVILEGIO', 'PRIVILEGIO');
	}
	public function mesSelect($field)
	{
 		$this->crud->field_type($field,'dropdown',$this->meses);
	}
	public function setAuditFields($username = null)
	{
		$ci = & get_instance();
		$this->username = $ci->session->userdata('username');
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

	public function getPaisSelect($show = 'PAIS')
	{
		$this->crud->set_relation('ID_PAIS','aud_pais',$show, array('aud_pais.ESTADO' => 'activo','aud_pais.ESTADO_REG' => 'vigente'));
	}
	public function getSociedadSelect($show = 'SOCIEDAD')
	{
		$this->crud->set_relation('ID_SOCIEDAD','aud_sociedad',$show, array('aud_sociedad.ESTADO' => 'activo','aud_sociedad.ESTADO_REG' => 'vigente'));
	}
	public function getPeriodoSelect($show = 'PERIODO')
	{
		$this->crud->set_relation('ID_PERIODO','aud_periodo',$show, array('aud_periodo.ESTADO' => 'activo','aud_periodo.ESTADO_REG' => 'vigente'));
	}
	public function getInstitucionSelect($show = 'INSTITUCION')
	{
		$this->crud->set_relation('ID_INSTITUCION','aud_institucion',$show, array('aud_institucion.ESTADO' => 'activo','aud_institucion.ESTADO_REG' => 'vigente'));
	}
	public function getCiudadSelect($show ="CIUDAD")
	{
		$this->crud->set_relation('EXPEDIDO_EN','aud_ciudad',$show, array('aud_ciudad.ESTADO' => 'activo','aud_ciudad.ESTADO_REG' => 'vigente'));
	}
	public function getMenuSelect($show = 'MENU')
	{
		$this->crud->set_relation('ID_MENU','aud_menu',$show, array('aud_menu.ESTADO' => 'activo','aud_menu.ESTADO_REG' => 'vigente'));
	}
	public function addAction($label = "Default Text", $route = "", $icon= "",$showText = false){
		$icon = $icon!=""?$icon:'icon-cog';
		if($showText)
			$this->crud->add_action($label, '', $route, $icon);
		else
			$this->crud->add_action('','', $route, $icon);
	}
	public function addHiddenInput($name = "", $value = 0)
	{
		$this->crud->field_type($name, 'hidden', $value);
	}
	public function setRelationN_toN($fieldname, $tableRelation, $otherTable, $idRelation, $idFinalTable, $nameField,$aux)
	{
		$this->crud->set_relation_n_n($fieldname, $tableRelation, $otherTable, $idRelation, $idFinalTable, $nameField, $aux);
	}
	public function setSimpleRelation()
	{
		$this->crud->set_relation('id_people','people','{name} {pat_surename} {mat_surename}', array('is_delete' => CURRENT_STATUS));
	}
	public function getUpload($field, $path){
		$this->crud->set_field_upload($field,$path);
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
