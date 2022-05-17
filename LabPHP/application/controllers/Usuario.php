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

    function enviarMail($email){

        // $mail = new PHPMailer(true);

        // try {
        //     // Configuracion SMTP
        //     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                         // Mostrar salida (Desactivar en producción)
        //     $mail->isSMTP();                                               // Activar envio SMTP
        //     $mail->Host  = 'smtp.googlemail.com';                     // Servidor SMTP
        //     $mail->SMTPAuth  = true;                                       // Identificacion SMTP
        //     $mail->Username  = '';                  // Usuario SMTP
        //     $mail->Password  = '';	          // Contraseña SMTP
        //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        //     $mail->Port  = 587;
        //     $mail->setFrom('romias141916@gmail.com', 'Romina');                // Remitente del correo

        //     // Destinatarios
        //     $mail->addAddress('romilopez1@hotmail.es', 'Romina');  // Email y nombre del destinatario

        //     // Contenido del correo
        //     $mail->isHTML(true);
        //     $mail->Subject = 'Asunto del correo';
        //     $mail->Body  = 'Contenido del correo <b>en HTML!</b>';
        //     $mail->AltBody = 'Contenido del correo en texto plano para los clientes de correo que no soporten HTML';
        //     $mail->send();
        //     echo 'El mensaje se ha enviado';
        // } catch (Exception $e) {
        //     echo "El mensaje no se ha enviado. Mailer Error: {$mail->ErrorInfo}";
        // }
        // if($mail->send()){
        //     return true;
        // }
        // else{
        //     print_r($this->email->print_debugger());
        // }
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
                $this->load->view('inicio.php');
            }   
    }

    function iniciarSesion(){
        $username = $_GET['username'];
        $password = $_GET['password'];
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
            //FALTA MANDAR UNA ALERTA PARA QUE QUEDE CON MEJOR VISTA AL USUARIO
            echo "No se ha podido iniciar sesión";
            $this->load->view('inicio.php');
        }
    }

    function cerrarSesion(){
        if(session_destroy()){
            $this->load->view('inicio.php');
        }
    }

    function verPerfil(){
        session_start();
        $username = $_SESSION["usuario"];
        $datos = $this->Usuario_model->datosPerfil($username);
        if($datos!= false){
            $this->load->view('perfiles.php',$datos);
        }
        else{
            $this->load->view('inicio.php');
        }
    }
}