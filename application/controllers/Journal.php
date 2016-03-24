<?php

/**
* 
*/
class Journal extends CI_Controller
{
	
	function __construct()
		{
			parent::__construct();
			$this->load->model("Journal_model");
		}

	public function index(){
		$data['listjournal'] = $this->Journal_model->listjournal();

		$this->load->view('journal', $data);
	}


	public function post_new(){
		// Ambil data POST dari form
		$data['title'] = $this->input->post('title');
		$data['desc'] = $this->input->post('description');
		$data['dir'] = $this->input->post('directorate');
		$data['file'] = $_FILES['file']; // Ambil atribut file

		// Kirim data ke fungsi upload pada model Journal_model
		$hasil = $this->Journal_model->upload($data);

		// Jika upload berhasil, maka ....
		if ($hasil) {
			echo "true";
		}else{
			echo "false";
		}
	}
	
	public function newpost(){
		$data['directorate'] = $this->Journal_model->getDirectorate();
		$this->load->view('journal_new', $data);
	}

	public function browse($page){

	}

	public function search($query="", $page=0){

	}

	public function view($id_journal, $comment_page){

	}

	public function post_comment($id_journal){

	}
	
}