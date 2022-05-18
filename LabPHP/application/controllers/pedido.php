<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->login->model('pedido_model');
	}

    function registro(){
        session_start();
        $username = $_SESSION["usuario"];
        $nombre = $_post["nombre"];
        $descripcion = $_post["descripsion"];
        $precio =$_post["total"];
        $imagen = $_post["imagen"];
        $link = $_post["link"];
        $ciudadH = $_POST['c'];
        $ciudadD = $_POST['ciudades'];
        $fechamin =  $_POST['min'];
        $fechamax =  $_POST['max']; //date('d-m-Y');
        $data = array(
            'username' =>$username,
            'titulo'=>$nombre,
            'descripsion'=>$descripcion,
            'precio'=>$precio,
            'imagen'=>$imagen,
            'link' => $link,
            'fechamin' => $fechamin,
            'fechamax' => $fechamax,
            'estado' => "activo",
            'origen' => $ciudadD, 
            'destino' => $ciudadH,
        );
        if($this->Pedido_model->registrar($data)){
            $this->load->view('inicio.php');
        }
        else{
            $this->load->view('error.php');
        }
    }

}
