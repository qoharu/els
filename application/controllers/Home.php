<?php

/**
* 
*/
class Home extends CI_Controller
{

	public function index(){
		$this->load->view('home');
	}

	public function about(){
		echo "about";
	}
}