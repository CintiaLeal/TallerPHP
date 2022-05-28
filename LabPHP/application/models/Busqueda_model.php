<?php

class Busqueda_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->db->load_rdriver();
        
    }
     public function pedidos(){
        $q = $this->db->query("SELECT * FROM pedidos p WHERE p.estado = 'activo' ")->result(); //devuelve el viaje y el origen //AND p.fecha_max > date(now())
        if(isset($q)){
        $res = array();
        foreach($q as $row){
            $res["pedido".$row->numero] = $row;
        }
        return $res;
        }
        else{
            return null;
        }
     }

        public function viajes(){
            $format = "d/m/Y"; 
            $q = $this->db->query("SELECT v.viaje_id, v.fechaI, v.fechaV, c.name AS origen, c1.name AS destino FROM viaje v INNER JOIN cities c ON v.citiesD_id = c.id 
            INNER JOIN cities c1 ON v.citiesH_id = c1.id")->result(); //devuelve el viaje y el origen // where v.fechaI > date(now()) OR v.fechaV > date(now())
            if(isset($q)){
            $res = array();
            foreach($q as $row){
                $res["viaje".$row->viaje_id] = $row;
            }
            return $res;
            }
            else{
                return null;
            }
        }
    }