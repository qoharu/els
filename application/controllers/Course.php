<?php

/**
* 
*/
class Course extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Course_model');
	}

	public function index(){
		$data['title'] = 'Available Course';
		$this->load->view('course',$data);
	}
	

	public function post_new(){

	}

	public function newcourse(){
		$this->load->view('course_new');
	}
	public function browse($page){
		$q = mysql_escape_string(@$_GET['q']);
		$data['course'] = $this->Course_model->browsecourse($page,$q);
		$this->load->view('course_browse');
	}


	public function enroll($id_course){

	}
	
	public function view($id_course){

	}
}