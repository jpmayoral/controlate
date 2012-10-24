<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Reportes_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$this->load->view('templates/header',$output);		
		$this->load->view('templates/menu');
		$this->load->view('templates/sidebar');		
		$this->load->view('reportes/reporte_mensual_view.php');
		$this->load->view('templates/footer',$output);	
	}
	
}