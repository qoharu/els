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
		return $this->db->query(" SELECT *
			FROM journal 
			LEFT JOIN directorate ON journal.id_directorate = directorate.id_directorate
			LEFT JOIN user ON journal.id_user = user.id_user
			LEFT JOIN profile ON journal.id_user = profile.id_user
			WHERE status=1
			ORDER BY views
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
		$this->db->query("UPDATE journal SET views = views + 1 WHERE id_journal = '$id' ");
		return $this->db->query("
			SELECT journal.*, pic, fullname, expert_name, directorate_name, email
			FROM journal
			LEFT JOIN directorate ON journal.id_directorate = directorate.id_directorate
			LEFT JOIN user ON user.id_user = journal.id_user
			LEFT JOIN profile ON profile.id_user = user.id_user
			LEFT JOIN expert ON profile.id_expert = expert.id_expert
			WHERE id_journal = '$id'
		")->result();
	}

	function getcomment($id,$page){
		return $this->db->query("SELECT * FROM journal_comment
			JOIN user ON journal_comment.id_user = user.id_user
			LEFT JOIN profile ON user.id_user = profile.id_user
			LEFT JOIN level ON user.id_level = level.id_level
			WHERE journal_comment.id_journal = '$id'
			ORDER BY id_comment DESC
			LIMIT $page,15
			")->result();
	}

	function getiduser($id){
		return $this->db->query("SELECT id_user FROM journal WHERE id_journal = '$id' ")->row()->id_user;
	}

	function lastnotif(){
		$uid = $this->session->userdata('uid');
		return $this->db->query("SELECT * FROM journal WHERE id_user = '$uid' ORDER BY id_journal DESC ")->row();
	}


}