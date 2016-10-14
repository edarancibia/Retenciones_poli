<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicos_model extends CI_Model{

	public function getAll(){
		$query = $this->db->get('MEDICO');
		return $query->result_array();

	}
}