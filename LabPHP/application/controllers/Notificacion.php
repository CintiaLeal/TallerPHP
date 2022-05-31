<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notificacion extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Notificacion_model');
     
    }


public function verNotificacion(){
    session_start();
    if(isset($_SESSION["usuario"])){
        $username = $_SESSION["usuario"];
        $Notificaciones = $this->Notificacion_model->verNotificacion($username);
        $this->load->view('notificacion.php',compact("Notificaciones"));
    }
    else{
        $this->load->view('errorPermiso.php');
    }
    
}

public function nuevaNotificacion(){
    session_start();
    if(isset($_SESSION["usuario"])){
        $username = $_SESSION["usuario"];
        $nuevaNotificaciones = $this->Notificacion_model->nuevaNotificacion($username);
        $data = array('nuevaNotificaciones' => $nuevaNotificaciones);         
        echo json_encode($data);
    }
    else{
        $this->load->view('errorPermiso.php');
    }
}
public function alerta(){
    session_start();
    if(isset($_SESSION["usuario"])){
        $username = $_SESSION["usuario"];

        $alerta = $this->Notificacion_model->alerta($username);
        $data = array('alerta' => $alerta); 
    
        echo json_encode($data);
    }
    else{
        $this->load->view('errorPermiso.php');
    }
}


}