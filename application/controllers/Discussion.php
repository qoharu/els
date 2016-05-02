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
		
		switch ($waktu) {
			case 'early':
				$this->load->view('discussion_early');
				break;
			
			case 'mid':
				$this->load->view('discussion_mid');
				break;
			case 'late':
				$this->load->view('discussion_late');
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