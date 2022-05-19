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

    function enviarMail(){

        $mail = new PHPMailer(true);
        try {
            // Configuracion SMTP
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                         // Mostrar salida (Desactivar en producción)
            $mail->isSMTP();                                               // Activar envio SMTP
            $mail->Host  = 'smtp.googlemail.com';                     // Servidor SMTP
            $mail->SMTPAuth  = true;                                       // Identificacion SMTP
            $mail->Username  = 'telollevolabphp@gmail.com';                  // Usuario SMTP
            $mail->Password  = 'telollevoLavphp2022';	          // Contraseña SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port  = 587;
            $mail->setFrom('telollevolabphp@gmail.com', 'TeLoLlevo');                // Remitente del correo

            // Destinatarios
            $mail->addAddress('cintialeal31m@gmail.com', 'Cintia');  // Email y nombre del destinatario traerlos del que se registró

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Verificación de mail';
            $mail->Body  = 'Hola! Necesitamos que verifique su correo';
            // $mail->AltBody = 'Hola! Necesitamos que verifique su correo';
            $mail->send();
        } catch (Exception $e) {
            echo "El mensaje no se ha enviado. Mailer Error: {$mail->ErrorInfo}";
        }
        if($mail->send()){
            return true;
        }
        else{
            return false;
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
            $this->load->view('error.php');
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
        $this->load->view('editarUsuario.php');
    }

    function verPedidos(){
        session_start();
        $res = $this->Usuario_model->devolverPedidos($_SESSION["usuario"]);
        if($res!=null){
            $this->load->view('verPedidos.php',$res);
        }
        else{
            $this->load->view('verPedidos.php',$res);
        }
        
    }
}