<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    }

    function enviarMail($email){
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.googlemail.com',
            'smtp_user' => 'telollevolabphp@gmail.com', //Su Correo de Gmail Aqui
            'smtp_pass' => 'telollevoLavphp2022', // Su Password de Gmail aqui
            'smtp_port' => '465',
            'smtp_crypto' => 'ssl',
            'mailtype' => 'html',
            'wordwrap' => TRUE,
            'charset' => 'utf-8'
            );
        $this->load->library('email', $config);
        $this->email->from('telollevolabphp@gmail.com');
        $this->email->subject('Verificación de mail');
        $this->email->message('<h1>Hola desde correo<h1>');
        $this->email->to($email);
        if($this->email->send()){
            return true;
        }
        else{
            $this->email->print_debugger();
        }
    }

    function registro(){
            $name = $_POST['name'];
            $username = $_POST['username'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $img = $_POST['img'];
            $email = $_POST['email'];
            $bio = $_POST['biografia'];
            $password = $_POST['password'];
            $data = array(
                'nombre' => $name, 
                'username' => $username,
                'apellido' => $apellido,
                'telefono' => $telefono,
                'img' => $img,
                'email' => $email,
                'biografia' => $bio,
                'password' => $password
            );
            /*SI EL USUARIO FUE REGISTRO Y EL EMAIL SE ENVIO*/
            if($this->Usuario_model->registrarUsuario($data) && $this->enviarMail($email)){
                echo true;
            }
            else{
                echo false;
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
            echo "TRUE";
        }
        else{
            echo "FALSE";
        }
    }
}