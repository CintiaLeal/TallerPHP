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

            $res2 = $this->db->query("select id from usuarios where nick = '".$data['username']."'")->result();
            foreach($res2 as $row){
                $id = $row->id;
            }
            return true;
        }
        else{
            return false;
        }
    }

    function devolverViaje($_id){
        return $this->db->query("select v.viaje_id, v.fechaI, v.fechaV, c.name as origen, c1.name as destino from viaje v inner join cities c on c.id = v.citiesD_id
         inner join cities c1 on c1.id = v.citiesH_id where viaje_id = ".$_id)->result();
    }

    function devolverPedidosOferta($viaje){
        $_id = $this->db->query("select id from usuarios where nick ='".$_SESSION["usuario"]."'")->result();
        foreach($_id as $row){
            $user = $row->id;
        }
        $origen = $this->db->query("select id from cities where name ='".$viaje->origen."'")->result();
        $destino = $this->db->query("select id from cities where name ='".$viaje->destino."'")->result();
        foreach($origen as $row){
            $id_origen = $row->id;
        }
        foreach($destino as $row){
            $id_destino = $row->id;
        }
        return $this->db->query("SELECT p.titulo, p.numero FROM pedidos p WHERE p.origen ='".$id_origen."' AND p.destino ='".$id_destino."'
        AND '".$viaje->fechaI."' < p.fecha_max AND '".$viaje->fechaI."' > p.fecha_min AND p.numero NOT IN (SELECT pedido FROM ofertas WHERE viaje = $viaje->viaje_id)")->result(); //FALTAN LOS FILTROS DE LAS FECHAS
    }

    function ofertar($id_pedido,$id_viaje,$comision){
        if($this->db->insert(
            'ofertas',array(
                'viaje' => $id_viaje,
                'pedido' => $id_pedido,
                'comision' => $comision
            )
        )){
            return true;
        }
        else{
            return false;
        }
    }

}