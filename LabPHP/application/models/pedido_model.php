<?php

class Viaje_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->db->load_rdriver();
        
    }

    public function registrar($data){
        $this->db->insert('pedidos',array(
            'usuario' => $data['username'],
            'titulo' => $data['titulo'],
            'descripcion' => $data['descripcion'],
            'precio' => $data['precio'],
            'imagen' => $data['imagen'],
            'link' => $data['link'],
            'fechaMin' => $data['fechaMin'],
            'fechaMax' => $data['fechaMax'],
            'estado' => $data['estado'],
            'origen' => $data['origen'],
            'destino' => $data['destino'],
            )
        );
    }
}