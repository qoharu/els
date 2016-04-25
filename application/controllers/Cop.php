<?php

/**
* 
*/
class Cop extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Cop_model');
	}
	public function index(){
		$data['title'] = "COP";

		$this->load->view('cop', $data);
	}

	public function innovation_new($value=''){
		$data['title'] = "New Innovation";
		$data['be'] = $this->Cop_model->getbe();
		$this->load->view('innovation_new',$data);
	}
	public function innovation_post($value=''){
		var_dump($_POST);
	}

	public function FunctionName($value=''){
		# code...
	}

}