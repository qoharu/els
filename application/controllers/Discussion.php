<?php
/**
* 
*/
class Discussion extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model("Discussion_model"); // include Discussion_model pada setiap fungsi
	}
	public function index(){
		# code...
	}

	public function browse($scope="all", $page){
		$q = mysql_escape_string($_GET['q']);
		$data['list'] = $this->Discussion_model->browse($scope, $page, $q);
		

	}
}