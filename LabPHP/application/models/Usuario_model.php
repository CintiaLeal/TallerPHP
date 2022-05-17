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
            'password' => $data['password'],
            'unido' => $data['unido']
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
        // if($query->num_rows() > 0){
            foreach($p as $pa){
                if($pa->password == $data['pwd']){
                    return true;
                }
            }
            return false;
        // }
    }

    public function datosPerfil($nick){
        $p = $this->db->query("select * from usuarios where nick = '".$nick."'")->result();
        $estrellasC = $this->db->query("select estrellas from valoraciones where tipo='comprador'")->result();
        $estrellasV = $this->db->query("select estrellas from valoraciones where tipo='viajero'")->result();
        $valoraciones = $this->db->query("select comentario from valoraciones")->result();
        if(isset($p)){
            foreach($p as $row){
                $nombre = $row->nombre;
                $apellido = $row->apellido;
                $biografia = $row->biografia;
                $unido = $row->unido;
            }
            $una = 0;
            $dos = 0;
            $tres = 0;
            $cuatro = 0;
            $cinco = 0;
            //ESTRELLAS COMO COMPRADOR
            if(isset($estrellasC)){
                foreach($estrellasC as $row){
                    if($row->estrellas == 1){
                        $una +=1;
                    }
                    if($row->estrellas == 2){
                        $dos +=1;
                    }
                    if($row->estrellas == 3){
                        $tres +=1;
                    }
                    if($row->estrellas == 4){
                        $cuatro +=1;
                    }
                    if($row->estrellas == 5){
                        $cinco +=1;
                    }
                }
                $cant = $una+$dos+$tres+$cuatro+$cinco;
                if($cant != 0){
                    $promedioC = ((1*$una)+(2*$dos)+(3*$tres)+(4*$cuatro)+(5*$cinco))/($cant);
                }
                else{
                    $promedioC = 0;
                }
            }
            else{
                $promedioC = 0;
            }
            //ESTRELLAS COMO VIAJERO
            if(isset($estrellasV)){
                foreach($estrellasV as $row){
                    if($row->estrellas == 1){
                        $una +=1;
                    }
                    if($row->estrellas == 2){
                        $dos +=1;
                    }
                    if($row->estrellas == 3){
                        $tres +=1;
                    }
                    if($row->estrellas == 4){
                        $cuatro +=1;
                    }
                    if($row->estrellas == 5){
                        $cinco +=1;
                    }
                }
                $cant = $una+$dos+$tres+$cuatro+$cinco;
                if($cant != 0){
                    $promedioV = ((1*$una)+(2*$dos)+(3*$tres)+(4*$cuatro)+(5*$cinco))/($cant);
                }
                else{
                    $promedioV = 0;
                }
            }
            else{
                $promedioV = 0;
            }
            if(isset($valoraciones)){
                $comentarios = array();
                foreach($valoraciones as $row){
                    array_push($comentarios,$row->comentario);
                }
            }
            $res = array(
                'nombre' => $nombre,
                'apellido' => $apellido,
                'biografia' => $biografia,
                'unido' => $unido,
                'promedioC' => $promedioC,
                'promedioV' => $promedioV,
                'comentarios' => $comentarios
            );
            return $res;
        }
        else{
            return false;
        }
    }
}