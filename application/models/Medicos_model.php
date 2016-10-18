<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Medicos_model extends CI_Model{

	public function getAll(){
		$query = $this->db->get('MEDICO');
		return $query->result_array();

	}

	function get_medicos($q){
	    $this->db->select('*');
	    $this->db->like('NOMBRE', $q);
	    $query = $this->db->get('MEDICO');
	    if($query->num_rows() > 0){
	      foreach ($query->result_array() as $row){
	        $new_row['label']=htmlentities(stripslashes($row['NOMBRE']));
	        $new_row['value']=htmlentities(stripslashes($row['RUT_NUM']));
	        $row_set[] = $new_row; //build an array
	      }
	      echo json_encode($row_set); //format the array into json data
	    }
	 }
}