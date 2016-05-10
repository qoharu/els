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
	public function index($waktu = 'early'){
		$waktu = date('d');
		$data['title'] = date('d');
		switch ($waktu) {
			case ($waktu <= 7):
				$data['title'] = 'Vote Topic';
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

	public function browse($scope="all", $page){
		$q = mysql_escape_string($_GET['q']);
		$data['list'] = $this->Discussion_model->browse($scope, $page, $q);
		
	}

	public function view($id=1){
		$this->load->view('discussion_view');
	}
}