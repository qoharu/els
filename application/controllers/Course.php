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
		$data['course'] = $this->Course_model->listcourse();

		$this->load->view('course/course',$data);
	}

	public function mycourse(){
		$data['title'] = 'My Class';

		$data['todo'] = $this->Course_model->todo();
		$data['mycourse'] = $this->Course_model->mycourse();
		$data['enrolled'] = $this->Course_model->enrolled();
		
		$this->load->view('course/course_my', $data);
	}

	public function newcourse($id_step){
		$data['title'] = 'Open new course';
		$data['detail'] = $this->Course_model->detail_new($id_step);

		$this->load->view('course/course_new', $data);
	}
	

	public function post_new($id_step){
		$data['title'] = $this->input->post('title');
		$data['description'] = $this->input->post('description');
		$data['quota'] = $this->input->post('quota');
		$data['datetime'] = $this->input->post('datetime');
		$data['location'] = $this->input->post('location');
		$data['id_scope'] = $this->input->post('id_scope');
		$data['id_user'] = $this->session->userdata('uid');
		$data['id_step'] = $id_step;

		if (isbe()) {
			$this->General_model->setpoint($this->session->userdata('uid'), 50, "Open Course");
		}
		$insert = $this->Course_model->post_course($data);
		if ($insert) {
			redirect('course');
		}

	}

	public function view_course($id_course){
		$data['course'] = $this->Course_model->detail_course($id_course);
		$data['participant'] = $this->Course_model->course_participant($id_course);
		$data['title'] = "Course - ".$data['course']->title;

		$this->load->view('course/course_view',$data);
	}

	public function close_course($id_course){
		$data['id_course'] = $id_course;
		$data['title'] = 'Course Summary';

		$this->load->view('course/course_close',$data);
	}

	public function post_close($id_course){
		$close = $this->Course_model->course_summary($id_course, $this->input->post('summary'));
		if ($close) {
			redirect('course/mycourse');
		}
	}	

	public function browse($page){
		$q = mysql_escape_string(@$_GET['q']);
		$data['course'] = $this->Course_model->browsecourse($page,$q);
		$this->load->view('course_browse');
	}


	public function enroll($id_course){
		$insert = $this->Course_model->enroll($id_course);
		if ($insert){
			redirect('course');
		}
	}
	
	public function view($id_course){

	}
}