<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Usuario extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    }

    function index(){
        session_start();
        $this->load->view('inicio.php');
    }

    function enviarMail($email,$usuario){

        $mail = new PHPMailer(true);
            // Configuracion SMTP
            $mail->SMTPDebug = 0;                         // Mostrar salida (Desactivar en producción)
            $mail->isSMTP();                                               // Activar envio SMTP
            $mail->Host  = 'smtp.googlemail.com';                     // Servidor SMTP
            $mail->SMTPAuth  = true;                                       // Identificacion SMTP
            $mail->Username  = 'telollevolabphp@gmail.com';                  // Usuario SMTP
            $mail->Password  = 'telollevoLavphp2022';	          // Contraseña SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port  = 587;
            $mail->setFrom('telollevolabphp@gmail.com', 'TeLoLlevo');                // Remitente del correo

            // Destinatarios
            $mail->addAddress($email, $usuario);  // Email y nombre del destinatario traerlos del que se registró

            // Contenido del correo
            $numero_aleatorio = mt_rand();
            $mail->isHTML(true);
            $mail->Subject = 'VERIFICACION DE EMAIL';
            $mail->Body  = 'Hola! Necesitamos que verifique su correo, por favor introduzca este codigo de verificacion: '.$numero_aleatorio;
            // $mail->AltBody = 'Hola! Necesitamos que verifique su correo';
            if($mail->send()){
                return $numero_aleatorio;
            }
            else{
                $this->load->view('error.php');
            }

    }

    function registro(){
            $name = $_POST['name'];
            $username = $_POST['username'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $img = $_POST['imagen'];
            $email = $_POST['email'];
            $bio = $_POST['biografia'];
            $password = $_POST['password'];
            $fechaActual = date('d-m-Y');
            $data = array(
                'nombre' => $name, 
                'username' => $username,
                'apellido' => $apellido,
                'telefono' => $telefono,
                'img' => $img,
                'email' => $email,
                'biografia' => $bio,
                'password' => $password,
                'unido' => $fechaActual
            );
            //enviar el mail y cargar la vista para verificar el codigo
            $code = $this->enviarMail($email,$name);
            $usuarios = $this->Usuario_model->listarUsuarios();
            $arr = array(
                'data' => $data,
                'code' => $code,
                'usuarios' => $usuarios
            );
            if($code!=false){
                $this->load->view('verificacion.php',$arr);
            }
            else{ //es decir que no se pudo mandar el mail
                $this->load->view('error.php');
            }   
    }

    function validar(){
        $name = $_POST['nombre'];
        $username = $_POST['username'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $img = $_POST['imagen'];
        $email = $_POST['email'];
        $bio = $_POST['biografia'];
        $password = $_POST['password'];
        $fechaActual = $_POST['unido'];
        if($_POST['nickReferido']!=null){
            $nickReferido = $_POST['nickReferido'];
            $data = array(
                'nombre' => $name, 
                'username' => $username,
                'apellido' => $apellido,
                'telefono' => $telefono,
                'img' => $img,
                'email' => $email,
                'biografia' => $bio,
                'password' => $password,
                'unido' => $fechaActual,
                'nickReferido' => $nickReferido
            );
        }
        else{
            $data = array(
                'nombre' => $name, 
                'username' => $username,
                'apellido' => $apellido,
                'telefono' => $telefono,
                'img' => $img,
                'email' => $email,
                'biografia' => $bio,
                'password' => $password,
                'unido' => $fechaActual,
                'nickReferido' => null
            );
        }
        if($this->Usuario_model->registrarUsuario($data)){
            $this->load->view('exito.php');
        }
        else{
            $this->load->view('error.php');
        }
    }

    function iniciarSesion(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $data = array(
            'nick' => $username,
            'pwd' => $password
        );
        if($this->Usuario_model->iniciarSesion($data)){
            session_start();
            $_SESSION["usuario"] = $username;
            $this->load->view('inicio.php');
        }
        else{
            //POR AHORA DEJAMOS ESTO, VER SI PODEMOS QUE SEA SOLO UNA ALERTA
            $this->load->view('error.php');
        }
    }

    function cerrarSesion(){
        session_start();
        session_unset();
        if(!isset($_SESSION["usuario"])){
            $this->load->view('inicio.php');
        }
        else{
            $this->load->view('error.php');
        }
    }

    function verPerfil(){
        session_start();
        if(isset($_SESSION["usuario"])){
            $username = $_SESSION["usuario"];
            $datos = $this->Usuario_model->datosPerfil($username);
            if($datos!= false){
                $this->load->view('perfiles.php',$datos);
            }
            else{
                $this->load->view('error.php');
            }
        }
        else{
            //SIGNIFICA QUE NO HAY SESION INICIADA
            $this->load->view('errorPermiso.php');
        }
        
    }

    function editar(){
        if(isset($_POST['nombre'])){
            $nombre = $_POST['nombre'];
        }
        else{
            $nombre = null;
        }
        if(isset($_POST['apellido'])){
            $apellido = $_POST['apellido'];
        }
        else{
            $apellido = null;
        }
        if(isset($_POST['biografia'])){
            $biografia = $_POST['biografia'];
        }
        else{
            $biografia = null;
        }
        if(isset($_POST['telefono'])){
            $telefono = $_POST['telefono'];
        }
        else{
            $telefono = null;
        }
        if(isset($_POST['imagen'])){
            $imagen = $_POST['imagen'];
        }
        else{
            $imagen = null;
        }
        $data = array(
            'nombre' => $nombre,
            'apellido' => $apellido,
            'biografia' => $biografia,
            'telefono' => $telefono,
            'imagen'=> $imagen
        );
        if($this->Usuario_model->editar($data)){
            $this->load->view('exito.php');
        }
        else{
            $this->load->view('error.php');
        }
    }

    function editarUsuario(){
        session_start();
        if(isset($_SESSION["usuario"])){
            $this->load->view('editarUsuario.php');
        }
        else{
            $this->load->view('errorPermiso.php');
        }
    }

    function verViajes(){
        session_start();
        if(isset($_SESSION["usuario"])){
            $res = $this->Usuario_model->devolverViajes($_SESSION["usuario"]);
            if($res!=null){
                $this->load->view('verViajes.php',$res);
            }
            else{
                $this->load->view('verVaijes.php', $res);
            }
        }
        else{
            $this->load->view('errorPermiso.php');
        }
    }

    function verPedidos(){
        session_start();
        if(isset($_SESSION["usuario"])){
            $res = $this->Usuario_model->devolverPedidos($_SESSION["usuario"]);
            if($res!=null){
                $this->load->view('verPedidos.php',$res);
            }
            else{
                $this->load->view('verPedidos.php',$res);
            }
        }
        else{
            $this->load->view('errorPermiso.php');
        }
    }

    function verPedidosActivos(){
        session_start();
        if(isset($_SESSION["usuario"])){
            $res = $this->Usuario_model->devolverPedidosActivos($_SESSION["usuario"]);
            if($res!=null){
                $this->load->view('verPedidos.php',$res);
            }
            else{
                $this->load->view('verPedidos.php',$res);
            }
        }
        else{
            $this->load->view('errorPermiso.php');
        }  
    }

    function verPedidosPendientes(){
        session_start();
        if(isset($_SESSION["usuario"])){
            $res = $this->Usuario_model->devolverPedidosPendientes($_SESSION["usuario"]);
            if($res!=null){
                $this->load->view('verPedidos.php',$res);
            }
            else{
                $this->load->view('verPedidos.php',$res);
            }
        }
        else{
            $this->load->view('errorPermiso.php');
        }  
    }

    function verPedidosEnTransito(){
        session_start();
        if(isset($_SESSION["usuario"])){
            $res = $this->Usuario_model->devolverPedidosEnTransito($_SESSION["usuario"]);
            if($res!=null){
                $this->load->view('verPedidos.php',$res);
            }
            else{
                $this->load->view('verPedidos.php',$res);
            }
        }
        else{
            $this->load->view('errorPermiso.php');
        }  
    }

    function verPedidosEntregados(){
        session_start();
        if(isset($_SESSION["usuario"])){
            $res = $this->Usuario_model->devolverPedidosEntregados($_SESSION["usuario"]);
            if($res!=null){
                $this->load->view('verPedidos.php',$res);
            }
            else{
                $this->load->view('verPedidos.php',$res);
            }
        }
        else{
            $this->load->view('errorPermiso.php');
        }  
    }

    function existeNick(){
        $username = $_POST['username'];

        $existe = $this->Usuario_model->existeNick($username);
        if($existe != false){
        
            $data = array('existe' => $existe); 
            
        }
        else{
            $data = array('existe' => $existe); 
        }
        echo json_encode($data);


    }
    function existeEmail(){
        $email = $_POST['email'];

        $existeEmail = $this->Usuario_model->existeEmail($email);
        if($existeEmail != false){
        
            $data = array('existeEmail' => $existeEmail); 
            
        }
        else{
            $data = array('existeEmail' => $existeEmail); 
        }
        echo json_encode($data);


    }

    function valorarUsuario(){
        session_start();
        if(isset($_SESSION["usuario"])){
            $res = $this->Usuario_model->listarUsuariosNoValorados();
            if(isset($res)){
                $arr = array('usuarios' => $res);
                $this->load->view('valoraciones.php', $arr);
            }
            else{
                $this->load->view('error.php');
            }
        }
        else{
            $this->load->view('errorPermiso.php');
        }
    }

    function valorar(){
        session_start();
        if(isset($_SESSION["usuario"])){
            $data = array(
                'valora' => $_SESSION["usuario"],
                'recibe' => $_POST['nickname'],
                'comentario' => $_POST['comentarios'],
                'estrellas' => $_POST['estrellas'],
                'tipo'=> $_POST['tipo'],
            );
            if($this->Usuario_model->valorar($data)){
                $this->load->view('exito.php');
            }
            else{
                $this->load->view('error.php');
            }
        }
        else{
            $this->load->view('errorPermiso.php');
        }
    }
}