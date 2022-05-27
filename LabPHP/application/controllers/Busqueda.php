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
        $pedidos = $this->Busqueda_model->pedidos();
		$viajes = $this->Busqueda_model->viajes();
		$this->load->view('busqueda.php',$pedidos,$viajes);
    }
}