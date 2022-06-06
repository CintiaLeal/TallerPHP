<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busqueda extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model('Busqueda_model');
	}

    function index(){
		
        
    }
	function buscar(){
        // $pedidos = $this->Busqueda_model->pedidos();
		// $viajes = $this->Busqueda_model->viajes();
		// $data = array(
		// 	'pedidos' => $pedidos,
		// 	'viajes' => $viajes
		// );

		//print_r($data);
		
		$this->load->view('busqueda.php');//,$data
    }

	function busqueda(){
		$c = $_POST['contenido'];
		$pedidos = $this->Busqueda_model->buscarpedidos($c);
		$viajes = $this->Busqueda_model->buscarviajes($c);
		$data = array(
			'pedidos' => $pedidos,
			'viajes' => $viajes
		);
		echo json_encode($data);
	}
}