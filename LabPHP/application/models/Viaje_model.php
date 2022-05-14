<?php

class Usuario_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->db->load_rdriver();
        
    }
/*
    public function registrarViaje($data){
        $this->db->insert('usuarios',array(
            'nick' => $data['username'],
            'username' = $date['username'];
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'img' => $data['img'],
            'biografia' => $data['biografia'],
            'password' => $data['password']
            )
        );

    }*/

    
}