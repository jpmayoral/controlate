<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagos_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
	}

	function index()
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

		/*
		$crud->add_fields('pago_nro_referencia','pago_periodo_desde','pago_periodo_hasta',
						'pago_fecha_vencimiento','pago_detalle','pago_archivo_comprobante',
						'pago_importe','pago_categoria_id','pago_subcategoria_id',
						'pago_medio_de_pago_id','pago_usuario_id','pago_estado_pago_id',
						'created_at','updated_at');
		$crud->edit_fields('pago_nro_referencia','pago_periodo_desde','pago_periodo_hasta',
						'pago_fecha_vencimiento','pago_detalle','pago_archivo_comprobante',
						'pago_importe','pago_categoria_id','pago_subcategoria_id',
						'pago_medio_de_pago_id','pago_usuario_id','pago_estado_pago_id',
						'updated_at');
		*/

		/* Seteo el campo comprobante para subir archivos */
		$crud->set_field_upload('pago_archivo_comprobante', 'assets/uploads/files');

		$crud->change_field_type('pago_usuario_id','hidden',3);

		$created_at = date('d/m/Y H:m:s');
		$updated_at = date('d/m/Y H:m:s');
		//$crud->change_field_type('created_at','hidden',$created_at);
		//$crud->change_field_type('updated_at','hidden',$updated_at);

		/* Campos obligatorios */
		$crud->required_fields('pago_detalle','pago_importe','pago_categoria_id',
				'pago_subcategoria_id','pago_medio_de_pago_id','pago_usuario_id','pago_estado_pago_id');

		/* Elimino el editor de textos del campo detalle */
		$crud->unset_texteditor('pago_detalle');

		/* modifico el html del campo importe */
		$crud->callback_add_field('pago_importe',array($this,'add_field_callback_importe'));
		$crud->callback_edit_field('pago_importe',array($this,'edit_field_callback_importe'));

		/* Traigo datos de las claves foraneas */
		$crud->set_relation('pago_categoria_id','categorias','categoria_descripcion');		
		$crud->set_relation('pago_subcategoria_id','subcategorias','subcategoria_descripcion');		
		$crud->set_relation('pago_medio_de_pago_id','medios_de_pago','medio_de_pago_descripcion');				
		$crud->set_relation('pago_estado_pago_id','estados_pagos','estado_pago_descripcion');		

		$output = $crud->render();

		$this->mostrarPagos($output);		
	}	

	function add_field_callback_importe()
	{
		return '<span class="add-on">$ </span><input class="span2" id="appendedPrependedInput" size="16" type="text" name="pago_importe">';
	}
	
	function edit_field_callback_importe($value,$primary_key)
	{		
		return '<span class="add-on">$ </span><input class="span2" id="appendedPrependedInput" size="16" type="text" name="pago_importe" value="'.$value.'">';
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