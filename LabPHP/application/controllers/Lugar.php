<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lugar extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Lugar_model');
    }

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

}