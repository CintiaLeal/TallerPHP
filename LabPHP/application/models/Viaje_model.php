<?php

class Viaje_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->db->load_rdriver();
        
    }

    public function registrarViaje($data){
        if($this->db->insert('viaje',array(
            'nick' => $data['username'],
            'citiesD_id' => $data['ciudadD'],
            'citiesH_id' => $data['ciudadH'],
            'fechaI' => $data['fechaI'],
            'fechaV' => $data['fechaV'],
            )
        )){
            return true;
        }
        else{
            return false;
        }
    }

/*$ciudadH = $_POST['c'];
    $ciudadD = $_POST['ciudades'];
    $fechaI = $_POST['fechaI'];
    $fechaV = $_POST['element1'];
    $data = array(
        'ciudadH' => $ciudadH, 
        'ciudadD' => $ciudadD,
        'fechaI' => $fechaI,
        'fechaV' => $fechaV,     
);*/

}