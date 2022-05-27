<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viaje extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Viaje_model');
    }

function registro(){
    session_start();
    $viaje_id = '485';
    $username = $_SESSION["usuario"];
    $ciudadH = $_POST['c'];
    $ciudadD = $_POST['ciudades'];
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
        $this->load->view('exito.php');
    }   
}

function verViaje(){
    $_id = $_POST["idViaje"];
    $res = $this->Viaje_model->devolverViaje($_id);
    if(!empty($res)){
        foreach($res as $row){
            $viaje = $row;
        }
    }
    $pedidos = $this->Viaje_model->devolverPedidosOferta($viaje);
    $data = array(
        'viaje' => $viaje,
        'pedidos' => $pedidos
    );
    $this->load->view('viajeParticular.php',$data);
}

}