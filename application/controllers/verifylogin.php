<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class VerifyLogin extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('usuarios','',TRUE);
	}

	function index(){
		# This method will have the credentials validation
		$this->form_validation->set_rules('usuario_email','Email','trime|required|xss_clean');
		$this->form_validation->set_rules('usuario_password','Contraseña','trim|required|xss_clean|callback_check_database');

		if($this->form_validation->run() == FALSE){
			# Field validation failed. User redirected to login page
			$this->load->view('login/login_view');
		}else{
			# Go to private area
			redirect('home','refresh');
		}
	}

	function check_database($password){
		# Field validation succeeded. Validate against database
		$usuario_email = $this->input->post('usuario_email');

		# Query the database
		$result = $this->usuarios->login($usuario_email,$password);

		if($result){
			$sess_array = array();
			foreach($result as $row){
				$sess_array = array(
					'usuario_id' => $row->usuario_id,					
					'usuario_apellido' => $row->usuario_apellido,
					'usuario_nombre' => $row->usuario_nombre,
					'usuario_email' => $row->usuario_email
					);
				$this->session->set_userdata('logged_in',$sess_array);
			}
			return TRUE;
		}else{
			$this->form_validation->set_message('check_database','Invalid email or password');
			return false;
		}
	}

}