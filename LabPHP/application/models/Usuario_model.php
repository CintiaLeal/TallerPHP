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
        if($data['nickReferido']!=null){
           $res = $this->db->query("select id from usuarios where nick = '".$data['nickReferido']."'")->result();
           $res2 = $this->db->query("select id from usuarios where nick = '".$data['username']."'")->result();
           foreach($res as $row){
               $idComparte = $row->id;
           }
           foreach($res2 as $row){
               $idRecibe = $row->id;
           }
           $fecha = date_create('now');
           date_add($fecha, date_interval_create_from_date_string("1 months"));
           $this->db->insert('cupones', array(
               'descuento' => 420,
               'vencimiento' => date_format($fecha,"d-m-Y"),
               'u_recibe' => $idRecibe,
               'u_from' => $idComparte
           ));
           $this->db->insert('cupones', array(
            'vencimiento' => date_format($fecha,"d-m-Y"),
            'u_recibe' => $idComparte
        ));
        }
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
        $idR = $this->db->query("select id from usuarios where nick = '".$nick."'")->result();
        if(!empty($idR)){
            foreach($idR as $row){
                $id_recibe = $row->id;
            }
        }
        $estrellasC = $this->db->query("select estrellas from valoraciones where tipo='comprador' and recibe = '$id_recibe'")->result();
        $estrellasV = $this->db->query("select estrellas from valoraciones where tipo='viajero' and recibe = '$id_recibe'")->result();
        $valoraciones = $this->db->query("select comentario from valoraciones where recibe = '$id_recibe'")->result();
        if(!empty($p)){
            foreach($p as $row){
                $nombre = $row->nombre;
                $apellido = $row->apellido;
                $biografia = $row->biografia;
                $unido = $row->unido;
                $img = $row->img;
            }
            $una = 0;
            $dos = 0;
            $tres = 0;
            $cuatro = 0;
            $cinco = 0;
            //ESTRELLAS COMO COMPRADOR
            if(!empty($estrellasC)){
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
                if($cant > 0){
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
            if(!empty($estrellasV)){
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
                if($cant > 0){
                    $promedioV = ((1*$una)+(2*$dos)+(3*$tres)+(4*$cuatro)+(5*$cinco))/($cant);
                }
                else{
                    $promedioV = 0;
                }
            }
            else{
                $promedioV = 0;
            }
            $comentarios = array();
            if(!empty($valoraciones)){
                foreach($valoraciones as $row){
                    array_push($comentarios,$row->comentario);
                }
            }
            $res = array(
                'nombre' => $nombre,
                'apellido' => $apellido,
                'biografia' => $biografia,
                'unido' => $unido,
                'imagen' => $img,
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

    function editar($data){
        if($data['nombre']!=null){
            $this->db->query("update usuarios set nombre = "."'".$data["nombre"]."'"."where nick ="."'".$_SESSION["usuario"]."'");
        }
        if($data['apellido']!=null){
            $this->db->query("update usuarios set apellido = "."'".$data["apellido"]."'"."where nick ="."'".$_SESSION["usuario"]."'");
        }
        if($data['biografia']!=null){
            $bio = $data['biografia'];
            $this->db->query("update usuarios set biografia = "."'".$bio."'"." where nick ="."'".$_SESSION["usuario"]."'");
        }
        if($data['telefono']!=null){
            $this->db->query("update usuarios set telefono = "."'".$data["telefono"]."'"."where nick ="."'".$_SESSION["usuario"]."'");
        }
        if($data['imagen']!=null){
            $this->db->query("update usuarios set img = "."'".$data["imagen"]."'"."where nick ="."'".$_SESSION["usuario"]."'");
        }
        return true;
    }

    function devolverViajes($nick){
        $q = $this->db->query("SELECT v.viaje_id, v.fechaI, v.fechaV, c.name AS origen, c1.name AS destino FROM viaje v INNER JOIN cities c ON v.citiesD_id = c.id 
        INNER JOIN cities c1 ON v.citiesH_id = c1.id where v.nick = "."'".$nick."'")->result(); //devuelve el viaje y el origen
        if(isset($q)){
            $res = array();
            foreach($q as $row){
                $res["viaje".$row->viaje_id] = $row;
            }
            return array('res' => $res);
        }
        else{
            return null;
        }
    }

    function devolverPedidos($nick){
        $id = $this->db->query("select id from usuarios where nick ="."'".$nick."'")->result();
        if(isset($id)){
            $num = 0;
            foreach($id as $r){
                $num = $r->id;
            }
            $q = $this->db->query("select * from pedidos p where p.usuario = $num")->result();
        }
        if(isset($q)){
            $res = array();
            foreach($q as $row){
                $res["pedido".$row->numero] = $row;
            }
            $res2 = array('arreglo' => $res);
            return $res2;
        }
        else{
            return null;
        }
    }

    function devolverPedidosActivos($nick){
        $id = $this->db->query("select id from usuarios where nick ="."'".$nick."'")->result();
        if(isset($id)){
            $num = 0;
            foreach($id as $r){
                $num = $r->id;
            }
            $q = $this->db->query("select * from pedidos p where p.usuario = $num and p.estado = 'activo'")->result();
        }
        if(isset($q)){
            $res = array();
            foreach($q as $row){
                $res["pedido".$row->numero] = $row;
            }
            $res2 = array('arreglo' => $res);
            return $res2;
        }
        else{
            return null;
        }
    }

    function devolverPedidosEntregados($nick){
        $id = $this->db->query("select id from usuarios where nick ="."'".$nick."'")->result();
        if(isset($id)){
            $num = 0;
            foreach($id as $r){
                $num = $r->id;
            }
            $q = $this->db->query("select * from pedidos p where p.usuario = $num and p.estado = 'recibido'")->result();
        }
        if(isset($q)){
            $res = array();
            foreach($q as $row){
                $res["pedido".$row->numero] = $row;
            }
            $res2 = array('arreglo' => $res);
            return $res2;
        }
        else{
            return null;
        }
    }

    function devolverPedidosEnTransito($nick){
        $id = $this->db->query("select id from usuarios where nick ="."'".$nick."'")->result();
        if(isset($id)){
            $num = 0;
            foreach($id as $r){
                $num = $r->id;
            }
            $q = $this->db->query("select * from pedidos p where p.usuario = $num and p.estado = 'transito'")->result();
        }
        if(isset($q)){
            $res = array();
            foreach($q as $row){
                $res["pedido".$row->numero] = $row;
            }
            $res2 = array('arreglo' => $res);
            return $res2;
        }
        else{
            return null;
        }
    }

    function devolverPedidosPendientes($nick){
        $id = $this->db->query("select id from usuarios where nick ="."'".$nick."'")->result();
        if(isset($id)){
            $num = 0;
            foreach($id as $r){
                $num = $r->id;
            }
            $q = $this->db->query("select * from pedidos p where p.usuario = $num and p.estado = 'pendiente'")->result();
        }
        if(isset($q)){
            $res = array();
            foreach($q as $row){
                $res["pedido".$row->numero] = $row;
            }
            $res2 = array('arreglo' => $res);
            return $res2;
        }
        else{
            return null;
        }
    }
    public function existeNick($username){
        $p = $this->db->query("select nick from usuarios where nick = '$username'")->result();
        if($p){
            return $existe = 1;
        }
        return $existe = 0;
    } 
    public function existeEmail($email){
        $p = $this->db->query("select email from usuarios where email = '$email'")->result();
        if($p){
            return $existe = 1;
        }
        return $existe = 0;
    }
    
    function listarUsuarios(){
        return $this->db->query("select nick from usuarios")->result();
    }

    function listarUsuariosNoValorados(){
        session_start();
        $id = $this->db->query("select id from usuarios where nick ='".$_SESSION["usuario"]."'")->result();
        if(!empty($id)){
            foreach($id as $row){
                $id_recibe = $row->id;
            }
            return $this->db->query("SELECT u.nick FROM usuarios u WHERE u.id NOT IN 
            (SELECT v.recibe FROM valoraciones v WHERE v.valora = $id_recibe) AND u.nick != '".$_SESSION["usuario"]."'")->result();
        }
        else{
            $this->load->view('error.php');
        }
    }

    public function valorar($data){
        $valora = $this->db->query("select id from usuarios where nick = '".$data['valora']."'")->result();
        foreach($valora as $v){
            $id_valora = $v->id;
        }
        $recibe = $this->db->query("select id from usuarios where nick = '".$data['recibe']."'")->result();
        foreach($recibe as $r){
            $id_recibe = $r->id;
        }
        $this->db->insert('valoraciones',array(
            'valora' => $id_valora,
            'recibe' => $id_recibe,
            'comentario' => $data['comentario'],
            'estrellas' => $data['estrellas'],
            'tipo' => $data['tipo']
        ));
        $p = $this->db->query("select * from valoraciones where valora = '".$id_valora."' and recibe = '".$id_recibe."' and estrellas = '".$data['estrellas'] ."' and tipo = '".$data['tipo'] ."' and comentario = '".$data['comentario']."'");
        if(isset($p)){
            return true;
        }
        else{
            return false;
        }
    }   

    public function registrofacebook($data){
        session_start();
        if($data['idFacebok']!=null){
            $res = $this->db->query("select id from usuarios where nick ='".$_SESSION["usuario"]."'")->result();
            foreach($res as $row){
                $iduser = $row->id;
            }
            $this->db->query("update usuarios set idFacebok = "."'".$data["idFacebok"]."'"." where id = ".$iduser);
            return true;
        }
            else{
                return false;
            }
    }

    public function iniciofacebook($data){
        session_start();
        if($data['idFacebok']!=null){
            $nick = $this->db->query("SELECT nick FROM usuarios WHERE idFacebok = '".$data['idFacebok']."'")->result();
            if(!empty($nick)){
                foreach($nick as $row){
                    $username = $row->nick;
                }
            $_SESSION["usuario"] = $username;
            return true;
        }
            else{
                return false;
            }
    }

}
}