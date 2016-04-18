<?php
/**
* 
*/
class Journal_model extends CI_Model
{
	
	function upload($data){
		$uid = $this->session->userdata('uid');
		$dir = $data['dir'];
		$desc = $data['desc'];
		$title = $data['title'];

		$filename = md5(microtime()).basename($data["file"]["name"]);
		$target_file = "uploads/".$filename;
		
		if (move_uploaded_file($data["file"]["tmp_name"], $target_file)){
			$kirim = $this->db->query("INSERT INTO journal (id_user, id_directorate, title, description, file) 
				VALUES ('$uid','$dir', '$title', '$desc', '$filename' ) ");
			if ($kirim) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}

	}

	function edit($data){

	}

	function postcomment($data,$id){
		$content = $data['content'];
		$uid = $this->session->userdata('uid');
		$kirim = $this->db->query("INSERT INTO journal_comment (id_user, id_journal, content) 
				VALUES ('$uid','$id', '$content') ");
		if ($kirim) {
			return true;
		}else{
			return false;
		}
	}

	function listjournal(){
		return $this->db->query(" SELECT journal.title, profile.fullname, journal.description, journal.id_journal, user.id_user, directorate.directorate_name  
			FROM journal, directorate, user, profile 
			WHERE journal.id_directorate = directorate.id_directorate 
				AND user.id_user = journal.id_user
				AND user.id_user = profile.id_user
				AND status=1
				ORDER BY journal.views
				LIMIT 0,9")->result();
	}

	function browsejournal($page,$query){
		return $this->db->query(" SELECT journal.title, profile.fullname, journal.description, journal.id_journal, user.id_user, directorate.directorate_name  
			FROM journal, directorate, user, profile 
			WHERE journal.id_directorate = directorate.id_directorate 
				AND user.id_user = journal.id_user
				AND user.id_user = profile.id_user
				AND status=1
				AND (title LIKE '%$query%' OR description LIKE '%$query%')
			LIMIT $page,10 ")->result();
	}

	function viewjournal($id){
		return $this->db->query("SELECT title, fullname, description, id_journal, user.id_user, expert_name, directorate_name, created_at, file, views
			FROM journal, directorate, user, profile, expert
			WHERE journal.id_directorate = directorate.id_directorate
				AND journal.id_journal = '$id'
				AND user.id_user = journal.id_user
				AND profile.id_expert = expert.id_expert
		")->result();
	}

	function getcomment($id,$page){
		return $this->db->query("SELECT * FROM journal_comment, user, profile
			WHERE journal_comment.id_comment = '$id'
			ORDER BY id_comment DESC
			LIMIT $page,15
			")->result();
	}


}