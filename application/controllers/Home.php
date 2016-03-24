<?php

/**
* 
*/
class Home extends CI_Controller
{

	public function index(){
		$this->load->view('home');
	}

	public function dash(){
		$this->load->view('dash');
	}

	public function about(){
		echo "about";
	}
}