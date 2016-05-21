<?php
/**
* 
*/
class Discussion extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model("Discussion_model"); // include Discussion_model pada setiap fungsi
		$this->Discussion_model->disc_trigger();

	}
	public function index($waktu = 1){
		$data['title'] = date('d');
		switch ($waktu) {
			case ($waktu <= 7):
				redirect('discussion/vote');
				break;
			case ($waktu >= 7 && $waktu <= 21):
				redirect('discussion/forum');
				break;
			case ($waktu >= 22):
				$this->load->view('discussion_late',$data);
				break;
		}
	}

	public function vote(){
		$data['title'] = 'Vote Topic';
		$data['ec'] = $this->Discussion_model->vote_detail(1);
		$data['em'] = $this->Discussion_model->vote_detail(2);
		$data['spb'] = $this->Discussion_model->vote_detail(3);
		$data['ict'] = $this->Discussion_model->vote_detail(4);

		$this->load->view('discussion_early',$data);
	}

	public function vote_topic($id_disc){
		$data['id_discussion'] = $id_disc;
		$data['id_user'] = $this->session->userdata('uid');
		$vote = $this->Discussion_model->vote($data);
		if ($vote) {
			redirect('discussion/vote');
		}
	}

	public function forum(){
		$this->load->view('discussion_mid',$data);
	}
	public function my_discussion(){
		$data['title'] = "My discussion";
		$data['todo'] = $this->Discussion_model->todo();
		$data['list'] = $this->Discussion_model->disc_list();

		$this->load->view('discussion_my', $data);
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

		$this->load->view('discussion_view',$data);

	}

	public function create_discussion($id_step){
		$data['title'] = "New Discussion";
		$data['step'] = $this->Discussion_model->detail_new($id_step);

		$this->load->view('discussion_new',$data);
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

	public function browse($scope="all", $page){
		$q = mysql_escape_string($_GET['q']);
		$data['list'] = $this->Discussion_model->browse($scope, $page, $q);
		
	}

	public function view($id=1){
		$this->load->view('discussion_view');
	}
}