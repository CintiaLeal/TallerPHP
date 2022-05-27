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

    function devolverViaje($_id){
        return $this->db->query("select * from viaje where viaje_id = ".$_id)->result();
    }

    function devolverPedidosOferta($viaje){
        session_start();
        $_id = $this->db->query("select id from usuarios where nick ='".$_SESSION["usuario"]."'")->result();
        foreach($_id as $row){
            $user = $row->id;
        }
        return $this->db->query("SELECT p.titulo, p.numero FROM pedidos p WHERE p.origen ='".$viaje->citiesD_id."' AND p.destino ='".$viaje->citiesH_id."'
        AND ".$viaje->fechaI)->result(); //FALTA PONER EL FILTRO DE LAS FECHAS
    }

}