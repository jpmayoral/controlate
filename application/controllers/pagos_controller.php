<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagos_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
	}

	function index()
	{
		echo "<h1>Welcome to GroceryCRUD</h1>";
	}	
	
	function pagos()
	{
		$this->grocery_crud->set_table('pagos');
		$output = $this->grocery_crud->render();

		$this->mostrarPagos($output);		
	}

	function mostrarPagos($output=null){
		$this->load->view('templates/header',$output);
		//$this->load->view('templates/groceryCRUD',$output);
		$this->load->view('templates/menu');
		$this->load->view('templates/sidebar');		
		$this->load->view('pagos/pagos_view.php',$output);
		$this->load->view('templates/footer',$output);			
	}
	
}