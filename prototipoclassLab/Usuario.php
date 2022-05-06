<?php
class Usuario
{
  private $nickname;
  private $email;
  private $nombre;
  private $apellido;
  private $telefono;
  private $imagen;
  private $biografia;
  private $password;

  public function __construct($nickname, $email, $nombre, $apellido, $telefono, $imagen, $biografia, $password)
  {
    $this->nickname = $nickname;
    $this->email = $email;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->telefono = $telefono;
    $this->imagen = $imagen;
    $this->biografia = $biografia;
    $this->password = $password;
  }
 
  public function getNickname()
  {
    return $this->$nickname;
  }
 
  public function getEmail()
  {
    return $this->$email;
  }
 
  public function getNombre()
  {
    return $this->nombre;
  }

  public function getApellido()
  {
    return $this->apellido;
  }

  public function getTelefono()
  {
    return $this->telefono;
  }

  public function getBiografia()
  {
    return $this->biografia;
  }

  public function getPassword()
  {
    return $this->password;
  }
}
?>