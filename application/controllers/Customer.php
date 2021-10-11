<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'controllers/Custom/ResultDto.php';


class Customer extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Master_model', '_master');
		$this->load->model('Customer_model', '_mcustomer');
		$this->load->model('Instituciones_model', '_minstituciones');
		$this->load->model('Actividad_model', '_mactividad');
		if(!$this->session->userdata('is_logued_in')){
			redirect('Login','refresh');
		}
	}
	public function index()
	{
		echo "hola";
	}
	public function search()
	{
		$res    = new ResultDto();
		$search = $this->input->post("searchTerm");
		$data   = $this->_mcustomer->search($search);
		if($data != null){
			$res->setResult(1);
			$res->setMsg("Exito");
			$res->setData($data);
		}else{
			$res->setMsg("Error al iunsertar datos");
		}
		echo $res->getResponseJSON();
	}
	public function profile($id)
	{
		$cliente               = $this->_mcustomer->getById($id);
		$instituciones         = $this->_minstituciones->getAll();
		$actividades           = $this->_mcustomer->getActividades($id);
		$credenciales          = $this->_mcustomer->getCredentials($id);
		$actividadList         = $this->_mactividad->getAll();
		$data['cliente']       = $cliente;
		$data['actividades']   = $actividades;
		$data['instituciones'] = $instituciones;
		$data['credenciales']  = $credenciales;
		$data['actividadList']  = $actividadList;
		$data['view']          = "profile";
		$this->load->view('Administration/_base', $data);
	}
	public function addActividad()
	{
		$res         = new ResultDto();
		$idActividad = $this->input->post("actividad");
		$cliente     = $this->input->post("cliente");
		$usuario     = $this->session->userdata('username');
		$data = array(
						'ID_CLIENTE'           => $cliente,
						'ID_ACTIVIDAD'       => $idActividad,
						'USER_REG'       => $usuario
					);
		if($this->_master->add('aud_cliente_actividad ', $data)){
			$res->setResult(1);
			$res->setMsg("Exito");
		}else{
			$res->setMsg("Error al iunsertar datos");
		}
		echo $res->getResponseJSON();
	}
	public function deleteActividad(){
		$res = new ResultDto();
		$id  = $this->input->post("id");
		if($this->_master->delete($id, 'aud_cliente_actividad ','ID_CLI_ACT', $this->session->userdata('username'))){
			$res->setResult(1);
			$res->setMsg("Exito");
		}else{
			$res->setMsg("Error al iunsertar datos");
		}
		echo $res->getResponseJSON();
	}
	public function addCredentials()
	{
		$res         = new ResultDto();
		$username    = $this->input->post("username");
		$password    = $this->input->post("password");
		$institucion = $this->input->post("institucion");
		$usuario     = $this->session->userdata('username');
		$cliente     = $this->input->post("cliente");
		$data = array(
						'USER'           => $username,
						'PASSWORD'       => $password,
						'USER_REG'       => $usuario,
						'ID_INSTITUCION' => $institucion,
						'ID_CLIENTE'     => $cliente
					);
		if($this->_master->add('aud_cliente_credenciales', $data)){
			$res->setResult(1);
			$res->setMsg("Exito");
		}else{
			$res->setMsg("Error al iunsertar datos");
		}
		echo $res->getResponseJSON();
	}
	public function updateCredentials()
	{
		$res = new ResultDto();
		$username    = $this->input->post("username");
		$password    = $this->input->post("password");
		$institucion =$this->input->post("institucion");
		$usuario     = $this->session->userdata('username');
		$cliente     =$this->input->post("cliente");
		$id          = $this->input->post("idCredential");
		$data = array(
					'USER'           => $username,
					'PASSWORD'       => $password,
					'USER_MOD'       => $usuario,
					'ID_INSTITUCION' => $institucion
				);
		if($this->_master->update($id,'aud_cliente_credenciales', "ID_CREDENCIALES",$data)){
			$res->setResult(1);
			$res->setMsg("Exito");
		}else{
			$res->setMsg("Error al iunsertar datos");
		}
		echo $res->getResponseJSON();
	}
	public function deleteCredencials()
	{
		$res = new ResultDto();
		$id  = $this->input->post("id");
		if($this->_master->delete($id, 'aud_cliente_credenciales','ID_CREDENCIALES', $this->session->userdata('username'))){
			$res->setResult(1);
			$res->setMsg("Exito");
		}else{
			$res->setMsg("Error al iunsertar datos");
		}
		echo $res->getResponseJSON();
	}
	public function getGolo()
	{
		$res      = new ResultDto();
		$id       = $this->input->post("idCredential");
		$customer = $this->_mcustomer->getGolo($id);
		if(count(array($customer))){
			$res->setResult(0);
			$res->setMsg("Exito");
			$res->setData($customer);
		}
		echo $res->getResponseJSON();
	}
}
