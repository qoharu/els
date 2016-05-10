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
		$data['list_innov'] = $this->Cop_model->list_innov();
		$this->load->view('cop', $data);
	}

	public function innovation_new($value=''){
		$data['title'] = "New Innovation";
		$data['be'] = $this->Cop_model->getbe();
		$this->load->view('innovation_new',$data);
	}
	public function innovation_post(){
		var_dump($_POST);
		$insert = $this->Cop_model->insert_innovation($_POST);
		if ($insert) {
			echo "inserted";
			$invite = $this->Cop_model->invite($insert, $_POST['user']);
			if ($invite) {
				redirect('cop/innovation_view/'.$insert);
			}
		}
	}

	public function innovation_view($id_cop){
		$data['thread'] = $this->Cop_model->innov_get_thread($id_cop);
		$data['title'] = "Discussion - ".$data['thread'][0]->title;
		$data['comment'] = $this->Cop_model->get_comment($id_cop);
		$this->load->view('discussion_view',$data);

	}

	public function bestpractice($scope=''){
		$data['title'] = "Best Practice $scope";
		$data['forum'] = $this->Cop_model->getbpscope($scope);

		$this->load->view('bestpractice',$data);
	}

}