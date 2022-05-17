<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	
	public function index(){
		$this->load->view('inicio.php');
		// $this->load->view('perfiles.php');
	}

	public function login(){
		$this->load->view('login.php');
	}

	public function crearPedido(){
		$this->load->view('crearPedido.php');
	}
	
	public function publicarViajes(){
		$this->load->model("Lugar_model");
        $Lugar =  $this->Lugar_model->getLugar();
		$this->load->view('publicarViajes.php', compact("Lugar"));
	}
}
