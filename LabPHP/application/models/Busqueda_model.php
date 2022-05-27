<?php

class Busqueda_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->db->load_rdriver();
        
    }
     public function pedidos(){
        $q = $this->db->query("select * from pedidos p where p.estado = 'activo'")->result();
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
            $format = "d/m/Y"; 
            $q = $this->db->query(
                "select * from viaje v where 'fechaI' > '"
                .date('d-m-Y').
                "' or 'fechaV' > '".date('d-m-Y').
                "'")->result();
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
    }