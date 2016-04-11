<?php

/**
* 
*/
class Journal extends CI_Controller
{
	
	function __construct(){
			parent::__construct();
			$this->load->model("Journal_model"); // include Journal_model pada setiap fungsi
		}

	public function index(){
		$data['listjournal'] = $this->Journal_model->listjournal(); //ambil data list journal

		$this->load->view('journal', $data); //tampilkan view journal.php dengan $data
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
			redirect('journal'); // redirect ke index journal
		}else{
			echo "false";
		}
	}

	public function edit($id_journal)
	{
		# code...
	}
	
	public function post_comment($id_journal){
		$data['content'] = @$_POST['content'];
		$hasil = $this->Journal_model->postcomment($data,$id_journal);
		if ($hasil) {
			# code...
		}
	}

	public function newpost(){
		$data['directorate'] = $this->General_model->getdirectorate();
		$this->load->view('journal_new', $data);
	}

	public function browse($page){
		$q = mysql_escape_string(@$_GET['q']);
		$data['listjournal'] = $this->Journal_model->browsejournal($page);
		// $this->load->view('');
	}

	public function view($id_journal, $comment_page){
		$data['journal'] = $this->Journal_model->viewjournal($id_journal);
		$data['comment'] = $this->Journal_model->getcomment($id_journal, $comment_page);
		// $this->load->view('');
	}

	
}