<?php

/**
* 
*/
class Cop extends CI_Controller
{
	public function index()
	{
		$data['title'] = "COP";
		$this->load->view('cop');
	}

	public function FunctionName($value='')
	{
		# code...
	}

}