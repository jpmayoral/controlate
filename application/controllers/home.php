<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Home extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['usuario_apellido'] = $session_data['usuario_apellido'];
			$data['usuario_nombre'] = $session_data['usuario_nombre'];
			$data['title']='bienvenido';			
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('home_view',$data);
			$this->load->view('templates/footer');			
		}else{
			# If no session, redirect to login page
			$this->load->view('login/login_view');
		}
	}
	
	function logout(){
		$this->session->unset_userdata('logged_in');
		$this->load->view('templates/header');
		$this->load->view('login/menu_login_view');		
		$this->load->view('login/login_view');
		$this->load->view('templates/footer');
		
	}

}