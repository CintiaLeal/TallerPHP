<?php 
class Chat_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->db->load_rdriver();
        
    }

public function Perfiles($username){

    return  $this->db->query("select DISTINCT(u.nick) as nick, u.nombre as nombre,u.apellido as apellido, u.img as img from usuarios u, mensaje m where (u.nick = m.envio or m.recibio = u.nick) and u.nick !='$username'")->result();
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