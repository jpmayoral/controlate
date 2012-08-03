<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
*	login controller 
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$this->load->view('templates/header');
		$this->load->view('login/menu_login_view');		
		$this->load->view('login/login_view');
		$this->load->view('templates/footer');
	}

	
}