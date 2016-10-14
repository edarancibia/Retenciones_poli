<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Retencion_model extends CI_Model{
	public function updRetencion($rut,$porcentaje){
		$sql = 'UPDATE HON_RETENCIONMEDICOS SET RETENCION='.$porcentaje.' WHERE RUT_NUM='.$rut.'';
		$this->db->query($sql);
	}

	public function insertRetencion($rut,$porcentaje){
		$sql = 'INSERT INTO HON_RETENCIONMEDICOS(COD_SEC,RUT_NUM,RETENCION,ESTADO)VALUES(41,'.$rut.','.$porcentaje.',1)';

		if (!$this->db->query($sql)) {
			echo "FALSE";
		}else{
			echo "TRUE";
		}
	}

	public function elimina($rut){
		$sql = 'UPDATE HON_RETENCIONMEDICOS SET ESTADO=0 WHERE RUT_NUM='.$rut.'';
		$this->db->query($sql);
	}

	public function existeRut($rut){
		$sql = $this->db->query('SELECT * FROM HON_RETENCIONMEDICOS WHERE RUT_NUM='.$rut.'');
		$cant = $sql->num_rows();
		return $cant;
	}

}