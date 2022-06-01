<?php
class Cupon_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->db->load_rdriver();
        
    }

    function devolverCupones($nick){
        $us = $this->db->query("select id from usuarios where nick ='".$nick."'")->result();
        foreach($us as $row){
            $idUsuario = $row->id;
        }
        $res = $this->db->query("select * from cupones c where c.usado = 0 and c.u_recibe =".$idUsuario)->result();
        $cupones = array();
        if(!empty($res)){
            foreach($res as $row){
                //para cada cupon debo transformar el vencimiento a date y compararlo con la fecha actual
                $vencimiento = strtotime(date_create_from_format("d-m-Y", $row->vencimiento)->format('d-m-Y'));
                if($vencimiento > strtotime(date("d-m-Y"))){
                    array_push($cupones, $row);
                }
            }
        }
        return $cupones;
    }

    function usarCupon($idCupon){
        if($this->db->query("update cupones set usado = 1 where id =".$idCupon)){
            return true;
        }
        else{
            return false;
        }
    }

}
?>