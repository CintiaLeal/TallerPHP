<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class index extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

    function index(){
        $this->loead->view('login.html');
    }
}