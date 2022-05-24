<?php 
class Chat_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->db->load_rdriver();
        
    }
/*
public function datosTodosPerfiles(){
        $p = $this->db->query("select * from usuarios")->result();
        if(isset($p)){
            foreach($p as $row){
                $nick = $row->nick;
                $nombre = $row->nombre;
                $apellido = $row->apellido;
                $biografia = $row->biografia;
                $img = $row->img;
            }
            $res = array(
                'nick' => $nick,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'biografia' => $biografia,
                'imagen' => $img,
            );
            return $res;
        }
        else{
            return false;
        }
}
*/
public function Perfiles($username){

    return  $this->db->query("select * from usuarios where nick != '$username'")->result();
}

public function buscarPerfil($id){
       
    return  $this->db->query("select * from usuarios where nick = '$id'")->result();
}

public function buscarChat($nick , $username){

    $envio =  $nick;
    $recibio = $username;
    //select * from mensaje where ((recibio = 'johnny') and (envio = 'CiantiaLT34')) or ((recibio = 'CiantiaLT34') and (envio = 'johnny'))

    //return  $this->db->query("select * from mensaje where envio = '$envio'")->result();
    return  $this->db->query("select * from mensaje where ((recibio = '$envio') and (envio = '$recibio')) or ((recibio = '$recibio') and (envio = '$envio')) ORDER BY time asc")->result();
   // return  $this->db->query("select * from mensaje where envio =  'CintiaLT34' or recibio = 'CintiaLT34'")->result();
}




//`mensaje` (`id`, `envio`, `recibio`, `fecha`, `contenido`)
    public function enviarMensaje($data){
        $this->db->insert('mensaje',array(
            
            'envio' => $data['username'],
            'recibio' => $data['receptor'],
            
            'contenido' => $data['contenido'],
            'time' => $data['time'],
          
            )
        );
        
    }



}