<?php

/**
* 
*/
class Home extends CI_Controller
{

	public function index(){
		$data['title'] = "Home";
		$this->load->view('home', $data);
	}

	public function dash(){
		$data['title'] = "Dashboard";
		$this->load->view('dash',$data);
	}

	public function about(){
		echo "about";
	}
}