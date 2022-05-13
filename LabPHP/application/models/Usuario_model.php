<?php

class Usuario_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->db->load_rdriver();
        
    }

    public function registrarUsuario($data){
        $this->db->insert('usuarios',array(
            'nick' => $data['username'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'img' => $data['img'],
            'biografia' => $data['biografia'],
            'password' => $data['password']
            )
        );
        /*PARA VERIFICAR QUE LO HAYA GUARDADO EN LA BASE SIN TENER QUE IR A CHEQUEAR*/
        $p = $this->db->query("select nick from usuarios where nick = '".$data['username']."'")->result();
        if(isset($p)){
            return true;
        }
        else{
            return false;
        }
    }

    public function iniciarSesion($data){
        // $this->db->where('nick', $data['nick']);
        $p = $this->db->query("select nick , password  from usuarios where nick = '".$data['nick']."'")->result();
        print_r($p);
        // if($query->num_rows() > 0){
            foreach($p as $pa){
                if($pa->password == $data['pwd']){
                    return true;
                }
            }
            return false;
        // }
    }
}