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
}