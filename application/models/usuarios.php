<?php
/**
* 
*/
class Usuarios extends CI_Model
{
	
	function login($usuario_email,$usuario_password){
		$query=$this->db->get_where('usuarios',array('usuario_email'=>$usuario_email,'usuario_password'=>md5($usuario_password)),1);

		if($query->num_rows() == 1){
			return $query->result();
		}
		else{
			return false;
		}
	}
}