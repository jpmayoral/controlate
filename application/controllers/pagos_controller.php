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

		/* I define labels for the form */
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

		/* Columns that user can see */
		$crud->columns('pago_nro_referencia','pago_periodo_desde','pago_periodo_hasta',
						'pago_fecha_vencimiento','pago_detalle','pago_archivo_comprobante',
						'pago_importe','pago_categoria_id','pago_subcategoria_id',
						'pago_medio_de_pago_id','pago_estado_pago_id');

		/* inputs that user see when he add a record */
		$crud->add_fields('pago_nro_referencia','pago_periodo_desde','pago_periodo_hasta',
						'pago_fecha_vencimiento','pago_detalle','pago_archivo_comprobante',
						'pago_importe','pago_categoria_id','pago_subcategoria_id',
						'pago_medio_de_pago_id','pago_usuario_id','pago_estado_pago_id',
						'created_at','updated_at');

		/* inputs that user see when he edit a record */
		$crud->edit_fields('pago_nro_referencia','pago_periodo_desde','pago_periodo_hasta',
						'pago_fecha_vencimiento','pago_detalle','pago_archivo_comprobante',
						'pago_importe','pago_categoria_id','pago_subcategoria_id',
						'pago_medio_de_pago_id','pago_usuario_id','pago_estado_pago_id',
						'updated_at');		

		/* obtengo el id del usuario desde la session */
		$crud->change_field_type('pago_usuario_id','hidden',$this->session->userdata['logged_in']['usuario_id']);

		/* Seteo el campo comprobante para subir archivos */
		$crud->set_field_upload('pago_archivo_comprobante',$this->verificar_path_callback());
		//$crud->set_field_upload('pago_archivo_comprobante','assets/uploads/files');
		
		$now = date('Y-m-d H:i:s');
		
		$crud->change_field_type('created_at','hidden',$now);
		$crud->change_field_type('updated_at','hidden',$now);

		/* Campos obligatorios */
		$crud->required_fields('pago_detalle','pago_importe','pago_categoria_id',
				'pago_subcategoria_id','pago_medio_de_pago_id','pago_usuario_id','pago_estado_pago_id');

		/* modifico el html del campo importe */
		$crud->callback_add_field('pago_importe',array($this,'add_field_callback_importe'));
		$crud->callback_edit_field('pago_importe',array($this,'edit_field_callback_importe'));

		/* Traigo datos de las claves foraneas */
		$crud->set_relation('pago_categoria_id','categorias','categoria_descripcion');		
		$crud->set_relation('pago_subcategoria_id','subcategorias','subcategoria_descripcion');		
		$crud->set_relation('pago_medio_de_pago_id','medios_de_pago','medio_de_pago_descripcion');				
		$crud->set_relation('pago_estado_pago_id','estados_pagos','estado_pago_descripcion');		

		$output = $crud->render();

		/* Dependent dropdown setup */
		$dd_data = array(
			/* Get the state of the current page - e.g list/add */
			'dd_state' =>  $crud->getState(),
			
			/* Parent field item always listed first in array, in this case countryID
			Child field items need to follow in order, e.g stateID then cityID */
			'dd_dropdowns' => array('pago_categoria_id','pago_subcategoria_id'),
			
			/* Setup URL POST for each child */
			/* List in order as per above */
			'dd_url' => array('', site_url().'pagos_controller/get_subcategorias/'),
			
			/* Loader displayed next to the parent dropdown while the child loads */
			'dd_ajax_loader' => base_url().'img/ajax-loader.gif'
		);
		$output->dropdown_setup = $dd_data;

		$this->_mostrarPagos($output);		
	}	

	/* Obtener subcategorias con JSON */
	function get_subcategorias(){
		$subcategoria_id = $this->uri->segment(3);

		$this->db->select("*")
				 ->from('subcategorias')
				 ->where('subcategoria_categoria_id',$subcategoria_id);

		$db = $this->db->get();

		$array = array();
		foreach($db->result() as $row):
			$array[] = array("value" => $row->subcategoria_id, "property" => $row->subcategoria_descripcion);
		endforeach;
		
		echo json_encode($array);
		exit;
	}

	function add_field_callback_importe()
	{
		return '$ <input class="span2" id="appendedPrependedInput" size="16" type="text" name="pago_importe"> (ej.: 15.70)';
	}
	
	function edit_field_callback_importe($value,$primary_key)
	{		
		return '$ <input class="span2" id="appendedPrependedInput" size="16" type="text" name="pago_importe" value="'.$value.'"> (ej.: 15.70)';
	}

	/* Funcion para cambiar el path del archivo segun el mes y año */
	function verificar_path_callback(){

		$fecha_vencimiento = $this->input->post('pago_fecha_vencimiento');	
		
		if($fecha_vencimiento){
			
			$fecha_vencimiento = explode('/', $fecha_vencimiento);
			$anio = $fecha_vencimiento[2];

			$mes = $this->obtenerMes($fecha_vencimiento[1]);

			/* Path para la carpeta con el anio */
			$primer_path = APLICATION_PATH.'/assets/uploads/files/'.$anio;

			/* path para la carpeta con el mes */
			$segundo_path = $primer_path.'/'.$mes;
			/* path url para el link del archivo */
			$file_path = 'assets/uploads/files/'.$anio.'/'.$mes;

			/* Si ya existe la carpeta con el año */
			if(is_dir($primer_path)){
				/* Si ya existe la carpeta con el mes */
				if(is_dir($segundo_path)){			
					/* retorno el path url */
					return $file_path;	
				/* Si no existe la carpeta con el mes */
				}else{
					/* Si puedo crear la carpeta con el mes */
					if(mkdir($segundo_path,DIR_WRITE_MODE)){
						/* retorno el path url */
						return $file_path;
					/* Si no puedo crear la carpeta del mes */
					}else{
						echo "problemas al crear la carpeta ".$segundo_path;
						exit;
					}
				}
			/* Si no existe la carpeta con el año */	
			}else{
				/* Creo la carpeta con el año */
				if(mkdir($primer_path,DIR_WRITE_MODE,true)){
					/* Si puedo crear la carpeta con el mes */
					if(mkdir($segundo_path,DIR_WRITE_MODE)){
						/* retorno el path url */
						return $file_path;
					/* Si no puedo crear la carpeta del mes */
					}else{
						echo "problemas al crear la carpeta ".$segundo_path;
						exit;
					}					
				/* Si no puedo crear la carpeta con el año */
				}else{
					echo "problemas al crear la carpeta ".$segundo_path;
					exit;
				}						
			}					
		}			
	}

	/* Devuelvo el mes en string */
	function obtenerMes($mes){			

		switch($mes){
			case '01': return 'Enero';
					break;
			case '02': return 'Febrero';
					break;
			case '03': return 'Marzo';
					break;
			case '04': return 'Abril';
					break;
			case '05': return 'Mayo';
					break;
			case '06': return 'Junio';
					break;
			case '07': return 'Julio';
					break;
			case '08': return 'Agosto';
					break;
			case '09': return 'Septiembre';
					break;
			case '10': return 'Octubre';
					break;
			case '11': return 'Noviembre';
					break;
			case '12': return 'Diciembre';
					break;
			default: return 'Error';
		}
	}

	function _mostrarPagos($output=null){
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