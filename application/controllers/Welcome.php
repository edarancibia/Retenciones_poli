<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Medicos_model');
		$this->load->model('Retencion_model');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('index');
		//$this->load->view('login');
	}

	function insert(){
		$rut = $this->input->post('rut');
		$porcentaje = $this->input->post('porcentaje');
		$this->Retencion_model->insertRetencion($rut,$porcentaje);
		$this->load->view('header');
		$this->load->view('index');
	}

	function update(){
		$rut = $this->input->post('rut');
		$porcen = $this->input->post('porcentaje');
		$this->Retencion_model->updRetencion($rut,$porcen);
		$this->load->view('header');
		$this->load->view('index');
	}

	function elimina(){
		$rut = $this->input->post('rut');
		$this->Retencion_model->elimina($rut);
		$this->load->view('header');
		$this->load->view('index');
	}

	function getMedicos(){
		$data = $this->Medicos_model->getAll();
		//print_r($data);
		//header('Content-type: application/json');
		echo json_encode($data);
	}

	function validaMedico(){
		$rut = $this->input->post('rut');
		$data = $this->Retencion_model->existeRut($rut);
		echo json_encode($data);
	}
}
