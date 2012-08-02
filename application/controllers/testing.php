<?
/**
* 
*/
class Testing extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$this->load->view('templates/header');
		$this->load->view('templates/menu');		
		$this->load->view('testing_bootstrap');
		$this->load->view('templates/footer');
	}
}