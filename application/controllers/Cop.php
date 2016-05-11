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

	public function innovation_view($id_cop, $page = 1){
		$page--;
		$data['thread'] = $this->Cop_model->innov_get_thread($id_cop);
		$data['title'] = "Innovation - ".$data['thread'][0]->title;
		$data['comment'] = $this->Cop_model->get_comment($id_cop);

		$data['tree'][0] = array('title' => 'COP' , 'url' => site_url('cop') );
		$data['tree'][1] = array('title' => $data['thread'][0]->title , 'url' => site_url('cop/innovation_view/'.$id_cop) );
		$data['tree'][2] = array('title' => 'page '.($page+1) , 'url' => site_url('cop/innovation_view/'.$page+1) );

		$this->load->view('discussion_view',$data);

	}

	public function bestpractice($scope=''){
		$data['title'] = "Best Practice $scope";
		$data['forum'] = $this->Cop_model->getbpscope($scope);

		$this->load->view('bestpractice',$data);
	}

}