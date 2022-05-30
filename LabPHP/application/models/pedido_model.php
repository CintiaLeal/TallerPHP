<?php

class Pedido_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->db->load_rdriver();
        
    }
    public function registrar($data){
        $id = $this->db->query("select id from usuarios where nick ='".$data['username']."'")->result();
        if(isset($id)){
            $num = 0;
            foreach($id as $r){
                $num = $r->id;
            }
        }
        if($this->db->insert('pedidos',array(
            'usuario' => $num,
            'titulo' => $data['titulo'],
            'descripcion' => $data['descripcion'],
            'precio' => $data['precio'],
            'imagen' => $data['imagen'],
            'link' => $data['link'],
            'fecha_min' => $data['fecha_min'],
            'fecha_max' => $data['fecha_max'],
            'estado' => $data['estado'],
            'origen' => $data['origen'],
            'destino' => $data['destino'],
            )
        )){
            return true;
        }
        else{
            return false;
        }
    }

    function devolverPedido($idPedido){
        return $this->db->query("select * from pedidos p where numero ='".$idPedido."'")->result();
    }

    function devolverOrigenDestino($idPedido){
        return $this->db->query("select c.name as origen, c1.name as destino from pedidos p inner join cities c on c.id = p.origen
        inner join cities c1 on c1.id = p.destino where p.numero ='".$idPedido."'")->result();
    }

    function devolverOfertas($idPedido){
        return $this->db->query("select * from ofertas where pedido ='".$idPedido."' and aceptada = 0")->result();
    }

    function aceptarOferta($idOferta){
        if($this->db->query("update ofertas set aceptada = 1 where id =".$idOferta)){
            return true;
        }
        else{
            return false;
        }
    }

    function pedidoRecibido($idPedido){
        if($this->db->query("update pedidos set estado = 'recibido' where numero =".$idPedido)){
            return true;
        }
        else{
            return false;
        }
    }
}