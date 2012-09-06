<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medios_De_Pago_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
	}

	function index()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('medios_de_pago');
		$crud->set_subject('Medio de Pago');
 
		/* Defino los labels del formulario */
		$crud->display_as('medio_de_pago_descripcion','Descripci&oacute;n');

		/* ordeno alfabeticamente */
		$crud->order_by('medio_de_pago_descripcion');

		$output = $crud->render();

		$this->mostrarMediosDePago($output);		
	}	
	
	function mostrarMediosDePago($output=null){
		$this->load->view('templates/header',$output);
		//$this->load->view('templates/groceryCRUD',$output);
		$this->load->view('templates/menu');
		$this->load->view('templates/sidebar');		
		$this->load->view('medios_de_pago/medios_de_pago_view.php',$output);
		$this->load->view('templates/footer',$output);			
	}
	
	function insert(){
		echo "hola";
	}
}