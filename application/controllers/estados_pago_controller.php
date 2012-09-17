<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estados_Pago_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
	}

	function index()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('estados_pagos');
		$crud->set_subject('Estado');
 
		/* Defino los labels del formulario */
		$crud->display_as('estado_pago_descripcion','Descripci&oacute;n');

		/* ordeno alfabeticamente */
		$crud->order_by('estado_pago_descripcion');

		$output = $crud->render();

		$this->_mostrarEstasdosPago($output);		
	}	
	
	function _mostrarEstasdosPago($output=null){
		$this->load->view('templates/header',$output);
		//$this->load->view('templates/groceryCRUD',$output);
		$this->load->view('templates/menu');
		$this->load->view('templates/sidebar');		
		$this->load->view('estados_pago/estados_pago_view.php',$output);
		$this->load->view('templates/footer',$output);			
	}
	
	function insert(){
		echo "hola";
	}
}