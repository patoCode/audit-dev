<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $admin_template_route = 'Administration/_base';

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('is_logued_in')){
			redirect('Login','refresh');
		}
	}

	public function index()
	{
		$data['view'] = "default";
		$this->load->view($this->admin_template_route,$data);

	}
}