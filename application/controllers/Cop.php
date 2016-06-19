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
		$data['scope'] = $this->General_model->getuserscope($this->session->userdata('uid')); 
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
		
		// NOTIF
		$participant = $this->Cop_model->cop_participant($id); // ambil data participant
		$idtitle = $this->Cop_model->getidstarter($id); // ambil id sama title forum dari thread starter
		if ($idtitle->id_user != $this->session->userdata('uid')) {
			$participant[count($participant)] = $idtitle->id_user;
		}
		$insert = $this->Cop_model->bp_post_comment($data); // post comment
		if (!empty($participant)) {
			$notif = $this->General_model->setnotif($participant, "New Respond on ".$idtitle->title,site_url('cop/bp_view/'.$id),1);
		}

		if (isbe()) {
			$this->General_model->setpoint($this->session->userdata('uid'), 1, "Respond Best Practice");
		}
		
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
		$data['step'] = $this->General_model->cekstep($detil[0]->id_scope);


		$data['id_cop'] = $id_cop;
		$this->load->view('cop/bp_close', $data);
	}

	public function bp_close_post($id_cop, $scope){
		$data['summary'] = $this->input->post('summary');
		$data['be'] = $this->input->post('be');
		$data['topic'] = $this->input->post('topic');
		$data['scope'] = $scope;
		$hasil = $this->Cop_model->bp_close($id_cop, $data);

		$participant = $this->Cop_model->cop_participant($id_cop);
		$idtitle = $this->Cop_model->getidstarter($id_cop);
		if ($idtitle->id_user != $this->session->userdata('uid')) {
			$participant[count($participant)] = $idtitle->id_user;
		}
		if (!empty($participant)) {
			$notif = @$this->General_model->setnotif($participant, "Forum Closed ".$idtitle->title,site_url('cop/bp_view/'.$id_cop),1);
		}
		if (isbe()) {
			$this->General_model->setpoint($this->session->userdata('uid'), 50, "Create BP"); // kalau be yang post, maka tambah point 50
		}
		if (!empty(@$data['be'])) {
			$notif = @$this->General_model->setnotif($data['be'], "New Responsibilities ".$idtitle->title,site_url('cop/bp_view/'.$id_cop),0);
		}


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

	public function bp_archive($page=1){
		$page--;
		$data['title'] = "Best Practive Archive";
		$q = $this->input->get('q');
		$data['list_bp'] = $this->Cop_model->bp_archive($page, $q);

		$count = @$data['list_bp'][0]->count;
		$halaman = (int) ceil($count / 5);
		$data['page'] = '';
		for ($i=1; $i <= $halaman; $i++) {
			if ($i == $page+1) {
				$data['page'] .= "<a href='".site_url('cop/bp_archive/'.$i)."' class='btn btn-default active disabled'>$i</a>";
			}else{
				$data['page'] .= "<a href='".site_url('cop/bp_archive/'.$i)."' class='btn btn-default'>$i</a>";
			}
		}
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
		
		$participant = $this->Cop_model->innov_participant($id);
		$idtitle = $this->Cop_model->getidstarter($id);
		if ($idtitle->id_user != $this->session->userdata('uid')) {
			$participant[count($participant)] = $idtitle->id_user;
		}
		if (!empty($participant)) {
			$notif = $this->General_model->setnotif($participant, "New Respond on ".$idtitle->title,site_url('cop/innovation_view/'.$id),4);
		}
		if (isbe()) {
			$this->General_model->setpoint($this->session->userdata('uid'), 1, "Respond Innovation");
		}

		if ($insert) {
			redirect('cop/innovation_view/'.$id);
		}
	}

	public function innovation_view($id_cop, $page = 1){
		$page--;
		$data['thread'] = $this->Cop_model->innov_get_thread($id_cop);
		$data['title'] = "Innovation - ".$data['thread'][0]->title;
		$data['type'] = 'innovation';
		$data['attachment'] = $this->Cop_model->getattachment($id_cop);
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

	public function innovation_close_post($id){
		$summary = $this->input->post('summary');
		$hasil = $this->Cop_model->innov_close($id, $summary);

		$participant = $this->Cop_model->innov_participant($id);
		$idtitle = $this->Cop_model->getidstarter($id);
		if ($idtitle->id_user != $this->session->userdata('uid')) {
			$participant[count($participant)] = $idtitle->id_user;
		}if (isbe()) {
			$this->General_model->setpoint($this->session->userdata('uid'), 50, "Create Innovation");
		}
		if (!empty($participant)) {
			$notif = $this->General_model->setnotif($participant, "Forum Closed ".$idtitle->title,site_url('cop/innovation_view/'.$id),4);
		}

		if ($hasil) {
			redirect('cop');
		}
	}

	public function innovation_archive($page=1){
		$page--;
		$data['title'] = "Innovation Archive";
		$q = $this->input->get('q');
		$data['list_innov'] = $this->Cop_model->innov_archive($page, $q);

		$count = @$data['list_innov'][0]->count;
		$halaman = (int) ceil($count / 5);
		$data['page'] = '';
		for ($i=1; $i <= $halaman; $i++) {
			if ($i == $page+1) {
				$data['page'] .= "<a href='".site_url('cop/innov_archive/'.$i)."' class='btn btn-default active disabled'>$i</a>";
			}else{
				$data['page'] .= "<a href='".site_url('cop/innov_archive/'.$i)."' class='btn btn-default'>$i</a>";
			}
		}
		$this->load->view('cop/innovation_archive',$data);
	}

	public function my_cop(){
		$data['title'] = "COP Dashboard";
		$data['bp'] = $this->Cop_model->history_bp($this->session->userdata('uid'));
		$data['innov'] = $this->Cop_model->history_innov($this->session->userdata('uid'));
		$this->load->view('cop/cop_my',$data);
	}
	public function attachment_post($id){
		$file = $_FILES['attachment'];
		$insert = $this->Cop_model->add_attachment($id, $file);

		if ($insert){
			redirect('cop/innovation_view/'.$id);
		}
	}



	


}