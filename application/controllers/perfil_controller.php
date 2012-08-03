<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Perfil_Controller extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$data['titulo'] = 'Mi Perfil';
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('templates/sidebar');
		$this->load->view('perfil/perfil_view',$data);
		$this->load->view('templates/footer');			
	}
}