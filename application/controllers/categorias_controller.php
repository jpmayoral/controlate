<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
	}

	function index()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('categorias');
		$crud->set_subject('Categor&iacute;a');
 
		/* Defino los labels del formulario */
		$crud->display_as('categoria_descripcion','Descripci&oacute;n');

		/* ordeno alfabeticamente */
		$crud->order_by('categoria_descripcion');

		$output = $crud->render();

		$this->_mostrarCategorias($output);		
	}	
	
	function _mostrarCategorias($output=null){
		$this->load->view('templates/header',$output);
		//$this->load->view('templates/groceryCRUD',$output);
		$this->load->view('templates/menu');
		$this->load->view('templates/sidebar');		
		$this->load->view('categorias/categorias_view.php',$output);
		$this->load->view('templates/footer',$output);			
	}
	
	function insert(){
		echo "hola";
	}
}