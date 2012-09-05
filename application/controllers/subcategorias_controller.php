<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategorias_Controller extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();		
	}

	function index()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('subcategorias');
		$crud->set_subject('Subcategor&iacute;a');

		/* Defino los labels del formulario */
		$crud->display_as('subcategoria_descripcion','Descripci&oacute;n');
		$crud->display_as('subcategoria_categoria_id','Categoria');
		$crud->set_relation('subcategoria_categoria_id','categorias','categoria_descripcion');

		$output = $crud->render();

		$this->mostrarSubcategorias($output);		
	}	
	
	function mostrarSubcategorias($output=null){
		$this->load->view('templates/header',$output);
		//$this->load->view('templates/groceryCRUD',$output);
		$this->load->view('templates/menu');
		$this->load->view('templates/sidebar');		
		$this->load->view('subcategorias/subcategorias_view.php',$output);
		$this->load->view('templates/footer',$output);			
	}
	
	function insert(){
		echo "hola";
	}
}