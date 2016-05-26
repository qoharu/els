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
		$data['list_bp'] = $this->Cop_model->list_bp();
		$this->load->view('cop/cop', $data);
	}

// BEST PRACTICE
	public function bp_new(){
		$data['title'] = "New Best Practice";
		$data['scope'] = $this->General_model->getscope();
		$this->load->view('cop/bp_new',$data);
	}

	public function bp_post(){
		$data['id_scope'] = $this->input->post('id_scope');
		$data['id_user'] = $this->session->userdata('uid');
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		$data['type'] = '2';
		$insert = $this->Cop_model->insert_bp($data);

		if ($insert) {
			redirect('cop/bp_view/'.$insert);
		}
	}

	public function bp_post_comment($id){
		$data = array('id_cop' => $id ,
					'id_user' => $this->session->userdata('uid'),
					'title' => $this->input->post('title'),
					'content' => $this->input->post('content') );

		$insert = $this->Cop_model->bp_post_comment($data);

		if ($insert) {
			redirect('cop/bp_view/'.$id);
		}
	}

	public function bp_view($id_cop, $page = 1){
		$page--;
		$data['thread'] = $this->Cop_model->bp_get_thread($id_cop);
		$data['title'] = "Best Practice - ".$data['thread'][0]->title;

		$comment = $this->Cop_model->get_comment($id_cop, $page);
		$data['comment'] = $comment['data'];
		$data['id_cop'] = $id_cop;
		$data['penugasan'] = $this->Cop_model->bp_penugasan($id_cop);

		$count = $comment['count'][0]->count;
		$halaman = (int) ceil($count / 20);
		$data['page'] = '';
		for ($i=1; $i <= $halaman; $i++) {
			if ($i == $page+1) {
				$data['page'] .= "<a href='".site_url('cop/bp_view/'.$id_cop.'/'.$i)."' class='btn btn-default active disabled'>$i</a>";
			}else{
				$data['page'] .= "<a href='".site_url('cop/bp_view/'.$id_cop.'/'.$i)."' class='btn btn-default'>$i</a>";
			}
		}

		$data['tree'][0] = array('title' => 'COP' , 'url' => site_url('cop') );
		$data['tree'][1] = array('title' => $data['thread'][0]->title , 'url' => site_url('cop/bp_view/'.$id_cop) );
		$data['tree'][2] = array('title' => 'page '.($page+1) , 'url' => site_url('cop/bp_view/'.$id_cop.'/'.($page+1) ));

		$this->load->view('cop/bp_view',$data);

	}

	public function bp_close($id_cop){
		$detil = $this->Cop_model->bp_get_thread($id_cop);
		$data['be'] = $this->General_model->getbe();
		$data['title'] = $detil[0]->title;
		$data['scope'] = $detil[0]->scope_name;
		$data['id_scope'] = $detil[0]->id_scope;
		$data['step'] = $this->General_model->cekstep($detil[0]->id_scope, 1);

		$data['id_cop'] = $id_cop;
		$this->load->view('cop/bp_close', $data);
	}

	public function bp_close_post($id_cop, $scope){
		$data['summary'] = $this->input->post('summary');
		$data['be'] = $this->input->post('be');
		$data['topic'] = $this->input->post('topic');
		$data['scope'] = $scope;
		$hasil = $this->Cop_model->bp_close($id_cop, $data);
				
		if ($hasil) {
			redirect('cop/bp_view/'.$id_cop);
		}
	}

	public function bp_topic(){
		$data['title'] = "Discussion Topic";
		
		$data['ec'] = $this->Cop_model->bp_topic(1);
		$data['em'] = $this->Cop_model->bp_topic(2);
		$data['spb'] = $this->Cop_model->bp_topic(3);
		$data['ict'] = $this->Cop_model->bp_topic(4);

		$this->load->view('cop/bp_topic', $data);
	}

	public function bp_archive(){
		$data['title'] = "Best Practive Archive";
		$data['list_bp'] = $this->Cop_model->bp_archive();
		$this->load->view('cop/bp_archive',$data);
	}

// INNOVATION
	public function innovation_new(){
		$data['title'] = "New Innovation";
		$data['be'] = $this->General_model->getbe();
		$this->load->view('cop/innovation_new',$data);
	}
	public function innovation_post(){
		$insert = $this->Cop_model->insert_innovation($_POST);
		if ($insert) {
			echo "inserted";
			$invite = $this->Cop_model->invite($insert, $_POST['user']);
			if ($invite) {
				redirect('cop/innovation_view/'.$insert);
			}
		}
	}

	public function innovation_post_comment($id){
		$data = array('id_cop' => $id ,
					'id_user' => $this->session->userdata('uid'),
					'title' => $this->input->post('title'),
					'content' => $this->input->post('content') );

		$insert = $this->Cop_model->innov_post_comment($data);

		if ($insert) {
			redirect('cop/innovation_view/'.$id);
		}
	}

	public function innovation_view($id_cop, $page = 1){
		$page--;
		$data['thread'] = $this->Cop_model->innov_get_thread($id_cop);
		$data['title'] = "Innovation - ".$data['thread'][0]->title;
		$data['type'] = 'innovation';

		$comment = $this->Cop_model->get_comment($id_cop, $page);
		$data['comment'] = $comment['data'];
		$data['id_cop'] = $id_cop;

		$count = $comment['count'][0]->count;
		$halaman = (int) ceil($count / 20);
		$data['page'] = '';
		for ($i=1; $i <= $halaman; $i++) {
			if ($i == $page+1) {
				$data['page'] .= "<a href='".site_url('cop/innovation_view/'.$id_cop.'/'.$i)."' class='btn btn-default active disabled'>$i</a>";
			}else{
				$data['page'] .= "<a href='".site_url('cop/innovation_view/'.$id_cop.'/'.$i)."' class='btn btn-default'>$i</a>";
			}
		}

		$data['tree'][0] = array('title' => 'COP' , 'url' => site_url('cop') );
		$data['tree'][1] = array('title' => $data['thread'][0]->title , 'url' => site_url('cop/innovation_view/'.$id_cop) );
		$data['tree'][2] = array('title' => 'page '.($page+1) , 'url' => site_url('cop/innovation_view/'.$id_cop.'/'.($page+1) ));

		$this->load->view('cop/innovation_view',$data);

	}

	public function innovation_close($id_cop){
		$detil = $this->Cop_model->innov_get_thread($id_cop);
		$data['title'] = $detil[0]->title;
		$data['id_cop'] = $id_cop;
		$this->load->view('cop/innovation_close', $data);
	}

	public function innovation_close_post($id_cop){
		$summary = $this->input->post('summary');
		$hasil = $this->Cop_model->innov_close($id_cop, $summary);

		if ($hasil) {
			redirect('cop');
		}
	}

	public function innovation_archive(){
		$data['title'] = "Innovation Archive";
		$data['list_innov'] = $this->Cop_model->innov_archive();
		$this->load->view('cop/innovation_archive', $data);
	}

	public function bestpractice($scope=''){
		$data['title'] = "Best Practice $scope";
		$data['forum'] = $this->Cop_model->getbpscope($scope);

		$this->load->view('cop/bestpractice',$data);
	}

}