<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model('Pedido_model');
	}

    function registro(){        
        session_start();
        $username = $_SESSION["usuario"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $imagen = $_POST["imagen"];
        $link = $_POST["link"];
        $ciudadH = $_POST['c'];
        $ciudadD = $_POST['ciudades'];
        $fechamin =  $_POST['min'];
        $fechamax =  $_POST['max'];
        $precio = $_POST["precio"];
        $data = array(
            'username' =>$username,
            'titulo'=>$nombre,
            'descripcion'=>$descripcion,
            'precio'=>$precio,
            'imagen'=>$imagen,
            'link' => $link,
            'fecha_min' => $fechamin,
            'fecha_max' => $fechamax,
            'estado' => "activo",
            'origen' => $ciudadD, 
            'destino' => $ciudadH,
        );
        if($this->Pedido_model->registrar($data)){
            $this->load->model('Cupon_model');
            if($this->Cupon_model->usarCupon($_POST["cupon"])){
                $this->load->view('exito.php');
            }
            else{
                $this->load->view('error.php');
            }
        }
        else{
            $this->load->view('error.php');
        }
    }

    public function crearPedido(){
        session_start();
        if(isset($_SESSION["usuario"])){
            $this->load->model("Lugar_model");
            $this->load->model("Cupon_model");
            $cupones = $this->Cupon_model->devolverCupones($_SESSION["usuario"]);
            $Lugar =  $this->Lugar_model->getLugar();
            $data = array(
                'Lugar' => $Lugar,
                'cupones' => $cupones
            );
            $this->load->view('crearPedido.php', $data);
        }
	}

    function verPedido(){
        session_start();
        if(isset($_SESSION['usuario'])){
            //devolver los datos del pedido y cargarlos a la vista con las ofertas
            $idPedido = $_POST['idPedido'];
            $pedido = $this->Pedido_model->devolverPedido($idPedido);
            $ofertas = $this->Pedido_model->devolverOfertas($idPedido);
            $origenDestino = $this->Pedido_model->devolverOrigenDestino($idPedido);
            foreach($pedido as $row){
                $p = $row;
            }
            foreach($origenDestino as $row){
                $destino = $row->destino;
                $origen = $row->origen;
            }
            $data = array(
                'pedido' => $p,
                'ofertas' => $ofertas,
                'origen' => $origen,
                'destino' => $destino
            );
            $this->load->view('pedidoParticular.php',$data);
        }
        else{
            $this->load->view('error.php');
        }
    }

    function aceptarOferta(){
        session_start();
        if(isset($_SESSION["usuario"])){
            $idOferta = $_POST['idOferta'];
            if($this->Pedido_model->aceptarOferta($idOferta)){
                $this->load->view('exito.php');
            }
            else{
                $this->load->view('error.php');
            }
        }
        else{
            $this->load->view('error.php');
        }
    }

    function pedidoRecibido(){
        session_start();
        if(isset($_SESSION["usuario"])){
            $idPedido = $_POST['pedido'];
            if($this->Pedido_model->pedidoRecibido($idPedido)){
                $this->load->view('exito.php');
            }
            else{
                $this->load->view('error.php');
            }
        }
        else{
            $this->load->view('error.php');
        }
    }

}
