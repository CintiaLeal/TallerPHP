<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busqueda extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model('Busqueda_model');
	}

    function index(){
		
        
    }
	function buscar(){
        // $pedidos = $this->Busqueda_model->pedidos();
		// $viajes = $this->Busqueda_model->viajes();
		// $data = array(
		// 	'pedidos' => $pedidos,
		// 	'viajes' => $viajes
		// );

		//print_r($data);
		
		$this->load->view('busqueda.php');//,$data
    }

	function busqueda(){
		$c = $_POST['contenido'];
		$viajes = $this->Busqueda_model->buscarviajes($c);
		$pedidos = $this->Busqueda_model->buscarpedidos($c);
		$data = array(
			'pedidos' => $pedidos,
			'viajes' => $viajes
		);
		echo json_encode($data);
	}
	function verPedido(){
            $idPedido = $_POST['idPedido'];
            $pedido = $this->Busqueda_model->devolverPedido($idPedido);
            $origenDestino = $this->Busqueda_model->devolverOrigenDestino($idPedido);
            foreach($pedido as $row){
                $p = $row;
            }
            foreach($origenDestino as $row){
                $destino = $row->destino;
                $origen = $row->origen;
            }
            $data = array(
                'pedido' => $p,
                'origen' => $origen,
                'destino' => $destino
            );
            $this->load->view('verPedidosBusqueda',$data);
        }

		function verViaje(){
				$_id = $_POST["idViaje"];
				$res = $this->Busqueda_model->devolverViaje($_id);
				if(!empty($res)){
					foreach($res as $row){
						$viaje = $row;
					}
				}
				$data = array(
					'viaje' => $viaje,
				);
				$this->load->view('verViajeBusqueda.php',$data);
		}

}