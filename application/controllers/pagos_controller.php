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
		
		$this->grocery_crud->display_as('pago_nro_referencia','Nº de Referencia');
		$this->grocery_crud->display_as('pago_periodo_desde','Periodo Desde');
		$this->grocery_crud->display_as('pago_periodo_hasta','Periodo Hasta');
		$this->grocery_crud->display_as('pago_fecha_vencimiento','Fecha de Vencimiento');
		$this->grocery_crud->display_as('pago_detalle','Detalle');
		$this->grocery_crud->display_as('pago_archivo_comprobante','Comprobante');
		$this->grocery_crud->display_as('pago_importe','Importe');
		$this->grocery_crud->display_as('pago_categoria_id','Categoría');
		$this->grocery_crud->display_as('pago_subcategoria_id','Subcategoría');
		$this->grocery_crud->display_as('pago_medio_de_pago_id','Medio de Pago');
		$this->grocery_crud->display_as('pago_usuario_id','Usuario');
		$this->grocery_crud->display_as('pago_estado_pago_id','Estado del Pago');	
		$this->grocery_crud->display_as('created_at','Creado');	
		$this->grocery_crud->display_as('updated_at','Actualizado');

		$this->grocery_crud->set_relation('pago_categoria_id','categorias','categoria_descripcion');		
		$this->grocery_crud->set_relation('pago_subcategoria_id','subcategorias','subcategoria_descripcion');		
		$this->grocery_crud->set_relation('pago_medio_de_pago_id','medios_de_pago','medio_de_pago_descripcion');		
		$this->grocery_crud->set_relation('pago_usuario_id','usuarios','usuario_apellido');		
		$this->grocery_crud->set_relation('pago_estado_pago_id','estados_pagos','estado_pago_descripcion');		

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
	
	function insert(){
		echo "hola";
	}
}