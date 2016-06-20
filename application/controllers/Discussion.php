<?php
/**
* 
*/
class Discussion extends CI_Controller
{
	private $state;

	function __construct(){
		parent::__construct();
		$this->load->model("Discussion_model"); // include Discussion_model pada setiap fungsi
		$this->state = $this->Discussion_model->cekstate();
		// $this->Discussion_model->disc_trigger();
	}

	public function index(){
		switch ($this->state) {
			case 1:
				redirect('discussion/vote');
				break;
			case 2:
				redirect('discussion/forum');
				break;
			case 3:
				$data['title'] = "Discussion";
				$this->load->view('discussion/discussion_late',$data);
				break;
		}
	}

	public function setdate($tanggal){
		$this->Discussion_model->disc_trigger($tanggal);
	}
	public function vote(){
		if ($this->state != 1) {
			redirect('discussion');
		}
		$data['title'] = 'Vote Topic';
		$data['ec'] = $this->Discussion_model->vote_detail(1);
		$data['em'] = $this->Discussion_model->vote_detail(2);
		$data['spb'] = $this->Discussion_model->vote_detail(3);
		$data['ict'] = $this->Discussion_model->vote_detail(4);

		$this->load->view('discussion/discussion_early',$data);
	}

	public function vote_topic($id_disc){
		if ($this->state != 1) {
			redirect('discussion');
		}
		$data['id_discussion'] = $id_disc;
		$data['id_user'] = $this->session->userdata('uid');
		$vote = $this->Discussion_model->vote($data);
		if ($vote) {
			redirect('discussion/vote');
		}
	}

	public function forum(){
		if ($this->state != 2) {
			redirect('discussion');
		}
		$data['title'] = "Discussion Forum";
		for ($i=1; $i <= 4 ; $i++) { 
			$data['forum'][] = @$this->Discussion_model->get_discussion($i);
		}
		$this->load->view('discussion/discussion_mid',$data);
	}

	public function my_discussion(){
		$data['title'] = "My discussion";
		$data['todo'] = $this->Discussion_model->todo();
		$data['list'] = $this->Discussion_model->disc_list();
		$data['state'] = $this->Discussion_model->cekstate();

		$this->load->view('discussion/discussion_my', $data);
	}

	public function respond_post($id){
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		$data['id_discussion'] = $id;
		$data['id_user'] = $this->session->userdata('uid');

		$insert = $this->Discussion_model->post_respond($data);

		$participant = $this->Discussion_model->disc_participant($id);
		$idtitle = $this->Discussion_model->getidstarter($id);
		if ($idtitle->id_user != $this->session->userdata('uid')) {
			$participant[count($participant)] = $idtitle->id_user;
		}
		$notif = $this->General_model->setnotif($participant, "New Respond on ".$idtitle->title,site_url('discussion/view_discussion/'.$id),0);

		if (isbe()) {
			$this->General_model->setpoint($this->session->userdata('uid'), 1, "Respond Discussion");
		}

		if ($insert) {
			redirect('discussion/view_discussion/'.$id);
		}
	}

	public function view_discussion($id_disc, $page = 1){
		$page--;
		$data['thread'] = $this->Discussion_model->disc_get_thread($id_disc);
		$data['title'] = "Discussion - ".$data['thread'][0]->title;

		$comment = $this->Discussion_model->get_disc_comment($id_disc, $page);
		$data['comment'] = $comment['data'];
		$data['id_disc'] = $id_disc;

		$count = $comment['count'][0]->count;
		$halaman = (int) ceil($count / 20);
		$data['page'] = '';
		for ($i=1; $i <= $halaman; $i++) {
			if ($i == $page+1) {
				$data['page'] .= "<a href='".site_url('discussion/view_discussion/'.$id_disc.'/'.$i)."' class='btn btn-default active disabled'>$i</a>";
			}else{
				$data['page'] .= "<a href='".site_url('discussion/view_discussion/'.$id_disc.'/'.$i)."' class='btn btn-default'>$i</a>";
			}
		}

		$data['tree'][0] = array('title' => 'Group Discussion' , 'url' => site_url('discussion') );
		$data['tree'][1] = array('title' => $data['thread'][0]->title , 'url' => site_url('discussion/view_discussion/'.$id_disc) );
		$data['tree'][2] = array('title' => 'page '.($page+1) , 'url' => site_url('discussion/view_discussion/'.$id_disc.'/'.($page+1) ));

		$this->load->view('discussion/discussion_view',$data);

	}

