<?php 
class Notificacion_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->db->load_rdriver();
        
    }

public function verNotificacion($username){
    return  $this->db->query("select * from notificaciones n JOIN usuarios u ON u.id = n.id_usuario where u.nick = '$username' ORDER BY time DESC")->result();
}

public function nuevaNotificacion($username){
    //UPDATE notificaciones SET leida = 0
    $this->db->query("UPDATE notificaciones SET leida = 0");
    return  $this->db->query("select * from notificaciones n JOIN usuarios u ON u.id = n.id_usuario where u.nick = '$username' ORDER BY time DESC LIMIT 3")->result();
}
public function alerta($username){
    return  $this->db->query("select * from notificaciones n JOIN usuarios u ON u.id = n.id_usuario where u.nick = '$username' and n.leida ='1' ORDER BY time DESC LIMIT 3")->result();


}
//SELECT v.viaje_id, v.fechaI, v.fechaV, c.name AS origen, c1.name AS destino FROM viaje v INNER JOIN cities c ON v.citiesD_id = c.id 
//INNER JOIN cities c1 ON v.citiesH_id = c1.id where v.nick = "."'".$nick."'


}