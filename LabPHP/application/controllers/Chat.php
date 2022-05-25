<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Chat_model');
      //  $this->load->model('Viaje_model');
    }


public function verChat(){
    session_start();
    if(isset($_SESSION["usuario"])){//PARA QUE NO PUEDAN INGRESAR VISITANTES
        $username = $_SESSION["usuario"];
        $this->load->model("Chat_model");
        $Perfiles =  $this->Chat_model->Perfiles($username);
        $this->load->view('chat.php', compact("Perfiles"));
    }
    else{
        $this->load->view('error.php');
    }
}

public function buscarPerfil(){
    $id = $_POST['nick'];
   
    $Perfil =  $this->Chat_model->buscarPerfil($id);

    
    $data = array('perfil' => $Perfil); 
    echo json_encode($data);
}

public function buscarChat(){
   session_start();
   if(isset( $_SESSION["usuario"])){ //PARA QUE NO PUEDAN INGRESAR VISITANTES
        $username = $_SESSION["usuario"];
        $nick = $_POST['nick'];
    
        $infochat = $this->Chat_model->buscarChat($nick,$username);
    
        $data = array('infochat' => $infochat); 
        
        echo json_encode($data);
   }
   else{
        $this->load->view('error.php');
    }
   
}

public function enviarMensaje(){
    session_start();
    if(isset( $_SESSION["usuario"])){//PARA QUE NO PUEDAN INGRESAR VISITANTES
        $username = $_SESSION["usuario"];
        $receptor = $_POST['receptor'];
        $contenido = $_POST['contenido'];
        $time = date("Y-m-d H:i:s"); 
        $data = array(
            'username' => $username,
            'receptor' => $receptor, 
            'contenido' => $contenido, 
           
            'time' => $time,
        );
       $this->Chat_model->enviarMensaje($data);    
    }
    else{
        $this->load->view('error.php');
    }
} 

}