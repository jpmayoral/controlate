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
		$crud = new grocery_CRUD();

		$crud->set_table('pagos');
		$crud->set_subject('Pago');
		
		/* Defino los labels del formulario */
		$crud->display_as('pago_nro_referencia','Nº de Referencia');
		$crud->display_as('pago_periodo_desde','Periodo Desde');
		$crud->display_as('pago_periodo_hasta','Periodo Hasta');
		$crud->display_as('pago_fecha_vencimiento','Fecha de Vencimiento');
		$crud->display_as('pago_detalle','Detalle');
		$crud->display_as('pago_archivo_comprobante','Comprobante');
		$crud->display_as('pago_importe','Importe');
		$crud->display_as('pago_categoria_id','Categoría');
		$crud->display_as('pago_subcategoria_id','Subcategoría');
		$crud->display_as('pago_medio_de_pago_id','Medio de Pago');
		$crud->display_as('pago_usuario_id','Usuario');
		$crud->display_as('pago_estado_pago_id','Estado del Pago');	
		$crud->display_as('created_at','Creado');	
		$crud->display_as('updated_at','Actualizado');

		/* Seteo el campo comprobante para subir archivos */
		//$crud->set_field_upload('pago_archivo_comprobante', 'assets/uploads/files');

		/* Traigo datos de las claves foraneas */
		$crud->set_relation('pago_categoria_id','categorias','categoria_descripcion');		
		$crud->set_relation('pago_subcategoria_id','subcategorias','subcategoria_descripcion');		
		$crud->set_relation('pago_medio_de_pago_id','medios_de_pago','medio_de_pago_descripcion');				
		$crud->set_relation('pago_estado_pago_id','estados_pagos','estado_pago_descripcion');		

		$output = $crud->render();

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