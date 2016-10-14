<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function login($rut,$clave)
	{
		$rut = $this->input->post('rut');
		$clave = $this->input->post('clave');
		$data = $this->Login_model->existeUsuario($rut,$clave)
		echo json_encode($data);
	}

	public function logeado(){
		$this->load->view('header');
		$this->load->view('index');
	}
}