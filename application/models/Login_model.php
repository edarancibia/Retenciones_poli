<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Login_model extends CI_Model{
	public function existeUsuario($rut,$clave){
		$sql = $this->db->query('SELECT * FROM PER_FIL WHERE RUT_NUM='.$rut.' AND CLAVE='.$clave.'');
		$cant = $sql->num_rows();
		return $cant;
	}
}