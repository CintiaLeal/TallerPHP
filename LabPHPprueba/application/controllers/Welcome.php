<?php


class Welcome extends CI_Controller {
	

	function __contruct (){
		parent :: __contruct(); 
		$this->load->helper('form');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('welcome_message');
		// carga manual de la base de datos $this->load->database('mysqli', false );
		//print_r($this->db->query("select * from paises"));
/*
		$p = $this->db->query("select * from paises")->result();
		foreach($p as $pa){
			print_r($pa->nombre."<br>");

		}*/	

		$this->load->view('registro.php');
		
	}	
	
}


