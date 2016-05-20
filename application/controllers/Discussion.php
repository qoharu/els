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
	public function index($waktu = 12){
		$data['title'] = date('d');
		switch ($waktu) {
			case ($waktu <= 7):
				$data['title'] = 'Vote Topic';
				$data['ec'] = $this->Discussion_model->getvote(1);
				$data['em'] = $this->Discussion_model->getvote(2);
				$data['spb'] = $this->Discussion_model->getvote(3);
				$data['ict'] = $this->Discussion_model->getvote(4);

				$this->load->view('discussion_early',$data);
				break;
			case ($waktu >= 7 && $waktu <= 21):
				$this->load->view('discussion_mid',$data);
				break;
			case ($waktu >= 22):
				$this->load->view('discussion_late',$data);
				break;
		}
	}

	public function my_discussion(){
		$data['title'] = "My discussion";
		$data['todo'] = $this->Discussion_model->todo();
		$data['list'] = $this->Discussion_model->disc_list();

		$this->load->view('discussion_my', $data);
	}

	public function new_discussion($id_step){
		$data['title'] = "New Discussion";
		$data['step'] = $this->Discussion_model->getstep($id_step);

		$this->load->view('discussion_new',$data);
	}

	public function browse($scope="all", $page){
		$q = mysql_escape_string($_GET['q']);
		$data['list'] = $this->Discussion_model->browse($scope, $page, $q);
		
	}

	public function view($id=1){
		$this->load->view('discussion_view');
	}
}