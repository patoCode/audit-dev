<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $admin_template_route = 'Administration/_base';

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$data['view'] = "default";
		$this->load->view($this->admin_template_route,$data);

	}
}