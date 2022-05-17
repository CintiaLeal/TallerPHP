<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lugar extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Lugar_model');
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
public function getEstados(){
    $id = $_POST['estado'];

    $Estados =  $this->Lugar_model->getEstados($id);

    $data = array('estados' => $Estados); 
    echo json_encode($data);
}

public function getCiudad(){
    $id = $_POST['estado'];

    $Ciudad =  $this->Lugar_model->getCiudad($id);

    $data = array('ciudades' => $Ciudad); 
    echo json_encode($data);
}
   
/* <?php session_start();
        $username = $_SESSION["usuario"];?>
           <?php echo $username;?>*/
/*function registro(){
    session_start();
    $viaje_id = rand();
    $username = $_SESSION["usuario"];
    $ciudadH = $_POST['c'];
    $ciudadD = $_POST['ciudades'];
    $fechaI = $_POST['fechaI'];
    $fechaV = $_POST['element1'];
    $data = array(
        'viaje_id' => $viaje_id,
        'username' =>$username,
        'ciudadH' => $ciudadH, 
        'ciudadD' => $ciudadD,
        'fechaI' => $fechaI,
        'fechaV' => $fechaV,
        
    );
    if($this->Lugar_model->registrarViaje($data)){
        $this->load->view('inicio.php');
    }   
}*/

}