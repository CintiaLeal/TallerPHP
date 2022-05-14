<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viaje extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Viaje_model');
    }

/* 
    function registroViaje(){
            $origen = $_POST['origen'];
            $destino = $_POST['destino'];
            $fechaI = $_POST['fechaI'];
            $fechaV = $_POST['fechaV'];
            $usuario = $_SESSION["usuario"];

            
            $data = array(
                'origen' => $origen, 
                'destino' => $destino,
                'fechaI' => $fechaI,
                'fechaV' => $fechaV,
                'username' => $usuario,
               
            );
            if($this->Viaje_model->registrarViaje($data)){
                $this->load->view('inicio.php');
            }   
    }
*/
   
}