	public function create_discussion($id_step){
		$data['title'] = "New Discussion";
		$data['step'] = $this->Discussion_model->detail_new($id_step);

		$this->load->view('discussion/discussion_new',$data);
	}

	public function post_discussion($id_step){
		$step = $this->Discussion_model->detail_new($id_step)[0];
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		$data['id_scope'] = $step->id_scope;
		$data['id_step'] = $id_step;
		$data['id_user'] = $this->session->userdata['uid'];
		$data['status'] = 1;
		$insert = $this->Discussion_model->post_new($data);

		if ($insert) {
			redirect('discussion/my_discussion');
		}

	}

	public function disc_close($id){
		$data['thread'] = $this->Discussion_model->disc_get_thread($id);
		$data['title'] = "Close Forum";

		$this->load->view('discussion/discussion_close',$data);
	}

	public function disc_close_post($id){
		$close = $this->Discussion_model->close_post($id, $this->input->post('summary'));

		$participant = $this->Discussion_model->disc_participant($id);
		$idtitle = $this->Discussion_model->getidstarter($id);
		if ($idtitle->id_user != $this->session->userdata('uid')) {
			$participant[count($participant)] = $idtitle->id_user;
		}
		$notif = $this->General_model->setnotif($participant, "Discussion Closed ".$idtitle->title,site_url('discussion/view_discussion/'.$id),0);
		if (isbe()) {
			$this->General_model->setpoint($this->session->userdata('uid'), 50, "Create Discussion");
		}
		if ($close){
			redirect('discussion/view_discussion/'.$id);
		}

	}

	public function discussion_archive($page=1){
		$page--;
		$data['title'] = 'Discussion Archive';
		$q = @$this->input->get('q');
		$data['archive'] = $this->Discussion_model->get_archive($page, $q);

		$count = @$data['archive'][0]->count;
		$halaman = (int) ceil($count / 20);
		$data['page'] = '';
		for ($i=1; $i <= $halaman; $i++) {
			if ($i == $page+1) {
				$data['page'] .= "<a href='".site_url('discussion/discussion_archive/'.$i)."' class='btn btn-default active disabled'>$i</a>";
			}else{
				$data['page'] .= "<a href='".site_url('discussion/discussion_archive/'.$i)."' class='btn btn-default'>$i</a>";
			}
		}
		$this->load->view('discussion/discussion_archive', $data);
	}

	// OPEN DISCUSSION
	public function open(){
		$data['title'] =  "Open Discussion";
		$data['list'] = $this->Discussion_model->od_get();

		$this->load->view('discussion/od',$data);
	}

	public function open_create(){
		$data['title'] = "Create Discussion";
		$data['scope'] = $this->General_model->getscope();

		$this->load->view('discussion/od_create',$data);
	}

	public function open_create_post(){
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		$data['id_scope'] = $this->input->post('id_scope');
		$data['id_user'] = $this->session->userdata('uid');

		$insert = $this->Discussion_model->open_insert($data);

		if ($insert) {
			redirect('discussion/open');
		}
	}

	public function open_view($id,$page=1){
		$page--;
		$data['title'] = "View Forum";
		$data['thread'] = $this->Discussion_model->open_getthread($id);
		$comment = $this->Discussion_model->open_getcomment($id, $page);
		$data['comment'] = $comment['data'];

		$count = $comment['count']->count;
		$halaman = (int) ceil($count / 20);
		$data['page'] = '';
		for ($i=1; $i <= $halaman; $i++) {
			if ($i == $page+1) {
				$data['page'] .= "<a href='".site_url('discussion/open_view/'.$id.'/'.$i)."' class='btn btn-default active disabled'>$i</a>";
			}else{
				$data['page'] .= "<a href='".site_url('discussion/open_view/'.$id.'/'.$i)."' class='btn btn-default'>$i</a>";
			}
		}
		$this->load->view('discussion/od_view',$data);
	}

	public function open_close($id){
		$close = $this->Discussion_model->open_close($id);
		if ($close) {
			redirect('discussion/open_view/'.$id);
		}
	}

	public function open_respond_post($id){
		$data['id_discussion'] = $id;
		$data['id_user'] = $this->session->userdata('uid');
		$data['content'] = $this->input->post('content');

		$insert = $this->db->insert('open_discussion_comment',$data);
		if ($insert) {
			redirect('discussion/open_view/'.$id);
		}
	}


}