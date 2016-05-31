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
		$data['title'] = "Journal";
		$data['listjournal'] = $this->Journal_model->listjournal(); //ambil data list journal
		$this->load->view('journal/journal', $data); //tampilkan view journal.php dengan $data
	}


	public function post_new(){
		$data['title'] = $this->input->post('title');
		$data['desc'] = $this->input->post('description');
		$data['dir'] = $this->input->post('directorate');
		$data['file'] = $_FILES['file']; // Ambil atribut file

		// Kirim data ke fungsi upload pada model Journal_model
		$hasil = $this->Journal_model->upload($data);

		if (isbe()) {
			$this->General_model->setpoint($this->session->userdata('uid'), 50, "Upload Journal");
		}

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
			redirect('journal/view/'.$id_journal);
		}
	}

	public function newpost(){
		$data['title'] = "Post Journal";
		$data['directorate'] = $this->General_model->getdirectorate();
		$this->load->view('journal/journal_new', $data);
	}

	public function browse($page=1){
		$page--;
		$q = $this->db->escape_str(@$_GET['q']);
		$data['listjournal'] = $this->Journal_model->browsejournal($page,$q);
		$this->load->view('journal/journal_browse',$data);
	}

	public function view($id_journal, $comment_page=1){
		$comment_page--;
		$data['journal'] = $this->Journal_model->viewjournal($id_journal);
		$data['title'] = $data['journal'][0]->title." | Journal";
		$data['comment'] = $this->Journal_model->getcomment($id_journal, $comment_page);
		$data['count'] = array(
						'journal' => $this->General_model->getjournalcount($data['journal'][0]->id_user), 
						'course' => $this->General_model->getcoursecount($data['journal'][0]->id_user),
						'discussion' => $this->General_model->getdiscussioncount($data['journal'][0]->id_user)
						);
		$this->load->view('journal/journal_view',$data);
	}

}