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
    }

    public function iniciarSesion($data){
        // $this->db->where('nick', $data['nick']);
        $p = $this->db->query("select nick , password  from usuarios where nick = '".$data['nick']."'")->result();
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