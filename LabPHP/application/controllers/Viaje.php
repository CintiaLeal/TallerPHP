<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viaje extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Viaje_model');
      //  $this->load->model('Viaje_model');
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

/* <?php session_start();
        $username = $_SESSION["usuario"];?>
           <?php echo $username;?>*/
function registro(){
    session_start();
    $viaje_id = '485';
    $username = $_SESSION["usuario"];
    $ciudadH = $_POST['c'];
    $ciudadD = $_POST['ciudades'];
    /*$fecha = DateTime::createFromFormat('Y/m/d', $_POST['fechaI']);
    $fechaI = $fecha->format('d/m/Y');*/
    //$fechaI = strtotime($_POST['fechaI']);
    //  $fechaI =  $_POST['fechaI'];//date('d-m-Y');
    $fechaI =  $_POST['fechaI'];
    $fechaV =  $_POST['element1']; //date('d-m-Y');
    $data = array(
        'viaje_id' => $viaje_id,
        'username' =>$username,
        'ciudadH' => $ciudadH, 
        'ciudadD' => $ciudadD,
        'fechaI' => $fechaI,
        'fechaV' => $fechaV,
        
    );
    if($this->Viaje_model->registrarViaje($data)){
        $this->load->view('inicio.php');
    }   
}

}