<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Usuarios_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){		
		$data['title'] = 'Administrar Usuarios';
		$this->load->view();
	}
}
