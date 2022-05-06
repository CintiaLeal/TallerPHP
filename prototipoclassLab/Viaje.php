<?php
class Viaje
{
  private $origen;
  private $destino;
  private $fechaI;
  private $fechaV;


  public function __construct($origen, $destino, $fechaI, $fechaV)
  {
    $this->origen = $origen;
    $this->destino = $destino;
    $this->fechaI = $fechaI;
    $this->fechaV = $fechaV;

  }
 
  public function getOrigen()
  {
    return $this->origen;
  }
 
  public function getDestino()
  {
    return $this->destino;
  }
 
  public function getFechaI()
  {
    return $this->fechaI;
  }

  public function getFechaV()
  {
    return $this->fechaV;
  }

}
?>