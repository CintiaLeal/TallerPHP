<?php

class Busqueda_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->db->load_rdriver();
        
    }
     public function pedidos(){
        $q = $this->db->query("select * from pedidos p where p.estado = 'activo'")->result();
    }
    if(isset($q)){
        $res = array();
        foreach($q as $row){
            $res["pedido".$row->numero] = $row;
        }
        $res2 = array('arreglo' => $res);
        return $res2;
    }
    else{
        return null;
    }
     }
     public function viajes(){
        $q = $this->db->query("select * from viajes v where 'fechaI' > '".new Date().."or 'fechaV' > '".new Date()."'")->result();
    }
    if(isset($q)){
        $res = array();
        foreach($q as $row){
            $res["pedido".$row->numero] = $row;
        }
        $res2 = array('arreglo' => $res);
        return $res2;
    }
    else{
        return null;
    }
     }