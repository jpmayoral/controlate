<?php
/**
* 
*/
class Usuarios extends CI_Model
{
	
	function login($usuarioEmail,$password){
		$this->db->select('usuario_id','usuario_apellido','usuario_nombre','usuario_email','usuario_password');
		$this->db->from('usuarios');
		$this->db->where('usuario_email = '."'".$usuarioEmail."'");
		$this->db->where('usuario_password = '."'".md5($password)."'");
		$this->db->limit(1);

		$query=$this->db->get();

		if($query->num_rows() == 1){
			return $query->result();
		}
		else{
			return false;
		}
	}
}