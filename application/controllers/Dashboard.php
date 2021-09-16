<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*IMPORT CLASS CRUD */
require_once APPPATH.'controllers/administration/ClienteCRUD.php';
require_once APPPATH.'controllers/administration/SociedadCRUD.php';
require_once APPPATH.'controllers/administration/RegimenCRUD.php';

require_once APPPATH.'controllers/administration/ActividadCRUD.php';
require_once APPPATH.'controllers/administration/PeriodoCRUD.php';
require_once APPPATH.'controllers/administration/CertificadoCRUD.php';
require_once APPPATH.'controllers/administration/PaisCRUD.php';
require_once APPPATH.'controllers/administration/CiudadCRUD.php';
require_once APPPATH.'controllers/administration/ObligacionTributariaCRUD.php';
require_once APPPATH.'controllers/administration/InstitucionCRUD.php';
require_once APPPATH.'controllers/administration/EmpresaCRUD.php';

class Dashboard extends CI_Controller {

	private $admin_template_route = 'Administration/_base';

	function __construct(){
		parent::__construct();
		$this->load->model('');
	}
	public function cliente()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->set_table('aud_cliente');
			$crud->set_subject('Cliente');

			$crud->columns('NIT',
				'RAZON_SOCIAL',
				'PROPIETARIO_REP_LEGAL',
				'CELULAR_REP_LEGAL',
				'CI',
				'EXPEDIDO_EN',
				'ID_SOCIEDAD',
				'REGIMEN',
				'ID_CIUDAD',
				'ZONA',
				'DIRECCION_BASE',
				'TELEFONO_DOM',
				'CODIGO_CLIENTE',
				'CONTACTO',
				'EMAIL',);

			$crud->add_fields('NIT',
				'RAZON_SOCIAL',
				'PROPIETARIO_REP_LEGAL',
				'CELULAR_REP_LEGAL',
				'CI',
				'EXPEDIDO_EN',
				'ID_SOCIEDAD',
				'REGIMEN',
				'ID_CIUDAD',
				'ZONA',
				'DIRECCION_BASE',
				'TELEFONO_DOM',
				'CODIGO_CLIENTE',
				'CONTACTO',
				'EMAIL',);
			$crud->edit_fields('NIT',
				'RAZON_SOCIAL',
				'PROPIETARIO_REP_LEGAL',
				'CELULAR_REP_LEGAL',
				'CI',
				'EXPEDIDO_EN',
				'ID_SOCIEDAD',
				'REGIMEN',
				'ID_CIUDAD',
				'ZONA',
				'DIRECCION_BASE',
				'TELEFONO_DOM',
				'CODIGO_CLIENTE',
				'CONTACTO',
				'EMAIL','ESTADO','USER_MOD', 'FECHA_MOD');
			$crud->required_fields(
				'NIT',
				'RAZON_SOCIAL',
				'PROPIETARIO_REP_LEGAL',
				'CI',
				'EXPEDIDO_EN',
				'ID_SOCIEDAD',
				'REGIMEN',
				'ID_CIUDAD',
				'ZONA',
				'DIRECCION_BASE',
				'TELEFONO_DOM',
				'CONTACTO'
			);
			$username = "DENIS";
			$now            = date("Y-m-d H:i:s");
			$crud->field_type('USER_REG', 'hidden', $username);
			$crud->field_type('FECHA_REG', 'hidden', $now);
			$crud->field_type('USER_MOD', 'hidden', $username);
			$crud->field_type('FECHA_MOD', 'hidden', $now);
			$crud->field_type('ESTADO','dropdown',
            array('activo' => 'Activo', 'inactivo' => 'Inactivo'));

			$crud->display_as('NIT', 'NIT')
				->display_as('RAZON_SOCIAL', 'Nombre/Razon')
				->display_as('PROPIETARIO_REP_LEGAL', 'Propietario/Rep.Legal')
				->display_as('CI', 'Carnet de Identidad')
				->display_as('EXPEDIDO_EN', 'Exp.')
				->display_as('ID_SOCIEDAD', 'Tipo Sociedad')
				->display_as('REGIMEN', 'Regimen Impositivo')
				->display_as('EMAIL', 'Correo Electronico')
				->display_as('Contacto', 'Contacto')
				->display_as('ID_CIUDAD', 'Ciudad');

			$crud->set_relation('EXPEDIDO_EN','aud_ciudad','CODIGO_CIUDAD', array('aud_ciudad.ESTADO' => 'activo','aud_ciudad.ESTADO_REG' => 'vigente'));

			$crud->set_relation('ID_SOCIEDAD','aud_sociedad','SOCIEDAD', array('aud_sociedad.ESTADO' => 'activo','aud_sociedad.ESTADO_REG' => 'vigente'));

			$crud->set_relation('ID_CIUDAD','aud_ciudad','CIUDAD', array('aud_ciudad.ESTADO' => 'activo','aud_ciudad.ESTADO_REG' => 'vigente'));

			$crud->set_relation_n_n('REGIMEN', 'aud_cliente_regimen', 'aud_regimen', 'ID_CLIENTE', 'ID_REGIMEN', 'REGIMEN');
			$output = $crud->render();
			$this->_render_view($output);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function empresa()
	{
	 	$objeto = new EmpresaCRUD("Empresa(s)");
		try {
			$_output = $objeto->getCRUD();
			$this->_render_view($_output);
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function institucion()
	{
		$objeto = new InstitucionCRUD("Institucion(es)");
		try {
			$_output = $objeto->getCRUD();
			$this->_render_view($_output);
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function obligacion()
	{
		$objeto = new ObligacionTributariaCRUD("Obligacion Tributaria");
		try {
			$_output = $objeto->getCRUD();
			$this->_render_view($_output);
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function sociedad()
	{
		$objeto = new SociedadCRUD("Sociedad");
		try {
			$_output = $objeto->getCRUD();
			$this->_render_view($_output);
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}


	public function regimen()
	{
		$objeto = new RegimenCRUD("Regimen");
		try {
			$_output = $objeto->getCRUD();
			$this->_render_view($_output);
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function actividad()
	{
		$actividad = new ActividadCRUD("Actividad(es)");
		try {
			$_output = $actividad->getCRUD();
			$this->_render_view($_output);
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function periodo()
	{
		$periodo = new PeriodoCRUD("Periodo(s)");
		try {
			$_output = $periodo->getCRUD();
			$this->_render_view($_output);
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function certificado()
	{
		$object = new CertificadoCRUD("Certificado(s)");
		try {
			$_output = $object->getCRUD();
			$this->_render_view($_output);
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function pais()
	{
		$object = new PaisCRUD("Pais(s)");
		try {
			$_output = $object->getCRUD();
			$this->_render_view($_output);
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function ciudad()
	{
		$object = new CiudadCRUD("Cuidad(es)");
		try {
			$_output = $object->getCRUD();
			$this->_render_view($_output);
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	/**
	 * @param  [type]
	 * @param  [type]
	 * @return [type]
	 */
	private function _render_view($output = null, $view = null)
	{
		//$this->load->view('Administration/bodyCRUD',(array)$output);


		if($view == null){
			$this->load->view($this->admin_template_route,(array)$output);
		}else{
			$data['view'] = $view;
			$this->load->view($this->admin_template_route,$data);
		}
	}
}