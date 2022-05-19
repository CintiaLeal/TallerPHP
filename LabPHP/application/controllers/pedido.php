<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model('Pedido_model');
	}

    function registro(){        
        session_start();
        $username = $_SESSION["usuario"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $imagen = $_POST["imagen"];
        $link = $_POST["link"];
        $ciudadH = $_POST['c'];
        $ciudadD = $_POST['ciudades'];
        $fechamin =  $_POST['min'];
        $fechamax =  $_POST['max']; //date('d-m-Y');
        $precio = $_POST['precio'];
        $data = array(
            'username' =>$username,
            'titulo'=>$nombre,
            'descripcion'=>$descripcion,
            'precio'=>$precio,
            'imagen'=>$imagen,
            'link' => $link,
            'fecha_min' => $fechamin,
            'fecha_max' => $fechamax,
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
