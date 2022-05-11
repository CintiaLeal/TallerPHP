<?php

class altaUsuario extends CI_Controller {


    public function alta(){
        $redirigir = $this->input->post('btnregistrar');
        echo "Hola mundo";
		$used = new usuario($db);
		//$request = /Config/Services::request();
        $this->load->view('login.html');
		$date=array(
			'user_id' ==  $ran_id = rand(time(), 100000000),
			'nickname' => $request->getPostGet('nickname'),
			'email' => $request->getPostGet('email'),
			'nombre' => $request->getPostGet('nombre'),
			'apellido' => $request->getPostGet('apellido'),
			'telefono' => $request->getPostGet('telefono'),
			'imagen' => $request->getPostGet('imagen'),
			'password' => $request->getPostGet('password'),
		);
	
		$user->insert($date);
	}	
}
