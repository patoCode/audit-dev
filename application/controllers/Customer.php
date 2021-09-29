<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Customer_model', '_mcustomer');
		if(!$this->session->userdata('is_logued_in')){
			redirect('Login','refresh');
		}
	}
	/*
	[ID_CLIENTE] => 280
    [ID_SOCIEDAD] => 4
    [ID_PAIS] => 1
    [ID_CIUDAD] => 1
    [NIT] => 295970029
    [RAZON_SOCIAL] => SIA UDI CONSULTING
    [PROPIETARIO_REP_LEGAL] => R. Dante Gangas Linares
    [CELULAR_REP_LEGAL] => 77492618
    [CONTACTO] => R. Dante Gangas Linares
    [EMAIL] =>
    [CODIGO_CLIENTE] => 00
    [CI] => 5188584
    [EXPEDIDO_EN] => 1
    [TELEFONO_DOM] => 4665508
    [ZONA] =>
    [DIRECCION_BASE] => AV. HEROHINAS Y AYACUCHO NRO 125 EDIF. KAIROS PISO. 1 OF. 2
    [FOTO] => 1111
    [FECHA_REG] => 2021-09-17 17:06:14
    [USER_REG] =>
    [USER_MOD] =>
    [FECHA_MOD] => 2021-09-17 17:06:14
    [ESTADO] => activo
    [ESTADO_REG] => vigente

	 */

	public function index()
	{
		echo "hola";
	}
	public function profile($id)
	{
		$cliente = $this->_mcustomer->getById($id);
		$data['cliente'] = $cliente;
		$data['view'] = "profile";
		$this->load->view('Administration/_base', $data);

	}
}
