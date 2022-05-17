<?php 
class Lugar_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->db->load_rdriver();
        
    }

   
    //BUSCAR
  /*  public function buscar($tabla, $condicion){
        $resultado = $this->db->query("SELECT * FROM $tabla WHERE $condicion");
        if($resultado)
            return $resultado->fetch_all(MYSQLI_ASSOC);
        return false;
    } */

    public function getLugar(){

       return  $this->db->query("select * from countries")->result();
    }


}
?>